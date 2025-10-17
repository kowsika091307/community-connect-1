<?php
session_start();
include ('db.php');
include("header.php");
?>
<div class="container-fluid">
<center><img src="./assets/images/banne.png" alt="topbanner"></center>
</div>
<div class="container">
<div class="topnav" id="myTopnav">
  <a href="index.php" >Home</a>
  <a href="login.php">Login</a>
  <a href="register.php"> Register</a>
  <a href="contact.php" class="active">Contact</a>
  <a href="about.php">About</a>
  
 </form>
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
<div class="col-sm-4"></div>
<div class="col-sm-4" style="background-color:#dadce5;">
<hr>
<h2 align="center"> Write to us </h2>
<hr>
<?php
 if(isset($_POST['fdback']))
 {
	 echo "<script>alert('Feedback sent successfully');</script>";
 }
?>
<form method="post" action="contact.php">
    Full Name: <input class="form-control" type="text" name="fname"><br>
	Email: <input class="form-control" type="email" name="email"><br>
    Write your feedback:
	<textarea class="form-control" name="fdback"></textarea><br>
    <input type="submit" class="btn btn-primary" value="Send">
</form>
</div>
<div class="col-sm-4"></div>
</div>
</div>
<?php include("footer.php"); ?>