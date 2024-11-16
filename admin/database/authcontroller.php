<?php
session_start();
  require ('connection.php');
  // require_once 'emailcontroller.php';
require_once 'mailer.php';


function dd($value) //detete
{
echo "<pre>", print_r($value, true), "</pre>";
die();
}


function executeQuery($sql, $data)
{
  global $conn;
  $stmt = $conn->prepare($sql);
  $values = array_values($data);
  $types = str_repeat('s', count($values));
  $stmt->bind_param($types, ...$values);
  $stmt->execute();
  return $stmt;
}


function selectAll($table, $conditions = [])
{
 
  global $conn;
  $sql = "SELECT * FROM $table";
  if (empty($conditions)) {
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
      return $records;
}else {
  $i = 0;
  foreach ($conditions as $key => $value) {
    if ($i === 0) {
        $sql = $sql . " WHERE $key=?";
    }else {
        $sql = $sql . " AND $key=?";
    }
    $i++;
  }

  $stmt = executeQuery($sql, $conditions);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}
}


function selectOne($table, $conditions){

  global $conn;
  $sql = "SELECT * FROM $table";

  $i = 0;
  foreach ($conditions as $key => $value) {
    if ($i === 0) {
        $sql = $sql . " WHERE $key=?";
    }else {
        $sql = $sql . " AND $key=?";
    }
    $i++;
  }

  $stmt = $sql . " LIMIT 1";
  $stmt = executeQuery($sql, $conditions);
  $records = $stmt->get_result()->fetch_assoc();
  return $records;
}


function create($table, $data)
 {
  global $conn;
//  $sql = "INSERT INTO users SET username=?, admin=?, email=?, password=?"
$sql = "INSERT INTO $table SET ";

$i = 0;
foreach ($data as $key => $value) {
  if ($i === 0) {
      $sql = $sql . " $key=?";
  }else {
      $sql = $sql . ", $key=?";
  }
  $i++;
}

$stmt = executeQuery($sql, $data);
$id = $stmt->insert_id;
return $id;
}

function update($table, $id, $data) {
  global $conn;
  //$sql = "UPDATE users SET username=?, admin=?, email=?, password=? WHERE id=?"
$sql = "UPDATE $table SET ";

$i = 0;
foreach ($data as $key => $value) {
  if ($i === 0) {
      $sql = $sql . " $key=?";
  }else {
      $sql = $sql . ", $key=?";
  }
  $i++;
}

$sql = $sql . " WHERE id=?";
$data['id'] = $id;
$stmt = executeQuery($sql, $data);
return $stmt->affected_rows;
}

function delete($table, $id) {
  global $conn;
  $sql = "DELETE FROM $table WHERE id=?";

$stmt = executeQuery($sql, ['id' =>$id]);
return $stmt->affected_rows;
}

function getPublishedposts(){
  global $conn;
  $sql = "SELECT p.*, u.fname FROM founders AS p JOIN users AS u ON p.uid=u.id WHERE u.verified=?";
  
  $stmt = executeQuery($sql, ['verified' => 1]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
  }

////////////////////////REGISTERING USERS////////////////
$errors = array();
$fname = "";
$lname = "";
$phone = "";
$token = "";
$email = "";


if(isset($_POST['signup-btn'])){

$errors = array();
$fname = "";
$lname = "";
$email = "";
$token = "";

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  //$token = $_POST['token'];
  $password = $_POST['password'];
  $passwordConf = $_POST['passwordConf'];
  $time = date("Y-m-d H:i:s");
  $date = date('Y-m-d', strtotime($time. ' + 6 months'));
$browser = $_POST['browser'];
$version = $_POST['version'];
$layout = $_POST['layout'];
$os = $_POST['os']; 
$description = $_POST['description'];
 $product = $_POST['product'];
  $manufacturer = $_POST['manufacturer'];

  if (empty($fname)) {
    $errors['fname'] = "Firstname is required";
  }
  if (empty($lname)) {
    $errors['lname'] = "Lastname is required";
  }
  // if (empty($admin)) {
  //   $errors['admin'] = "Role is required";
  // }
  // if (empty($department)) {
  //   $errors['department'] = "Department is required";
  // }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Invalid Email address";
  }
  if (empty($email)) {
    $errors['email'] = "Email required";
  }
  if (empty($password)) {
    $errors['password'] = "Password required";
  }
  if ($password !== $passwordConf) {
    $errors['password'] = "The two passwords do not match";
  }

  $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
  $stmt = $conn->prepare($emailQuery);
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $userCount = $result->num_rows;
  $stmt->close();

  if ($userCount > 0){
    $errors['email'] = "Email already exists";
  }
  if (count($errors) === 0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $generate= "012345678910111213141516171819202abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $token=  substr(str_shuffle($generate),0,50); 
      $generate= "012345678910111213141516171819202122232425262728290313233343536373839404142434445464748495051525354555657585960616263646566676869707172737475767778798081828384858687888990919293949596979899";
  $gen=  substr(str_shuffle($generate),0,5); 
    $verified = false;
  
    $sql = "INSERT INTO users (fname,lname, email, verified, token, password,id) VALUES ( ?,?,?,'0',?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $fname,$lname, $email, $token, $password,$gen);

      
    if ($stmt->execute()){

      $user_id = $conn->insert_id;
      $_SESSION['id'] = $user_id;
      $_SESSION['fname'] = $fname;
      $_SESSION['email'] = $email;
      $_SESSION['verified'] = $verified;

///////////////SENDING VERIFICATION EMAIL///////////////
      sendVerificationEmail($email, $token,$fname,$lname);
///////////////////////END SENDING VERIFICATION EMAIL//////////////  
 
      $_SESSION['alert-class'] = "alert-success";
      header('location: alert');
      exit();
    }else {
      $errors['db_error'] = "Database error: failed to register";
    }
  }
}
////////////////////////END REGISTERING USERS////////////////


