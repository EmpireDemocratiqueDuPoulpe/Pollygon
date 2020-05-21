<?php

require_once "../../init.php";

$surveys_to_delete = $_POST["survey_delete"];


foreach ($surveys_to_delete as $survey){
    $surveys = PDOFactory::sendQuery(
        $db,
        'DELETE FROM surveys WHERE owner_id = :owner_id AND survey_id = :survey_id',
        ["owner_id" => $_SESSION["user_id"],
         "survey_id" => intval($survey)], false
    );
}

header('Location: ../../home.php');




