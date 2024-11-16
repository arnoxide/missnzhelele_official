<?php
require_once '../database/authcontroller.php';
require_once('vendor/autoload.php');
$cart = $_SESSION['cart']; 
                        	$total = 0;
                            foreach($cart as $key => $value){
                            $price = '5';
                            $totals = $total + ($price * $value['quantity']);
                            $convert = '100';
                            $final = $convert * $totals;
                            }
                          
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <!-- Include the Yoco SDK in your web page -->
<script src="https://js.yoco.com/sdk/v1/yoco-sdk-web.js"></script>

<!-- Create a pay button that will open the popup-->
<button id="checkout-button">Pay</button>

<script>
  
  var yoco = new window.YocoSDK({
    publicKey: 'pk_live_027bef86P43yrEXfc444',
  });
  var tot = <?php echo $final; ?>;
  var checkoutButton = document.querySelector('#checkout-button');
  checkoutButton.addEventListener('click', function () {
    yoco.showPopup({
      amountInCents: tot,
      currency: 'ZAR',
      name: 'The Box',
      description: 'Awesome description',
      callback: function (result) {
  if (result.error) {
    const errorMessage = result.error.message;
    alert("error occured: " + errorMessage);
    xhr.open("POST", "decline.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`tokenId=${tokenId}`);
  } else {
    const tokenId = result.id;
    alert("card successfully tokenised: " + tokenId);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "charge.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`tokenId=${tokenId}`);
  }
}

    }
    )
  });
</script>
</body>
</html>