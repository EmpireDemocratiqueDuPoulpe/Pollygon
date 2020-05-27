<?php
require_once "../../init.php";
$SurveyManager = new Survey($db);

############################
# Check vars
############################

$survey_id = $_POST["survey_id"] ?? null;
$survey_name = $_POST["survey_name"] ?? null;

if (is_null($survey_id)) { setError(SURVEY_NOT_FOUND); redirectTo(CREATE_SURVEY_PAGE); }
if (is_null($survey_name)) { setError(SURVEY_NAME_NOT_VALID); redirectTo(CREATE_SURVEY_PAGE); }

############################
# Check the survey name
############################

$survey_name = trim($survey_name);

if (strlen($survey_name) == 0) {
    setError(SURVEY_NAME_NOT_VALID);
    redirectTo(CREATE_SURVEY_PAGE);
}

############################
# Change the name and save
############################

if (!$SurveyManager->setTitle($survey_id, $survey_name)) {
    setError(SURVEY_NOT_FOUND);
}

redirectTo(CREATE_SURVEY_PAGE."?survey=".$survey_id);