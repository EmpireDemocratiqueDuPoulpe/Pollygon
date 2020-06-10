<?php
require_once "../../init.php";

$ChoiceManager = new Choice($db);

############################
# Check vars
############################

$survey_id = $_GET["survey"] ?? null;
$selected = $_GET["selected"] ?? null;

if (is_null($survey_id)) { setError(SURVEY_NOT_FOUND); redirectTo(CREATE_SURVEY_PAGE); }
if (is_null($selected)) { setError(QUESTION_NOT_FOUND); redirectTo(CREATE_SURVEY_PAGE."?survey=".$survey_id); }

############################
# Add choice
############################

if (!$ChoiceManager->add($selected)) {
    setError(UNKNOWN_CHOICE_ADD_ERROR);
}

redirectTo(CREATE_SURVEY_PAGE."?survey=".$survey_id."&selected=".$selected);