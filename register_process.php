<?php
// Include the configuration file
require_once('includes/config.php');

// Include the functions file
require_once('functions.php');



if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password for security
    $email = $_POST['email'];

    // SQL query to check if the email already exists
    $checkEmailQuery = "SELECT email FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Email already exists
        echo "Email address already exists. Please choose another one.";
    } else {
        // Email does not exist, proceed with inserting the new record
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $password, $email);
        if ($stmt->execute()) {
            // Registration successful, redirect to login page
            header("Location: login.php");
            exit();
        } else {
            // Handle registration failure
            echo "Error: " . $stmt->error;
        }
    }

   

    $stmt->close();
}



?>
