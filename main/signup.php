<!DOCTYPE html>
<html lang="en">
<?php
// Check for error messages in the URL
$error = isset($_GET['error']) ? $_GET['error'] : null;

// Function to display error messages
function displayErrorMessage($error) {
    switch ($error) {
        case 'empty-email':
            return "Fill All Fields";
        case 'invalid-email':
            return "Invalid Email!";
        case 'empty-password':
            return "Fill All Fields";
        case 'empty-username':
            return "Fill All Fields";
        case 'connection-failure':
            return "Connection Error. Please try again Later";
        case 'already-exists':
            return "You already Have an Account! Log In";
        case 'taken-username':
            return "This username has been taken!";
        default:
            return "";
    }
}
?>   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link href = "../styles/login.css" rel = "stylesheet">
    <link rel = "icon" href = "/images/b.avif">
</head>
<body>
    <form method = "post" action="../backend/signupaction.php">
        <div id = "maindiv">
            <h1>Sign Up</h1>
            <input type = "text" name = "user" placeholder="Username">  
            <input type = "text" name = "email" placeholder="Email">    
            <input type = "password" id = "inputSe" name = "passwd" placeholder="Password">
            <input type = "submit" id = "button" name = "signup">Log In </input>
            <a href = "login.php"><p style="color: white; font-weight: bolder; text-align: center;">Log In</p></a>
            <?php
                if (!empty($error)) {
                    echo '<p class = "glow">' . displayErrorMessage($error) . '</p>';
                }
            ?>  
        </div>
    </form>
    
</body>
</html>