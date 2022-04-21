<?php
  session_start();
  include "./fonction/base.php";
   
  #Connect Database
  $con=mysqli_connect("localhost","root","","db_patient");
	
  $sql="DELETE FROM Patient WHERE id='{$_GET["id"]}'";
  if($con->query($sql)){
    header("location:liste.php");
  }else{
    header("location:patient.php");
  }
?>