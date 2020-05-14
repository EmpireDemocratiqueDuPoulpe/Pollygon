<?php
require_once "../../init.php";
$accountPage = "../../my_account.php";

$UserManager = new Users($db);

############################
# Check vars
############################

$user_id = $_POST["user_id"] ?? null;
$gender = $_POST["gender"] ?? null;
$birthdate = $_POST["birthdate"] ?? null;
$country = $_POST["country"] ?? null;
$job = $_POST["job"] ?? null;

if (is_null($user_id)) { setError(USRID_NOT_VALID); redirectTo($accountPage); }
if (is_null($gender)) { setError(GENDER_NOT_VALID); redirectTo($accountPage); }
if (is_null($birthdate)) { setError(BIRTHDATE_NOT_VALID); redirectTo($accountPage); }
if (is_null($country)) { setError(COUNTRY_NOT_VALID); redirectTo($accountPage); }
if (is_null($job)) { setError(JOB_NOT_VALID); redirectTo($accountPage); }

############################
# Check gender
############################

$gender = $UserManager->checkGender($gender);

############################
# Check birthdate
############################

if (!$UserManager->checkBirthdate($birthdate))
    redirectTo($accountPage);

############################
# Update user
############################

if ($UserManager->updatePersonal($user_id, $gender, $birthdate, $country, $job)) {
    redirectTo($accountPage);
} else {
    redirectTo($accountPage);
}