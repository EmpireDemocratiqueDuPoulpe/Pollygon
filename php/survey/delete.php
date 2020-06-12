<?php
require_once "../../init.php";

############################
# Check vars
############################

$surveys = $_POST["survey_delete"] ?? null;

if (is_null($surveys)) { setError(NO_SURVEY_SELECTED); redirectTo(HOME_PAGE); }

############################
# Delete surveys
############################

$params_str = ":".implode(', :', array_keys($surveys));
$params = ["owner_id" => $_SESSION["user_id"]];

foreach ($surveys as $key => $id) {
    $params[$key] = $id;
}

PDOFactory::sendQuery(
    $db,
    'DELETE FROM surveys WHERE owner_id = :owner_id AND survey_id IN ('.$params_str.');
         DELETE FROM choices WHERE question_id IN (SELECT question_id FROM questions WHERE survey_id IN ('.$params_str.'));
         DELETE FROM questions WHERE survey_id IN ('.$params_str.');
         DELETE FROM answers WHERE survey_id IN ('.$params_str.');',
    $params,
    false
);

redirectTo(HOME_PAGE);