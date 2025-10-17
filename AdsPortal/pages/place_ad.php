<?php
session_start();
error_reporting(0);
require_once 'config.php';
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (!$conn) {
    // If the connection fails, display an error and terminate the script
    die("Connection failed: " . mysqli_connect_error());
}

// Set the character set for the connection (important for proper encoding)
mysqli_set_charset($conn, 'utf8');

$user_logged_in = isset($_SESSION['user_id']);

//$sl = $conn->query("SELECT id, dimn FROM dimenson");

?>
<html>
<head>
<link rel="stylesheet" href="../assets/css/bootstrap.css"/>
	 <link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
	 <link rel="stylesheet" href="../assets/css/style.css"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
   </head>
   <body>
 <div class="container">
<center><img src="./assets/images/banne.png" alt="topbanner"></center>
</div>
<div class="container">
<div class="topnav" id="myTopnav">
  <a href="index.php" >Home</a>
   <?php if ($user_logged_in): ?>
  <a href="dashboard.php">Dashboard</a>
  <a href="place_ad.php"  class="active"> Place an Ad</a>
  <a href="logout.php">Logout</a>
 
 </form>
  <?php else: ?>
 <a href="login.php">Login</a>
 <a href="register.php">Register</a>

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
<div class="col-sm-3"></div>
<div class="col-sm-6" style="background-color:#dadce5;">
<hr>
<h2 align="center"> Create Ad </h2>
<hr>
<?php

	if (isset($_POST['tid'])) {
		$tid=$_POST['tid'];
		$aa=$_POST['ss'];
		//echo $tid;
		//echo $aa;
		$qrr=mysqli_query($conn,"UPDATE `ads` SET `tid`='$tid' where id=".$aa)or die(mysqli_error());
		//query
		if($qrr)
		{
	 echo "<h6 align='center' style='color:green; font-weight:bold;'>You Ad has been sent for approval. <br> It will be published within an hour. Thank you for choosing us...!</h6>";
		}
}


if (isset($_POST['title'])) {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $ad_dimension = $_POST['items'];
    $price = $_POST['price'];
	$cate =$_POST['cate'];
	$dat=$_POST['dat'];

$folder = "C:/xampp/htdocs/AdsPortal/pages/adimages/"; $rd = round(microtime(true));
						$img="$rd".rand(10,10000).$_FILES["photos"]["name"]; $img = preg_replace('/\s+/', '', $img); $img = preg_replace('/\(|\)/','',$img);
						move_uploaded_file($_FILES["photos"]["tmp_name"] , "$folder"."$img");
						//$tag[]=$_POST['tags'];
						 $jsonData = $_POST['tags'];
						  $tag = json_decode($jsonData, true);
					//	echo count($tag);
				
					//	 $tagsArray = implode(",", $tag);
							 //echo $tagsArray[]; 
$status="pending";
    $query = "INSERT INTO ads (user_id, title, description, ad_dimension, price, status,cate, img, doe) 
              VALUES ('$user_id', '$title', '$description', '$ad_dimension', '$price','$status','$cate','$img','$dat')";
    $result = mysqli_query($conn, $query);
	
    if ($result) {
		$qq=mysqli_query($conn,"SELECT max(id) from `ads`") or die(mysqli_error());
		$aa=mysqli_fetch_assoc($qq); $ss=implode(" ",$aa);
		$cnt= count($tag);
		 for($i=0; $i<$cnt; $i++)
		 {
			// echo $tagsArray[0];
			
		 }
		 
		 	foreach ($tag as $item) {
                if (isset($item['value'])) {
                  //  echo $item['value'] . "<br>"; // Output: fff hhh
					$qqq=mysqli_query($conn,"INSERT INTO `tags`(`adid`, `tags`) VALUES ('$ss','".$item['value']."')") or die(mysqli_error());
                }
            }
	 
        echo "<h6 style='color:maroon; font-weight:bold;' align='center'>Your Ad has been saved as draft.<br>Please scan the QR and make payment. <br><br>Do not forget to enter the Transaction ID below, <br>to set active your Ad.</h6>";
		echo "<center><img src='qr-code.png' alr='qr' /></center>";
		echo "<hr>";
		echo "<center><form action='#' method='POST'>
		      <input type='hidden' value='".$ss."' name='ss' />";
        /* echo "<input type='hidden' value='".$user_id."' name='ss' />";
		echo "<input type='hidden' value='".$price."' name='ss' />";
		echo "<input type='hidden' value='".$ss."' name='ss' />"; */
		echo "<input type='text' name='tid' placeholder='Transaction ID' required>";
		echo "<input type='submit' value='confirm'>";
		echo "</form></center><hr>";
		exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


?>
<form method="post" action="place_ad.php" enctype="multipart/form-data" id="tagsForm" >
    Title: <input type="text" class="form-control" name="title"><br>
    Description: <textarea class="form-control" name="description"></textarea><br>
    Ad No of Days: 
    <select id="items" name="items" class="form-control">
         <option value="">--Select Days--</option>
        <?php 
		$qry=mysqli_query($conn,"SELECT * FROM dimenson");
		while ($row = mysqli_fetch_array($qry)){ ?>
            <option value="<?php echo $row['sno']; ?>"><?php echo $row['dimn']; ?></option>
        <?php }; ?>
    </select><br>
    Price: <input type="text" class="form-control" name="price" id="price"/><br>
	 <div class="form-group">       
                        <label class="form-control-label text-uppercase">Ad image</label>
						<label for="photos"><img src="img/avatar.jpg" id="lblph" width="150" height="150" /> </label>
                        <input type="file" id="ph" name="photos" class="form-control" >
     </div><br>
	   <div class="form-group">       
                        <label class="form-control-label text-uppercase">Expiring Date</label>
                        <input type="date" id="dt" name="dat" class="form-control" >
     </div><br><br>
Select Category: 
    <select name="cate" class="form-control">
         <option value="">--Select Category--</option>
        <?php 
		$qry=mysqli_query($conn,"SELECT * FROM category");
		while ($row = mysqli_fetch_array($qry)){ ?>
            <option value="<?php echo $row['sno']; ?>"><?php echo $row['cname']; ?></option>
        <?php }; ?>
    </select><br>
	
     <label for="tags">Enter Tags:</label>
        <!--<input name="tags" id="tags" placeholder="Add tags" />-->
		<textarea name="tags" id="tags" placeholder="Add tags"></textarea>
	<br>
	
    <input type="submit" class="btn btn-primary" value="Place Ad">
	  <script>
       $(document).ready(function () {
    $('#items').change(function () {
        var item_id = $(this).val();
        if (item_id !== "") {
            $.ajax({
                url: 'get_price.php',
                type: 'POST',
                data: { item_id: item_id },
                success: function (response) {
                    $('#price').val(response.trim()); // Trim any whitespace
                },
                error: function () {
                    $('#price').val('Error fetching price');
                }
            });
        } else {
            $('#price').val('d'); // Clear the field if no item is selected
        }
    });
});

    </script>
</form>

</div>
<div class="col-sm-3"></div>
</div>
</div>
<script>
    document.getElementById("ph").onchange = function () {    var reader = new FileReader();
    reader.onload = function (e) { document.getElementById("lblph").src = e.target.result; }; reader.readAsDataURL(this.files[0]); };
</script>
  <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script>
        var input = document.getElementById('tags');
        new Tagify(input); // Initialize Tagify
    </script>

<?php include("footer.php"); ?>
</body>
</html>