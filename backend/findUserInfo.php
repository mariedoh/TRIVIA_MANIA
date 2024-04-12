<?php
include "../backend/checkLogin.php";
function findUserInfo(){
    $pid = checkLogin();  
    if($pid){
        include "../backend/connection.php";
        $query = "SELECT * FROM Users WHERE user_id = '$pid'";
        $result = $conn->query($query);
        if ($result->num_rows != 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
    }
    else{
        header("Location: login.php?error=not-logged-in");
        exit(); 
    }
}   
function findUserWithID($id){
    include "../backend/connection.php";
    $query = "SELECT * FROM Users WHERE user_id = '$id'";
    $result = $conn->query($query);
    if ($result->num_rows != 0) {
        return $result;
    }
}