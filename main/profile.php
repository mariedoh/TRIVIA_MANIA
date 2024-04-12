<?php
include "../backend/findUserInfo.php";
    $info = findUserInfo();
    if (empty($info)) {
        header("../main/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="../images/b.avif">
    <link rel="stylesheet" href= "../styles/home.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
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
            <input type="text" name = "search" class="search-bar" placeholder="Search...">
        </form>
            <div class="nav-links">
                <a href="../main/notifications.php"><i class="fa-solid fa-bell"></i></a>
            </div>
        </div>
    <form id="editProfileForm" action = "../backend/editProfile.php" method = "post">
        <div id = "profile">
            <h1>Hi <?php if(!empty($info)){echo $info['username'];}?>!! <h1>
            <div id = "rows">
                <p>Current Username</p>
                <p>Current Email</p>
            </div>
            <div id = "rows">
                <input type = "text" name = "user" placeholder="Username" value= <?php 
                if(!empty($info)){ echo $info['username'];}?>>
                <input type = "text" name = "email" placeholder="Email" value= <?php if(!empty($info)){echo $info['email'];}?>> 
            </div>
            <div id = "rows">
                <p>Bio</p>
                <p>Top Genre #1 </p>
            </div>
            <div id = "rows">
                <input id = "inpu" type = "text" name = "bio" placeholder="Bio" value= <?php if(!empty($info)){echo $info['bio'];}?>> 
                
                <select name = "genreO" id="inpu">
                    <option value="0"><?php if(!empty($info)){echo $info['genreOne'];}?></option>;
                    <option value="Romance">Romance</option>
                    <option value="Action">Action</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Science Fiction">Science Fiction</option>
                    <option value="Horror">Horror</option>
                    <option value="Drama">Drama</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Animation">Animation</option>
                    <option value="Documentary">Documentary</option>
                    <option value="Mystery">Mystery</option>
                </select>

            </div>
            <div id = "rows">
                <p>Top Genres #2</p>
                <p>Top Genre #3</p>
            </div>
            <div id = "rows">
            <select name = "genreS" id="inp">
            <option value="0"><?php if(!empty($info)){echo $info['genreTwo'];}?></option>;
                    <option value="Romance">Romance</option>
                    <option value="Action">Action</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Science Fiction">Science Fiction</option>
                    <option value="Horror">Horror</option>
                    <option value="Drama">Drama</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Animation">Animation</option>
                    <option value="Documentary">Documentary</option>
                    <option value="Mystery">Mystery</option>
                </select>
                <select name = "genreT" id="inp">
                <option value="0"><?php if(!empty($info)){echo $info['genreThree'];}?></option>;
                    <option value="Romance">Romance</option>
                    <option value="Action">Action</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Science Fiction">Science Fiction</option>
                    <option value="Horror">Horror</option>
                    <option value="Drama">Drama</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Animation">Animation</option>
                    <option value="Documentary">Documentary</option>
                    <option value="Mystery">Mystery</option>
                </select>

            </div>  
            <div class = "rows2">
                <input type = "submit" id = "button1" name = "edit" value = "Edit Profile" /> 
            </div>
        <div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>