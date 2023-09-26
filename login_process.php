<?php

require_once('includes/config.php');
require_once('functions.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verify email and password
    // Prepare an SQL statement to retrieve the hashed password for the given email
    $sql = "SELECT password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // email exists in the database
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, login successful
            session_start();
            $_SESSION['email'] = $email; // Store user data in a session
            header("Location: dashboard.php"); // Redirect to the dashboard or another authorized page
            exit();
        } else {
            // Password is incorrect
            $loginError = "Invalid email or password";
        }
    } else {
        // email does not exist
        $loginError = "Invalid email or password";
    }
}
?>
