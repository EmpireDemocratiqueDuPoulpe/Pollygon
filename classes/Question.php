<?php

class Question {
    // Attributes
    private $_db;

    // Constructor
    public function __construct(PDO $db) { $this->_db = $db; }

    // Methods
    // GET
    public function getAll(int $survey_id) : array {
        return PDOFactory::sendQuery(
            $this->_db,
            'SELECT question_id, title, type FROM questions WHERE survey_id = :survey_id ORDER BY question_id ASC',
            ["survey_id" => $survey_id]
        );
    }

    public function get(int $survey_id, int $question_id) : array {
        $question = PDOFactory::sendQuery(
            $this->_db,
            'SELECT title, type FROM questions WHERE survey_id = :survey_id AND question_id = :question_id',
            ["survey_id" => $survey_id, "question_id" => $question_id]
        );

        return $question ? $question[0] : $question;
    }

    // ADD
    public function addQuestion(int $survey_id, string $type) : bool {
        // Get last ID before query
        $emptyDb = false;

        $lastIDBefore = PDOFactory::sendQuery($this->_db, 'SELECT question_id FROM questions ORDER BY question_id DESC LIMIT 1');

        if (!$lastIDBefore) $emptyDb = true;
        else {
            $lastIDBefore = $lastIDBefore[0]["question_id"];
        }

        // Add question
        PDOFactory::sendQuery(
            $this->_db,
            'INSERT INTO 
                    questions(survey_id, title, type) 
                VALUES
                    (:survey_id, :title, :type)',
            ["survey_id" => $survey_id, "title" => "Nouvelle question", "type" => $type],
            false
        );

        // Get last ID after query
        $lastIDAfter = -1;

        if (!$emptyDb)
            $lastIDAfter = PDOFactory::sendQuery($this->_db, 'SELECT question_id FROM questions ORDER BY question_id DESC LIMIT 1')[0]["question_id"];

        // Return true if the survey is created
        if (!$emptyDb && ($lastIDBefore === $lastIDAfter)) {
            setError(UNKNOWN_QUESTION_ADD_ERROR);
            return false;
        } else {
            setSuccess(QUESTION_ADDED);
            return true;
        }
    }

    // UPDATE
    public function setTitle(int $question_id, string $title) : bool {
        // Get the old title
        $old_title = PDOFactory::sendQuery(
            $this->_db,
            'SELECT title FROM questions WHERE question_id = :question_id',
            ["question_id" => $question_id]
        );

        if (!$old_title) {
            setError(QUESTION_NOT_FOUND);
            return false;
        } else {
            $old_title = $old_title[0]["title"];
        }

        // Update the title
        PDOFactory::sendQuery(
            $this->_db,
            'UPDATE questions SET title = :title WHERE question_id = :question_id',
            ["title" => $title, "question_id" => $question_id],
            false
        );

        // Check if the title is changed
        return !((bool) PDOFactory::sendQuery(
            $this->_db,
            'SELECT question_id FROM questions WHERE title = :title AND question_id = :question_id',
            ["title" => $old_title, "question_id" => $question_id]
        ));
    }

    // REMOVE

    // CHECK

    // OTHER
    public function buildList(int $survey_id, bool $editMode, bool $viewMode, int $selected = -1) : string {
        $questions = $this->getAll($survey_id);
        $html = "";

        if ($editMode) {
            $page = "./create_survey.php";
        } elseif ($viewMode) {
            $page = "./view_survey.php";
        } else {
            $page = null;
        }

        foreach ($questions as $question) {
            $question_id = $question["question_id"];
            $question_title = $question["title"];
            $class = ($question_id == $selected) ? 'class="selected"' : '';
            $linkURI = "";

            if (!is_null($page))
                $linkURI = 'href="'.$page.'?survey='.$survey_id.'&selected='.$question_id.'"';

            $html .= '<li '.$class.'><a '.$linkURI.'>'.$question_title.'</a></li>';
        }

        return $html;
    }

    public function buildView(int $survey_id, int $question_id, bool $editMode, bool $viewMode, int $answer_id = null) : string {
        $question = $this->get($survey_id, $question_id);
        $question_title = $question["title"];
        $formURI = $editMode ? "./php/survey/set_question_title.php" : "./php/survey/set_question_response.php";
        $disabledAnswer = $editMode ? "disabled" : "";
        $html = "";

        // Set title
        if ($editMode)
            $question_title = '<textarea name="question_name" placeholder="Nouvelle question">'.$question_title.'</textarea>';

        $question_title = '<h2>'.$question_title.'</h2>';

        // Set ID inputs used in scripts
        $id_inputs = '
            <input type="hidden" id="survey_id" name="survey_id" value="'.$survey_id.'">
            <input type="hidden" id="question_id" name="question_id" value="'.$question_id.'">';

        if (!$editMode AND !$viewMode)
            if (!is_null($answer_id))
                $id_inputs .= '<input type="hidden" id="answer_id" name="answer_id" value="'.$answer_id.'">';

        return
            '<form action="'.$formURI.'" method="POST">
                '.$id_inputs.'
                
                '.$question_title.'

                <div class="field floating_label_wrapper">
                    <input type="text" id="question_input" class="floating_label_input" name="question_input" placeholder="R&eacute;ponse" required '.$disabledAnswer.'>
                    <label for="question_input" class="floating_label">R&eacute;ponse</label>
                </div>
                
                <input class="btn filled" type="submit" value="VALIDER">
            </form>';
    }
}