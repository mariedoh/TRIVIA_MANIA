<?php
$movie=isset($_GET['name']) ? $_GET['name'] : null;
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
        <form action = "../backend/searchresults.php" method = "post">
            <input type="text" class="search-bar" name = "search" placeholder="Search...">
        </form>
           
        </div>
        <div id = "content">
            <?php
            include "../backend/loadMovieData.php";
            loadData($movie);
            ?>
        </div>


</div>
</body>
</html>