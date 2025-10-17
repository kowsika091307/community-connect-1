<?php
session_start();
require_once 'db.php';
error_reporting(0);
// Fetch all approved ads from the database
$query = "SELECT * FROM ads WHERE status = 'approved'";
$result = mysqli_query($conn, $query);
// Fetch logged-in user data if any
if(isset($_SESSION['user_id'])) 
{
	$user_logged_in = isset($_SESSION['user_id']);
}
else{ header("location:login.php"); }
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Community Connect - Local Social Network - Home</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<div class="container">
<center><img src="./assets/images/banne.png" alt="topbanner"></center>
</div>
<div class="container">
<div class="topnav" id="myTopnav">
  <a href="index.php" class="active" >Home</a>
   <?php if ($user_logged_in): ?>
  <a href="dashboard.php">Dashboard</a>
  <a href="category.php">Manage Category</a>
  <a href="dimension.php">Manage No Of Days</a>
  <a href="place_ad.php"> Place an Ad</a>
  <a href="logout.php">Logout</a>
  <?php else: ?>
    <a href="dashboard.php">Home</a>
 <a href="login.php">Login</a>
<!-- <a href="register.php">Register</a>
   <a href="contact.php">Contact</a>
  <a href="about.php">About</a> -->
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
    <main>
        
		<div class="container">
		<h5 style="padding:10px;"><u>Approved Ads</u></h5>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="row">
                <?php while ($ad = mysqli_fetch_assoc($result)): ?>
                    <div class="col-sm-2" style="border-radius:10px; background-color:white; margin:auto; border:1px solid #CCC;">
					<a href="view.php?id=<?php echo $ad['id']; ?> ">
					<img src="../pages/adimages/<?php echo $ad['img']; ?>" alt="img" height="120" style="width:99%; padding:1px;" /></a>
					<hr>
                        <h2 style="font-size:0.9em;font-weight:bold;"><?php echo htmlspecialchars($ad['title']); ?></h2>
                        <p style="font-size:0.7em;"><strong>Dimension:</strong> 
						<?php 
						$aa= $ad['ad_dimension']; 
						$q=mysqli_query($conn,"SELECT * from `dimenson` where sno=".$aa);
						if($rw=mysqli_fetch_array($q)) { echo $rw['dimn']; }
						?></p>
                        <p style="font-size:0.7em;"><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($ad['description'])); ?></p>
                       <!-- <p style="font-size:0.7em;"><strong>Price:</strong> Rs.<?php //echo number_format($ad['price'], 2); ?></p> -->
						<p align="center"><a class="btn btn-primary" href="view.php?id=<?php echo $ad['id']; ?> ">View Ad</a></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No approved ads available at the moment.</p>
        <?php endif; ?>
		</div>
    </main>

<?php include("footer.php"); ?>
</body>
</html>

<!-- width="210" height="150" -->