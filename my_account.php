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

$SurveyManager = new Survey($db);
$AnswerManager = new Answer($db);

$surveys = $SurveyManager->getAll($_SESSION["user_id"], false);

$surveys_count = count($surveys);
$surveys_answered_count = $AnswerManager->getNumberOfAnsweredSurveys($_SESSION["user_id"]);
$surveys_members = 0;

foreach ($surveys as $survey) {
    $surveys_members += $survey["members"];
}

############################
# Get messages
############################

$messages = buildMessages();

############################
# Import the view
############################

require_once "./views/my_account_v.php";