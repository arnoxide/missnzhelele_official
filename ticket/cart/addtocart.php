<?php 
require_once '../../database/authcontroller.php';

require_once '../qr/phpqrcode/qrlib.php';

    if(isset($_GET['quantity'])){
        $quantity = $_GET['quantity'];
    }else{
        $quantity = 1;
    }
    if(isset($_GET['type'])){
        $type = $_GET['type'];
    }
   
    if (isset($_POST['save-ticket'])) {

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $type = $_POST['type'];
            $token = $_POST['token'];
            $path = $_POST['path'];
            $email = $_POST['email'];
            
            // Check if the name and surname combination exists
            $nameSurnameQuery = "SELECT * FROM tickets WHERE fname = ? AND lname = ? LIMIT 1";
            $stmt = $conn->prepare($nameSurnameQuery);
            $stmt->bind_param('ss', $fname, $lname);
            $stmt->execute();
            $result = $stmt->get_result();
            $nameSurnameCount = $result->num_rows;
            $stmt->close();
            
            if ($nameSurnameCount > 0) {
                $errors['name_surname'] = "Name and surname combination already exists";
            }
            
            if (count($errors) === 0) {
                // Proceed with user registration
            
        $path = '../qr/images/';
        $paths = 'qr/images/';
        $generate= "012345678910111213141516171819202abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $token=  substr(str_shuffle($generate),0,8); 
        $qrcode = $path.$fname.$token.".png";
        $qrcodepath = $paths.$fname.$token.".png";
        $img = $fname.$token;
        QRcode::png("$token", $qrcode);
         
            $sql = "INSERT INTO tickets(fname,lname,email,path,qr_code,type,status) VALUES('$fname','$lname','$email','$qrcodepath','$token','$type','Not Paid')";
            // ticket($email,$fname,$lname,$qrcode);
            if(!mysqli_query($conn,$sql))
          
            {
                  echo '<script>alert("Already Invited")</script>';
            }
            else{
                      echo '<script>alert("successfully purchased the ticket")</script>';
                      
                     
            }
            header("refresh:0; url=http://localhost/missnzhelele/ticket/index.php");
          
          } 
          $_SESSION['cart'][$id] = array('quantity' => $quantity, 'type' => $type);
        //   header('location:checkout',$token);
          // Replace the 'header' line with the modified one
        header('Location: checkout?id=' .$token);
        // header("url:http://localhost/miss/ticket/cart/checkout.php?id=$token");
        
        }
  



    
