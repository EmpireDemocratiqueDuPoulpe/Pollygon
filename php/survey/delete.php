<?php
require_once "../../init.php";

############################
# Check vars
############################

$surveys = $_POST["survey_delete"] ?? null;

if (is_null($surveys)) { setError(SURVEY_NOT_FOUND); redirectTo(HOME_PAGE); }

############################
# Delete surveys
############################

foreach ($surveys as $survey){
    PDOFactory::sendQuery(
        $db,
        'DELETE FROM surveys WHERE owner_id = :owner_id AND survey_id = :survey_id;
            DELETE FROM questions WHERE survey_id = :survey_id;
            DELETE FROM answers WHERE survey_id = :survey_id;',
        ["owner_id" => $_SESSION["user_id"],
         "survey_id" => intval($survey)],
        false
    );
}

redirectTo(HOME_PAGE);




