<?php

session_start();  // Startejam lietotaja sesiju


$_SESSION['user_id'] = 1; // 

$db = new PDO('mysql:dbname=todolist;host=localhost','root'); // savienojums ar datu bāzi ar PDO statement