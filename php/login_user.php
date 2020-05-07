<?php

require_once "../init.php";

$_SESSION["user_id"] = 1;
$_SESSION["username"] = "TestUser";
$_SESSION["email"] = "testuser@email.com";

redirectTo("../index.php");