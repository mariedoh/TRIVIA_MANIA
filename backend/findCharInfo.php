<?php
function charData($name){
    include "../backend/connection.php";
    $query = "SELECT * FROM Characters WHERE name = '$name'";
    $result = $conn->query($query);
    if ($result->num_rows != 0) {
        $row = $result->fetch_assoc();
        return $row;
    }
}