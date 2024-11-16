<?php
require_once('../database/authcontroller.php');

$id = $_GET['id'];

$mk="SELECT * FROM contestant WHERE con_num= '$id'";
$res=mysqli_query($conn, $mk);
$ca=mysqli_fetch_all($res, MYSQLI_ASSOC);


if (isset($_POST['delete'])){
    $con_num = $_POST["con_num"];
  // Delete data from table
$sql = "DELETE FROM contestant WHERE con_num=$con_num ";
$result = mysqli_query($conn, $sql);

  if ($result) {
     $_SESSION['message'] = 'Contenstant Successfully deleted';
     $_SESSION['types'] = 'danger';
    ////MAKE A STMT TO SEN DEMAIL WHEN USER DELETES ACC
    header("refresh:2; url=postimages.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Modal</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include_once 'flash-messages.php';?>
    <?php foreach($ca as $key => $con):?>
    <form method="POST" >
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Contenstant</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete? <br> <br> <?php echo $con['fullname'];?> <?php echo $con['lastname'];?> </p>
      </div>
         <div class="modal-footer">
            <input style="background:gold; color:white; height:30px; border-radius:15px; font-size:15px;"
                        type="hidden" value="<?php echo $con['con_num'];?>" name="con_num">
          
      <a href="postimages.php" name="modal" class="btn btn-secondary" id="close-modal">No</a>
       <button type="submit" name="delete" class="btn btn-danger">Yes</button>
       
      </div>
    </div>
  </div>
</div>
</form>
<?php endforeach;?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#myModal').modal('show');
  });
</script>

</body>
</html>
