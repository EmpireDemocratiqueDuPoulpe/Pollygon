<?php
require_once "../../init.php";

############################
# Check action
############################

$set_choice = $_POST["setChoices"] ?? null;
$set_question_name = $_POST["setQuestionTitle"] ?? null;

// Set options
if (!is_null($set_choice)) {

    $ChoiceManager = new Choice($db);

    ############################
    # Check vars
    ############################

    $question_id = $_POST["question_id"] ?? null;

    ############################
    # Get choice items
    ############################

    $choices = array_filter_key($_POST, function ($key) {
        return (strpos($key, 'question_unique_title_') === 0) or (strpos($key, 'question_multiple_title_') === 0);
    });

    ############################
    # Update
    ############################

    foreach ($choices as $key => $title) {
        $parsed_key = explode("_", $key);
        $id = end($parsed_key);

        $title = trim($title);

        PDOFactory::sendQuery(
            $db,
            'UPDATE choices SET title = :title WHERE choice_id = :choice_id AND title <> :title',
            ["title" => $title, "choice_id" => $id],
            false
        );
    }

    if (!is_null($question_id))
        redirectTo(CREATE_SURVEY_PAGE . "?selected=" . $question_id);

    else
        redirectTo(CREATE_SURVEY_PAGE);

// Set question title
} else if (!is_null($set_question_name)) {

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
    $len = strlen($question_name);

    if ($len == 0 OR $len > 255) {
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

} else {
    setError(UNKNOWN_ERROR);
    redirectTo(CREATE_SURVEY_PAGE);
}

