<?php
require_once "./init.php";

$SurveyManager = new Survey($db);
$QuestionManager = new Question($db);
$AnswerManager = new Answer($db);

############################
# Check if he's connected
############################

if (!$is_connected) redirectTo("./login.php");

############################
# Get the survey and question id
############################

// Get the survey id
if (!isset($_GET["survey"]) OR empty($_GET["survey"])) {
    setError(SURVEY_NOT_FOUND);
    redirectTo("./home.php");
}

$survey_id = $_GET["survey"];

// Get the survey
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

// Get questions id
$questions_id = $QuestionManager->getAll($survey_id);

############################
# Get the selected id
############################

$answers = $AnswerManager->getAll($survey_id, $_SESSION["user_id"]);
$answers_count = count($answers);
$last_answer = $AnswerManager->getLastAnswerFromUser($survey_id, $_SESSION["user_id"]);
$selected_id = -1;

if ($AnswerManager->isLastAnswer($survey_id, $_SESSION["user_id"])) {
    setSuccess(SURVEY_ANSWERED);
    redirectTo("./home.php");
}

$last_answer_value = end($answers)["value"];

if ($last_answer < 0) {
    $AnswerManager->add($questions_id[0]["question_id"], $survey_id, $_SESSION["user_id"]);
    $last_answer = $AnswerManager->getLastAnswerFromUser($survey_id, $_SESSION["user_id"]);
    $selected_id = $questions_id[0]["question_id"];
} else if (strlen($last_answer_value) > 0) {
    $AnswerManager->add($questions_id[$answers_count]["question_id"], $survey_id, $_SESSION["user_id"]);
    $last_answer = $AnswerManager->getLastAnswerFromUser($survey_id, $_SESSION["user_id"]);
    $selected_id = $questions_id[$answers_count]["question_id"];
} else {
    if (end($answers)["value"])
        $selected_id = $questions_id[count($answers)]["question_id"];
    else
        $selected_id = $questions_id[count($answers) - 1]["question_id"];
}

############################
# Build the view
############################

// Build question list
$questions = $QuestionManager->buildList($survey_id, false, false, $selected_id);

// Build the question view
$questionView = '';

if ($selected_id >= 0) {
    $questionView = $QuestionManager->buildView($survey_id, $selected_id, false, false, $last_answer);
}

############################
# Get messages
############################

$messages = buildMessages(true, false);

############################
# Import the view
############################

require_once "./views/answer_survey_v.php";