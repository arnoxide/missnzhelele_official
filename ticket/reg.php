<?php
require_once '../database/authcontroller.php';
require_once 'qr/phpqrcode/qrlib.php';

$uid = $_SESSION['id'];
$fname = $_SESSION['fname'];


// if (isset($_POST['save-ticket'])) {

//     $fname = $_POST['fname'];
//     $lname = $_POST['lname'];
//     $type = $_POST['type'];
//     $token = $_POST['token'];
//     $path = $_POST['path'];
//     $email = $_POST['email'];
    
//     // Check if the name and surname combination exists
//     $nameSurnameQuery = "SELECT * FROM tickets WHERE fname = ? AND lname = ? LIMIT 1";
//     $stmt = $conn->prepare($nameSurnameQuery);
//     $stmt->bind_param('ss', $fname, $lname);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $nameSurnameCount = $result->num_rows;
//     $stmt->close();
    
//     if ($nameSurnameCount > 0) {
//         $errors['name_surname'] = "Name and surname combination already exists";
//     }
    
//     if (count($errors) === 0) {
//         // Proceed with user registration
    
//     $path = 'qr/images/';
// $generate= "012345678910111213141516171819202abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
// $token=  substr(str_shuffle($generate),0,8); 
// $qrcode = $path.$fname.$token.".png";
// $img = $fname.$token;
// QRcode::png("$token", $qrcode);

//     $sql = "INSERT INTO tickets(fname,lname,email,path,qr_code,type) VALUES('$fname','$lname','$email','$qrcode','$token','$type')";
//     ticket($email,$fname,$lname,$qrcode);
//     if(!mysqli_query($conn,$sql))
  
//     {
//           echo '<script>alert("Already Invited")</script>';
//     }
//     else{
//               echo '<script>alert("Invitation successfully sent")</script>';
              
             
//     }
//     header("refresh:0; url=http://localhost/ktp/space/index");
  
//   } 
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miss Nzhelele | Ticket</title>

    <style>
        body {
            background-color: #000; 
            color: gold; 
            font-family: 'Arial', sans-serif; 
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://i.pinimg.com/564x/ca/7d/da/ca7dda2e9193b939c967500de2506ca0.jpg') center/cover no-repeat;
        }

        .form {
            background-color: transparent; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5); 
            width: 80%;
            max-width: 500px; 
            text-align: center;
        }

        input, select {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            /* border: 1px solid gold; */
            border-radius: 5px;
            background-color: whitesmoke; 
            color: gold; 
        }

        input[type="submit"] {
            background-color: gold;
            color: black;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #ffd700; 
        }
    </style>
</head>
<body>
<form class="form" method="POST" action="cart/addtocart.php">
        <input type="text" name="fname" placeholder="Full names" required> 
        <input type="text" name="lname" placeholder="Last name" required> 
   
        <input type="email" name="email" readonly value="<?php echo $_SESSION['email'];?>" placeholder="Email" >
        <input type="text" name="token"hidden> 
        <input type="text" name="path"hidden > 
      
            <select name="type">
                <option value="VIP">VIP</option>
                <option value="General">General</option>
            </select>
     
       
                                <input type = "hidden" min = "1" value = "1" name="quantity" >
                                <!-- <button type="submit" class="btn">Buy</button> -->
                                <input type="submit" name="save-ticket" value="buy">
                                </form>
       
   
</body>
</html>