<?php

class Users {
    // Attributes
    private $_db;

    // Constructor
    public function __construct(PDO $db) {
        $this->_db = $db;
    }

    // Methods
    // GET
    public function get($user_id) {
        return PDOFactory::sendQuery(
            $this->_db,
            'SELECT username, email, gender, birthdate, country, job FROM users WHERE user_id = :user_id',
            ["user_id" => (int) $user_id]
        );
    }

    public function getPassword($user_id) {
        return PDOFactory::sendQuery(
            $this->_db,
            'SELECT password FROM users WHERE user_id = :user_id',
            ["user_id" => (int) $user_id]
        );
    }

    // ADD
    public function add($username, $email, $password, $gender, $birthdate, $country, $job) {
        // Get last ID before query
        $emptyDb = false;

        $lastIDBefore = PDOFactory::sendQuery($this->_db, 'SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1');

        if (!$lastIDBefore) $emptyDb = true;
        else {
            $lastIDBefore = $lastIDBefore[0]["user_id"];
        }

        // Add user
        PDOFactory::sendQuery(
            $this->_db,
            'INSERT INTO 
                    users(username, email, password, gender, birthdate, country, job) 
                VALUES
                    (:username, :email, :password, :gender, STR_TO_DATE(:birthdate, \'%Y-%c-%d\'), :country, :job)',
            [
                "username" => $username,
                "email" => $email,
                "password" => $password,
                "gender" => $gender,
                "birthdate" => $birthdate,
                "country" => $country,
                "job" => $job,
            ],
            false
        );

        // Get last ID after query
        $lastIDAfter = -1;

        if (!$emptyDb)
            $lastIDAfter = PDOFactory::sendQuery($this->_db, 'SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1')[0]["user_id"];

        // Return true if the user is created
        if (!$emptyDb && ($lastIDBefore === $lastIDAfter)) {
            setError(UNKNOWN_REGISTER_ERROR);
            return false;
        } else {
            setSuccess(REGISTRATION_COMPLETE);
            return true;
        }
    }

    // UPDATE
    public function updateAccount($user_id, $username, $email, $oldUsername, $oldEmail) {
        // Update user
        PDOFactory::sendQuery(
            $this->_db,
            'UPDATE 
                    users
                SET
                    username = :username, email = :email
                WHERE 
                    user_id = :user_id',
            [
                "username" => $username,
                "email" => $email,
                "user_id" => $user_id
            ],
            false
        );

        // Check if the user has been updated
        $userNotEdited = PDOFactory::sendQuery(
            $this->_db,
            'SELECT user_id FROM users WHERE user_id = :user_id && username = :username && email = :email',
            [
                "username" => $oldUsername,
                "email" => $oldEmail,
                "user_id" => $user_id
            ]
        );

        // Return true if the user is created
        if ($userNotEdited) {
            setError(UNKNOWN_ACCOUNT_EDIT_ERROR);
            return false;
        } else {
            setSuccess(ACCOUNT_EDIT_COMPLETE);
            return true;
        }
    }

    public function updatePassword($user_id, $password, $oldPassword) {
        // Update user
        PDOFactory::sendQuery(
            $this->_db,
            'UPDATE 
                    users
                SET
                    password = :password
                WHERE 
                    user_id = :user_id',
            [
                "password" => $password,
                "user_id" => $user_id
            ],
            false
        );

        // Check if the user has been updated
        $userNotEdited = PDOFactory::sendQuery(
            $this->_db,
            'SELECT user_id FROM users WHERE user_id = :user_id && password = :password',
            [
                "password" => $oldPassword,
                "user_id" => $user_id
            ]
        );

        // Return true if the user is created
        if ($userNotEdited) {
            setError(UNKNOWN_ACCOUNT_EDIT_ERROR);
            return false;
        } else {
            setSuccess(ACCOUNT_EDIT_COMPLETE);
            return true;
        }
    }

    public function updatePersonal($user_id, $gender, $birthdate, $country, $job) {
        // Get user's personal infos
        $user = PDOFactory::sendQuery(
            $this->_db,
            'SELECT gender, birthdate, country, job FROM users WHERE user_id = :user_id',
            ["user_id" => $user_id]
        );

        if (!$user) {
            setError(UNKNOWN_ACCOUNT_EDIT_ERROR);
            return false;
        } else {
            $user = $user[0];
        }

        // Update user
        PDOFactory::sendQuery(
            $this->_db,
            'UPDATE 
                    users
                SET
                    gender = :gender,
                    birthdate = :birthdate,
                    country = :country,
                    job = :job
                WHERE 
                    user_id = :user_id',
            [
                "gender" => $gender,
                "birthdate" => $birthdate,
                "country" => $country,
                "job" => $job,
                "user_id" => $user_id
            ],
            false
        );

        // Check if the user has been updated
        $userNotEdited = PDOFactory::sendQuery(
            $this->_db,
            'SELECT
                    user_id
                FROM
                    users
                WHERE
                    user_id = :user_id &&
                    gender = :gender &&
                    birthdate = :birthdate &&
                    country = :country &&
                    job = :job',
            [
                "gender" => $user["gender"],
                "birthdate" => $user["birthdate"],
                "country" => $user["country"],
                "job" => $user["job"],
                "user_id" => $user_id
            ]
        );

        // Return true if the user is created
        if ($userNotEdited) {
            setError(UNKNOWN_ACCOUNT_EDIT_ERROR);
            return false;
        } else {
            setSuccess(ACCOUNT_EDIT_COMPLETE);
            return true;
        }
    }

    // REMOVE

    // CHECK
    public function checkUsername($username, $oldUsername = "") {
        if ($oldUsername) {
            if ($username == $oldUsername)
                return true;
        }

        // Check length
        $usernameLen = strlen($username);

        if ($usernameLen < 1 OR $usernameLen > 32) {
            setError(USR_NOT_VALID);
            return false;
        }

        // Check availability
        $usrResult = PDOFactory::sendQuery($this->_db, 'SELECT user_id FROM users WHERE username = :username', ["username" => $username]);

        if ($usrResult) {
            setError(USR_ALREADY_USED);
            return false;
        }

        return true;
    }

    public function checkEmail($email, $oldEmail = "") {
        if ($oldEmail) {
            if ($email == $oldEmail)
                return true;
        }

        // Check validity
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            setError(EMAIL_NOT_VALID);
            return false;
        }

        // Check availability
        $emailResult = PDOFactory::sendQuery($this->_db, 'SELECT user_id FROM users WHERE email = :email', ["email" => $email]);

        if ($emailResult) {
            setError(EMAIL_ALREADY_USED);
            return false;
        }

        return true;
    }

    public function checkPassword($password, $passwordPeppered, $pepper) {
        $password = hash_hmac("sha256", $password, $pepper);

        if (!password_verify($password, $passwordPeppered)) {
            setError(BAD_PASSWORD);
            return false;
        }

        return true;
    }

    public function checkNewPassword($password1, $password2) {
        // Check if passwords match
        if ($password1 !== $password2) {
            setError(PASSWORDS_DONT_MATCH);
            return false;
        }

        // Are the passwords secure?
        $p_length_valid = (strlen($password1) >= 8);
        $p_one_number = (preg_match("#[0-9]+#", $password1));
        $p_one_lower_char = (preg_match("#[a-z]+#", $password1));
        $p_one_upper_char = (preg_match("#[A-Z]+#", $password1));
        $p_one_special_char = (preg_match("#[\W]+#", $password1));

        if (!$p_length_valid or !$p_one_number or !$p_one_lower_char or !$p_one_upper_char or !$p_one_special_char) {
            setError(PASSWORD_NOT_SECURE);
            return false;
        }

        return true;
    }

    public function checkGender($gender) {
        if ($gender != "Homme" && $gender != "Femme")
            return "Homme";

        else
            return $gender;
    }

    public function checkBirthdate($birthdate) {
        $splitBirthdate = explode("-", $birthdate);

        if (!checkdate($splitBirthdate[1], $splitBirthdate[2], $splitBirthdate[0])) {
            setError(BIRTHDATE_NOT_VALID);
            return false;
        }

        return true;
    }

    // OTHER
    public function hashPassword($password, $pepper) {
        // Hash password
        $password_peppered = hash_hmac("sha256", $password, $pepper);
        return password_hash($password_peppered, PASSWORD_ARGON2ID);
    }
}