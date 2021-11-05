<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/session.php';

$_SESSION['username'] = '';

header('Location: /');
exit();