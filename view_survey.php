<?php
require_once "./init.php";

############################
# Get the survey
############################

// Check if the survey id is present
if (!isset($_GET["survey"]) OR empty($_GET["survey"])) {
    setError(SURVEY_NOT_FOUND);
    redirectTo("./home.php");
}

// Get the survey
$survey = PDOFactory::sendQuery($db, 'SELECT survey FROM surveys WHERE survey_id = :survey_id', ["survey_id" => $_GET["survey"]]);

if (!$survey) {
    setError(SURVEY_NOT_FOUND);
    redirectTo("./home.php");
} else {
    $survey = unserialize($survey[0]["survey"]);
}

$questions = $survey->buildQuestions();

############################
# Import the view
############################

require_once "./views/view_survey_v.php";