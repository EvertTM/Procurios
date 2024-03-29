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
        
        usort($this->comments, function($a, $b) {
            return strtotime($a->timestamp) - strtotime($b->timestamp);
        });
    }

    public function printMessageBlock() {
        $html = "" . 
<<<HTML
    <div class="msgBlock">
        <!-- ID: {$this->id}
        Tijdstip: {$this->timestamp} -->
        <div class="msg">
            {$this->message->getContent()}
        </div>
HTML;
        if (sizeof($this->comments) > 0) {
            $html .= "<div class=\"comments\">";
            foreach ($this->comments as $cmt) {

                $html .= $cmt->getContent();
            }
            $html .= "</div>";
        }

        $html .= 
<<<HTML
        <div>
            <form action="" method="post" class="commentForm">
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