<!DOCTYPE html>
<html lang="en">
<?php
$uname=isset($_GET['uname']) ? $_GET['uname'] : null;
// Check for error messages in the URL
$error = isset($_GET['error']) ? $_GET['error'] : null;

// Function to display error messages
function displayErrorMessage($error) {
    switch ($error) {
        case 'invalid_credentials':
            return "User Not Found";
        case 'empty-password':
            return "Password is required.";
        case 'empty-username':
            return "Username is required.";
        case 'already-exists':
            return "You already Have an Account! Log In";
        case 'not-logged-in':
            return "You're not Logged in";
        default:
            return "";
    }
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TriviaMania Home</title>
    <link href = "../styles/login.css" rel = "stylesheet">
    <link rel = "icon"  href= "../images/b.avif">
</head>

<body>
<form id = "loginForm" action = "../backend/loginaction.php" method = "post">
<div id = "maindiv">
    <h1>WELCOME!!</h1>
    <input type = "text" name = "user" placeholder="Username" value= <?php $username = "";
    if (isset($_GET['user']))
        $username = $_GET['user'];
    echo $username;
    ?>>    
    <input type = "password" name="pass" id = "inputSe" placeholder="Password">
    <input type = "submit" id = "button" name = "login">Log In</input>
    <div id = "textdiv">
        <a href = "signup.php"><p style="color: white; font-weight: bolder; text-align: center;">Sign Up</p></a>      
    </div>
    <?php
        if (!empty($error)) {
            echo '<p class = "glow">' . displayErrorMessage($error) . '</p>';
        }
    ?>  
</div>
</form>
</body>
</html>

