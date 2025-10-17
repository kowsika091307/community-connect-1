<?php
require_once 'includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $ad_dimension = $_POST['dimension'];
    $price = $_POST['price'];

    $query = "INSERT INTO ads (user_id, title, description, ad_dimension, price) 
              VALUES ('$user_id', '$title', '$description', '$ad_dimension', '$price')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Ad successfully placed!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="post" action="place_ad.php">
    Title: <input type="text" name="title"><br>
    Description: <textarea name="description"></textarea><br>
    Ad Dimension: 
    <select name="dimension">
        <option value="300x250">300x250</option>
        <option value="728x90">728x90</option>
        <option value="160x600">160x600</option>
    </select><br>
    Price: <input type="text" name="price"><br>
    <input type="submit" value="Place Ad">
</form>
