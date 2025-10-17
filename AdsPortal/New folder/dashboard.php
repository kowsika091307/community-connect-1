<?php
require_once 'includes/db.php';
session_start();

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM ads WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

while ($ad = mysqli_fetch_assoc($result)) {
    echo "Ad Title: " . $ad['title'] . "<br>";
    echo "Status: " . $ad['status'] . "<br>";
    echo "Price: $" . $ad['price'] . "<br><br>";
}
?>
