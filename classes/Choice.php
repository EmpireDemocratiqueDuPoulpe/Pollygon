<?php

class Choice {
    // Attributes
    private $_db;

    // Constructor
    public function __construct(PDO $db) { $this->_db = $db; }

    // Methods
    // GET
    public function get(int $question_id) : array {
        return PDOFactory::sendQuery(
            $this->_db,
            'SELECT choice_id, title FROM choices WHERE question_id = :question_id ORDER BY choice_id ASC',
            ["question_id" => $question_id]
        );
    }

    // ADD
    public function add(int $question_id, string $name = "Nouvelle option") : bool {
        PDOFactory::sendQuery(
            $this->_db,
            'INSERT INTO choices(question_id, title) VALUES (:question_id, :title)',
            ["question_id" => $question_id, "title" => $name],
            false
        );

        return (bool) PDOFactory::sendQuery(
            $this->_db,
            'SELECT choice_id FROM choices WHERE question_id = :question_id AND title = :title',
            ["question_id" => $question_id, "title" => $name]
        );
    }

    // UPDATE

    // REMOVE
    public function delete(int $choice_id) : bool {
        PDOFactory::sendQuery(
            $this->_db,
            'DELETE FROM choices WHERE choice_id = :choice_id',
            ["choice_id" => $choice_id],
            false
        );

        return !((bool) PDOFactory::sendQuery(
            $this->_db,
            'SELECT choice_id FROM choices WHERE choice_id = :choice_id',
            ["choice_id" => $choice_id]
        ));
    }

    // CHECK
}