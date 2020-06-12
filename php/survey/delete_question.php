<?php
require_once "../../init.php";

$QuestionManager = new Question($db);

############################
# Check vars
############################

$survey_id = $_POST["survey_id"] ?? null;
$selected = $_POST["question_id"] ?? null;

if (is_null($survey_id)) { setError(SURVEY_NOT_FOUND); redirectTo(CREATE_SURVEY_PAGE); }
if (is_null($selected)) { setError(QUESTION_NOT_FOUND); redirectTo(CREATE_SURVEY_PAGE."?survey=".$survey_id); }

############################
# Delete question
############################

if (!$QuestionManager->delete($selected)) {
    setError(QUESTION_NOT_FOUND);
}

redirectTo(CREATE_SURVEY_PAGE."?survey=".$survey_id);