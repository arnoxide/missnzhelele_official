
<?php
require_once '../../database/authcontroller.php';
$cart = $_SESSION['cart']; 
require_once('../yoco/vendor/autoload.php');


?>
 <?php 
	$total = 0;
    foreach($cart as $key => $value){
     $types =  $value['type'];
      if($types == 'General'){
        $price = '100';
        $totals = $total + ($price * $value['quantity']);
        $convert = '100';
        $final = $convert * $totals;
      }else{
        $price = '2';
        $totals = $total + ($price * $value['quantity']);
        $convert = '100';
        $final = $convert * $totals;
      }
 
    }
?>
<?php

    // Your Yoco public and secret keys
    $uid = $_SESSION['id'];
    // values extracted from request
    $tokenId = $_POST["tokenId"];
    $cart = $_SESSION['cart']; 
                              $total = 0;
                                foreach($cart as $key => $value){
                                $price = '2';
                                $totals = $total + ($price * $value['quantity']);
                                $convert = '100';
                                $final = $convert * $totals;
                                }
    // values extracted from request
    $data = [
        'token' => $tokenId, // Your token for this transaction here
        'amountInCents' => $final, // payment in cents amount here
        'currency' => 'ZAR' // currency here
    ];
    
    // Anonymous test key. Replace with your key.
    $secret_key = 'sk_live_246bcec0q9AWpxn3fb14195bc09a';
    $public_key= 'pk_live_027bef86P43yrEXfc444';
    // Initialise the curl handle
    $ch = curl_init();
    
    // Setup curl
    curl_setopt($ch, CURLOPT_URL,"https://online.yoco.com/v1/charges/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    
    // Basic Authentication method
    // Specify the secret key using the CURLOPT_USERPWD option
    curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ":");
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    
    // send to yoco
    $result = curl_exec($ch);
    // Log::debug(curl_getinfo($ch, CURLINFO_HTTP_CODE));
    echo "HTTP status code: " . curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // close the connection
    curl_close($ch);
    
    // convert response to a usable object
    $response = json_decode($result);
    
    // Initialize the client with your keys
    $client = new \Yoco\YocoClient($secret_key, $public_key);
  
    try{
        // use the token received from the Web SDK
        $client->charge($tokenId, $data, $data);
    
    
    } catch (\Yoco\Exceptions\ApiKeyException $e) {
        error_log("API keys incorrect: " . $e->getMessage());
    } catch (\Yoco\Exceptions\DeclinedException $e) {
        error_log("Charge declined with error: " . $e->getMessage());
    } catch (\Yoco\Exceptions\InternalException $e) {
        error_log("Unknown error: " . $e->getMessage());
    }
    header("url:mk");
    // $sales_id = $_GET['id'];
    // $isql= "UPDATE tickets SET status='Paid' WHERE qr_code='$sales_id'";
    // $iores = mysqli_query($conn, $isql) or die(mysqli_error($conn));
    
    // $uid = $_SESSION['id'];
    // $sql = "SELECT * FROM tickets WHERE qr_code='$sales_id'";
    // $res = mysqli_query($conn, $sql);
    // $r = mysqli_fetch_assoc($res);
    // $count = mysqli_num_rows($res);
    
    // if($count == 1){
    
    
    // unset($_SESSION['cart']);
    // }

?>