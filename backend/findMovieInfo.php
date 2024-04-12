<?php
function movieData($name){
    include "../backend/connection.php";
    $query = "SELECT * FROM Movies WHERE title = '$name'";
    $result = $conn->query($query);
    if ($result->num_rows != 0) {
        $row = $result->fetch_assoc();
        return $row;
    }
}