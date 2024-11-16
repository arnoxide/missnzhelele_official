<?php 
require_once '../database/authcontroller.php';
require_once 'qr/phpqrcode/qrlib.php';
// include_once '../base_url.php';
if (isset($_SESSION['id'])) {
    $uid = $_SESSION['id']; 
}


//////////////////////////////////////////Change EMAIL//////////////////////////////
if (isset($_POST['vip-ticket'])) {
 
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $token = $_POST['token'];
  $path = $_POST['path'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  
  // Check if the name and surname combination exists
  $nameSurnameQuery = "SELECT * FROM tickets WHERE fname = ? AND lname = ? LIMIT 1";
  $stmt = $conn->prepare($nameSurnameQuery);
  $stmt->bind_param('ss', $fname, $lname);
  $stmt->execute();
  $result = $stmt->get_result();
  $nameSurnameCount = $result->num_rows;
  $stmt->close();
  
  if ($nameSurnameCount > 0) {
    echo '<script type/javascript> alert("User has already purchased a ticket")</script>';
  }
  
  elseif (count($errors) === 0) {
      // Proceed with user registration
  
$path = 'qr/images/';
$paths = 'qr/images/';
$generate= "012345678910111213141516171819202abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$token=  substr(str_shuffle($generate),0,8); 
$qrcode = $path.$fname.$token.".png";
$qrcodepath = $paths.$fname.$token.".png";
$img = $fname.$token;
QRcode::png("$token", $qrcode);

$iosql = "INSERT INTO tickets(uid,fname,lname,email,path,qr_code,type,status,contact) VALUES('$uid','$fname','$lname','$email','$qrcodepath','$token','VIP','Not Paid','$contact')";
$iores = mysqli_query($conn, $iosql) or die(mysqli_error($conn));
echo '<script type/javascript> alert("Ticket Added to cart.")</script>';
// header("refresh:0; url=https://missnzhelele.co.za/checkout.php");
$relative_path = "vip-success.php?id=$token";
$url = $base_url . $relative_path;
header("Location: $url");
}}


if (isset($_POST['general-ticket'])) {
 
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $token = $_POST['token'];
  $path = $_POST['path'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  
  // Check if the name and surname combination exists
  $nameSurnameQuery = "SELECT * FROM tickets WHERE fname = ? AND lname = ? LIMIT 1";
  $stmt = $conn->prepare($nameSurnameQuery);
  $stmt->bind_param('ss', $fname, $lname);
  $stmt->execute();
  $result = $stmt->get_result();
  $nameSurnameCount = $result->num_rows;
  $stmt->close();
  
  if ($nameSurnameCount > 0) {
    echo '<script type/javascript> alert("User has already purchased a ticket")</script>';
  }
  
  elseif (count($errors) === 0) {
      // Proceed with user registration
  
$path = 'qr/images/';
$paths = 'qr/images/';
$generate= "012345678910111213141516171819202abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$token=  substr(str_shuffle($generate),0,8); 
$qrcode = $path.$fname.$token.".png";
$qrcodepath = $paths.$fname.$token.".png";
$img = $fname.$token;
QRcode::png("$token", $qrcode);

$iosql = "INSERT INTO tickets(uid,fname,lname,email,path,qr_code,type,status,contact) VALUES('$uid','$fname','$lname','$email','$qrcodepath','$token','General','Not Paid','$contact')";
$iores = mysqli_query($conn, $iosql) or die(mysqli_error($conn));
echo '<script type/javascript> alert("Ticket Added to cart.")</script>';
// header("refresh:0; url=https://missnzhelele.co.za/checkout.php");
$relative_path = "general-success.php?id=$token";
$url = $base_url . $relative_path;
header("Location: $url");
}}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Miss Nzhelele | Tickets</title>
  <!-- Favicon -->
 <link href="../assets/img/favicon.jpg" rel="icon">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
  margin: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background-color: #fff;
}

/* body::before {
  content: "";
  background: url('./2023.jpg') no-repeat center center fixed;
  background-size: contain;
  opacity: 0.05; 
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: -1; 
} */
.container {

    display: flex;
  text-align: center;
  justify-content: center;
 align-content: center;
}
.heading {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1;
  display: flex;
  justify-content: center;
  font-size: xx-large;
  text-transform: bold;
  align-content: center;
}
.logo {
      display: block;
      margin: 0 auto;
      max-width: 100%;
    z-index: 1;
    position: absolute;
    height: 150px;
    width: 150px;
    top: 0;
    left: 0;
    }

 

.grid-box {
  display: flex;
  width: 500px;
  height: 250px;
  background-color: #f0f0f0;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  grid-template-columns: repeat(2, 1fr);

}

.grid-item {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  transition: background-color 0.3s ease;
  grid-template-columns: repeat(2, 1fr);
  cursor: pointer;
}

.vip {
  background-color: gold;
}

.general {
  background-color: #dcdcdc;
}

.grid-item:hover {
  background-color: #c0c0c0;
}

@media (max-width: 768px) {
  .heading{
    align-content: center;
    justify-content: center;
    display: flex;
  top: 160px;
  }
}

@media (max-width: 1200px) {
  .logo {
    align-content: center;
    justify-content: center;
    display: flex;
    left: 100px;
 
  }
}

  </style>
</head>
<body>
<div class="heading">
 <b> Choose the Ticket you want to purchase</b>
</div>

<div class="container">
    <a href="../home.php">
<img src="./2023.jpg" alt="Logo" class="logo">
</a>
    <div class="grid-box">
      <div class="grid-item vip" data-toggle="modal" data-target="#vipModal">VIP</div>
      <div class="grid-item general" data-toggle="modal" data-target="#generalModal">General</div>
    </div>
  </div>

  <!-- VIP Modal -->
  <div class="modal fade" id="vipModal" tabindex="-1" role="dialog" aria-labelledby="vipModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="vipModalLabel">VIP Ticket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="index">
            <div class="form-group">
              <label for="vipName">Name</label>
              <input type="text" name="fname" class="form-control" id="vipName" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="vipSurname">Surname</label>
              <input type="text" name="lname" class="form-control" id="vipSurname" placeholder="Enter your surname">
            </div>
            <div class="form-group">
              <label for="vipContact">Contact</label>
              <input type="number" name="contact" class="form-control" id="vipContact" placeholder="Enter your contact number">
            </div>
            <div class="form-group">
              <label for="vipEmail">Email</label>
              <input type="email" readonly value="<?php echo $_SESSION['email'];?>" name="email" class="form-control" id="vipEmail" placeholder="Enter your email">
            </div>
            <input type="text" name="token"hidden> 
        <input type="text" name="path"hidden > 
            <button type="submit" class="btn btn-primary" name="vip-ticket">Buy</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- General Modal -->

  <div class="modal fade" id="generalModal" tabindex="-1" role="dialog" aria-labelledby="generalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="generalModalLabel">General Ticket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="index">
            <div class="form-group">
              <label for="generalName">Name</label>
              <input type="text" name="fname" class="form-control" id="generalName" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="generalSurname">Surname</label>
              <input type="text" name="lname" class="form-control" id="generalSurname" placeholder="Enter your surname">
            </div>
            <div class="form-group">
              <label for="generalContact">Contact</label>
              <input type="text" name="contact" class="form-control" id="generalContact" placeholder="Enter your contact number">
            </div>
            <div class="form-group">
              <label for="generalEmail">Email</label>
              <input type="email" readonly value="<?php echo $_SESSION['email'];?>" name="email" class="form-control" id="generalEmail" placeholder="Enter your email">
            </div>
            <input type="text" name="token"hidden> 
        <input type="text" name="path"hidden > 
            <button type="submit" name="general-ticket" class="btn btn-primary">Buy</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

