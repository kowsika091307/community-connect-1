<?php
// Include the config file to access the database settings
require_once 'config.php';

// Create a connection to the MySQL database using mysqli
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check if the connection is successful
if (!$conn) {
    // If the connection fails, display an error and terminate the script
    die("Connection failed: " . mysqli_connect_error());
}

// Set the character set for the connection (important for proper encoding)
mysqli_set_charset($conn, 'utf8');
?>
