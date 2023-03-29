<?php
// include 'connection.php';

session_start();

  $myid=$_SESSION['id'];
  $name=$_SESSION['name'];

  if(!isset($_SESSION['id']))
  {
    echo "<script>window.location='../login.php'</script>";
  }else
?>
