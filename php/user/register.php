<?php
require_once "../../init.php";
$registerPage = "../../register.php";
$loginPage = "../../login.php";

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

if (is_null($username))     { setError(USR_NOT_VALID); redirectTo($registerPage); }
if (is_null($email))        { setError(EMAIL_NOT_VALID); redirectTo($registerPage); }
if (is_null($password1))    { setError(PASSWORD_NOT_VALID); redirectTo($registerPage); }
if (is_null($password2))    { setError(PASSWORD_NOT_VALID); redirectTo($registerPage); }
if (is_null($gender))       { setError(GENDER_NOT_VALID); redirectTo($registerPage); }
if (is_null($country))      { setError(COUNTRY_NOT_VALID); redirectTo($registerPage); }
if (is_null($job))          { setError(JOB_NOT_VALID); redirectTo($registerPage); }

############################
# Check username
############################

if (!$UserManager->checkUsername($username))
    redirectTo($registerPage);

############################
# Check email
############################

if (!$UserManager->checkEmail($email))
    redirectTo($registerPage);

############################
# Check password
############################

if (!$UserManager->checkNewPassword($password1, $password2))
    redirectTo($registerPage);

$password_hashed = $UserManager->hashPassword($password1, $config["SECURITY"]["pepper"]);

############################
# Check birthdate
############################

if (!$UserManager->checkBirthdate($birthdate))
    redirectTo($registerPage);

############################
# Add user
############################

if ($UserManager->add($username, $email, $password_hashed, $gender, $birthdate, $country, $job)) {
    redirectTo($loginPage);
} else {
    redirectTo($registerPage);
}