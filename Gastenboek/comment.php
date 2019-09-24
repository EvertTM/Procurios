<?php

class Comment {
    private $content;
    public $timestamp;

    function __construct($content) {
        $this->timestamp = time();
        $this->content = $content;
    }

    public function getContent() {
        return "<p>" . $this->content . "</p>";
    }
}

?>