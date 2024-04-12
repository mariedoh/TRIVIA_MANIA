<?php
    include "../backend/checkLogIn.php";
    $id = checkLogin();              
    $query = " DELETE FROM Users WHERE user_id = '$id'";
    $result = $conn->query($query);
    if ($result) {
        header("Location: ../backend/logout_action.php");
        http_response_code(200); // OK
        die();
    } else {
        // Return an error response
        http_response_code(500); // Internal Server Error
    }

