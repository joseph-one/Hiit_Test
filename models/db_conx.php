<?php

//config db

$server="localhost";
$user = "root";
$pass = "";
$db_name = "tchat_hiit_db";


$connect = new PDO("mysql:host=".$server.";dbname=".$db_name."", $user, $pass);