<?php
require_once "./init.php";

$SurveyManager = new Survey($db);
$QuestionManager = new Question($db);

############################
# Check if he's connected
############################

if (!$is_connected) redirectTo("./login.php");

############################
# Create the survey
############################

// Get the survey and the selected question id
$survey = $SurveyManager->getWIPSurvey($_SESSION["user_id"]);
$survey_id = $survey["survey_id"];
$survey_title = $survey["title"];

$selected_id = isset($_GET["selected"]) ? $_GET["selected"] : -1;

// Check if a question is added
if (isset($_GET["newQuestion"])) {

    if (!empty($_GET["newQuestion"])) {
        $QuestionManager->addQuestion($survey_id, $_GET["newQuestion"]);

        if ($selected_id >= 0) {
            redirectTo("./create_survey.php?survey=".$survey_id."&selected=".$selected_id);
        } else {
            redirectTo("./create_survey.php?survey=".$survey_id);
        }
    }
}

// Build question list
$questions = $QuestionManager->buildList($survey_id, true, false, $selected_id);

// Build the URL for a new question
$newQuestionUrl = "./create_survey.php?survey=".$survey_id."&";

if ($selected_id >= 0)
    $newQuestionUrl .= "selected=".$selected_id."&";

$newQuestionUrl .= "newQuestion";

// Build the question view
$questionView = '';

if ($selected_id >= 0) {
    $questionView = $QuestionManager->buildView($survey_id, $selected_id, true, false);
}

############################
# Get messages
############################

$messages = buildMessages(true, false);

############################
# Import the view
############################

require_once "./views/create_survey_v.php";