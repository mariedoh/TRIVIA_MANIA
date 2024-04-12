<?php
session_start();
include "../backend/connection.php";
if (isset($_POST['signup'])){
    // Retrieve form data
    //sanitizing/validation of data
    $uname = htmlspecialchars($_POST['user']);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["passwd"]);
    $pattern = '/.*@.*/';

    // Check if the email matches the pattern
    if (preg_match($pattern, $email)) {
        if (empty($email)) {
            header("Location: ../main/signup.php?error=empty-email");
            exit();
        }
    } 
    else{
        header("Location: ../main/signup.php?error=invalid-email");
        exit();  
    }
    // Check for empty fields
    if(empty($uname)){
        header("Location: ../main/signup.php?error=empty-username");
        exit();
    }
    if (empty($password)) {
        header("Location: ../main/signup.php?error=empty-password");
        exit();
    }
    
    $pswrd = password_hash($password, PASSWORD_ARGON2I);
    $query = "select * from Users where username = '$uname'";
    $result = $conn->query($query);
    if($result->num_rows > 0){
        header("Location: ../main/signup.php?error=taken-username");
        exit();  
    }
    
    $query = "INSERT INTO Users (username, email, passwd) 
    VALUES ('$uname','$email','$pswrd')";

    $result = $conn->query($query);
    if($result){
        $q = "select user_id from Users where username = '$uname'";
        $r = $conn->query($q);
        if ($r){
        $row = $r->fetch_assoc();
        $user_id = $row['user_id'];

        $que = "INSERT INTO Collections (user_id, title, about, collection_type) VALUES
        ($user_id, 'Favorite Movies', 'A collection of your favorite movies.', 'movie'),
        ($user_id, 'Favorite Characters', 'A collection of your favorite characters.', 'character');";
        
        $final = $conn->query($que);
        if($final){
        header("Location: ../main/login.php");
        exit();
        }
    }
    }
    else{
        header("Location: ../main/login.php?error=connection-failure");
        exit();
    }
}
