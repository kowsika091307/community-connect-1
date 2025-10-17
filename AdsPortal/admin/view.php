<?php
session_start();
include ('db.php');
include("header.php");
$user_logged_in = isset($_SESSION['user_id']);
if(isset($_GET['id'])){ $id=$_GET['id']; }
?>
<div class="container-fluid">
<center><img src="./assets/images/banne.png" alt="topbanner"></center>
</div>
<div class="container">
<div class="topnav" id="myTopnav">
  <a href="index.php">Home</a>
   <?php if ($user_logged_in): ?>
  <a href="dashboard.php"  class="active" >Dashboard</a>
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
<div class="container">
<div class="row">

<div class="col-sm-8">
<?php

$query=mysqli_query($conn,"SELECT * from ads where id=".$id) or die(mysqli_error());
if($rs=mysqli_fetch_array($query))
{
	
?>
<div class="col-sm-12">
<img src="../pages/adimages/<?php echo $rs['img']; ?>" alt="img" height="400" style="width:100%;" />
</div>

</div>

<div class="col-sm-4" style="background-color:whitesmoke;"><br>
<h3><?php echo $rs['title']; ?></h3><br>
<h6><?php 

$aa= $rs['ad_dimension']; 
						$q=mysqli_query($conn,"SELECT * from `dimenson` where sno=".$aa);
						if($rw=mysqli_fetch_array($q)) {  $rw['dimn']; }
echo "<b>Days:</b><br>".$rw['dimn']; ?></h6>
<br>
<h6><b>Description:</b> <br><?php echo $rs['description']; ?></h6><br>

<h6><b>Ad Posted by:</b> <br>
<?php $ai= $rs['user_id']; 
						$q=mysqli_query($conn,"SELECT * from `users` where id=".$ai);
						if($rw=mysqli_fetch_array($q)) {  $rw['name']; }
echo ucwords($rw['name']); ?>
</h6><br>

<h6><b>Ad posted on:</b><br><?php echo $rs['created_at']; ?></u></h6><br>

</div>

<?php
}
?>

</div>
<?php include("footer.php"); ?>