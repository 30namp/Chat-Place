<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/login_data.php';

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_POST['username']) || $_POST['username'] == '' || !isset($_POST['password']) || $_POST['password'] == ''){
    header('Location: /login/index.html');
    exit();
}

if($_POST['username'] == $username1 && $_POST['password'] == $password1){
    $_SESSION['username'] = $username1;
    header('Location: /');
}
else if($_POST['username'] == $username2 && $_POST['password'] == $password2){
    $_SESSION['username'] = $username2;
    header('Location: /');
}
else{
    header('Location: /');
}
exit();