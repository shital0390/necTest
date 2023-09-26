<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Home Page</title>
</head>
<body>
    <header class="header">
        <h1>Welcome to My Website</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php
            // Check if the user is logged in and show appropriate links
            session_start();
            if (isset($_SESSION['email'])) {
                echo '<li><a href="dashboard.php">Dashboard</a></li>';
                echo '<li><a href="upload.php">Upload File</a></li>';
                echo '<li><a href="logout.php">Logout</a></li>';
            } else {
                echo '<li><a href="login.php">Login</a></li>';
                echo '<li><a href="register.php">Register</a></li>';
            }
            ?>
        </ul>
    </nav>

    <main class="main">
        <h2>Welcome to Our Website</h2>
        <p>some info here </p>
    </main>

    <footer class="footer">
        <p>&copy; 2023 My Website</p>
    </footer>
</body>
</html>