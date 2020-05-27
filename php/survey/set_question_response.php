<?php
require_once "../../init.php";

$AnswerManager = new Answer($db);

############################
# Check vars
############################

$survey_id = $_POST["survey_id"] ?? null;
$answer_id = $_POST["answer_id"] ?? null;
$answer_response = $_POST["question_input"] ?? null;

$URI = "?survey=".$survey_id;

if (is_null($survey_id)) { setError(SURVEY_NOT_FOUND); redirectTo(ANSWER_SURVEY_PAGE); }
if (is_null($answer_id)) { setError(ANSWER_NOT_FOUND); redirectTo(ANSWER_SURVEY_PAGE.$URI); }
if (is_null($answer_response)) { setError(ANSWER_NOT_VALID); redirectTo(ANSWER_SURVEY_PAGE.$URI); }

############################
# Check the question response
############################

$answer_response = trim($answer_response);

if (strlen($answer_response) == 0) {
    setError(ANSWER_NOT_VALID);
    redirectTo(ANSWER_SURVEY_PAGE.$URI);
}

############################
# Set the response
############################

if (!$AnswerManager->setValue($answer_id, $_SESSION["user_id"], $answer_response))
    setError(UNKNOWN_ANSWER_ADD_ERROR);

redirectTo(ANSWER_SURVEY_PAGE.$URI);
