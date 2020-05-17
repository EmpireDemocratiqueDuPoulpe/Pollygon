<?php
require_once "../../init.php";

############################
# Check vars
############################

$question_id = $_POST["question_id"] ?? null;
$question_name = $_POST["question_name"] ?? null;
$survey = $_SESSION["survey"] ?? null;

if (is_null($question_id)) { setError(QUESTION_NOT_FOUND); redirectTo(CREATE_SURVEY_PAGE); }
if (is_null($question_name)) { setError(QUESTION_NOT_VALID); redirectTo(CREATE_SURVEY_PAGE); }
if (is_null($survey)) { setError(SURVEY_NOT_FOUND); redirectTo(CREATE_SURVEY_PAGE); }

############################
# Get the question
############################

$question = $survey->getQuestion($question_id);

if (is_null($question)) {
    setError(QUESTION_NOT_FOUND);
    redirectTo(CREATE_SURVEY_PAGE);
}

############################
# Check the question name
############################

$question_name = trim($question_name);

if (strlen($question_name) == 0) {
    setError(QUESTION_NOT_VALID);
    redirectTo(CREATE_SURVEY_PAGE."?selected=".$question_id);
}

############################
# Change the name
############################

$question->setTitle($question_name);

if (!$survey->setQuestion($question_id, $question)) {
    setError(QUESTION_NOT_FOUND);
    redirectTo(CREATE_SURVEY_PAGE);
}

############################
# Save
############################

$_SESSION["survey"] = $survey;
redirectTo(CREATE_SURVEY_PAGE."?selected=".$question_id);