// ////////////////////////LOGING USERS IN////////////////

if(isset($_POST['login-btn'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $generate= "012345678910111213456831684632865635286523865238653212345678901234567895175238529652753";
  $two_factor=  substr(str_shuffle($generate),0,5); 
  $time = date("Y-m-d H:i:s");
  $browser = $_POST['browser'];
  $version = $_POST['version'];
  $layout = $_POST['layout'];
  $os = $_POST['os'];
  $description = $_POST['description'];
  $product = $_POST['product'];
  $manufacturer = $_POST['manufacturer'];
  //////////////////////////////////////////updating your session in DB=======================//////////


  /////////////////////////////end db///////////////////////
  if (empty($email)) {
    $errors['email'] = "email required";
  }
  if (empty($password)) {
   $errors['password'] = "Password required";
  }


  if (count($errors) === 0) {
    $sql = "SELECT * FROM users WHERE email=? OR fname=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $fname);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
 
    /////////////////////////////////////////CHECKING IF ACCOUNT IS VERIFIED AND IF 2FA IS ENABLED///////////////////////////////
   
// Prepare the SQL statement with a parameter placeholder
$sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // Bind the email parameter to the statement
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the row as an associative array
    $posts = mysqli_fetch_assoc($result);

    // Close the statement
    mysqli_stmt_close($stmt);
}

if ($posts) {
    // Retrieve the values from the fetched row
    $email = $posts['email'];
    $fname = $posts['fname'];
    $verified = $posts['verified'];
    // $active = $posts['active'];
}

/////////////////////////////////CHECKING IF ACC EXISTS/////////////////
if ($posts < 1){
   $errors['email'] = "Account not found";
  // echo '<script>alert("'.$fname.' Account Does not exist.")</script>';
  // header("refresh:0; url=http://localhost/echo/echo-tech/echo-code/config/login");
}
/////////////////////////////////END CHECKING IF ACC EXISTS/////////////////

/////////////////////////////////CODE WHEN  ACC NOT ACTIVATED/////////////////
 elseif($verified == 0){
            // echo '<script>alert("Please Activate Your Email | '.$email.' ")</script>';
             $errors['email'] = "Please Activate Your Email | $email ";
            // header("refresh:0; url=http://localhost/echo/echo-tech/echo-code/config/login");
          }
/////////////////////////////////END CHECKING IF ACC IS ACTIVATED/////////////////
 ////////======================CODE WHEN 2FA IN NOT ENABLED==================///////////////////////////////
 elseif(password_verify($password, $user['password'])){
 
  $_SESSION['id'] = $user['id'];
  $_SESSION['fname'] = $user['fname'];
  $_SESSION['email'] = $user['email'];
  $_SESSION['lname'] = $user['lname'];
  $_SESSION['verified'] = $user['verified'];
  $_SESSION['message'] = "You are now logged in!";
    $_SESSION['type'] = 'success';
  $_SESSION['alert-class'] = "alert-success";
  header('location: index');
  exit();
}
// }  
else{
      $errors['login_fail'] = "Incorrect credentials";
      }
    //}
}}


/////////////////////////////////END LOGIN/////////////////////////////////////////////////



////////////////////////LOGOUT/////////////////////////////////////
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['id']);
  unset($_SESSION['username']);
  unset($_SESSION['email']);
  unset($_SESSION['verified']);
  header('location: login');
  exit();
}
///////////////////////////////END LOGOUT//////////////////////////////////////

