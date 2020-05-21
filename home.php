<?php
require_once "./init.php";

############################
# Check if he's connected
############################

if (!$is_connected) redirectTo("./login.php");

############################
# Get the user's surveys
############################

$surveys = PDOFactory::sendQuery(
        $db,
        'SELECT survey_id, survey FROM surveys WHERE owner_id = :owner_id ORDER BY survey_id',
        ["owner_id" => $_SESSION["user_id"]]
);
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
                <div class="surveyURIContainer">
                    <span class="surveyURI">http://localhost/2PROJ-Pollygon/answer_survey.php?survey=<?= $survey["survey_id"]; ?></span>
                </div>
        <?php

        if (isset($_GET["deleteMode"])) {
            ?>
                <div class="surveyDeletor">
                    <input type="checkbox" name="survey_delete[]" value="<?= $survey["survey_id"]; ?>">
                </div>
            <?php
        }

        echo '</li>';
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