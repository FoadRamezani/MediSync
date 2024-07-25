<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the connection to the database was successful
    if ($conn->connect_error) {
        header("Location: index.php?login=sqlfail");
        exit();
    }

    // Validate inputs
    if (empty($username) || empty($password)) {
        header("Location: index.php?login=missingvalues");
        exit();
    }

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        if ($result->num_rows > 0) {
            // User found, redirect to dashboard or home page
            header("Location: dashboard.php");
            exit();
        } else {
            // Invalid username or password
            header("Location: index.php?login=incorrect");
            exit();
        }
    } else {
        // Query failed
        header("Location: index.php?login=sqlfail");
        exit();
    }
}
?>
