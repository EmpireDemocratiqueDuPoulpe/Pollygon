<?php
require_once "./init.php";

$SurveyManager = new Survey($db);
$QuestionManager = new Question($db);

############################
# Check if he's connected
############################

if (!$is_connected) redirectTo("./login.php");

############################
# Get the survey
############################

// Get the survey id
if (!isset($_GET["survey"]) OR empty($_GET["survey"])) {
    setError(SURVEY_NOT_FOUND);
    redirectTo("./home.php");
}

$survey_id = $_GET["survey"];

// Get the survey and the selected question id
$survey = $SurveyManager->getSurvey($survey_id);

if (!$survey) {
    setError(SURVEY_NOT_FOUND);
    redirectTo("./home.php");
} else {
    $survey = $survey[0];
}

$survey_title = $survey["title"];
$survey_creation_date = $survey["creation_date"];
$survey_members = $survey["members"];

$selected_id = isset($_GET["selected"]) ? $_GET["selected"] : -1;

############################
# Build the view
############################

// Build question list
//$questions = $QuestionManager->buildList($survey_id, false, true, $selected_id);
$questions = $QuestionManager->buildListAnalytics($survey_id, false, true, true, $selected_id);

// Build the question view
$questionView = '';

if ($selected_id >= 0) {
    //$questionView = $QuestionManager->buildView($survey_id, $selected_id, false, true);
    $questionView = $QuestionManager->buildViewAnalytics($survey_id, $selected_id, false, true, true);
}

require_once "./views/analytics_v.php";