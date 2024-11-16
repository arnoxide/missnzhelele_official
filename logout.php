<?php

  session_start();

  unset($_SESSION['id']);
  unset($_SESSION['lname']);
  unset($_SESSION['fname']);
  unset($_SESSION['email']);
  unset($_SESSION['admin']);
  unset($_SESSION['message']);
  unset($_SESSION['type']);
  session_destroy();

   header('location: index');
 ?>