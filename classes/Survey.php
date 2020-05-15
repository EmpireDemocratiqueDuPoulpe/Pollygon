<?php

class Survey {
    // Attributes
    private $title;
    private $creationDate;
    private $membersCount;
    private $questionArray;

    // Constructor
    public function __construct($title) {
        $this->title = $title;
        $this->creationDate = date("d/m/Y");
        $this->membersCount = 0;
        $this->questionArray = [];
    }

    // Getters
    public function getTitle()              { return $this->title; }
    public function getCreationDate()       { return $this->creationDate; }
    public function getMembersCount()       { return $this->membersCount; }
    public function getMembersCountStr() {
        $count = $this->membersCount;
        $str = $count . " participant";

        if ($count > 1) $str .= "s";

        return $str;
    }
    public function getQuestion($id)        { if ($id < count($this->questionArray)) {return $this->questionArray[$id];} else {return null;} }
    public function getQuestions()          { return $this->questionArray; }
    public function getQuestionsCount()     { return count($this->questionArray); }

    // Setters
    public function setTitle($title)            { $this->title = $title; }
    public function setCreationDate($date)      { $this->creationDate = $date; }
    public function setMembersCount($count)     { $this->membersCount = $count; }
    public function setQuestions($questions)    { $this->questionArray = $questions; }
    public function addQuestion($question)      { $this->questionArray[] = $question; }

    // Methods
    public function buildQuestions($pageName, $selected = -1) {
        $html = "";

        for ($i = 0; $i < count($this->questionArray); $i++) {
            if ($i == $selected)
                $class = 'class="selected"';
            else
                $class = '';

            $html .= '<li '.$class.'><a href="'.$pageName.'selected='.$i.'">'.$this->questionArray[$i]->getTitle().'</a></li>';
        }

        return $html;
    }
}