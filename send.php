<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/login_data.php';

function get_data(){
    require_once $_SERVER['DOCUMENT_ROOT'] . '/messages.php';
    return $messages;
}

if(!isset($_POST['text']) || $_POST['text'] == ''){
    exit();
}

$from = $_SESSION['username'];
$to = ($_SESSION['username'] == $username1 ? $username2 : $username1);
$text = $_POST['text'];
$test = '';

for($i = 0;$i < strlen($text);$i++){
    if($text[$i] ==  '"' || $text[$i] ==  "'" || $text[$i] ==  '\\'){
        $test .= '\\';
    }
    $test .= $text[$i];
}

$text = $test;

$data = get_data();
$data[sizeof($data)] = [
    'from' => $from,
    'to' => $to,
    'text' => $text,
];

$str = "<?php \$messages = [ ";

for($i = 0;$i < sizeof($data);$i++){
    $from = $data[$i]['from'];
    $to = $data[$i]['to'];
    $text = $data[$i]['text'];
    $str .= "[
        'from' => '$from',
        'to' => '$to',
        'text' => '$text',
    ],";
}

$str .= "]; ?>";

echo $str;

file_put_contents('messages.php', $str);