<?php
require_once "../../init.php";

$UserManager = new Users($db);

############################
# Check vars
############################

$user_id = $_POST["user_id"] ?? null;
$username = $_POST["username"] ?? null;
$email = $_POST["email"] ?? null;
$password = $_POST["password"] ?? null;

if (is_null($user_id)) { setError(USRID_NOT_VALID); redirectTo(ACCOUNT_PAGE); }
if (is_null($username)) { setError(USR_NOT_VALID); redirectTo(ACCOUNT_PAGE); }
if (is_null($email)) { setError(EMAIL_NOT_VALID); redirectTo(ACCOUNT_PAGE); }
if (is_null($password)) { setError(PASSWORD_NOT_VALID); redirectTo(ACCOUNT_PAGE); }

############################
# Check username
############################

if (!$UserManager->checkUsername($username, $_SESSION["username"]))
    redirectTo(ACCOUNT_PAGE);

############################
# Check email
############################

if (!$UserManager->checkEmail($email, $_SESSION["email"]))
    redirectTo(ACCOUNT_PAGE);

############################
# Check password
############################

$usrPassword = $UserManager->getPassword($_SESSION["user_id"]);

if (!$usrPassword) {
    setError(UNKNOWN_ACCOUNT_EDIT_ERROR);
    redirectTo(ACCOUNT_PAGE);
} else {
    $usrPassword = $usrPassword[0]["password"];
}

if (!$UserManager->checkPassword($password, $usrPassword, $config["SECURITY"]["pepper"]))
    redirectTo(ACCOUNT_PAGE);

############################
# Update user
############################

if (($username == $_SESSION["username"]) && ($email == $_SESSION["email"])) {
    redirectTo(ACCOUNT_PAGE);
} else if ($UserManager->updateAccount($user_id, $username, $email, $_SESSION["username"], $_SESSION["email"])) {
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;

    redirectTo(ACCOUNT_PAGE);
} else {
    redirectTo(ACCOUNT_PAGE);
}