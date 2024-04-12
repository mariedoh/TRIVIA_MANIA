<?php
include "../backend/connection.php";
include "../backend/checkLogIn.php";

$user = checkLogin();
$movie = isset($_GET['cid']) ? $_GET['cid'] : null;
$id = urldecode($movie);
if (isset($_POST['addcomment'])){
    $comm = htmlspecialchars($_POST['comment']);

    if(!empty($comm)){
        $query = "UPDATE Comments SET CommentText = '$comm' WHERE CommentID = '$id';";
        $result = $conn->query($query);
        if($result){
            header("Location: ../backend/movieUp.php?movie=$movie");
        }

    }

}