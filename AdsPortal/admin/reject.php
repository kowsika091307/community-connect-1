<?php
session_start();
include ('db.php');
include("header.php");
if(isset($_GET['id'])){ $id=$_GET['id']; }

$query=mysqli_query($conn,"UPDATE `ads` SET `status`='rejected' where id=".$id) or die(mysqli_error());
if($query)
{
	header('location:dashboard.php');
}
else { echo "Nothing to update"; }
?>