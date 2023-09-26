<?php 
session_start(); // Start the session

// Check if a login error message is set
if (isset($_SESSION['loginError'])) {
    $loginError = $_SESSION['loginError'];
    unset($_SESSION['loginError']); 

    // Display the error
    echo '<div class="alert alert-danger">' . $loginError . '</div>';
}
if(isset($_SESSION['registerSuccess'])){
	$registerSuccess = $_SESSION['registerSuccess'];
	unset($_SESSION['registerSuccess']); 
	// Display success msg
    echo '<div class="alert alert-success">' . $registerSuccess . '</div>';
}
?>

<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>User Login</title>
</head>
<body>
    
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Login</h2>
			
            <form action="login_process.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <br/>
                <button type="submit"  name="login" class="btn btn-primary">Login</button>

               <a href="index.php" class="btn btn-secondary mt-3">Go to Homepage</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
