<?php

function getComments($movie){
    include "connection.php"; 
    $query = "SELECT * FROM Movies WHERE title = '$movie'";
    $result = $conn->query($query);
    if($result){
        $row = $result->fetch_assoc();
        $movie_id = $row["movie_id"];
        $que = "Select * from Comments where movie = '$movie_id'";
        $answer = $conn->query($que);
        if($answer){
            $ans = $answer;
            return $ans;
        }
    }
    return false;
}

?>
