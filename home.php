<?php
require_once "./init.php";

############################
# Get the user's surveys
############################

$surveys = PDOFactory::sendQuery($db, 'SELECT survey_id, survey FROM surveys WHERE owner_id = :owner_id', ["owner_id" => $_SESSION["user_id"]]);
ob_start();

if ($surveys) {
    foreach ($surveys as $survey) {
        $s = unserialize($survey["survey"]);
        ?>
            <li class="survey">
                <a class="surveyLink" href="./view_survey.php?survey=<?= $survey["survey_id"]; ?>">
                    <span class="surveyName"><?= $s->getTitle(); ?></span>
                    <span class="surveyDate">- <?= $s->getCreationDate(); ?></span>
                    <span class="surveyMembers"><?= $s->getMembersCountStr() ?></span>
                </a>
            </li>
        <?php
    }
} else {
    echo '<p id="noSurvey">Uh oh, il semble que vous n\'ayez cr&eacute;&eacute; aucun sondage.</p>';
}

$surveysHTML = ob_get_contents();
ob_end_clean();

############################
# Import the view
############################

require_once "./views/home_v.php";