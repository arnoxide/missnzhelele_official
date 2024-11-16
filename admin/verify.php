<?php

$host = 'localhost:3306';
$user = 'missnzhe_nzhelele';
$pass = 'MissNzhelele@2022';
$db_name = 'missnzhe_nzhelele';

$conn = new MySQLI($host, $user, $pass, $db_name);

$sql = "INSERT INTO top40 SELECT * FROM contestant WHERE top40='1'";
if(!mysqli_query($conn,$sql))

  {
        echo '<script>alert("Already Invited")</script>';
  }
  else{
            echo '<script>alert("Invitation successfully sent")</script>';
           
  }
  header("refresh:0; url=http://localhost/ktp/space/index");


