<?php
require_once "./init.php";

############################
# Check if he's connected
############################

if ($is_connected) redirectTo("./home.php");

############################
# Import the view
############################

require_once "./views/register_v.php";