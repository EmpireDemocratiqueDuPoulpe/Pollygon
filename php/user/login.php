<?php
require_once "../../init.php";

$UserManager = new Users($db);

############################
# Check vars
############################

$username = $_POST["username"] ?? null;
$password = $_POST["password"] ?? null;

if (is_null($username)) { setError(USR_NOT_VALID); redirectTo(LOGIN_PAGE); }
if (is_null($password)) { setError(PASSWORD_NOT_VALID); redirectTo(LOGIN_PAGE); }

############################
# Get user
############################

$user = PDOFactory::sendQuery($db, 'SELECT user_id, username, email, password FROM users WHERE username = :username', ["username" => $username])[0];

if (!$user) {
    setError(USR_NOT_FOUND);
    redirectTo(LOGIN_PAGE);
}

############################
# Check password
############################

if (!$UserManager->checkPassword($password, $user["password"], $config["SECURITY"]["pepper"]))
    redirectTo(LOGIN_PAGE);

############################
# Connect user
############################

$_SESSION["user_id"] = $user["user_id"];
$_SESSION["username"] = $user["username"];
$_SESSION["email"] = $user["email"];

redirectTo(HOME_PAGE);