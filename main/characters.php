<?php
include "../backend/checkLogIn.php";
$user = checkLogin();
if($user == false){
    header("login.php");
}
$movie = isset($_GET['movie']) ? $_GET['movie'] : null;
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
            <form action = "../backend/searchresults.php" method = "post">
            <input type="text" class="search-bar" name = "search" placeholder="Search...">
            </form>
            </form>
            <div class="nav-links">
                <a href="../main/notifications.php"><i class="fa-solid fa-bell"></i></a>
            </div>
        </div>
        <div id="content">
    <?php
    include "../backend/connection.php";
    $query = "SELECT DISTINCT M.*
    FROM Characters M
    JOIN CollectionItems CI ON CI.item_id_in_type = M.character_id
    WHERE CI.item_type = 'character';
    ";
    $result = $conn->query($query);
    $chars = [];
    if($result ->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $chars[] = $row['name'];
        }
        include "../backend/loadCharacters.php";
        findSearchChars($chars);
    }
    else{
        echo 'Like Some Characters to Get Started';}
    ?>
</body>
</html>
