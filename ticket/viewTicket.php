<?php
require_once '../database/authcontroller.php';
$uid = $_SESSION['id'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];

$id=$_GET['id'];

$sql = "SELECT * FROM tickets WHERE qr_code = '$id'";
$result = mysqli_query($conn, $sql);
$goal = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ticket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Bucky Maler">
    <!-- <link rel="stylesheet" href="./style.css"> -->
	<style>@import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap");

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body,
html {
	height: 100vh;
	display: grid;
	font-family: "Staatliches", cursive;
	background: #1b1517;
	color: black;
	font-size: 14px;
	letter-spacing: 0.1em;
}

.ticket {
	margin: auto;
	display: flex;
	background: white;
	box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}

.left {
	display: flex;
}

.image {
	height: 350px;
	width: 250px;
	background-image: url("./crown.jpg");
	background-size: cover;
	opacity: 0.85;
}

.admit-one {
	position: absolute;
	color: darkgray;
	height: 250px;
	padding: 0 10px;
	letter-spacing: 0.15em;
	display: flex;
	text-align: center;
	justify-content: space-around;
	writing-mode: vertical-rl;
	transform: rotate(-180deg);
}

.admit-one span:nth-child(2) {
	color: white;
	font-weight: 700;
}

.left .ticket-number {
	height: 250px;
	width: 250px;
	display: flex;
	justify-content: flex-end;
	align-items: flex-end;
	padding: 5px;
}

.ticket-info {
	padding: 10px 30px;
	display: flex;
	flex-direction: column;
	text-align: center;
	justify-content: space-between;
	align-items: center;
}

.date {
	border-top: 1px solid gray;
	border-bottom: 1px solid gray;
	padding: 5px 0;
	font-weight: 700;
	display: flex;
	align-items: center;
	justify-content: space-around;
}

.date span {
	width: 100px;
}

.date span:first-child {
	text-align: left;
}

.date span:last-child {
	text-align: right;
}

.date .june-29 {
	color: #d83565;
	font-size: 20px;
}

.show-name {
	font-size: 32px;
	font-family:  Georgia, 'Times New Roman', Times, serif;
	color: gold;
}

.show-name h1 {
	font-size: 48px;
	font-weight: 700;
	letter-spacing: 0.1em;
	color: #4a437e;
}

.time {
	padding: 10px 0;
	color: #4a437e;
	text-align: center;
	display: flex;
	flex-direction: column;
	gap: 10px;
	font-weight: 700;
}

.time span {
	font-weight: 400;
	color: gray;
}

.left .time {
	font-size: 16px;
}


.location {
	display: flex;
	justify-content: space-around;
	align-items: center;
	width: 100%;
	padding-top: 8px;
	border-top: 1px solid gray;
}

.location .separator {
	font-size: 20px;
}

.right {
	width: 180px;
	border-left: 1px dashed #404040;
}

.right .admit-one {
	color: darkgray;
}

.right .admit-one span:nth-child(2) {
	color: gray;
}

.right .right-info-container {
	height: 250px;
	padding: 10px 10px 10px 35px;
	display: flex;
	flex-direction: column;
	justify-content: space-around;
	align-items: center;
}

.right .show-name h1 {
	font-size: 18px;
}

.barcode {
	height: 100px;
}

.barcode img {
	height: 100%;
}

.right .ticket-number {
	color: gray;
}
</style>
  </head>
  <body>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<br><br>


<?php
if (empty($goal)) {
	echo '<div style="text-align: center; color: white; font-size:50px;">No tickets available.</div>';
} else {

foreach ($goal as $key=> $ticket):?>

<div class="ticket">
	<div class="left">
		<div class="image">
			<p class="admit-one">
				<!-- <span>ADMIT ONE</span> -->
				<span style="color: aliceblue;">ADMIT ONE</span>
				<!-- <span>ADMIT ONE</span> -->
			</p>
		
			<div class="ticket-number">
				<p style="color: rgb(73, 69, 69);">
				#<?php echo $ticket['qr_code'];?>
				</p>
			
			</div>
			
		</div>
		<div class="ticket-info">
			<p class="date">
				<span>FRIDAY</span>
				<span class="june-29" style="color: gold;">DECEMBER 22nd</span>
				<span>2023</span>
			</p>
			
			<div class="show-name">
				<h1>Miss Nzhelele 2023</h1>
				<h2><?php echo $ticket['fname'];?> <?php echo $ticket['lname'];?></h2>
			</div>
			<div class="time">
				<p>09:00 AM <span>TO</span> 18:00 PM</p>
				<p>DOORS <span>@</span> 10:00 AM</p>
			</div>
			<p class="location"><span>Nzhelele</span>
				<span class="separator"><i class="far fa-smile"></i></span><span>La Vero Lifestyle</span>
			</p>
		</div>
	</div>
	<div class="right">
		<!-- <p class="admit-one">
			<span>ADMIT ONE</span>
			<span>ADMIT ONE</span>
			<span>ADMIT ONE</span>
		</p> -->
		<div class="right-info-container">
			<div class="show-name">
				<?php
				 $color = $ticket['type'];
				 $type =$ticket['type'];
		if($color =='General'){
			echo "<h1 style='color: Black;font-size: 25px;'> $type</h1>";
		}
		elseif($color =='VIP'){
			echo "<h1 style='color: gold;font-size: Larger;'> $type</h1>";
		}
				?>
			
			</div>
			<div class="time">
				<p >Admit one</p>
				<!-- <p>DOORS <span>@</span> 7:00 PM</p> -->
				<?php
		 $checked =$ticket['checked_in'];
		 if($checked =='1'){
			echo "<div style='color: red; font-weight: bold;'>REDEEMED</div>";
		}
				?>
				
			</div>
			
			<div class="barcode">
				<!-- <img src="https://external-preview.redd.it/cg8k976AV52mDvDb5jDVJABPrSZ3tpi1aXhPjgcDTbw.png?auto=webp&s=1c205ba303c1fa0370b813ea83b9e1bddb7215eb" alt="QR code"> -->
				<img src="<?php echo $ticket['path']; ?>" alt="QR code">
			</div>
			
			<p class="ticket-number">
			#<?php echo $ticket['qr_code'];?>
			</p>
		</div>
		
	</div>
</div><br><br>
	
</div>
<br><br><br>
<?php
$ticket_type=$ticket['type'];
if($ticket_type == 'VIP'){
echo '<a href="../vip-success" style="text-decoration: none;">
<div class="back" style="display:flex;justify-content:center;align-content:center;color:#fff;">&nbsp; Pay Ticket</div>
</a>';
}
else{
    echo '<a href="../general-success" style="text-decoration: none;">
    <div class="back" style="display:flex;justify-content:center;align-content:center;color:#fff;">&nbsp; Pay Ticket</div>
    </a>';
}
?>
<?php endforeach;?>
<?php } ?>
<a href="../index.php" style="text-decoration: none;">
<div class="back" style="display:flex;justify-content:center;align-content:center;color:#fff;">&nbsp; Back to cart</div>
</a>
<script src="./script.js"></script>
<script src="pup.js"></script>
</body>
</html>