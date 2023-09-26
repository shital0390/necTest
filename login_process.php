<?php

require_once('includes/config.php');

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
            $_SESSION['email'] = $email; // Store email in session
            header("Location: dashboard.php"); // Redirect to the dashboard
            exit();
        } else {
            // Password is incorrect
			 session_start();
            $_SESSION['loginError'] = "Invalid email or password"; // Store error message in a session
            header("Location: login.php"); // Redirect back to the login page
            exit();
            
        }
    } else {
        // email does not exist
		 session_start();
        $_SESSION['loginError'] = "Invalid email or password"; // Store error message in a session
        header("Location: login.php"); // Redirect back to the login page
        exit();
       
    }
}
?>
