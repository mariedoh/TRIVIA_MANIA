<?php
include "../backend/checkLogIn.php";
if(checkLogin() == false){
    header("login.php");
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
            <form action = "../backend/searchresults.php" method = "post">
            <input type="text" class="search-bar" name = "search" placeholder="Search...">
            </form>
            <div class="nav-links">
                <a href="../main/notifications.php"><i class="fa-solid fa-bell"></i></a>
            </div>
        </div>
        <div id="content">
    <?php
    include "../backend/connection.php";
    $query = "Select * from Movies";
    $result = $conn->query($query);
    $movies = [];
    if($result){
        while ($row = $result->fetch_assoc()) {
            $movies[] = $row['title'];
        }
        include "../backend/displayMoviesFromSet.php";
        displayMovies($movies);
    }
    ?>
</body>
<script>
function toggleRed(icon) {
    icon.classList.toggle('red');
    var isRed = icon.classList.contains('red');
    var movieNameElement = icon.closest('#movieWindow').querySelector('.name');
    if (movieNameElement) {
        var movieName = movieNameElement.textContent.trim();
        
        if (isRed) {
            // Send AJAX request to add the movie
            sendRequest('addMovie', movieName);
        } else {
            // Send AJAX request to remove the movie
            sendRequest('removeMovie', movieName);
        }
    }
}

function sendRequest(action, movieName) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../backend/updateMovieCollection.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response here if needed
            console.log(xhr.responseText);
        }
    };
    xhr.send("action=" + action + "&movieName=" + movieName);
}
</script>
</html>