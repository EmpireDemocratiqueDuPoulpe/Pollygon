<?php

class Survey {
    // Attributes
    private $_db;

    // Constructor
    public function __construct(PDO $db) {
        $this->_db = $db;
    }

    // Methods
    // GET
    public function getAll(int $user_id, bool $wipSurvey = true) : array {
        $sql = 'SELECT survey_id, title, creation_date, members, finished FROM surveys WHERE owner_id = :owner_id';

        if (!$wipSurvey)
            $sql .= ' AND finished = 1';

        return PDOFactory::sendQuery(
            $this->_db,
            $sql,
            ["owner_id" => $user_id]
        );
    }

    public function getSurvey(int $survey_id) : array {
        // Get the survey
        return PDOFactory::sendQuery(
            $this->_db,
            'SELECT survey_id, title, creation_date, members FROM surveys WHERE survey_id = :survey_id AND finished = 1 LIMIT 1',
            ["survey_id" => $survey_id]
        );
    }

    public function getWIPSurvey(int $user_id) : array {
        // Create a survey if it doesn't exist
        if (!$this->doesUserHaveWIPSurvey($user_id))
            if (!$this->add($user_id))
                redirectTo("../home.php");

        // Get the survey
        return PDOFactory::sendQuery(
            $this->_db,
            'SELECT survey_id, title FROM surveys WHERE owner_id = :owner_id AND finished = 0 LIMIT 1',
            ["owner_id" => $user_id]
        )[0];
    }

    // ADD
    public function add(int $user_id) : bool {
        // Get last ID before query
        $emptyDb = false;

        $lastIDBefore = PDOFactory::sendQuery($this->_db, 'SELECT survey_id FROM surveys ORDER BY survey_id DESC LIMIT 1');

        if (!$lastIDBefore) $emptyDb = true;
        else {
            $lastIDBefore = $lastIDBefore[0]["survey_id"];
        }

        // Add survey
        PDOFactory::sendQuery(
            $this->_db,
            'INSERT INTO 
                    surveys(owner_id, title, finished) 
                VALUES
                    (:owner_id, :title, :finished)',
            ["owner_id" => $user_id, "title" => "Nouveau sondage", "finished" => 0],
            false
        );

        // Get last ID after query
        $lastIDAfter = -1;

        if (!$emptyDb)
            $lastIDAfter = PDOFactory::sendQuery($this->_db, 'SELECT survey_id FROM surveys ORDER BY survey_id DESC LIMIT 1')[0]["survey_id"];

        // Return true if the survey is created
        if (!$emptyDb && ($lastIDBefore === $lastIDAfter)) {
            setError(UNKNOWN_SURVEY_ADD_ERROR);
            return false;
        } else {
            setSuccess(SURVEY_ADDED);
            return true;
        }
    }

    public function addMembers(int $survey_id, int $count = 1) : void {
        PDOFactory::sendQuery(
            $this->_db,
            'UPDATE surveys SET members = members + :membersCount WHERE survey_id = :survey_id',
            ["membersCount" => $count, "survey_id" => $survey_id],
            false
        );
    }

    // UPDATE
    public function setTitle(int $survey_id, string $title) : bool {
        // Get the old title
        $old_title = PDOFactory::sendQuery(
            $this->_db,
            'SELECT title FROM surveys WHERE survey_id = :survey_id',
            ["survey_id" => $survey_id]
        );

        if (!$old_title) {
            setError(SURVEY_NOT_FOUND);
            return false;
        } else {
            $old_title = $old_title[0]["title"];
        }

        // Update the title
        PDOFactory::sendQuery(
            $this->_db,
            'UPDATE surveys SET title = :title WHERE survey_id = :survey_id',
            ["title" => $title, "survey_id" => $survey_id],
            false
        );

        // Check if the title is changed
        return !((bool) PDOFactory::sendQuery(
            $this->_db,
            'SELECT survey_id FROM surveys WHERE title = :title AND survey_id = :survey_id',
            ["title" => $old_title, "survey_id" => $survey_id]
        ));
    }

    // REMOVE

    // CHECK
    public function doesUserHaveWIPSurvey(int $user_id) : bool {
        return (boolean) PDOFactory::sendQuery(
            $this->_db,
            'SELECT survey_id FROM surveys WHERE owner_id = :owner_id AND finished = 0',
            ["owner_id" => $user_id]
        );
    }

    public function hasQuestions(int $survey_id) : bool {
        return (boolean) PDOFactory::sendQuery($this->_db, 'SELECT question_id FROM questions WHERE survey_id = :survey_id', ["survey_id" => $survey_id]);
    }
}