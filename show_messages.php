<!-- <div class="message outgoing">
    hi, this is test from sinamp
</div>
<div class="message incoming">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
</div> -->

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/login_data.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/messages.php';

$data = $messages;

$ans = '';

for($i = 0;$i < sizeof($data);$i++){
    if($data[$i]['from'] == $_SESSION['username']){
        $ans .= "<div class='message outgoing'>" . (string)$data[$i]['text'] . "</div>";
    }
    else{
        $ans .= "<div class='message incoming'>" . (string)$data[$i]['text'] . "</div>";
    }
}

echo $ans;