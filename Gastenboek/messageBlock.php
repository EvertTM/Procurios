<?php

class MessageBlock {
    public $id;
    public $timestamp;
    private $message;
    private $comments;

    function __construct($message) {
        $this->id = uniqid();
        $this->timestamp = time();
        $this->message = $message;
        $this->comments = array();
    }

    public function addComment($comment) {
        array_push($this->comments, $comment);
    }

    public function printMessageBlock() {
        $html = "" . 
<<<HTML
    <div class="msgBlock">
        ID: {$this->id}
        Tijdstip: {$this->timestamp}
        <div class="msg">
            {$this->message->getContent()}
        </div>
        <div class="comments">
HTML;

        usort($this->comments, function($a, $b) {
            return strtotime($a->timestamp) - strtotime($b->timestamp);
        });

        foreach ($this->comments as $cmt) {

            $html .= $cmt->getContent();
        }

        $html .= 
<<<HTML
        </div>
        <div>
            <form action="" method="post">
                Voeg reactie toe: <input type="text" name="commentContent">
                <input hidden name="messageID" value="{$this->id}">
                <input type="submit" value="Toevoegen">
            </form>
        </div>
    </div>
HTML;

        echo $html;
    }
}

?>