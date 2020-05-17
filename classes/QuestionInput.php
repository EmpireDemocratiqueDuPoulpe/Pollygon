<?php

class QuestionInput extends Question {
    // Constructor
    public function __construct($title) { parent::__construct($title); }

    // Methods
    public function build($disabledInput) {
        $disabled = $disabledInput ? "disabled" : "";

        return
            '<form action="./php/survey/set_question_title.php" method="POST">
                <input type="hidden" id="question_id" name="question_id" value="'.$_GET["selected"].'">
                
                '.$this->buildTitle($disabledInput).'

                <div class="field floating_label_wrapper">
                    <input type="text" id="questionInput" class="floating_label_input" name="questionInput" placeholder="R&eacute;ponse" required '.$disabled.'>
                    <label for="questionInput" class="floating_label">R&eacute;ponse</label>
                </div>
                
                <input class="btn filled" type="submit" value="VALIDER">
            </form>';
    }
}