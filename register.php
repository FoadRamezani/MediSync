<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $checkUser = $conn->query("SELECT * FROM users WHERE username='$username'");

    if ($checkUser) {
        if ($checkUser->num_rows == 0) {
            // Insert user into database
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            if ($conn->query($sql) === TRUE) {
                // Redirect to index.php with success message
                header("Location: index.php?register=success");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "User already exists";
        }
    } else {
        echo "Error: Could not execute query: " . $conn->error;
    }
}
?>
