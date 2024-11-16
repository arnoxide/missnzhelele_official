<?php

$apiUrl = 'https://payments.yoco.com/api/checkouts';
$apiKey = 'sk_live_246bcec0q9AWpxn3fb14195bc09a'; // Replace with your secret key

$data = array(
    'amount' => 900,
    'currency' => 'ZAR'
);

$ch = curl_init($apiUrl);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $response;
}

curl_close($ch);

?>
