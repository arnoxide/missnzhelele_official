<?php
require_once '../database/authcontroller.php';
$uid = $_SESSION['id'];
$user = $_SESSION['email'];
$fname = $_SESSION['fname'];
// include 'flash-messages.php';
if (!isset($_SESSION['id'])) {
  header('location:../login-founders.php');
  exit();
}
$errors = array();
$company ="";
$years ="";
$email ="";
$goal ="";

if(isset($_POST['send'])){
   
  $generate= "012345678910111213141516171819202122232425262728290313233343536373839404142434445464748495051525354555657585960616263646566676869707172737475767778798081828384858687888990919293949596979899";
  $idgen=  substr(str_shuffle($generate),0,3); 

  $company = $_POST['company'];

  $years = $_POST['years'];
  $email = $_POST['email'];
  $goal = $_POST['goal'];
  $website = $_POST['website'];
  $about = $_POST['about'];
  $cipc_reg = $_POST['cipc_reg'];
  $ck = $_POST['ck'];
  $stage = $_POST['stage'];
  $invested = $_POST['invested'];
  $gain = $_POST['gain'];
  $founder_name = $_POST['founder_name'];

  if (empty($company)) {
    $errors['company'] = "Company Name Required";
  }
  if (empty($years)) {
    $errors['years'] = "Years in operation Required";
  }
  if (empty($email)) {
    $errors['email'] = "representative email Required";
  }
  if (empty($goal)) {
    $errors['goal'] = "Funding goal Required";
  }

 
 

  if (count($errors) === 0) {
    foreach($_FILES['doc']['name'] as $key=>$val){
      //	$rand=rand('11111111','99999999');
     $file= $val;
        $d="logo";
    //     // mkdir($filename, 777, true);
        move_uploaded_file($_FILES['doc']['tmp_name'][$key],$d."/".$file);
$sql = "INSERT INTO founders(uid, company_id,company_name,years_operating,rep_email,funding_goal,approved,website,about,committed,cipc_reg,ck,stage,invested,gain,founder_name,logo) VALUES('$uid','$idgen','$company','$years','$email','$goal','0','$website','$about','0','$cipc_reg','$ck','$stage','$invested','$gain','$founder_name','$file')";
if(!mysqli_query($conn,$sql))
{
  $_SESSION['messages'] = 'Company Already Listed';
  $_SESSION['types'] = 'danger';
}
else{
  $_SESSION['message'] = 'Company Successfully Listed';
  $_SESSION['type'] = 'success';
  founder_success($user,$fname,$email,$company,$goal,$years);  
  email($user,$fname,$email,$company,$goal,$years);        
}
header("refresh:3; url=http://localhost/theBox/Dashboard");
}
}
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Founders | Sign Up </title>
        <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
    <form action="founders" method="post" enctype="multipart/form-data">
      <?php include 'flash-messages.php';?>
      <div class="row">
    <div class="col-md-12">
      
        <h1> Sign Up </h1>
        
        <fieldset>
          
          <legend><span class="number">1</span>Basic Info</legend>
        
          <label for="name">Name of the company:</label>
          <input type="text" id="" name="company" maxlength="30"{{item.provider}} value="<?php echo $company;?>" required>

          <label for="name">Name of the Founder:</label>
          <input type="text" id="" name="founder_name"  value="" required>
        

          <label for="name">Years in Operation:</label>
          <input type="number" id="" name="years"  value="<?php echo $years;?>" required>
       
          <label for="participants">Email Address of Rep:</label>
          <input type="email" name="email"  value="<?php echo $email;?>" required>

          <label for="year">Funding Goal:</label>
          <input type="number" name="goal"  value="<?php echo $goal;?>" required>

          <label for="year">Company Logo:</label>

          <input type="file" name="doc[]"    multiple required>
        
        <!--  <label>Age:</label>
          <input type="radio" id="under_13" value="under_13" name="user_age"><label for="under_13" class="light">Under 13</label><br>
          <input type="radio" id="over_13" value="over_13" name="user_age"><label for="over_13" class="light">Over 13</label> -->
          
        </fieldset>

        <fieldset>  
        
          <legend><span class="number">2</span> Cipc </legend>
          <label for="cipc_reg">Are you registered with registered with cipc?</label>
          <select  id="milkoptions" name="cipc_reg">
          <option value="default-value">Select your option</option>
          <option value="No">No</option>
          <option value="yes">yes</option> 
          </select>


        <div id="milkfatrateoptions" style="display: none;">
        <div class="form-group">
        <label for="ck">Enter ck number</label>
        <input type="text" id="entry-date"  name="ck" placeholder="">
        </div>
         
        </fieldset>


         <fieldset>  
        
        <legend><span class="number">3</span> Additional</legend>
      
        <div>
          <label for="stage">Which stage is your start-ups?</label>
          <select name="stage" required>
            <option value="Proof of concept">Proof of concept</option>
            <option value="Start-up with injection">Start-up with injection</option>
            <option value="Scale up">Scale up</option>
          </select>

          <label for="invested">How much have you invested in your company?</label>
          <p>(optional)</p>
          <input type="text" id="" name="invested" value="">
    
          <label for="name">Company website (link):</label>
          <input type="text" id="" name="website" value="">
          
         <label required>what are you looking to gain in theBoxlab Platform:</label>
          <input type="checkbox" id="development" value="Raise Funding," name="gain" ><label class="light" for="development">Raise Funding</label><br>
          <input type="checkbox" id="design" value="Network," name="gain" ><label class="light" for="design">Network with like-minded entrepreneurs</label><br>
          <input type="checkbox" id="business" value="Knowledge" name="gain" ><label class="light" for="business">Join Knowledge and skills through mentorships</label><br>
          <input type="checkbox" id="business" value="All of the above" name="gain" ><label class="light" for="business">All of the above</label>
          <br><br>

          <label for="email">About your company:</label>
          <p>(briefly)</p>
          <textarea id="" name="about"  maxlength="300"{{item.provider}} required></textarea>
          </div> 

      </fieldset>


        <button name="send" type="submit">Sign Up Now</button>
       </form>
        </div>
      </div>

 
<script>
   
   $('#milkoptions').on('change', function(){
      if($(this).val()==="yes") {
          $("#milkfatrateoptions").show()
      }
       else{
           $("#milkfatrateoptions").hide();
       }
   });
      </script>
  
      
    </body>
</html>