////////////////////////VERYFYING USERS ACCOUNT/////////////////////////////////////////
function verifyUser($token)
{
  global $conn;
  $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $update_query = "UPDATE users SET verified='1' WHERE token='$token'";

    if (mysqli_query($conn, $update_query)) {
      $_SESSION['id'] = $user['id'];
      $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['lastname'] = $user['lastname'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['verified'] = 1;

      $_SESSION['message'] = "Your email address was successfully verified!";
       $_SESSION['type'] = 'success';
     
    header('location: index');
      exit();

    }
  } else {
    echo 'User not found';
  }
}
////////////////////////END VERYFYING USERS ACCOUNT/////////////////////////////////////////

////////////////////////////////////FORGOT PASSWORD RESET LINK//////////////////////////////
if (isset($_POST['forgot-password'])) {
  $email = $_POST['email'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Email address is invalid";
  }
  if (empty($email)) {
    $errors['email'] = "Email required";
  }
// Prepare the SQL statement with a parameter placeholder
$sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // Bind the email parameter to the statement
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the row as an associative array
    $posts = mysqli_fetch_assoc($result);

    // Close the statement
    mysqli_stmt_close($stmt);
}

if ($posts) {
    // Retrieve the values from the fetched row
    $email = $posts['email'];
    $fname = $posts['fname'];
    $verified = $posts['verified'];
    $active = $posts['active'];
}

/////////////////////////////////CHECKING IF ACC EXISTS/////////////////
if ($posts < 1){
  $errors['email'] = "Account not found";
 // echo '<script>alert("'.$fname.' Account Does not exist.")</script>';
 // header("refresh:0; url=http://localhost/echo/echo-tech/echo-code/config/login");
}
  // if(count($errors) == 0) {
  //   $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  //   $result = mysqli_query($conn, $sql);
  //   $user = mysqli_fetch_assoc($result);
  //   $token = $user['token'];
  //   sendPasswordResetLink($email, $token);
  //   header('location: link');
  //   exit(0);
  // }
}
////////////////////////////////////END FORGOT PASSWORD RESET LINK//////////////////////////////


function resetPassword($token)
  {
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('location: database/reset_password');
    exit(0);
  } 
////////////////////////////////////END RESETING PASSWORD//////////////////////////////



//////////////////////////////////////////Change EMAIL//////////////////////////////
if (isset($_POST['change-email-btn'])) {
$email= $_POST['email'];

$user_id = $_SESSION['id'];

  if (count($errors) == 0) {
$query = "UPDATE users SET email='$email' WHERE id='$user_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {

      echo '<script type/javascript> alert("Your Email was successfully changed.")</script>';
      header("refresh:2; url=http://localhost/theBox./home");
      exit(0);
    }
    else {
    echo '<script type/javascript> alert("Email already Exists.")</script>';
}
}
}

//CHANGING EMAIL//
function resetEmail($token)
  {
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('location: database/change_email');
    exit(0);
  }
//////////////////////////////////////////END Change EMAIL//////////////////////////////

//////////////////////////CHANGING OLD PASSWORD VERIFICATION//////////////////////
if(isset($_POST['change-password'])){
 
  $pass = $_POST['pass'];
  $user_id = $_SESSION['id'];
  if (empty($pass)) {
    $errors['pass'] = "Password required";
  }

  if (count($errors) === 0) {
    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $stmt = $conn->prepare($sql);
 
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (password_verify($pass, $user['password'])) {

      $_SESSION['id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['verified'] = $user['verified'];


      $_SESSION['message'] = "You are now logged in!";
      $_SESSION['alert-class'] = "alert-success";
      header('location: change_password');
      exit();

    }else {
      $errors['login_fail'] = "Incorrect Password";
      }
  }
}
////////////////////////// END CHANGING OLD PASSWORD VERIFICATION//////////////////////


 ?>