<?php

function checkCache($mysqli, $key) {
    $query = "SELECT * FROM cache WHERE wrench = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $key);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $table = json_decode($row["worth"], true);
        return $table;
    }

    return null;
}

function generateMultiplicationTable($size){
    for ($i = 1; $i <= $size; $i++) {
        $row = array();
        for ($j = 1; $j <= $size; $j++) {
            $row[] = $i * $j;
        }
        $table[] = $row;
    }
    return $table;
}

function insertIntoCache ($mysqli, $key, $table){
    $query = "INSERT INTO cache (wrench, worth) VALUES (?, ?)";
    $stmt = $mysqli->prepare($query);    
    $stmt->execute([$key, json_encode($table)]);
    $stmt->close();
    $mysqli->close();
}


function multiplicationTable($size) {
    if ($size < 1 || $size > 100) {
        echo '<script>alert("Rozmiar tablicy mnożenia powinien być liczbą od 1 do 100.");</script>';
        return null;
    }
    require ('db.php');

    $key = "multiplicationTable_" . $size;

    $table = checkCache($mysqli, $key);

    if ($table !== null) {
        $mysqli->close();
        return $table;
    }

    $table = generateMultiplicationTable($size);

    insertIntoCache ($mysqli, $key, $table);

    return $table;
}