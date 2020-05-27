<?php
require_once "../../init.php";

$SurveyManager = new Survey($db);

############################
# Check vars
############################

$survey_id = $_POST["survey_id"] ?? null;

if (is_null($survey_id)) { setError(SURVEY_NOT_FOUND); redirectTo(HOME_PAGE); }

############################
# Check if the survey has questions
############################

if (!$SurveyManager->hasQuestions($survey_id)) {
    setError(SURVEY_EMPTY);
    redirectTo(CREATE_SURVEY_PAGE);
}

############################
# Add the survey
############################

// Add the survey
PDOFactory::sendQuery(
    $db,
    'UPDATE surveys SET finished = 1 WHERE survey_id = :survey_id AND owner_id = :owner_id',
    ["survey_id" => $survey_id, "owner_id" => $_SESSION["user_id"]],
    false
);

// Check if the survey is added
$survey = PDOFactory::sendQuery(
    $db,
    'SELECT survey_id FROM surveys WHERE survey_id = :survey_id AND finished = 0',
    ["survey_id" => $survey_id]
);

if ($survey) {
    setError(UNKNOWN_SURVEY_ADD_ERROR);
    redirectTo(CREATE_SURVEY_PAGE);
} else {
    setSuccess(SURVEY_ADDED);
    redirectTo(HOME_PAGE);
}