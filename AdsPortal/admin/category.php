<?php
session_start();
require_once 'db.php';
error_reporting(0);

// Fetch all approved ads from the database
$query = "SELECT * FROM ads WHERE status = 'approved'";
$result = mysqli_query($conn, $query);

// Fetch logged-in user data if any
if(isset($_SESSION['user_id'])) {
    $user_logged_in = isset($_SESSION['user_id']);
} else { 
    header("location:login.php"); 
}
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
            <a href="category.php" class="active">Manage Category</a>
            <a href="dimension.php">Manage No of Days</a>
            <a href="place_ad.php">Place an Ad</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
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
            <!-- Create New Category -->
            <div class="col-sm-6" style="background-color:white;">
                <hr>
                <h2 align="center">Create New Category</h2>
                <?php
                if(isset($_POST['cate'])) {
                    $cate = $_POST['cate'];
                    $descc = $_POST['descc'];
                    $q = mysqli_query($conn,"INSERT INTO `category`(`cname`, `descc`) VALUES ('$cate','$descc')") or die(mysqli_error($conn));
                    if($q) {
                        echo "<h5 align='center' style='color:green; font-weight:bold;'>Category Added Successfully</h5>";
                    }
                }
                ?>
                <hr>
                <form action="category.php" method="POST">
                    Category name:
                    <input type="text" class="form-control" name="cate" placeholder="Category name" required/><br>
                    Description: 
                    <textarea class="form-control" name="descc" placeholder="Description (Optional)"></textarea>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Add New Category">
                </form>
            </div>

            <!-- Category List -->
            <div class="col-sm-6" style="background-color:white;overflow-y:hidden;">
                <hr>
                <h2 align="center">Category List</h2>
                <hr>
                <table style="width:100%; padding:5px;" cellpadding="5" border="1">
                    <tr>
                        <th><u>Sno</u></th>
                        <th><u>Category Name</u></th>
                        <th><u>Description</u></th>
                        <th><u>Action</u></th>
                    </tr>
                    <?php
                    $query = mysqli_query($conn,"SELECT * FROM `category`") or die(mysqli_error($conn));
                    $counter = 1; // continuous numbering
                    while($rw = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $counter++; ?></td>
                            <td><?php echo $rw['cname']; ?></td>
                            <td><?php echo $rw['descc']; ?></td>
                            <td>
                                <a onclick="return confirm('Are you sure you want to remove this category?');" href="cremove.php?id=<?php echo $rw['sno']; ?>">Remove</a>
                            </td>
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
