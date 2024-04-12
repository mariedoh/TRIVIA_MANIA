<?php 
session_start();
include "../backend/connection.php";
if (isset($_POST['login'])){
    $username = htmlspecialchars($_POST["user"]);
    $password = htmlspecialchars($_POST["pass"]);

    //ensuring no empty fields
    if(empty($username)){
        header("Location:../main/login.php?error=empty-username");  
        die();
    }
    if (empty($password)){
        header("Location:../main/login.php?error=empty-password&user=$username");  
        die();
    }    
    // Hash the password before comparing
    $hashedPassword = password_hash($password, PASSWORD_ARGON2I);

    // Check if the user exists in the database
    $query = "SELECT * FROM Users WHERE username = '$username'";
    $result = $conn->query($query);
    if ($result->num_rows !=0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['passwd'])) {
            $_SESSION['user_id'] = $row['user_id'];
            header("Location:../main/home.php");
            exit();
        }
        else{
            header("Location:../main/login.php?error=invalid_credentials");
            die();
        }

    }
    else{
        header("Location:../main/login.php?error=invalid_credentials");
        die();
    }
    

}