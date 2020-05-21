<?php
require_once "./init.php";

############################
# Check if he's connected
############################

if (!$is_connected) redirectTo("./login.php");

############################
# Get user data
############################

$UserManager = new Users($db);
$user = $UserManager->get($_SESSION["user_id"]);

if ($user)  $user = $user[0];
else        $user = [];

############################
# Get surveys stats
############################

$user_surveys = PDOFactory::sendQuery(
    $db,
    'SELECT survey FROM surveys WHERE owner_id = :owner_id',
    ["owner_id" => $_SESSION["user_id"]]
);

$surveys_number = 0;
$surveys_participators = 0;

foreach ($user_surveys as $survey) {
    $survey = unserialize($survey["survey"]);
    $surveys_number++;
    $surveys_participators += $survey->getMembersCount();
}


############################
# Import the view
############################

require_once "./views/my_account_v.php";