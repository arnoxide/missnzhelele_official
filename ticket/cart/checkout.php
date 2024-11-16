<?php
require_once '../../database/authcontroller.php';
$uid = $_SESSION['id'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];

$sql = "SELECT * FROM tickets WHERE email = '$email' AND status = 'Not Paid'";
$result = mysqli_query($conn, $sql);
$goal = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>shopping cart checkout</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{margin-top:20px;
    background:#eee;
}
h3 {
    font-size: 16px;
}
.text-navy {
    color: #1ab394;
}
.cart-product-imitation {
  text-align: center;
  padding-top: 30px;
  height: 80px;
  width: 80px;
  background-color: #f8f8f9;
}
.product-imitation.xl {
  padding: 120px 0;
}
.product-desc {
  padding: 20px;
  position: relative;
}
.ecommerce .tag-list {
  padding: 0;
}
.ecommerce .fa-star {
  color: #d1dade;
}
.ecommerce .fa-star.active {
  color: #f8ac59;
}
.ecommerce .note-editor {
  border: 1px solid #e7eaec;
}
table.shoping-cart-table {
  margin-bottom: 0;
}
table.shoping-cart-table tr td {
  border: none;
  text-align: right;
}
table.shoping-cart-table tr td.desc,
table.shoping-cart-table tr td:first-child {
  text-align: left;
}
table.shoping-cart-table tr td:last-child {
  width: 80px;
}
.ibox {
  clear: both;
  margin-bottom: 25px;
  margin-top: 0;
  padding: 0;
}
.ibox.collapsed .ibox-content {
  display: none;
}
.ibox:after,
.ibox:before {
  display: table;
}
.ibox-title {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background-color: #ffffff;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 3px 0 0;
  color: inherit;
  margin-bottom: 0;
  padding: 14px 15px 7px;
  min-height: 48px;
}
.ibox-content {
  background-color: #ffffff;
  color: inherit;
  padding: 15px 20px 20px 20px;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 1px 0;
}
.ibox-footer {
  color: inherit;
  border-top: 1px solid #e7eaec;
  font-size: 90%;
  background: #ffffff;
  padding: 10px 15px;
}
    </style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-md-9">
<div class="ibox">
<div class="ibox-title">
<span class="pull-right"><strong>
<?php
$sql ="SELECT count(sn) AS total FROM tickets WHERE status='Not Paid' AND email = '$email'";
$result = mysqli_query($conn, $sql);
 // output data of each row
$values= mysqli_fetch_assoc($result);
$num_rows=$values['total'];
 echo $num_rows;?>
</strong> items</span>
<h5>Items in your cart</h5>
</div>
<div class="ibox-content">
<div class="table-responsive">
<table class="table shoping-cart-table">
<tbody>
<tr>
<td width="90">
<div class="cart-product-imitation">
</div>
</td>
<?php foreach($goal as $key => $ticket):?>
<td class="desc">
<h3>
<a href="../viewTicket?id=<?php echo $ticket['qr_code'];?>" class="text-navy">
<?php echo $ticket['type'];?> Ticket
</a>
</h3>
<p class="small">
<?php echo $ticket['fname'];?><br>
<?php echo $ticket['lname'];?><br>
<?php echo $ticket['email'];?><br>
<?php echo $ticket['contact'];?><br>
<?php echo $ticket['status'];?><br>
</p>
<!-- <dl class="small m-b-none">
<dt>Description lists</dt>
<dd>A description list is perfect for defining terms.</dd>
</dl> -->
<div class="m-t-sm">
<!-- <a href="#" class="text-muted"><i class="fa fa-gift"></i> Add gift package</a> -->
<a href="delete?id=<?php echo $ticket['qr_code'];?>" class="text-muted"><i class="fa fa-trash"></i> Remove ticket</a>
<a href = "../viewTicket?id=<?php echo $ticket['qr_code'];?>" button class="btn btn-success pull-right"><i class="fa fa fa-shopping-cart"></i> Pay Ticket</button></a>
</div>
</td>
<!-- <td>
$180,00
<s class="small text-muted">$230,00</s>
</td> -->
<!-- <td width="65">
<input type="text" class="form-control" placeholder="1">
</td> -->
<td>
<h4>
  <?php 
$ticket_type = $ticket['type'];
if($ticket_type == 'VIP'){
  echo 'R250';
}else{
  echo 'R100';
}
  ;?>

</h4>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="ibox-content">
<div class="table-responsive">
<table class="table shoping-cart-table">
<tbody>
<tr>
<td width="90">
<div class="cart-product-imitation">
</div>
</td>
<?php endforeach;?>
</tr>
</tbody>
</table>
</div>
</div>
<div class="ibox-content">
<!-- <button class="btn btn-primary pull-right"><i class="fa fa fa-shopping-cart"></i> Checkout</button> -->
<a href= "../" ><button class="btn btn-white"><i class="fa fa-arrow-left"></i> Continue shopping</button></a>
</div>
</div>
</div>



</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>