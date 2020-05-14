<?php
require_once "../../init.php";
$accountPage = "../../my_account.php";

$UserManager = new Users($db);

############################
# Check vars
############################

$user_id = $_POST["user_id"] ?? null;
$oldPassword = $_POST["password"] ?? null;
$newPassword1 = $_POST["password1"] ?? null;
$newPassword2 = $_POST["password2"] ?? null;

if (is_null($user_id)) { setError(USRID_NOT_VALID); redirectTo($accountPage); }
if (is_null($oldPassword)) { setError(PASSWORD_NOT_VALID); redirectTo($accountPage); }
if (is_null($newPassword1)) { setError(PASSWORD_NOT_VALID); redirectTo($accountPage); }
if (is_null($newPassword2)) { setError(PASSWORD_NOT_VALID); redirectTo($accountPage); }

############################
# Check old password
############################

$usrPassword = $UserManager->getPassword($_SESSION["user_id"]);

if (!$usrPassword) {
    setError(UNKNOWN_ACCOUNT_EDIT_ERROR);
    redirectTo($accountPage);
} else {
    $usrPassword = $usrPassword[0]["password"];
}

if (!$UserManager->checkPassword($oldPassword, $usrPassword, $config["SECURITY"]["pepper"]))
    redirectTo($accountPage);

############################
# Check new password
############################

if (!$UserManager->checkNewPassword($newPassword1, $newPassword2))
    redirectTo($accountPage);

$password_hashed = $UserManager->hashPassword($newPassword1, $config["SECURITY"]["pepper"]);

############################
# Update user
############################

if ($UserManager->updatePassword($user_id, $password_hashed, $usrPassword)) {
    redirectTo($accountPage);
} else {
    redirectTo($accountPage);
}