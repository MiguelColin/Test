<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "coLin2311";
    $base = "test";

    $db = mysqli_connect($servidor, $usuario, $password, $base);

    mysqli_query($db, "SET NAMES 'utf-8'");

    if(!isset($_SESSION)){
        session_start();
    }
?>