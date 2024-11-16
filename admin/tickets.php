<?php
require_once('../database/authcontroller.php');

require_once('../database/mailer.php');


//////////end poster query
$mk="SELECT * FROM tickets";
$res=mysqli_query($conn, $mk);
$ca=mysqli_fetch_all($res, MYSQLI_ASSOC);
$email = $ca[0]['email'];
$lname = $ca[0]['lname'];
$type = $ca[0]['type'];
$path = $ca[0]['path'];

  //poster querry
if(isset($_POST['save'])){
$poster = $_POST["poster"];
$con_num = $_POST["con_num"];
$useremail = $_POST["useremail"];
$usertype = $_POST["usertype"];
$userImage = $_POST["userImage"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];

$sql = "UPDATE tickets SET status='$poster' WHERE qr_code='$con_num'";
$result = mysqli_query($conn, $sql);

 if (mysqli_query($conn, $sql)) {
        //  echo "$sql";
        ticketSale($useremail,$fname,$lname,$type,$path,$usertype,$userImage,$base_url);
        header("refresh:0 tickets");
        exit(0);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
   
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Miss Nzhelele Admin </title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">


<script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=-7eSns8llm-RMrRDsxHMEIf7RLOedtIl6ZakLhKnAVIi-rbZhzluH4rAXuSX_8wNGEWusUgzMC9IkFMaNASdxErVoYrB2Z8hTL1irKOppalmPhXlsdexC0odXcoEnuLC" charset="UTF-8"></script></head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  <?php include_once('includes/side-bar2.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tickets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tickets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card-header">
                <h3 class="card-title"></h3> 
              <button class="btn btn-success btn-xs" style="margin-left: 76%" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Add</button>
                <div class="modal fade" id="add">
                        <div class="modal-dialog modal-sm">
                            <form method="post" action="postimages.php" enctype="multipart/form-data">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add Ticket</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Name</label>
                                  <input type="text" class="form-control" name="name" placeholder="Enter Item Name ..">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Surname</label>
                                  <input type="text" class="form-control" name="name" placeholder="Enter Item Name ..">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Contact</label>
                                  <input type="text" class="form-control" name="name" placeholder="Enter Item Name ..">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email</label>
                                  <input type="email" class="form-control" name="name" placeholder="Enter Item Name ..">
                                </div>
                              </div>
                          </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                              <button type="submit" name="lost" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                            </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
              </div>
  <?php include_once 'flash-messages.php';?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
       

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data table</h3> 
               

              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Number</th>
                    <th>QR code</th>
                    <th>Full Names</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Redeemed?</th>
                    <th>paid?</th>
                    <th></th> 
                    <th></th>  
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($ca as $key => $ct):?>
                  <tr>
                  <td><?php echo $ct['sn'];?></td>
                  <td><img src="<?php echo'../ticket/'.$ct['path']; ?>" 
                  class="img-square elevation-3" style="width:50px; border-radius:10%;" alt="User Image"></td>
                    <td><?php echo $ct['fname'];?></td>
                    <td><?php echo $ct['lname'];?></td>
                    <td><?php echo $ct['email'];?></td>
                    <td><?php echo $ct['contact'];?></td>
                    <td><?php echo $ct['type'];?></td>
                    <td>
<?php 
$checkedIn = $ct['checked_in'];
if($checkedIn == '0'){
  echo 'No';
}else{
  echo 'Yes';
}
?>

                    </td>
                    <td><?php 
$statusPaid = $ct['status'];
if($statusPaid == 'Not Paid'){
  echo 'No';
}else{
  echo 'Yes';
}
?></td>
                    <td>
                      <Form action="tickets" method="POST">
                    <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="poster" required>
                                            <option disabled="disabled" selected="selected">Update Payment Status</option>
                                            <option value="Paid">Has Paid</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>    
                        <input style="background:gold; color:white; height:30px; border-radius:15px; font-size:15px;" 
                        type="hidden" value="<?php echo $ct['qr_code'];?>" name="con_num">

                        <input style="background:gold; color:white; height:30px; border-radius:15px; font-size:15px;" 
                        type="hidden" value="<?php echo $ct['email'];?>" name="useremail">

                        <input style="background:gold; color:white; height:30px; border-radius:15px; font-size:15px;" 
                        type="hidden" value="<?php echo $ct['fname'];?>" name="fname">
                        
                        <input style="background:gold; color:white; height:30px; border-radius:15px; font-size:15px;" 
                        type="hidden" value="<?php echo $ct['lname'];?>" name="lname">

                        <input style="background:gold; color:white; height:30px; border-radius:15px; font-size:15px;" 
                        type="hidden" value="<?php echo $ct['type'];?>" name="usertype">


                      <input type="hidden" name="userImage" value="C:/xampp/htdocs/missNzhelele/ticket/<?php echo $ct['path']; ?>">
                            <input style="background:gold; color:white; height:30px; border-radius:15px; font-size:15px;" 
                        type="submit" value="Update Status" name="save">
                    </div>
                    </form>
                           
                    </td>
                    <td><a href="tickets?id=<?php echo $row['con_num'];?> "button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button></a> 
                    
                    <a href="delete.php?id=<?php echo $ct['qr_code'];?> "button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a> 
                    <!--<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>-->
                 </td>
                  </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>     
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Footer <a href="">Miss Nzhelele Admin 2023</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Footer</b>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [""]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>




</body>
</html>
