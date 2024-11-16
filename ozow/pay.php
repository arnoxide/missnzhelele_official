<?php
$id= $_GET['id'];
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
    "hashCheck" => "$id"
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