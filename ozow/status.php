<?php
$id= $_GET['id'];
$api_key = "ApiKey:afZpPqarZg3YJwxknJIrPsVmCNrpCR6H";
$site_code = "https://stagingdash.ozow.com/MerchantAdmin/THEBOXHOUSEPTY";
$transaction_reference = "Test1";
$base_url = "https://stagingapi.ozow.com/$transaction_reference";

$url = "{$base_url}?siteCode={$site_code}&transactionReference={$transaction_reference}";

$headers = array(
    "ApiKey" => $api_key,
    "Authorization" => "$id"
);

$options = array(
    "http" => array(
        "header" => "ApiKey: {$api_key}\r\nAuthorization: $id\r\n",
        "method" => "GET"
    )
);

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

echo $response;

?>
