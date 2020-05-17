<?php
require_once "../../init.php";

############################
# Check vars
############################

$survey_name = $_POST["survey_name"] ?? null;
$survey = $_SESSION["survey"] ?? null;

if (is_null($survey_name)) { setError(SURVEY_NAME_NOT_VALID); redirectTo(CREATE_SURVEY_PAGE); }
if (is_null($survey)) { setError(SURVEY_NOT_FOUND); redirectTo(CREATE_SURVEY_PAGE); }

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

$survey->setTitle($survey_name);

$_SESSION["survey"] = $survey;
redirectTo(CREATE_SURVEY_PAGE);