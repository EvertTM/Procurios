<?php

class Comment {
    private $content;

    function __construct($content) {
        $this->content = $content;
    }

    public function getContent() {
        return "<p>" . $this->content . "</p>";
    }
}

?>