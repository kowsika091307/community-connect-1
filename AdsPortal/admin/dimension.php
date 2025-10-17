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
  <a href="index.php">Home</a>
  <?php if ($user_logged_in): ?>
  <a href="dashboard.php">Dashboard</a>
  <a href="category.php" >Manage Category</a>
  <a href="dimension.php"  class="active">Manage No of Days</a>
  <a href="place_ad.php"> Place an Ad</a>
  <a href="logout.php">Logout</a>
  <?php else: ?>
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
		<div class="row">
			<div class="col-sm-6" style="background-color:white;">
			<hr>
			<h2 align="center">Create New Ad Days</h2>
			<?php
			if(isset($_POST['dimn']))
			{
				$dimn=$_POST['dimn'];
				$uom=$_POST['uom'];
				$price=$_POST['price'];
			$q=mysqli_query($conn,"INSERT INTO `dimenson`(`dimn`, `uom`,`price`) VALUES ('$dimn','$uom','$price')") or die(mysqli_error());
			if($q)
			{
				echo "<h5 align='center' style='color:green; font-weight:bold;'>Dimension Added Successfully</h6>";
			}
					}
			?>
			<hr>
			<form action="dimension.php" method="POST">
			No of Days
			<input type="text" class="form-control" name="dimn" placeholder="Count" required/><br>
			Unit of Measurement
			<input type="text" class="form-control" name="uom" placeholder="UOM [ Days]" required/><br>
			Price
			<input type="text" class="form-control" name="price" placeholder="Price" required/><br>
			
			<br>
			<input type="submit" class="btn btn-primary" value="Submit">
			</form>
			</div>
			
			<div class="col-sm-6" style="background-color:white;overflow-y:hidden;">
			<hr>
			<h2 align="center">No of Days List</h2>
			<hr>
			<table style="width:100%; padding:5px;" cellpadding="5" border="1">
			<tr>
			<th><u>Sno</u></th>
			<th><u>No of Days</u></th>
			<th><u>UOM</u></th>
			<th><u>Price</u></th>
			<th><u>Action</u></th>
			</tr>
			<?php
			$query=mysqli_query($conn,"SELECT * FROM `dimenson`") or die(mysqli_error());
			while($rw=mysqli_fetch_array($query))
			{
				?>
				<tr>
				<td><?php echo $rw['sno']; ?></td>
				<td><?php echo $rw['dimn']; ?></td>
				<td><?php echo $rw['uom']; ?></td>
				<td><?php echo $rw['price']; ?></td>
				<td><a onclick="return confirm('Are you sure you want to remove this dimension?');" href="dremove.php?id=<?php echo $rw['sno']; ?>">Remove</a></td>
				</tr>
				<?php
			}
			?>
			</table>
			
			</div>
		</div>
		</div>
    </main>

<?php include("footer.php"); ?>
</body>
</html>

<!-- width="210" height="150" -->