<?php 
require_once '../../database/authcontroller.php';

if(isset($_GET['id'])){
$id = $_GET['id'];
unset($_SESSION['cart'][$id]);

header('location:index.php');
}