<?php
require_once '../database/authcontroller.php';
require_once('vendor/autoload.php');

$cart = $_SESSION['cart'];

if(isset($_SESSION['cart'])){
	
	$total = 0;
	foreach($cart as $key => $value){
	$price = '5';
	$totals = $total + ($price * $value['quantity']);
	$convert = '100';
	$final = $convert * $totals;
	} 
	}
// values extracted from request
$tokenId = $_POST["tokenId"];



// values extracted from request
$data = [
    'token' => $tokenId, // Your token for this transaction here
    'amountInCents' => $total, // payment in cents amount here
    'currency' => 'ZAR' // currency here
];

// Anonymous test key. Replace with your key.
$secret_key = 'sk_live_4521052d6L97n25017440ed91caf';
$public_key= 'pk_live_e6b70a1dL9ykNGPe5734';
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

// echo $iosql = "INSERT INTO orders (uid, totalprice, orderstatus) VALUES ('$uid', '$total', 'Order Placed & not paid')";
// $iores = mysqli_query($conn, $iosql) or die(mysqli_error($conn));

// unset($_SESSION['cart']);
// header("location: yoco");

?>