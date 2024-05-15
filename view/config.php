<?php

// Database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = ''; // Enter your database password here
$dbName = 'alemni'; // Enter your database name here

// Create connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


