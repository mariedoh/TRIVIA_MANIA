<?php
include ("../backend/connection.php");
    $char=isset($_GET['char']) ? $_GET['char'] : null;
    $query = "
    SELECT ci.*
    FROM CollectionItems ci
    JOIN Characters m ON ci.item_id_in_type = m.character_id
    WHERE ci.item_type = 'character'
    AND m.name = '$char';";
    
    $result = $conn->query($query);

    if($result ->num_rows != 0){
        $row = $result->fetch_assoc();
        $char_id = $row['item_id_in_type'];
        $q = "DELETE FROM CollectionItems
            WHERE item_id_in_type = '$char_id'
            AND item_type = 'character';";
        $result = $conn->query($q);
        if($result){
            header("Location: ../main/characters.php");
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

       $que =  "Select * from Characters where name  = '$char'";
       $re = $conn->query($que);
       $rew = $re->fetch_assoc();

       $movie_id = $rew["character_id"];
       $main = "Insert into CollectionItems(collection_id, item_type, item_id_in_type)
       VALUES ('$collection_id', 'character', '$movie_id');";
       $hope = $conn->query($main);
       if($hope){
        header("Location: ../main/characters.php");
        die();
       }

       

       

    }



