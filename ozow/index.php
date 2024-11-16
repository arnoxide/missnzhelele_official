<?php

function generate_request_hash() {
    $siteCode = "THE-THE-323";
    $countryCode = "ZA";
    $currencyCode = "ZAR";
    $amount = 25.01;
    $transactionReference = "123";
    $bankReference = "ABC123";
    $cancelUrl = "http://missNzhelele/ozow/cancel.html";
    $errorUrl = "http://missNzhelele/ozow/error.html";
    $successUrl = "http://missNzhelele/ozow/success.html";
    $notifyUrl = "http://missNzhelele/ozow/notify.html";
    $privateKey = "JkFL1mG6591BCBzZkyYHeLoPBwNWgpko";
    $isTest = "false";
    
    $inputString = $siteCode . $countryCode . $currencyCode . $amount . $transactionReference . $bankReference . $cancelUrl . $errorUrl . $successUrl . $notifyUrl . $isTest . $privateKey;
    
    $calculatedHashResult = generate_request_hash_check($inputString);
    echo "Hashcheck: " . $calculatedHashResult . "\n";
    $hash = $calculatedHashResult;
    // header("refresh:0; url=http://localhost/missnzhelele/ozow/pay.php?id");
}

function generate_request_hash_check($inputString) {
    $stringToHash = strtolower($inputString);
    echo "Before Hashcheck: " . $stringToHash . "\n";
    return get_sha512_hash($stringToHash);
}

function get_sha512_hash($stringToHash) {
    $bytes = hash('sha512', $stringToHash, true);
    $hex = bin2hex($bytes);
    return $hex;
}

 generate_request_hash();


// $id= $_GET['id'];
$curl = curl_init();

$data = [
    "countryCode" => "ZA",
    "amount" => "0.01",
    "transactionReference" => "123",
    "bankReference" => "Test1",
    "cancelUrl" => "http://test.i-pay.co.za/responsetest.php",
    "currencyCode" => "ZAR",
    "errorUrl" => "http://test.i-pay.co.za/responsetest.php",
    "isTest" => false,
    "notifyUrl" => "http://test.i-pay.co.za/responsetest.php",
    "siteCode" => "THE-THE-323",
    "successUrl" => "http://test.i-pay.co.za/responsetest.php",
    "hashCheck" => "$1c019d483d9aa741a6580da5f8e3c4483ff110535fc055f60fd94ea5079d9aeb9b8567fcb32514c52229ff49d2355b93d225efb076141c12ca2b8722a23a271a"
];

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.ozow.com/postpaymentrequest',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($data),
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'ApiKey:afZpPqarZg3YJwxknJIrPsVmCNrpCR6H',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
// header("refresh:0; url=http://localhost/missnzhelele/ozow/status.php?id=$id");
?>