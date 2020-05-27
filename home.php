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
        'SELECT survey_id, title, creation_date, members FROM surveys WHERE owner_id = :owner_id AND finished = 1 ORDER BY survey_id',
        ["owner_id" => $_SESSION["user_id"]]
);
$delete_mode = isset($_GET["deleteMode"]);

ob_start();

if ($surveys) {
    foreach ($surveys as $survey) {
        $membersText = $survey["members"] > 1 ? " participants" : " participant";
        $deletor_id = "survey_deletor".$survey["survey_id"];
        ?>
            <?php if ($delete_mode) { ?>
                <label for="<?= $deletor_id ?>" class="surveyDeletor">
                    <input type="checkbox" id="<?= $deletor_id ?>" class="sDBox" name="survey_delete[]" value="<?= $survey["survey_id"]; ?>">
            <?php } ?>
            <li class="survey">
                <?php if ($delete_mode) { ?>
                    <a class="surveyLink">
                <?php } else { ?>
                    <a class="surveyLink" href="./view_survey.php?survey=<?= $survey["survey_id"]; ?>">
                <?php } ?>
                    <span class="surveyName"><?= $survey["title"] ?></span>
                    <span class="surveyDate">- <?= $survey["creation_date"] ?></span>
                    <span class="surveyMembers"><?= $survey["members"].$membersText ?></span>
                </a>
                <div class="surveyURIContainer">
                    <span class="surveyURI">http://localhost/2PROJ-Pollygon/answer_survey.php?survey=<?= $survey["survey_id"]; ?></span>
                </div>
            </li>
            <?php if ($delete_mode) { ?>
                </label>
            <?php } ?>
        <?php
    }
} else {
    echo '<p id="noSurvey">Uh oh, il semble que vous n\'ayez cr&eacute;&eacute; aucun sondage.</p>';
}

$surveysHTML = ob_get_contents();
ob_end_clean();

############################
# Get messages
############################

$messages = buildMessages();

############################
# Import the view
############################

require_once "./views/home_v.php";