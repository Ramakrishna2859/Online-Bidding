<?php
include "server.php";
session_start();
$bid = $_GET['comment'];
$pid = $_GET['rid'];
$user_id = $_SESSION['uid'];
$qry = "INSERT INTO `tbl_comments` ( `bid_amount`, `user_id` ,`product_id`)
VALUES ('$bid', '$user_id', '$pid');";
mysqli_query($conn,$qry) or die("error running query: ".$qry);

$qry2 = "SELECT * FROM `user` where `uid` = '$user_id'";
$sql2 = mysqli_query($conn,$qry2) or die("error running query: ".$qry2);
$row2=mysqli_fetch_assoc($sql2);
echo "<div class='bid'>";
echo "By:<b>".$row2['username']."</b><br>";
echo $bid;
echo "</div>";
?>