
<?php

function createContent() {

    $_SESSION["msgBlocks"] = array();

    $msgBlock = new MessageBlock(new Message("Content of test message"));
    $msgBlock->addComment(new Comment("Content of test comment 1"));
    $msgBlock->addComment(new Comment("Content of test comment 2"));

    array_push($_SESSION["msgBlocks"], $msgBlock);
}

function printMessageBlocks() {

    if (isset($_SESSION["msgBlocks"]) && sizeof($_SESSION["msgBlocks"]) > 0) {

        usort($_SESSION["msgBlocks"], function($a, $b) {
            return strtotime($a->timestamp) - strtotime($b->timestamp);
        });

        foreach($_SESSION["msgBlocks"] as  $msgBlock) {
            $msgBlock->printMessageBlock();
        }
    }
}

function checkButtons() {
    if (isset($_POST['messageContent'])) {
        addMessage($_POST['messageContent']);
        unset($_POST['messageContent']);
    } else if (isset($_POST['commentContent']) && isset($_POST['messageID'])) {
        addComment($_POST['commentContent'], $_POST['messageID']);
        unset($_POST['commentContent'], $_POST['messageID']);
    }
}

function addMessage($content) {

    if (!isset($_SESSION["msgBlocks"])) {
        $_SESSION["msgBlocks"] = array();
    }
    $msgBlock = new MessageBlock(new Message($content));
    array_push($_SESSION["msgBlocks"], $msgBlock);
}

function addComment($content, $messageID) {

    if (isset($_SESSION["msgBlocks"])) {
        foreach ($_SESSION["msgBlocks"] as $msgBlock) {
            if ($msgBlock->id == $messageID) {
                $comment = new Comment($content);
                $msgBlock->addComment($comment);
            }
        }
    }
}

?>