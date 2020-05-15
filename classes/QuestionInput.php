<?php

class QuestionInput extends Question {
    // Constructor
    public function __construct($title) { parent::__construct($title); }

    // Methods
    public function build() {
        return $this->buildTitle() .
            '<div class="field floating_label_wrapper">
                <input type="text" id="questionInput" class="floating_label_input" name="questionInput" placeholder="R&eacute;ponse" required disabled>
                <label for="username" class="floating_label">R&eacute;ponse</label>
            </div>';
    }
}