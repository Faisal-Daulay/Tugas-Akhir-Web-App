<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "tugasakhir";

    try {
        $db = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);
    } catch (PDOExeption $e) {
        echo $e->getMassage();
    }