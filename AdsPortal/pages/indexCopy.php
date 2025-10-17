<?php
session_start();
require_once 'db.php';
// Fetch all approved ads from the database
$query = "SELECT * FROM ads WHERE status = 'approved'";
$result = mysqli_query($conn, $query);
// Fetch logged-in user data if any
$user_logged_in = isset($_SESSION['user_id']);
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
	
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
<center><img src="./assets/images/banner.png" alt="topbanner"></center>
</div>
<div class="container">
<div class="topnav" id="myTopnav" style="z-index:1;">
  <a href="index.php" class="active" >Home</a>
   <?php if ($user_logged_in): ?>
  <a href="dashboard.php">Dashboard</a>
  <a href="place_ad.php"> Place an Ad</a>
  <a href="logout.php">Logout</a>
  <?php else: ?>
 <a href="login.php">Login</a>
 <a href="register.php">Register</a>
   <a href="contact.php">Contact</a>
  <a href="about.php">About</a>
  <?php endif; ?>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
		x.className = "topnav";
  }
}
</script>
</div>
</div>
   

<?php// include("footer.php"); ?>
</body>
</html>

<!-- width="210" height="150" -->