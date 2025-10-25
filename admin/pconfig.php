<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "pmaroot";
$dbPassword = "yIGMS1+7fmOHmMasvamEkQ==";
$dbName     = "crownstone";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>