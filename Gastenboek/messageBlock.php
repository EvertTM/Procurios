<?php

class MessageBlock {
    private $message;
    private $comments = array();

    function __construct($message) {
        $this->message = $message;
    }

    public function addComment($comment) {
        array_push($this->comments, $comment);
    }

    public function printMessageBlock() {
        $html = "<div><div>" . $this->message->getContent() . "</div>";
        $html .= "<div>";

        foreach ($this->comments as $cmt) {
            $html .= $cmt->getContent();
        }
        
        $html .= "</div></div>";

        echo $html;
    }
}

?>