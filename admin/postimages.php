<?php
//session_start();
$con = mysqli_connect('localhost:3306', 'root', '', 'missnzhelele');
//$con_num= $_GET['con_num'];

require_once('../database/authcontroller.php');

require_once('../database/mailer.php');


//////////end poster query
                                
                                //poster querry
if(isset($_POST['save'])){
    
$poster = $_POST["poster"];
$con_num = $_POST["con_num"];

$sql = "UPDATE contestant SET poster='$poster' WHERE con_num='$con_num'";
$result = mysqli_query($conn, $sql);

 if (mysqli_query($conn, $sql)) {
         echo "$sql";
        header("refresh:0 postimages.php");
     
        exit(0);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
   
}

if(isset($_POST['top40'])){
    
$new = $_POST["new"];
$con_num = $_POST["con_num"];

$sql = "UPDATE contestant SET top40='$new' WHERE con_num='$con_num'";
$result = mysqli_query($conn, $sql);

 if (mysqli_query($conn, $sql)) {
         echo "$sql";
        header("refresh:0 postimages.php");
     
        exit(0);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
   
}
                                

    if(isset($_POST['POST'])){

    $fullname = $_POST["fullname"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    $phone = $_POST["phone"];
    $motto = $_POST["motto"];
    $new_returning = $_POST["new_returning"];
    $poster = $_POST["poster"];
    $generate= "012345678910111213141516171819202122232425262728290313233343536373839404142434445464748495051525354555657585960616263646566676869707172737475767778798081828384858687888990919293949596979899";
    $idgen=  substr(str_shuffle($generate),0,3); 
  
    // Handle uploaded picture
    $picture = $_FILES["picture"]["name"];
    $temp_file = $_FILES["picture"]["tmp_name"];
    $picture_path = "uploads/" . $picture;
    move_uploaded_file($temp_file, $picture_path);

    // Insert data into the database
    $sql = "INSERT INTO contestant (con_num,fullname, lastname, age, email, location, phone, picture, motto,new_returning,poster)
            VALUES ('$idgen','$fullname', '$lastname', '$age', '$email', '$location', '$phone', '$picture_path', '$motto','$new_returning', '$poster')";



// // Prepare a SQL query to check for existing email
// $sql = "SELECT * FROM contestant WHERE email = '$email'";

// // Execute the query
// $result = $conn->query($sql);

// // Check if any rows are returned
// if ($result->num_rows > 0) {
//     // Email already exists, display an error message or redirect back to the registration form
//     echo "contestant already exists. Please check your email to view your profile, if facing any problem contact: 0812585734.";
//     exit; // Stop further execution of the script
// }

    if (mysqli_query($conn, $sql)) {
        // echo "Registration successful!";
        header("refresh:0 postimages.php");
     
        exit(0);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
   

    // Close the database connection
    mysqli_close($conn);
}


$mk="SELECT * FROM contestant";
$res=mysqli_query($con, $mk);
$ca=mysqli_fetch_all($res, MYSQLI_ASSOC);


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
            <h1>Contenstants</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contenstants</li>
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
                              <h4 class="modal-title">Add Contenstants</h4>
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
                                <!-- <div class="col-12" style="margin-top: 6%">
                                  <div class="form-group">
                                    <select class="form-control" name="category">
                                      <option disabled="" selected="">Select Post Category</option>
                                      <option value="Cards">Cards</option>
                                      <option value="Electronics">Electronics</option>
                                      <option value="Accesories">Accesories</option>
                                    </select>
                                  </div>
                                </div> -->
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Description</label>
                                  <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Date</label>
                                  <input type="Date" class="form-control" name="date" placeholder="Enter Item Name ..">
                                </div>

                                <label for="img">Upload Image:</label>
                          <input type="file" id="img" name="doc[]" accept="image/*">
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
                    <th>have poster</th>
                    <th></th>
                    <th>Top 40?</th>
                    <th></th>
                    <th></th>
                     
                  </tr>
                  </thead>
                  <tbody>

          
              
                    <?php foreach($ca as $key => $ct):?>
                    
                  <tr>
                  <td><?php echo $ct['sn'];?></td>
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
                    <td><?php if ($ct == '1'){
                      echo "Yes";
                    } else{
                      echo "No";
                    }?></td>
                    <td><?php echo $ct['votes'];?></td>
                    <td><?php echo $ct['reg_date'];?></td>
                    <td>
                      <Form action="postimages.php" method="POST">
                    <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="poster" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                                

                                
                        <input style="background:gold; color:white; height:30px; border-radius:15px; font-size:15px;" 
                        type="hidden" value="<?php echo $ct['con_num'];?>" name="con_num">
                        
                        
                            <input style="background:gold; color:white; height:30px; border-radius:15px; font-size:15px;" 
                        type="submit" value="save" name="save">
                        
                        
                            
                        
                    </div>
                    </form>
                            <td><?php echo $ct['poster'];?></td>   
                    </td>
                    
                    <!--========selecting top 40 code================-->
                       <td>
                      <Form action="postimages.php" method="POST">
                    <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="new" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                            
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                        <input style="background:gold; color:white; height:30px; border-radius:15px; font-size:15px;" 
                        type="hidden" value="<?php echo $ct['con_num'];?>" name="con_num">
                        <input style="background:gold; color:white; height:30px; border-radius:15px; font-size:15px;" 
                        type="submit" value="save" name="top40">
                    </div>
                    </form>
                            <td><?php $top40 =  $ct['top40'];
                            if ($top40 == '1'){
                      echo "Yes";
                    } else{
                      echo "No";
                    }
                            ?></td>   
                    </td>
                     <!--=======end selecting top 40 code===============-->
                     
                    <td><a href="postimages.php?id=<?php echo $row['con_num'];?> "button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button></a> 
                    
                    <a href="delete.php?id=<?php echo $ct['con_num'];?> "button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a> 
             
                    
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
