<?php
require_once "./init.php";

############################
# Create the survey
############################

// Create the survey
if (!isset($_SESSION["survey"]) OR empty($_SESSION["survey"]))
    $_SESSION["survey"] = new Survey("Nouveau sondage");

// Check if a question is added
if (isset($_GET["newQuestion"]) AND !empty($_GET["newQuestion"])) {

    $type = $_GET["newQuestion"];

    switch ($type) {
        case "input":
            $_SESSION["survey"]->addQuestion(new QuestionInput("Nouvelle question"));
            break;
    }

    if (isset($_GET["selected"])) {
        redirectTo("./create_survey.php?selected=".$_GET["selected"]);
    } else {
        redirectTo("./create_survey.php");
    }
}

// Build question list
$questions = "";

if (isset($_GET["selected"])) {
    $questions = $_SESSION["survey"]->buildQuestions($_GET["selected"]);
} else {
    $questions = $_SESSION["survey"]->buildQuestions();
}

// Build the URL for a new question
$newQuestionUrl = "./create_survey.php?";

if (isset($_GET["selected"]))
    $newQuestionUrl .= "selected=".$_GET["selected"]."&";

$newQuestionUrl .= "newQuestion=input";

// Build the question view
$questionView = '';

if (isset($_GET["selected"])) {
    $q = $_SESSION["survey"]->getQuestion($_GET["selected"]);

    if (!is_null($q)) {
        $questionView = $q->build();
    }
}

############################
# Import the view
############################

require_once "./views/create_survey_v.php";