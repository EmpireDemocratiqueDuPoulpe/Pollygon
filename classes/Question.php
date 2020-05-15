<?php

abstract class Question {
    // Attributes
    protected $title;

    // Constructor
    public function __construct($title) { $this->title = $title; }

    // Getters
    public function getTitle() { return $this->title; }

    // Setters
    public function setTitle($title) { $this->title = $title; }

    // Methods
    protected function buildTitle() {
        return '<h2>'.$this->title.'</h2>';
    }

    public abstract function build();
}