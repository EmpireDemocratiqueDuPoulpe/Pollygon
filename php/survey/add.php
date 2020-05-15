<?php
require_once "../../init.php";

############################
# Check the survey
############################

if (!isset($_SESSION["survey"]) OR empty($_SESSION["survey"])) {
    setError(SURVEY_NOT_FOUND);
    redirectTo(HOME_PAGE);
}

############################
# Add the survey
############################

// Get last ID before query
$emptyDb = false;

$lastIDBefore = PDOFactory::sendQuery($db, 'SELECT survey_id FROM surveys ORDER BY survey_id DESC LIMIT 1');

if (!$lastIDBefore) $emptyDb = true;
else {
    $lastIDBefore = $lastIDBefore[0]["survey_id"];
}

// Add the survey
PDOFactory::sendQuery(
    $db,
    'INSERT INTO surveys(owner_id, survey) VALUES (:owner_id, :survey)',
    ["owner_id" => $_SESSION["user_id"], "survey" => serialize($_SESSION["survey"])],
    false
);

// Get last ID after query
if (!$emptyDb)
    $lastIDAfter = PDOFactory::sendQuery($db, 'SELECT survey_id FROM surveys ORDER BY survey_id DESC LIMIT 1')[0]["survey_id"];

// Set the message and redirect
unset($_SESSION["survey"]);

if (!$emptyDb && ($lastIDBefore === $lastIDAfter)) {
    setError(UNKNOWN_SURVEY_ADD_ERROR);
    redirectTo(CREATE_SURVEY_PAGE);
} else {
    setSuccess(SURVEY_ADDED);
    redirectTo(HOME_PAGE);
}