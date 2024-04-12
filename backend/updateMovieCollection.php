<?php
function addMovie($movie_name) {
    include "../backend/checkLogIn.php";
    include "../backend/connection.php";

    $user_id = checkLogin();
    $name = $conn->real_escape_string($movie_name); // Sanitize input to prevent SQL injection

    $query = "SELECT * FROM Movies WHERE title = '$name'";
    $result = $conn->query($query);

    if ($result->num_rows != 0) {
        $row = $result->fetch_assoc();
        $movie_id = $row["movie_id"];

        $q = "INSERT INTO collectionitems (collection_id, item_type, item_id_in_type) VALUES (1, 'movie', '$movie_id')";
        $result = $conn->query($q);

        if ($result) {
            return true;
        } else {
            return false;
        }
    } else {
        return false; // Movie not found
    }
}

function removeMovie($movie_name) {
    include "../backend/checkLogIn.php";
    include "../backend/connection.php";

    $user_id = checkLogin();
    $name = $conn->real_escape_string($movie_name); // Sanitize input to prevent SQL injection

    $query = "SELECT * FROM Movies WHERE title = '$name'";
    $result = $conn->query($query);

    if ($result->num_rows != 0) {
        $row = $result->fetch_assoc();
        $movie_id = $row["movie_id"];

        $q = "Delete from 'collectionitems' where 'item_id_in_type' = '$movie_id' and 'item_type' = 'movie'";
        $result = $conn->query($q);

        if ($result) {
            return true;
        } else {
            return false;
        }
    } else {
        return false; // Movie not found
    }
}


$action = $_POST['action'];
$movieName = $_POST['movieName'];

if ($action === 'addMovie') {
    addMovie($movieName);
} elseif ($action === 'removeMovie') {
    removeMovie($movieName);
}
