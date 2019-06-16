<?php

session_start();  // Startejam lietotaja sesiju

$db = new PDO('mysql:dbname=todolist;host=localhost','root'); // savienojums ar datu bāzi ar PDO statement