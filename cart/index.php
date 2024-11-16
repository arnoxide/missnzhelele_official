<?php
require_once '../database/authcontroller.php';
$cart = $_SESSION['cart']; 
require_once('../yoco/vendor/autoload.php');


?>
 <?php 
	$total = 0;
    foreach($cart as $key => $value){
    $price = '5';
    $totals = $total + ($price * $value['quantity']);
    $convert = '100';
    $final = $convert * $totals;
    }
    echo $totals;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Credits</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <link rel="stylesheet" href="./index.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <src scr="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
            <src scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

<body>
    <!-- Include the Yoco SDK in your web page -->
<script src="https://js.yoco.com/sdk/v1/yoco-sdk-web.js"></script>
<?php 
                        	$total = 0;
                            foreach($cart as $key => $value){
                            $price = '5';
                            
                            $total = $total + ($price * $value['quantity']);
                            }
                            ?>
    <div class="container px-4 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-5">
                <h4 class="heading"></h4>
            </div>
            <div class="col-7">
                <div class="row text-right">
                  
                    <div class="col-4">
                        <h6 class="mt-2">Qty</h6>
                    </div>
                    <div class="col-4">
                        <h6 class="mt-2">Price</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center border-top">
            <div class="col-5">
                <div class="row d-flex">
                    <div class="book">
                        <img src="./credits.png" class="book-img" height="150px" width="100px">
                    </div>
                    <div class="my-auto flex-column d-flex pad-left">
                        <h6 class="mob-text">Purchase credits to vote (no limit)</h6>
                        <p class="mob-text">1 credit = R5</p>
                    </div>
                </div>
            </div>
            <div class="my-auto col-7">
            <form class="form" action="addtocart.php">
                <div class="row text-right">
                  
                    <div class="col-4">
                  
                        <div class="row d-flex justify-content-end px-3">
                        <input type="number" name="quantity" id="cnt1" value="<?php echo $value['quantity']?>">
                             <!-- <div class="d-flex flex-column plus-minus">
                            <span class="vsm-text plus" >+</span>
                                <span class="vsm-text minus">-</span>
                            </div>  -->
                        </div>

                    </div>
                    <div class="col-4">
                        <h6 class="mob-text">R5</h6>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn">Update cart</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                
                        <div class="col-lg-4 mt-2">
                            <div class="row d-flex justify-content-between px-4">
                                <p class="mb-1 text-left">Subtotal</p>
                                <h6 class="mb-1 text-right">R<?php echo $total;?></h6>
                            </div>
                           
                            <div class="row d-flex justify-content-between px-4" id="tax">
                                
                                <!-- <h6 class="mb-1 text-right">R</h6> -->
                            </div>
                             <button  id="checkout-button" class="btn-block btn-blue">
                           <span>
                                  <span id="checkout">  Checkout</span>
                                    <span>R<?php echo $total;?></span>
                                </span>
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./index.js"></script>
 <?php 
	$total = 0;
    foreach($cart as $key => $value){
    $price = '5';
    $totals = $total + ($price * $value['quantity']);
    $convert = '100';
    $final = $convert * $totals;
    }
echo $totals;
?>

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
          alert("Error occurred: " + errorMessage);
          xhr.open("POST", "../yoco/decline.php");
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.send(`tokenId=${tokenId}`);
        } else {
          const tokenId = result.id;
          alert("Card successfully tokenized: " + tokenId);
          const xhr = new XMLHttpRequest();
          xhr.open("POST", "../yoco/charge.php");
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.send(`tokenId=${tokenId}`);

          // Redirect to a specific page after successful checkout
          window.location.href = "https://example.com/success-page";
        }
      }
    });
  });
</script>
</body>
</html>
