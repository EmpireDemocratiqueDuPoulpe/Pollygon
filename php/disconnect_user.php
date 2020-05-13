<?php
require_once "../init.php";

############################
# Destroy session
############################

$_SESSION = array();

// Completely erase the session and remove the session cookie.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

if (session_status() === PHP_SESSION_ACTIVE) {
    redirectTo("../login.php");
}