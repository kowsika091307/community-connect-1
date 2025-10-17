<?php
session_start();
include ('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid email or password!";
    }
}
include("header.php");
?>
<div class="container-fluid">
<center><img src="./assets/images/banne.png" alt="topbanner"></center>
</div>
<div class="container">
<div class="topnav" id="myTopnav">
  <a href="index.php">Home</a>
  <a href="login.php" class="active">Login</a>
<!--  <a href="register.php"> Register</a>
  <a href="contact.php">Contact</a>
  <a href="about.php">About</a> -->
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
<h2 align="center"> Admin Login </h2>
<hr>
<form method="post" action="login.php">
    Email: <input class="form-control" type="email" name="email"><br>
    Password: <input class="form-control" type="password" name="password"><br>
    <input type="submit" class="btn btn-primary" value="Login">
</form>
</div>
<div class="col-sm-4"></div>
</div>
</div>