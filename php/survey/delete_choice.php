<?php
require_once "../../init.php";

$ChoiceManager = new Choice($db);

############################
# Check vars
############################

$survey_id = $_GET["survey"] ?? null;
$selected = $_GET["selected"] ?? null;
$choice_id = $_GET["choice"] ?? null;

if (is_null($survey_id)) { setError(SURVEY_NOT_FOUND); redirectTo(CREATE_SURVEY_PAGE); }
if (is_null($selected)) { setError(QUESTION_NOT_FOUND); redirectTo(CREATE_SURVEY_PAGE."?survey=".$survey_id); }
if (is_null($choice_id)) { setError(CHOICE_NOT_FOUND); redirectTo(CREATE_SURVEY_PAGE."?survey=".$survey_id."&selected=".$selected); }

############################
# Delete choice
############################

if (!$ChoiceManager->delete($choice_id)) {
    setError(CHOICE_NOT_FOUND);
}

redirectTo(CREATE_SURVEY_PAGE."?survey=".$survey_id."&selected=".$selected);