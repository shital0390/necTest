<?php
$dbHost = 'localhost'; 
$dbUsername = 'root'; 
$dbPassword = ''; 
$dbName = 'necTest';

// Create a database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>