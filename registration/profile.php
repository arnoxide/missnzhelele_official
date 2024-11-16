<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'missnzhelele';

$conn = new MySQLI($host, $user, $pass, $db_name);

$id = $_GET['id'];

$mk="SELECT * FROM contestant WHERE con_num=$id";
$res=mysqli_query($conn, $mk);
$contest=mysqli_fetch_all($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>about me - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{
    color: #6F8BA4;
    margin-top:20px;
}
.section {
    padding: 100px 0;
    position: relative;
}
.gray-bg {
    background-color: #f5f5f5;
}
img {
    max-width: 50%;
}
img {
    vertical-align: middle;
    border-style: none;
}
/* About Me 
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}
.about-text h6 {
  font-weight: 600;
  margin-bottom: 15px;
}
@media (max-width: 767px) {
  .about-text h6 {
    font-size: 18px;
  }
}
.about-text p {
  font-size: 18px;
  max-width: 450px;
}
.about-text p mark {
  font-weight: 600;
  color: #20247b;
}

.about-list {
  padding-top: 10px;
}
.about-list .media {
  padding: 5px 0;
}
.about-list label {
  color: #20247b;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
}
.about-list label:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

.about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
.about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
.about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter p {
  font-weight: 600;
  margin: 0;
}
mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}
.theme-color {
    color: #fc5356;
}
.dark-color {
    color: #20247b;
}


    </style>
</head>
<body>
    <?php foreach($contest as $key => $cont): ?>
<section class="section about-section gray-bg" id="about">
<div class="container">
<div class="row align-items-center flex-row-reverse">
<div class="col-lg-6">
<div class="about-text go-to">
<h3 class="dark-color">My Motto</h3>
<!-- <h6 class="theme-color lead">A Lead UX &amp; UI designer based in Canada</h6> -->
<p><?php echo $cont['motto'];?></p>
<div class="row about-list">
<div class="col-md-6">
<div class="media">
<label> Full Name </label>
<p><?php echo $cont['fullname'];?></p>
</div>
<div class="media">
<label>Last Name </label>
<p><?php echo $cont['lastname'];?></p>
</div>
<div class="media">
<label>contestant No</label>
<p><?php echo $cont['con_num'];?></p>
</div>
<div class="media">
<label>Age:</label>
<p><?php echo $cont['age'];?> Yr</p>
</div>

<!-- <div class="media">
<label>Address</label>
<p>California, USA</p>
</div> -->
</div>
<div class="col-md-6">
<div class="media">
<label>E-mail</label>
<p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5831363e37183c3735393136763b3735">[email&#160;protected]</a></p>
</div>
<div class="media">
<label>Phone</label>
<p><?php echo $cont['phone'];?></p>
</div>
<div class="media">
<label>Residence</label>
<p><?php echo $cont['location'];?></p>
</div>
<div class="media">
<label>Returning Model</label>
<p>
    <?php
     $return = $cont['new_returning'];
     if($return == '0'){
        echo 'No!';
     }
        else{
            echo 'Yes!';
        }
     
     ?></p>
</div>
<!-- <div class="media">
<label>Skype</label>
<p>skype.0404</p>
</div> -->
<!-- <div class="media">
<label>Freelance</label>
<p>Available</p>
</div> -->
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="about-avatar">
<img src="<?php echo './/' . $cont['picture']; ?>">
</div>
</div>
</div>
<div class="counter">
<div class="row">
<div class="col-6 col-lg-3">
<div class="count-data text-center">
<h6 class="count h2" data-to="500" data-speed="500"><?php echo $cont['votes'];?></h6>
<p class="m-0px font-w-600">Votes</p>
</div>
</div>
<!-- <div class="col-6 col-lg-3">
<div class="count-data text-center">
<h6 class="count h2" data-to="150" data-speed="150">150</h6>
<p class="m-0px font-w-600">Project Completed</p>
</div>
</div> -->
<!-- <div class="col-6 col-lg-3">
<div class="count-data text-center">
<h6 class="count h2" data-to="850" data-speed="850">850</h6>
<p class="m-0px font-w-600">Photo Capture</p>
</div>
</div> -->
<!-- <div class="col-6 col-lg-3">
<div class="count-data text-center">
<h6 class="count h2" data-to="190" data-speed="190">190</h6>
<p class="m-0px font-w-600">Telephonic Talk</p>
</div>
</div> -->
</div>
</div>
</div>
</section>
<?php endforeach;?>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  
  function loadDoc() {
        setInterval(function(){
            var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("about").innerHTML = this.responseText;
    }
  };
  var usersID = <?php echo $_GET['id']; ?>;
  xhttp.open("GET", "profile.php?id=" + usersID, true);
//   xhttp.open("GET", "profile.php", true);
  xhttp.send();
        }, 1000);

}
loadDoc();
</script>
</body>
</html>