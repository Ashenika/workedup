<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'ashcakes';
// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

mysqli_select_db($conn,$db);
?>