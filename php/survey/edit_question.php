<?php
require_once "../../init.php";

############################
# Check action
############################

$set_choice = $_POST["setChoices"] ?? null;
$set_question_name = $_POST["setQuestionTitle"] ?? null;
$delete_question = $_POST["deleteQuestion"] ?? null;

if (!is_null($set_choice)) {

    require './set_choices.php';

} else if (!is_null($set_question_name)) {

    require './set_question_title.php';

} else if (!is_null($delete_question)) {

    require './delete_question.php';

} else {

    setError(UNKNOWN_ERROR);
    redirectTo(CREATE_SURVEY_PAGE);
}

