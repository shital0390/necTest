<?php
// Include the configuration file
require_once('includes/config.php');

if (isset($_POST['register'])) {
    $username 			= isset($_POST['username'])?$_POST['username']:'';
    $confirm_password 	= isset($_POST['confirm_password'])?$_POST['confirm_password']:'';
	$password 			= isset($_POST['password'])?$_POST['password']:'';
	$email 				= isset($_POST['email'])?$_POST['email']:'';
	if($password !== $confirm_password){ // if both passwords are not match then show error
		session_start();
		$_SESSION['registerErr'] = "password and Confirm Password must match!";
		 header("Location: register.php");
		exit();	
	}
	
    $password 	= password_hash($password, PASSWORD_BCRYPT); // Hash the password for security
    // SQL query to check if the email already exists
    $checkEmailQuery = "SELECT email FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
	
    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Email already exists
		session_start();
		$_SESSION['registerErr'] = "Email address already exists. Please choose another one.";
		 header("Location: register.php");
		exit();
    } else {
        // Email does not exist, proceed with inserting the new record
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $password, $email);
        if ($stmt->execute()) {
            // Registration successful, redirect to login page
			session_start();
			$_SESSION['registerSuccess'] = "Registration is successful, please login to continue.";
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $stmt->error; exit();
        }
    }
    $stmt->close();
}



?>
