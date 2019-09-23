
<?php

function testPage() {
    $msg1 = new Message("Content of test message 1.");
    $msg2 = new Message("Content of test message 2.");
    $testMessages = array();
    array_push($testMessages, $msg1, $msg2);

    foreach ($testMessages as $msg) {
        echo $msg->getContent();
    }
}

?>