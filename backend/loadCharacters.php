<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles/movieInfo.css" rel = "stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="icon" href="../images/b.avif">
</head>
<body>
<?php
function findChars($movie){
    include "connection.php";
    $query = "SELECT Ch.*
    FROM Characters Ch
    JOIN Movies M ON Ch.movie_id = M.movie_id
    WHERE M.title = '$movie';";
    $result = $conn->query($query);
    if ($result->num_rows != 0) {
        // $row = $result->fetch_assoc();
        $chars = array(); 
        // Iterate through each row using a while loop
        while ($row = $result->fetch_assoc()) {
            $chars[] = $row['name'];  
        }
        return $chars;
        

    }
}
function displayChars($chars, $mov) {
    $imageFolder = "../character_photos";
    include "../backend/findCharInfo.php";
    if(!empty($chars)){
    foreach ($chars as $person) {
        // Extract the filename without extension
        $filename = $person;
        $extension;
        $matching_file = glob($imageFolder . "/" . $person . ".*");
        if(!empty($matching_file)){
            $extension = pathinfo($matching_file[0], PATHINFO_EXTENSION);
        }
        ?>
        <div class = "main">
        <div id = "photo">
            <img src="<?php echo $imageFolder . '/' . $filename . '.' . $extension; ?>" alt="<?php echo $filename; ?>">
            <a href = "../backend/likeCharacter.php?char=<?php echo $filename;?>"><i class="fas fa-heart"></i></a>
            <br/>
        </div>
        <div id = "info">
            <?php 
            $data = charData($filename);
            ?>
            <h2>Name: <?php echo $data['name'];?></h2>
            <p>Movie:<a href = "../backend/movieUp.php?name=<?php echo $mov ;?>" > <?php echo $mov?></a></p>
            <br/>
           
            <h3>About</h3>
            <p><?php echo $data['description'] ;?> </p></p>       
        </div>

    </div>

        <?php
    }
}
}
?>
<?php
function findSearchChars($chars) {
    $imageFolder = "../character_photos";
    $mov;
    include "../backend/connection.php";
    include "../backend/findCharInfo.php";
    foreach ($chars as $person) {
        $q = "SELECT M.* FROM Movies M JOIN Characters C ON M.movie_id = C.movie_id WHERE C.name = '$person';";
        $r = $conn->query($q);
        if ($r->num_rows != 0) {
            $row = $r->fetch_assoc();
            $mov = $row["title"];
        }

        // Extract the filename without extension
        $filename = $person;
        $extension;
        $matching_file = glob($imageFolder . "/" . $person . ".*");
        if(!empty($matching_file)){
            $extension = pathinfo($matching_file[0], PATHINFO_EXTENSION);
        }
        ?>
        <div class = "main">
        <div id = "photo">
            <img src="<?php echo $imageFolder . '/' . $filename . '.' . $extension; ?>" alt="<?php echo $filename; ?>">
            <a href = "../backend/likeCharacter.php?char=<?php echo $filename;?>"><i class="fas fa-heart"></i></a>
        </div>
        <div id = "info">
            <?php 
            $data = charData($filename);
            ?>
            <h2>Name: <?php echo $data['name'];?></h2>
            <p>Movie:<a href = "../backend/movieUp.php?name=<?php echo $mov ;?>" > <?php echo $mov?></a></p>
            <br/>
            <h3>About</h3>
            <p><?php echo $data['description'] ;?> </p></p>       
        </div>

    </div>

        <?php
    }
}
?>







    
</body>
</html>

