<?php
require_once '../../database/authcontroller.php';
$uid = $_SESSION['id'];

$id=$_GET['id'];

$iosql = "DELETE FROM tickets WHERE qr_code= '$id'";
$iores = mysqli_query($conn, $iosql) or die(mysqli_error($conn));
// echo $iosql;
header("location: checkout");

?>