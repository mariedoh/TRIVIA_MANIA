<?php
// Database connection details
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "finals";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: ");
}


