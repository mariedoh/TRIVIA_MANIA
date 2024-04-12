<?php
session_start();
function checkLogin() {
    if(isset($_SESSION['user_id'])){
        $pid = $_SESSION['user_id'];
        return $pid;
    }
    else{
        return false;
    }
}
$userid = checkLogin();
