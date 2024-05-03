<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sujitha"; // Replace "your_database_name" with the name of your database

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Select database
$conn->select_db($dbname);

echo ("Connected successfully");
?>
