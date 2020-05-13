<?php
require_once "../../init.php";
$registerPage = "../../register.php";
$loginPage = "../../login.php";

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

// Check length
$usernameLen = strlen($username);

if ($usernameLen < 1 OR $usernameLen > 32) {
    setError(USR_NOT_VALID);
    redirectTo($registerPage);
}

// Check availability
$usrResult = PDOFactory::sendQuery($db, 'SELECT user_id FROM users WHERE username = :username', ["username" => $username]);

if ($usrResult) {
    setError(USR_ALREADY_USED);
    redirectTo($registerPage);
}

############################
# Check email
############################

// Check validity
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setError(EMAIL_NOT_VALID);
    redirectTo($registerPage);
}

// Check availability
$emailResult = PDOFactory::sendQuery($db, 'SELECT user_id FROM users WHERE email = :email', ["email" => $email]);

if ($emailResult) {
    setError(EMAIL_ALREADY_USED);
    redirectTo($registerPage);
}

############################
# Check password
############################

// Check if passwords match
if ($password1 !== $password2) {
    setError(PASSWORDS_DONT_MATCH);
    redirectTo($registerPage);
}

// Are the passwords secure?
$p_length_valid = (strlen($password1) >= 8);
$p_one_number = (preg_match("#[0-9]+#", $password1));
$p_one_lower_char = (preg_match("#[a-z]+#", $password1));
$p_one_upper_char = (preg_match("#[A-Z]+#", $password1));
$p_one_special_char = (preg_match("#[\W]+#", $password1));

if (!$p_length_valid OR !$p_one_number OR !$p_one_lower_char OR !$p_one_upper_char OR !$p_one_special_char) {
    setError(PASSWORD_NOT_SECURE);
    redirectTo($registerPage);
}

// Hash password
$password_peppered = hash_hmac("sha256", $password1, $config["SECURITY"]["pepper"]);
$password_hashed = password_hash($password_peppered, PASSWORD_ARGON2ID);

############################
# Check birthdate
############################

$splitBirthdate = explode("-", $birthdate);

if (!checkdate($splitBirthdate[1], $splitBirthdate[2], $splitBirthdate[0])) {
    setError(BIRTHDATE_NOT_VALID);
    redirectTo($registerPage);
}

############################
# Add user
############################

// Get last ID before query
$emptyDb = false;

$lastIDBefore = PDOFactory::sendQuery($db, 'SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1');

if (!$lastIDBefore) $emptyDb = true;
else {
    $lastIDBefore = $lastIDBefore[0]["user_id"];
}

// Add user
$sql = 'INSERT INTO 
            users(username, email, password, gender, birthdate, country, job) 
        VALUES
            (:username, :email, :password, :gender, STR_TO_DATE(:birthdate, \'%Y-%c-%d\'), :country, :job)';

$vars = [
    "username" => $username,
    "email" => $email,
    "password" => $password_hashed,
    "gender" => $gender,
    "birthdate" => $birthdate,
    "country" => $country,
    "job" => $job
];

PDOFactory::sendQuery($db, $sql, $vars, false);

// Get last ID after query
if (!$emptyDb)
    $lastIDAfter = PDOFactory::sendQuery($db, 'SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1')[0]["user_id"];

// Redirect to login page with error or success code
if (!$emptyDb && ($lastIDBefore === $lastIDAfter)) {
    setError(UNKNOWN_REGISTER_ERROR);
    redirectTo($registerPage);
} else {
    setSuccess(REGISTRATION_COMPLETE);
    redirectTo($loginPage);
}