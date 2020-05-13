<?php

class Users {
    private $_db;

    /**
     * Users constructor.
     *
     * @param       PDO         $db     PDO Object connected to the database
     * @return      void
     */
    public function __construct(PDO $db) {
        $this->_db = $db;
    }

    /**
     * Get a user by his ID.
     *
     * @param       int|string      $user_id    User id
     * @return      array|string    User or an error.
     */
    public function get($user_id) {
        return PDOFactory::sendQuery(
            $this->_db,
            'SELECT username, email, gender, birthdate, country, job FROM users WHERE user_id = :user_id',
            ["user_id" => (int) $user_id]
        );
    }

    /**
     * Get a user password.
     *
     * @param       int|string      $user_id    User id
     * @return      array|string    User password or an error.
     */
    public function getPassword($user_id) {
        return PDOFactory::sendQuery(
            $this->_db,
            'SELECT password FROM users WHERE user_id = :user_id',
            ["user_id" => (int) $user_id]
        );
    }

    /**
     * Add a user.
     *
     * @param       string          $username   User name
     * @param       string          $email      Email
     * @param       string          $password   Password
     * @param       string          $gender     Gender
     * @param       string          $birthdate  Birthdate
     * @param       string          $country    Country
     * @param       string          $job        Job
     * @return      boolean         Has the user been created?
     */
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
        if (!$emptyDb)
            $lastIDAfter = PDOFactory::sendQuery($this->_db, 'SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1')[0]["user_id"];

        // Return true if the user is created
        if (!$emptyDb && ($lastIDBefore === $lastIDAfter)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Update account infos of a user.
     *
     * @param       int|string      $user_id        User's id
     * @param       string          $username       User name
     * @param       string          $email          Email
     * @param       string          $oldUsername    Old user name
     * @param       string          $oldEmail       Old email
     * @return      boolean         Has the user been edited?
     */
    public function updateAccount($user_id, $username, $email, $oldUsername, $oldEmail) {
        // Add user
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
            return false;
        } else {
            return true;
        }
    }

    /**
     * Check username availability
     *
     * @param       string      $username       User name
     * @param       string      $oldUsername    Old user name
     * @return      boolean     Is the user name valid.
     */
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

    /**
     * Check email validity
     *
     * @param       string      $email      Email
     * @param       string      $oldEmail   Old email
     * @return      boolean     Is the email valid.
     */
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

    /**
     * Check if it's the good password
     *
     * @param       string          $password           Password set by user
     * @param       string          $passwordPeppered   Password set in DB
     * @param       string          $pepper             Used pepper
     * @return      boolean         Is the email valid.
     */
    public function checkPassword($password, $passwordPeppered, $pepper) {
        $password = hash_hmac("sha256", $password, $pepper);

        if (!password_verify($password, $passwordPeppered)) {
            setError(BAD_PASSWORD);
            return false;
        }

        return true;
    }
}