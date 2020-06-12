<?php
require_once "../../init.php";

$SurveyManager = new Survey($db);
$AnswerManager = new Answer($db);

############################
# Check vars
############################

$survey_id = $_POST["survey_id"] ?? null;
$answer_id = $_POST["answer_id"] ?? null;
$answer_response_input = $_POST["question_input"] ?? null;
$answer_response_unique = $_POST["question_unique"] ?? null;
$answer_response_number = $_POST["question_number"] ?? null;

$answer_response_multiple = array_filter_key($_POST, function ($key) {
    return strpos($key, 'question_multiple_') === 0;
});

if (count($answer_response_multiple) == 0)
    $answer_response_multiple = null;

$answer_response = "";
$URI = "?survey=".$survey_id;

if (is_null($survey_id)) { setError(SURVEY_NOT_FOUND); redirectTo(ANSWER_SURVEY_PAGE); }
if (is_null($answer_id)) { setError(ANSWER_NOT_FOUND); redirectTo(ANSWER_SURVEY_PAGE.$URI); }

// INPUT
if (!is_null($answer_response_input)) {

    $answer_response = trim($answer_response_input);

    if (empty($answer_response)) {
        setError(ANSWER_NOT_VALID);
        redirectTo(ANSWER_SURVEY_PAGE.$URI);
    }

// UNIQUE
} else if (!is_null($answer_response_unique)) {

    $answer_response = trim($answer_response_unique);

    if (empty($answer_response)) {
        setError(ANSWER_NOT_VALID);
        redirectTo(ANSWER_SURVEY_PAGE.$URI);
    }

// MULTIPLE
} else if (!is_null($answer_response_multiple)) {

    $answer_response = str_replace("%", "&#37;", $answer_response_multiple);
    $answer_response = trim(implode("%", $answer_response_multiple));

    if (empty($answer_response)) {
        setError(ANSWER_NOT_VALID);
        redirectTo(ANSWER_SURVEY_PAGE.$URI);
    }

// NUMBER
} else if (!is_null($answer_response_number)) {

    $answer_response = filter_var(trim($answer_response_number), FILTER_VALIDATE_FLOAT);

    if (!is_int($answer_response) AND !is_float($answer_response) AND !is_double($answer_response)) {
        setError(ANSWER_NOT_VALID);
        redirectTo(ANSWER_SURVEY_PAGE.$URI);
    }
} else {
    setError(ANSWER_NOT_VALID);
    redirectTo(ANSWER_SURVEY_PAGE.$URI);
}

############################
# Set the response
############################

if (!$AnswerManager->setValue($answer_id, $_SESSION["user_id"], $answer_response)) {
    setError(UNKNOWN_ANSWER_ADD_ERROR);
    redirectTo(ANSWER_SURVEY_PAGE.$URI);
}


############################
# Check if the survey is answered
############################

if (!$AnswerManager->isLastAnswer($survey_id, $_SESSION["user_id"])) {
    redirectTo(ANSWER_SURVEY_PAGE.$URI);
} else {
    $SurveyManager->addMembers($survey_id, 1);

    setSuccess(SURVEY_ANSWERED);
    redirectTo(HOME_PAGE);
}

