<?php

class Message {
    private $content;

    function __construct($content) {
        $this->content = $content;
    }

    public function getContent() {
        return "<p>" . $this->content . "</p>";
    }
}

?>