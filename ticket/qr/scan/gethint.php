<?php
require_once '../../../database/authcontroller.php';
// Check if the 'q' parameter is set in the request
if (isset($_REQUEST["q"])) {
  $q = $_REQUEST["q"];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM tickets WHERE qr_code = ? AND checked_in = 0";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $q);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    // $row = mysqli_fetch_assoc($result);
    // $name = $row['fname'];
    // $fname = $row['lname'];
    // $time_checked = $row['time_checked'];
    // $checkTime = date("h:i:sa");
    if (mysqli_num_rows($result) == 0) {
     
    // echo $name ; echo $fname; echo 'Has already checked in'; echo '@'; echo$time_checked ;
    echo 'Guest has already checked in';
    } else {
      // Fetch the guest's information
      $row = mysqli_fetch_assoc($result);
      $name = $row['fname'];
      $fname = $row['lname'];
      $checkTime = date("h:i:sa");

      // Update the database to mark the guest as checked in
      $query = "UPDATE tickets SET checked_in = 1, time_checked = ? WHERE qr_code = ?";
      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "ss", $checkTime, $q);

      if (mysqli_stmt_execute($stmt)) {
        echo 'Successfully checked in';"<br>";
        echo 'Welcome: ' . $name; 
      }
    }

 
  }
 else {
  echo '<div class="alert alert-success"><strong>Success!</strong> Guest successfully checked in</div>';
  echo date('l jS \of F Y h:i:s A');
}
?>
