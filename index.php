<?php
require_once "./init.php";

############################
# Get messages
############################

$messages = buildMessages(false, true);

############################
# Import the view
############################

require_once "./views/index_v.php";