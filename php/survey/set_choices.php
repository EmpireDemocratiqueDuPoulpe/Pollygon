<?php
require_once "../../init.php";
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