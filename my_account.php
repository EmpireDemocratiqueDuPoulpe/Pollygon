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
# Import the view
############################

require_once "./views/my_account_v.php";