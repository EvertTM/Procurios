
<?php

function testMessageBlock() {
    $msgBlock = new MessageBlock(new Message("Content of test message"));
    $msgBlock->addComment(new Comment("Content of test comment 1"));
    $msgBlock->addComment(new Comment("Content of test comment 2"));

    $msgBlock->printMessageBlock();
}

?>