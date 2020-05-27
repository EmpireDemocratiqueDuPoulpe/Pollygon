<?php
require_once "./init.php";

############################
# Check if he's connected
############################

if ($is_connected) redirectTo("./home.php");

############################
# Get messages
############################

$messages = buildMessages();

############################
# Import the view
############################

require_once "./views/login_v.php";