<?php
include "../backend/connection.php";
session_start();
if (isset($_POST['edit'])){
    // Retrieve form data
    //sanitizing/validation of data
    $uname = htmlspecialchars($_POST['user']);
    $email = htmlspecialchars($_POST["email"]);
    $bio = htmlspecialchars($_POST["bio"]);
    $genreO = htmlspecialchars($_POST["genreO"]);
    $genreS = htmlspecialchars($_POST["genreS"]);
    $genreT = htmlspecialchars($_POST["genreT"]);
    $pattern = '/.*@.*/';

    // Check if the email matches the pattern
    if (preg_match($pattern, $email)) {
        if (empty($email)) {
            header("Location: ../main/profile.php?error=empty-email");
            exit();
        }
    } 
    else{
        header("Location: ../main/profile.php?error=invalid-email");
        exit();  
    }
    // Check for empty fields
    if(empty($uname)){
        header("Location: ../main/profile.php?error=empty-username");
        exit();
    }
 
    $u = $_SESSION["user_id"];

    $query = "UPDATE Users SET username = '$uname', email = '$email', bio = '$bio', 
    genreOne ='$genreO', genreTwo = '$genreS', genreThree = '$genreT' where user_id = '$u'";
    $result = $conn->query($query);
    if($result){
        header("Location: ../main/profile.php");
        die();
    }   
}
