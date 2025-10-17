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
  <a href="contact.php">Contact</a>
  <a href="about.php" class="active">About</a>
   
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
<div class="container-fluid">
<div class="row">
<div class="col-sm-12" style="background-color:#dadce5;">
<hr>
<h2 align="center">About us </h2>
<hr>
<p>
    Community Connect is more than just a social network—it's a digital neighborhood built to bring people closer, one conversation at a time.
We believe that strong communities start with meaningful connections. Whether you're looking to share local updates, discover nearby events, support small businesses, or simply find someone who shares your interests, Community Connect is your space to belong.
</p>
</div>

</div>
</div>
<?php include("footer.php"); ?>