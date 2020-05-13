<?php
require_once "./init.php";

############################
# Check if he's connected
############################

if (!$is_connected) redirectTo("./login.php");

############################
# Import the view
############################

require_once "./views/my_account_v.php";