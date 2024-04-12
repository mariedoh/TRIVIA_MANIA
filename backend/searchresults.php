<?php
include "../backend/checkLogIn.php";
include "../backend/connection.php";
if(checkLogin() == false){
    header("login.php");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$search = htmlspecialchars($_POST['search']);
//searching movies
$query = "SELECT *FROM Movies WHERE title LIKE '%$search%';";
$result = $conn->query($query);

//searching characters
$que = "SELECT * FROM Characters WHERE name LIKE '%$search%';";
$re = $conn->query($que);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../styles/home.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="icon" href="../images/b.avif">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
    <a href = "../main/profile.php"><img src="../images/afro.webp" alt="Profile Photo" class="avatar"></a>
        <a href="../main/home.php"><p style = "text-align: center;">Home</p></a>
        <a href="../main/movies.php"><p style = "text-align: center;">My Movies</p></a>
        <a href="../main/characters.php"><p style = "text-align: center;">My Characters</p></a>
        <a href="../main/profile.php?action=editing"><p style = "text-align: center;">Edit Profile</p></a>
        <a href = "../backend/logout_action.php"><p style = "text-align: center;">Log Out</p></a>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="header">
            <div class="nav-links">
            </div>
        </div>
    <div id="colCon">
    <h2>Movies</h2>
    <?php
        if($result->num_rows > 0){
            $movies = array();
            while ($row = $result->fetch_assoc()) {
                $movies[] = $row['title'];
            }
                include "../backend/displayMoviesFromSet.php";
                displayMovies($movies);
                exit();  
            }
            else{
                echo "No Results for this Search";
            }
   ?>
   <h2>Characters</h2>
   <?php 
   if($re->num_rows > 0){
        $chars = array();
        while ($row = $re->fetch_assoc()) {
            $chars[] = $row['name'];
        }
        include "../backend/loadCharacters.php";
        findSearchChars($chars);
        exit(); 
    }
    else{
        echo "No Results for this Search";
    }
   ?>
</body>
</html>