<?php
require_once "../../init.php";

$AnswerManager = new Answer($db);

############################
# Check vars
############################

$survey_id = $_POST["survey_id"] ?? null;
$answer_id = $_POST["answer_id"] ?? null;
$answer_response_input = $_POST["question_input"] ?? null;
$answer_response_unique = $_POST["question_unique"] ?? null;
$answer_response_multiple = $_POST["question_multiple"] ?? null;


$answer_response_multiple = array_filter_key($_POST, function ($key) {
    return strpos($key, 'question_multiple_') === 0;
}) ?? null;

$answer_response = "";
$URI = "?survey=".$survey_id;

if (is_null($survey_id)) { setError(SURVEY_NOT_FOUND); redirectTo(ANSWER_SURVEY_PAGE); }
if (is_null($answer_id)) { setError(ANSWER_NOT_FOUND); redirectTo(ANSWER_SURVEY_PAGE.$URI); }

// INPUT
if (!is_null($answer_response_input)) {

    ############################
    # Check the question response
    ############################

    $answer_response = trim($answer_response_input);

    if (strlen($answer_response) == 0) {
        setError(ANSWER_NOT_VALID);
        redirectTo(ANSWER_SURVEY_PAGE.$URI);
    }

// UNIQUE
} else if (!is_null($answer_response_unique)) {
    $answer_response = trim($answer_response_unique);
// MULTIPLE
} else if (!is_null($answer_response_multiple)) {
    $answer_response = str_replace("%", "&#37;", $answer_response_multiple);
    $answer_response = trim(implode("%", $answer_response_multiple));
}

############################
# Set the response
############################

if (!$AnswerManager->setValue($answer_id, $_SESSION["user_id"], $answer_response))
    setError(UNKNOWN_ANSWER_ADD_ERROR);

redirectTo(ANSWER_SURVEY_PAGE.$URI);
