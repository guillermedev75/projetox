<?php

    $host = 'localhost';
    $user = 'root';
    $db   = 'mvc_sistem';
    $pw   = '';

    $connection= new PDO( 'mysql:host=' . $host . ';dbname=' . $db, $user, $pw);

?>