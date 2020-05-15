<?php
require_once "../../init.php";

$UserManager = new Users($db);

############################
# Check vars
############################

$user_id = $_POST["user_id"] ?? null;
$gender = $_POST["gender"] ?? null;
$birthdate = $_POST["birthdate"] ?? null;
$country = $_POST["country"] ?? null;
$job = $_POST["job"] ?? null;

if (is_null($user_id)) { setError(USRID_NOT_VALID); redirectTo(ACCOUNT_PAGE); }
if (is_null($gender)) { setError(GENDER_NOT_VALID); redirectTo(ACCOUNT_PAGE); }
if (is_null($birthdate)) { setError(BIRTHDATE_NOT_VALID); redirectTo(ACCOUNT_PAGE); }
if (is_null($country)) { setError(COUNTRY_NOT_VALID); redirectTo(ACCOUNT_PAGE); }
if (is_null($job)) { setError(JOB_NOT_VALID); redirectTo(ACCOUNT_PAGE); }

############################
# Check gender
############################

$gender = $UserManager->checkGender($gender);

############################
# Check birthdate
############################

if (!$UserManager->checkBirthdate($birthdate))
    redirectTo(ACCOUNT_PAGE);

############################
# Update user
############################

if ($UserManager->updatePersonal($user_id, $gender, $birthdate, $country, $job)) {
    redirectTo(ACCOUNT_PAGE);
} else {
    redirectTo(ACCOUNT_PAGE);
}