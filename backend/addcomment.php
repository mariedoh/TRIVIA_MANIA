<?php
include "../backend/connection.php";
include "../backend/checkLogIn.php";

$user = checkLogin();
$movie = isset($_GET['movie']) ? $_GET['movie'] : null;

if (isset($_POST['addcomment'])){
    $comm = htmlspecialchars($_POST['comment']);
    $movie_id;
    //find movie id from name
    $q = "SELECT * FROM Movies WHERE title = '$movie'; ";
    $r = $conn->query($q);
    //collect movie_id
    if($r && $r->num_rows > 0) {
        $row = $r->fetch_assoc();
        $movie_id = $row["movie_id"];
        if(!empty($comm)){
            $query = "INSERT INTO Comments (movie, UserID, CommentText, DatePosted) 
            VALUES ('$movie_id', '$user', '$comm', NOW());";
            $result = $conn->query($query);
            if($result){
                header("Location: ../backend/movieUp.php?movie=$movie");
            }

        }
    }

}