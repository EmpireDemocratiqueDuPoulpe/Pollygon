<?php
require_once "../../init.php";
$QuestionManager = new Question($db);

############################
# Check vars
############################

$question_id = $_POST["question_id"] ?? null;
$question_name = $_POST["question_name"] ?? null;

if (is_null($question_id)) { setError(QUESTION_NOT_FOUND); redirectTo(CREATE_SURVEY_PAGE); }
if (is_null($question_name)) { setError(QUESTION_NOT_VALID); redirectTo(CREATE_SURVEY_PAGE); }

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

if (!$QuestionManager->setTitle($question_id, $question_name)) {
    setError(QUESTION_NOT_FOUND);
}

redirectTo(CREATE_SURVEY_PAGE."?selected=".$question_id);