<?php
include ("../backend/connection.php");
    $movie=isset($_GET['movie']) ? $_GET['movie'] : null;
    $query = "
    SELECT ci.*
    FROM CollectionItems ci
    JOIN Movies m ON ci.item_id_in_type = m.movie_id
    WHERE ci.item_type = 'movie'
    AND m.title = '$movie';";
    

    $result = $conn->query($query);

    if($result ->num_rows != 0){
        $row = $result->fetch_assoc();
        $movie_id = $row['item_id_in_type'];
        $q = "DELETE FROM CollectionItems
            WHERE item_id_in_type = '$movie_id'
            AND item_type = 'movie';";
        $result = $conn->query($q);
        if($result){
            header("Location: ../main/movies.php");
            die();
        } 
    }
    else{
       include "../backend/checkLogIn.php";
       $id = checkLogin();

       $q = "Select * from Collections where user_id  = '$id' and collection_type = 'movie'";
       $r = $conn->query($q);
       $rw = $r->fetch_assoc();

       $collection_id = $rw["collection_id"];

       $que =  "Select * from Movies where title  = '$movie'";
       $re = $conn->query($que);
       $rew = $re->fetch_assoc();

       $movie_id = $rew["movie_id"];
       $main = "Insert into CollectionItems(collection_id, item_type, item_id_in_type)
       VALUES ('$collection_id', 'movie', '$movie_id');";
       $hope = $conn->query($main);
       if($hope){
        header("Location: ../main/movies.php");
        die();
       }

       

       

    }



