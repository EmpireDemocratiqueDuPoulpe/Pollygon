<?php

class Answer {
    // Attributes
    private $_db;

    // Constructor
    public function __construct(PDO $db) { $this->_db = $db; }

    // Methods
    // GET
    public function getAll(int $survey_id, int $user_id) : array {
        return PDOFactory::sendQuery(
            $this->_db,
            'SELECT answer_id, question_id, value FROM answers WHERE survey_id = :survey_id AND owner_id = :owner_id ORDER BY answer_id ASC',
            ["survey_id" => $survey_id, "owner_id" => $user_id]
        );
    }

    public function getLastAnswerFromUser(int $survey_id, int $user_id) : int {
        $last_answer = PDOFactory::sendQuery(
            $this->_db,
            'SELECT answer_id FROM answers WHERE survey_id = :survey_id AND owner_id = :owner_id ORDER BY answer_id DESC LIMIT 1',
            ["survey_id" => $survey_id, "owner_id" => $user_id]
        );

        if (!$last_answer) {
            return -1;
        } else {
            return $last_answer[0]["answer_id"];
        }
    }

    public function getNumberOfAnsweredSurveys(int $user_id) : int {
        $number = PDOFactory::sendQuery(
            $this->_db,
            'SELECT COUNT(DISTINCT survey_id) AS count FROM answers WHERE owner_id = :owner_id',
            ["owner_id" => $user_id]
        );

        if (!$number) {
            return 0;
        } else {
            return $number[0]["count"];
        }
    }

    // ADD
    public function add(int $question_id, int $survey_id, int $owner_id, string $value = "") : bool {
        // Get last ID before query
        $emptyDb = false;

        $lastIDBefore = PDOFactory::sendQuery($this->_db, 'SELECT answer_id FROM answers ORDER BY answer_id DESC LIMIT 1');

        if (!$lastIDBefore) $emptyDb = true;
        else {
            $lastIDBefore = $lastIDBefore[0]["answer_id"];
        }

        // Add answer
        PDOFactory::sendQuery(
            $this->_db,
            'INSERT INTO 
                    answers(question_id, survey_id, owner_id, value) 
                VALUES
                    (:question_id, :survey_id, :owner_id, :value)',
            [
                "question_id" => $question_id,
                "survey_id" => $survey_id,
                "owner_id" => $owner_id,
                "value" => $value
            ],
            false
        );

        // Get last ID after query
        $lastIDAfter = -1;

        if (!$emptyDb)
            $lastIDAfter = PDOFactory::sendQuery($this->_db, 'SELECT answer_id FROM answers ORDER BY answer_id DESC LIMIT 1')[0]["answer_id"];

        // Return true if the answer is created
        if (!$emptyDb && ($lastIDBefore === $lastIDAfter)) {
            setError(UNKNOWN_ANSWER_ADD_ERROR);
            return false;
        } else {
            setSuccess(ANSWER_ADDED);
            return true;
        }
    }

    // UPDATE
    public function setValue(int $answer_id, int $user_id, string $answer_response) : bool {
        // Get old value
        $old_value = PDOFactory::sendQuery(
            $this->_db,
            'SELECT value FROM answers WHERE answer_id = :answer_id AND owner_id = :owner_id ORDER BY answer_id DESC LIMIT 1',
            ["answer_id" => $answer_id, "owner_id" => $user_id]
        );

        if (!$old_value)
            return false;

        // Update the value
        PDOFactory::sendQuery(
            $this->_db,
            'UPDATE answers SET value = :value WHERE answer_id = :answer_id AND owner_id = :owner_id',
            ["value" => $answer_response, "answer_id" => $answer_id, "owner_id" => $user_id],
            false
        );

        // Check the change
        $still_old_value = PDOFactory::sendQuery(
            $this->_db,
            'SELECT value FROM answers WHERE answer_id = :answer_id AND owner_id = :owner_id AND value = :value',
            ["answer_id" => $answer_id, "owner_id" => $user_id, "value" => $old_value]
        );

        return !((boolean) $still_old_value);
    }

    // REMOVE

    // CHECK
}