<?php
require_once 'includes/db.php';
session_start();

if ($_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM ads";
$result = mysqli_query($conn, $query);

while ($ad = mysqli_fetch_assoc($result)) {
    echo "Ad Title: " . $ad['title'] . " - " . $ad['status'] . "<br>";
    echo "<a href='approve_ad.php?id=" . $ad['id'] . "'>Approve</a> | 
          <a href='reject_ad.php?id=" . $ad['id'] . "'>Reject</a><br>";
}
?>
