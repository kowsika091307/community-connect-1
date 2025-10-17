<?php
require_once 'db.php';
session_start();
include("header.php");
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM ads WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);
$user_logged_in = isset($_SESSION['user_id']);
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
  <a href="index.php">Home</a>
   <?php if ($user_logged_in): ?>
  <a href="dashboard.php"  class="active" >Dashboard</a>
  <a href="place_ad.php"> Place an Ad</a>
  <a href="logout.php">Logout</a>
  
 </form>s
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
    <main>
        
		<div class="container">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="row" style=" background-color:white; border-radius:10px; padding:2px;" >
				<h5 style="padding:10px;"><center><u>My Ads</u></center></h5>
				 <div class="col-sm-12" style="border-radius:10px; background-color:white; margin:auto; ">
				 <table border="1" style="width:100%; border-radius:10px; " cellpadding="5" cellspacing="0">
				<tr><th><center><u>Sno</u></center></th><th><u>Image</u></th><th><u>Title</u></th><th><center><u>Action</u></center></th></tr>
				<tr><td colspan="4"><hr></td></tr>
                <?php $i=1; while ($ad = mysqli_fetch_assoc($result)): ?>
				<tr><td align="center"><?php echo $i; ?></td>
					<td><a href="view.php?id=<?php echo $ad['id']; ?> ">
					    <img src="adimages/<?php echo $ad['img']; ?>" alt="img" width="120" style="padding:1px;" /></a>
					</td>
                    <td><h2 style="font-size:0.9em;font-weight:bold;"><?php echo htmlspecialchars($ad['title']); ?></h2></td>
				    <td colspan="2">
					    <p align="center"><a class="btn btn-primary" href="view.php?id=<?php echo $ad['id']; ?>">View Ad</a></p>
					    <p align="center"><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Ad?');" href="delete.php?id=<?php echo $ad['id']; ?>">Delete Ad</a></p>
						<p align="center"><b>Ad Status:</b> <?php echo ucwords($ad['status']); ?></p>
					</td>
				</tr>	
				<tr><td colspan="4"><hr></td></tr>
                <?php $i++; endwhile; ?>
				</table>
            </div></div>
        <?php else: ?>
            <p>No Ads are posted yet. Click <a href="place_ad.php">here</a> to place your first Ad.</p>
        <?php endif; ?>
		</div>
    </main>

<?php include("footer.php"); ?>
</body>
</html>