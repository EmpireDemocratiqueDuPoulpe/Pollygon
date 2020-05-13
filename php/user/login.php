<?php
require_once "../../init.php";
$loginPage = "../../login.php";
$homePage = "../../home.php";

############################
# Check vars
############################

$username = $_POST["username"] ?? null;
$password = $_POST["password"] ?? null;

if (is_null($username)) { setError(USR_NOT_VALID); redirectTo($registerPage); }
if (is_null($password)) { setError(PASSWORD_NOT_VALID); redirectTo($registerPage); }

############################
# Get user
############################

$user = PDOFactory::sendQuery($db, 'SELECT user_id, username, email, password FROM users WHERE username = :username', ["username" => $username])[0];

if (!$user) {
    setError(USR_NOT_FOUND);
    redirectTo($loginPage);
}

############################
# Check password
############################

$password_peppered = hash_hmac("sha256", $password, $config["SECURITY"]["pepper"]);

if (!password_verify($password_peppered, $user["password"])) {
    setError(BAD_PASSWORD);
    redirectTo($loginPage);
}

############################
# Connect user
############################

$_SESSION["user_id"] = $user["user_id"];
$_SESSION["username"] = $user["username"];
$_SESSION["email"] = $user["email"];

redirectTo($homePage);