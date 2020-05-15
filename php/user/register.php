<?php
require_once "../../init.php";

$UserManager = new Users($db);

############################
# Check vars
############################

$username = $_POST["username"] ?? null;
$email = $_POST["email"] ?? null;
$password1 = $_POST["password1"] ?? null;
$password2 = $_POST["password2"] ?? null;
$gender = $_POST["gender"] ?? null;
$birthdate = $_POST["birthdate"] ?? null;
$country = $_POST["country"] ?? null;
$job = $_POST["job"] ?? null;

if (is_null($username))     { setError(USR_NOT_VALID); redirectTo(REGISTER_PAGE); }
if (is_null($email))        { setError(EMAIL_NOT_VALID); redirectTo(REGISTER_PAGE); }
if (is_null($password1))    { setError(PASSWORD_NOT_VALID); redirectTo(REGISTER_PAGE); }
if (is_null($password2))    { setError(PASSWORD_NOT_VALID); redirectTo(REGISTER_PAGE); }
if (is_null($gender))       { setError(GENDER_NOT_VALID); redirectTo(REGISTER_PAGE); }
if (is_null($country))      { setError(COUNTRY_NOT_VALID); redirectTo(REGISTER_PAGE); }
if (is_null($job))          { setError(JOB_NOT_VALID); redirectTo(REGISTER_PAGE); }

############################
# Check username
############################

if (!$UserManager->checkUsername($username))
    redirectTo(REGISTER_PAGE);

############################
# Check email
############################

if (!$UserManager->checkEmail($email))
    redirectTo(REGISTER_PAGE);

############################
# Check password
############################

if (!$UserManager->checkNewPassword($password1, $password2))
    redirectTo(REGISTER_PAGE);

$password_hashed = $UserManager->hashPassword($password1, $config["SECURITY"]["pepper"]);

############################
# Check gender
############################

$gender = $UserManager->checkGender($gender);

############################
# Check birthdate
############################

if (!$UserManager->checkBirthdate($birthdate))
    redirectTo(REGISTER_PAGE);

############################
# Add user
############################

if ($UserManager->add($username, $email, $password_hashed, $gender, $birthdate, $country, $job)) {
    redirectTo(LOGIN_PAGE);
} else {
    redirectTo(REGISTER_PAGE);
}