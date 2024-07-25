<?php
$servername = "127.0.0.1";
$username = ""; // replace with your database username
$password = ""; // replace with your database password
$dbname = "project_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
