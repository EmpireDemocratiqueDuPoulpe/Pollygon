<?php
require_once "./init.php";

############################
# Check if user is connected
############################

if (!$is_connected) redirectTo("./login.php");

############################
# Get TODOList
############################

$is_included = true;
require_once "./php/todoLists/get.php";

############################
# Get friends
############################

require_once "./php/friends/get.php";

############################
# Import the view
############################

require_once "./views/index_v.php";