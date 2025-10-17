<?php
header('Content-Type: text/plain; charset=utf-8');
include("db.php");

if (isset($_POST['item_id'])) {
    $item_id = intval($_POST['item_id']);

  /*   $stmt = $conn->prepare("SELECT `price` FROM `dimenson` WHERE sno = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result(); */
$qry=mysqli_query($conn,"SELECT `price` FROM `dimenson` WHERE sno =".$item_id);

    if (mysqli_num_rows($qry) > 0) {
        $row = mysqli_fetch_array($qry);
        echo trim($row['price']);
		//echo "success";
    } else {
        echo "0";
    }
}
?>
