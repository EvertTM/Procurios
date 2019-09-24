<?php

class MessageBlock {
    public $id;
    private $message;
    private $comments;
    private $commentCreator;

    function __construct($message) {
        $this->id = uniqid();
        $this->message = $message;
        $this->comments = array();
        $this->commentCreator = new CommentCreator($this->id);
    }

    public function addComment($comment) {
        array_push($this->comments, $comment);
    }

    public function printMessageBlock() {
        $html = "<div class=\"msgBlock\">id: " . $this->id . "<div class=\"msg\">" . $this->message->getContent() . "</div><div class=\"comments\">";

        foreach ($this->comments as $cmt) {
            $html .= $cmt->getContent();
        }

        $html .= "</div><div>" . $this->commentCreator->getCommentForm() . "</div></div>";

        echo $html;
    }
}

?>