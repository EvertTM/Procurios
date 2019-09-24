<?php

class MessageBlock {
    public $id;
    private $message;
    private $comments;

    function __construct($message) {
        $this->id = uniqid();
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
        id: {$this->id}
        <div class="msg">
            {$this->message->getContent()}
        </div>
        <div class="comments">
HTML;

        foreach ($this->comments as $cmt) {
            $html .= $cmt->getContent();
        }

        $html .= 
<<<HTML
        </div>
        <div>
            <form action="" method="post">
                Voeg reactie toe: <input type="text" name="commentContent">
                <input hidden name="parentID" value="{$this->id}">
                <input type="submit" value="Toevoegen">
            </form>
        </div>
    </div>
HTML;

        echo $html;
    }
}

?>