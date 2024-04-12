<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "../styles/movieInfo.css" rel = "stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body>
<?php
function loadData($movie){
    if(empty($movie)){
        header("Location: ../main/home.php");
    }
    $imageFolder = "../movie_photos";
    $filename = $movie;
    $extension = '';
    $matching_file = glob($imageFolder . "/" . $movie . ".*");
    if(!empty($matching_file)){
        $extension = pathinfo($matching_file[0], PATHINFO_EXTENSION);
    }
    ?>
    <div class = "main">
        <div id = "photo">
            <img src="<?php echo $imageFolder . '/' . $filename . '.' . $extension; ?>" alt="<?php echo $filename; ?>">
        </div>
        <div id = "info">
            <?php 
            include "../backend/findMovieInfo.php";
            $data = movieData($filename);
            if(!empty($data)){
            ?>
            <h2>Title: <?php echo $data['title'];?></h2>
            <p>Release Year: <?php echo $data['release_year'] ;?> </p>
            <p>Genre: <?php echo $data['genre'];?> </p>
            <a href = "../backend/charUp.php?name=<?php echo $data['title'];?>">Characters</a>
            <h3>About</h3>
            <p><?php echo $data['description'] ;?> </p></p>
            <br/>
            <h3>Comments</h3>
            <div id = "comments">
                <?php
                include '../backend/getComments.php';
                include "../backend/findUserInfo.php";
                $answer = getComments($filename);
                while($ans = $answer->fetch_assoc()){
                    $user = findUserWithID($ans['UserID']);
                    $id =  $user->fetch_assoc();

                    echo "<div style= 'display:flex; flex-direction:row;justify-content:space-between;'>";
                    echo "<p>" . $ans['DatePosted'] . "</p>";
                    echo "<p>" . $id['username']  . "</p>";
                    echo "</div>";
                 
                    echo "<div style= 'display:flex; flex-direction:row;justify-content:space-between;'>";
                    echo "<p>" . $ans['CommentText'] . "</p>";
                    if (findUserInfo()['user_id'] === $id['user_id']){
                        $old = $ans['CommentText'];
                        
                    echo '<i class="fas fa-pen-to-square" id="editIcon"></i>';
                    ?>
                    <form action="../backend/editcomment.php?cid=<?php echo $ans["CommentID"]?>" method="post" id="editForm" style="display: none;">
                        <input type="text" name="comment" id="cmt" value="<?php echo $old;?>" placeholder="Edit Comment...">
                        <input type="submit" name="addcomment">
                    </form>
                    <script>
                        document.getElementById('editIcon').addEventListener('click', function() {
                            var form = document.getElementById('editForm');
                            if (form.style.display === 'none' || form.style.display === '') {
                                form.style.display = 'block';
                            } else {
                                form.style.display = 'none';
                            }
                        });
                    </script>
                    <?php    
                    };
                    echo "</div>";
                }
                ?>
            </div>
            <form action= "../backend/addcomment.php?movie=<?php echo $filename;?>" method= 'post'>
            <input type = 'text' name = "comment" id = "cmt" placeholder="Add a Comment...">   
            <input type = 'submit' name = "addcomment">
            </form>

        </div>

    </div>
    <?php
            }
}
?>

</body>
</html>