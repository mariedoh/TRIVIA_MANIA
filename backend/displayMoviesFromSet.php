<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles/home.css" rel = "stylesheet">
</head>
<body>
<?php
function displayMovies($movies) {
    $imageFolder = "../movie_photos";

    foreach ($movies as $movie) {
        // Extract the filename without extension
        $filename = $movie;
        $extension;
        $matching_file = glob($imageFolder . "/" . $movie . ".*");
        if(!empty($matching_file)){
            $extension = pathinfo($matching_file[0], PATHINFO_EXTENSION);
        }

        ?>
        <div id="movieWindow">
            <div class="photo-icon">
                <img src="<?php echo $imageFolder . '/' . $filename . '.' . $extension; ?>" alt="<?php echo $filename; ?>">
            </div>
            <div class="name">
                <a href="../backend/movieUp.php?name=<?php echo $filename; ?>"><?php echo $filename; ?></a>
            </div>
            <div class="icons-post">
                <a href = "../backend/movieUp.php?name=<?php echo $filename;?>"><i class="fas fa-comment"></i></a>
                <a href = "../backend/likeMovie.php?movie=<?php echo $filename;?>" ><i class="fas fa-heart" ></i></a>
                
            </div>
        </div>
        <?php
    }
}
?>
</body>
</html>


