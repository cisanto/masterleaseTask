<?php
    $host = "localhost";
    $username = "root";
    $pass = "";
    $dbName = "masterlease";
    $mysqli = new mysqli($host, $username, $pass, $dbName);

    if ($mysqli->connect_error) {
        die("Błąd połączenia z bazą danych: " . $mysqli->connect_error);
        }