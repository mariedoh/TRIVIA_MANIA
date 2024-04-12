<?php
function findMovies(){
    include "connection.php";
    $query = "SELECT * FROM Movies";
    $result = $conn->query($query);
    if ($result->num_rows != 0) {
        $row = $result->fetch_assoc();
        return $row;
    }
}
function findMovieTitles(){
    include "connection.php";
    $query = "SELECT title FROM Movies";
    $result = $conn->query($query);
    
    $movies = array(); // Initialize an empty array to store movie titles

    if ($result && $result->num_rows > 0) {
        // Iterate through each row using a while loop
        while ($row = $result->fetch_assoc()) {
            // Access the value of the 'title' column and store it in the $movies array
            $movies[] = $row['title'];
        }
    }
    
    return $movies; 
}
