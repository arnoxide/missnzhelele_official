<?php 
require_once '../database/authcontroller.php';



    if(isset($_GET['quantity'])){
        $quantity = $_GET['quantity'];
    }else{
        $quantity = 1;
    }


    $_SESSION['cart'][$id] = array('quantity' => $quantity);
    header('location:index');

    echo '<pre>';
    print_r($_SESSION['cart']);

    echo '</pre>';

    
