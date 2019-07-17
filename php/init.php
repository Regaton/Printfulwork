<?php

session_start();  // Startejam lietotaja sesiju




$_SESSION['user_id'] = 1; // 



if (empty($_SESSION['token'])) { // Veidojam tokenu drošībai no CSFR
	$_token = uniqid(rand());
	$_token = md5($_token.session_name());
	$_SESSION['token'] = $_token;
}
else {
    $_token = $_SESSION['token'];  
}

$db = new PDO('mysql:dbname=todolist;host=localhost','root'); // savienojums ar datu bāzi ar PDO statement