<?php
require_once "../../init.php";

$UserManager = new Users($db);

############################
# Check vars
############################

$user_id = $_POST["user_id"] ?? null;
$oldPassword = $_POST["password"] ?? null;
$newPassword1 = $_POST["password1"] ?? null;
$newPassword2 = $_POST["password2"] ?? null;

if (is_null($user_id)) { setError(USRID_NOT_VALID); redirectTo(ACCOUNT_PAGE); }
if (is_null($oldPassword)) { setError(PASSWORD_NOT_VALID); redirectTo(ACCOUNT_PAGE); }
if (is_null($newPassword1)) { setError(PASSWORD_NOT_VALID); redirectTo(ACCOUNT_PAGE); }
if (is_null($newPassword2)) { setError(PASSWORD_NOT_VALID); redirectTo(ACCOUNT_PAGE); }

############################
# Check old password
############################

$usrPassword = $UserManager->getPassword($_SESSION["user_id"]);

if (!$usrPassword) {
    setError(UNKNOWN_ACCOUNT_EDIT_ERROR);
    redirectTo(ACCOUNT_PAGE);
} else {
    $usrPassword = $usrPassword[0]["password"];
}

if (!$UserManager->checkPassword($oldPassword, $usrPassword, $config["SECURITY"]["pepper"]))
    redirectTo(ACCOUNT_PAGE);

############################
# Check new password
############################

if (!$UserManager->checkNewPassword($newPassword1, $newPassword2))
    redirectTo(ACCOUNT_PAGE);

$password_hashed = $UserManager->hashPassword($newPassword1, $config["SECURITY"]["pepper"]);

############################
# Update user
############################

if ($UserManager->updatePassword($user_id, $password_hashed, $usrPassword)) {
    redirectTo(ACCOUNT_PAGE);
} else {
    redirectTo(ACCOUNT_PAGE);
}