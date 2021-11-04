<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['username']) || $_SESSION['username'] == ''){
    header('Location: /login/index.html');
    exit();
}