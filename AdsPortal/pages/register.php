<?php
include('db.php'); // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$mob=$_POST['mob']; $addr=$_POST['addr']; $city=$_POST['addr'];

    $query = "INSERT INTO `users`(`id`, `name`, `email`, `password`, `mobile`, `city`, `addr`) VALUES (NULL, '$name', '$email', '$password', '$mob', '$city', '$addr')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
include("header.php");
?>
<div class="container-fluid">
<center><img src="./assets/images/banne.png" alt="topbanner"></center>
</div>
<div class="container">
<div class="topnav" id="myTopnav">
  <a href="index.php" >Home</a>
  <a href="login.php">Login</a>
  <a href="register.php" class="active"> Register</a>
  <a href="contact.php">Contact</a>
  <a href="about.php">About</a>
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
<h2 align="center"> Registration </h2>
<hr>
<form method="post" action="register.php">
    Name: <input type="text" class="form-control" name="name"><br>
    Email: <input type="email" class="form-control" name="email"><br>
    Password: <input type="password" class="form-control" name="password"><br>
    Mobile no: <input type="text" class="form-control" name="mob"><br>
	City: <input type="text" class="form-control" name="city"><br>
	Address:
	<textarea name="addr" class="form-control" placeholder="Full address"></textarea><br>
	<input type="submit" class="btn btn-primary" value="Register">
	
</form>
</form>
</div>
<div class="col-sm-4"></div>
</div>
</div>
<?php include("footer.php"); ?>