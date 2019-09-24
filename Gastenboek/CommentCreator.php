<?php

class CommentCreator {
    private $parentID;

    function __construct($parentID) {
        $this->parentID = $parentID;
    }

    public function getCommentForm() {
        return "" . 
<<<HTML
    <form action="" method="post">
        Voeg reactie toe: <input type="text" name="commentContent">
        <input hidden name="parentID" value="{$this->parentID}">
        <input type="submit" value="Toevoegen">
    </form>
HTML;
    }
}

?>