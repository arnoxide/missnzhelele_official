<?php
require_once 'database/authcontroller.php';

$mk="SELECT * FROM contestant";
$res=mysqli_query($conn, $mk);
$ca=mysqli_fetch_all($res, MYSQLI_ASSOC);


$errors = array();
$approve = "";
$reject = "";

// $uid = $_SESSION['id'];
// $mk="SELECT * FROM users WHERE id=$uid";
// $res=mysqli_query($conn, $mk);
// $lost=mysqli_fetch_all($res, MYSQLI_ASSOC);

// $id = $_GET['id'];

// $mk="SELECT * FROM founders JOIN lost_items ON lost_items.id=claims.item_id WHERE item_id='$e'";
// $res=mysqli_query($conn, $mk);
// $ca=mysqli_fetch_all($res, MYSQLI_ASSOC);


if(isset($_POST['approve'])){
  $approve = $_POST['approve'];
  if (count($errors) === 0) {
  $sql = "UPDATE founders SET approved='1' WHERE company_id ='$approve'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $_SESSION['message'] = 'Company Successfully Approved';
    $_SESSION['type'] = 'success';
    }
  // $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);  
  // echo '<script type/javascript> alert("Company.")</script>';
  // $url = $_SERVER['PHP_SELF'];
  // header("refresh:0; url=$url");
  // exit(0);
}
}
if(isset($_POST['reject'])){
  $reject = $_POST['reject'];
  $sql = "UPDATE founders SET approved='0' WHERE company_id ='$reject'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $_SESSION['messages'] = 'Company Successfully Rejected';
    $_SESSION['types'] = 'danger';
    }
}
  // $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);  
  // echo '<script type/javascript> alert("File Successfully restored.")</script>';
  // //  header("refresh:0; url=http://localhost/echo/echo-tech/cloud/sources/index.php");
  // exit(0);




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>theBoxlab. | Admin </title>


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
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">theBoxlab.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
   <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
    <img src="dist/img/avatar.png" class="img-square elevation-3" style="width:30px;  border-radius:10%;" alt="User Image">        </div>
        <div class="info">
        <a href="#" class="d-block" style="margin-top: -12px"><?php echo $_SESSION['username'];?></a>
         <a href="#" style="color: #239db1; font-size: 15px"><i class="fa fa-circle text-primary" style="font-size: 13px;"></i> Admin</a>
        </div>

      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="companies.php" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
               Companies
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="postimages.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Post Blogs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="postcategory.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                View Votes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="memberinfo.php" class="nav-link">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Users
              </p>
            </a>
          </li>
         
          
         
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Companies</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Companies</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
       

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Companies Data table</h3> 
               
                <div class="modal fade" id="add">
                        <div class="modal-dialog modal-sm">
                            <form action="">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add Category</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Category</label>
                                  <input type="text" class="form-control" id="" placeholder="Enter Barangay Name ..">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Description</label>
                                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                              </div>
                          </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                              <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                            </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                
                  <tr>
                    
                  <th>Contenstants pictures</th>
                    <th>Full Names</th>
                    <th>Last Name</th>
                    <th>Contenstants Number</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Location</th>
                    <th>Motto</th>
                    <th>Returning?</th>
                    <th>Votes</th>
                    <th>Registered Date</th>
             
      
                 
                  <?php foreach($ca as $key => $ct):?>
                    <tr>
                  <td><img src="<?php echo'../registration/'.$ct['picture']; ?>" 
                  class="img-square elevation-3" style="width:50px; border-radius:10%;" alt="User Image"></td>
                
                    <td><?php echo $ct['fullname'];?></td>
                    <td><?php echo $ct['lastname'];?></td>
                    <td><?php echo $ct['con_num'];?></td>
                    <td><?php echo $ct['email'];?></td>
                    <td><?php echo $ct['phone'];?></td>
                    <td><?php echo $ct['age'];?></td>
                    <td><?php echo $ct['location'];?></td>
                    <td><?php echo $ct['motto'];?></td>
                    <td><?php echo $ct['new_returning'];?></td>
                    <td><?php echo $ct['votes'];?></td>
                    <td><?php echo $ct['reg_date'];?></td>
                    
                    <td><a href="companies.php?id=<?php echo $row['con_num'];?> "button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button></a> <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> </td>
                  </tr>
                  <?php endforeach;?>
                  <?php //$ct = $row['con_num'];?>
                  
                  </tbody> 
                  
                </table>
                <?php 
// $mk="SELECT * FROM contenstant WHERE con_num = $ct LIMIT 1";
// $result = mysqli_query($conn, $mk);
// //endforeach;
// if (mysqli_num_rows($result) > 0) {
// // output data of each row
// while($rows = mysqli_fetch_assoc($result)) {
?>

                      <div class="modal fade" id="edit">
                        <div class="modal-dialog modal-sm">
                          
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update Company</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                           
                            <!-- <div class="card card-primary">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Barangay</label>
                                  <input type="text" class="form-control" id="" placeholder="Enter Barangay Name ..">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Information</label>
                                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                              </div>
                          </div> -->
                            <div class="modal-footer justify-content-between">
                              <button type="submit" value="<?php echo $rows['company_id'];?>" name="reject" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> <?php echo $rows['company_name'];?></button>
                              <button type="submit" value="<?php echo $rows['company_id'];?>" name="approve" class="btn btn-primary"><i class="fa fa-check"></i> Approve</button>
                             
                            </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <?php// }}?>
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
    <strong> <a href="">theBoxlab.</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
     
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
