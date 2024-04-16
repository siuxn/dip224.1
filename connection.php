<?php 

  $con = mysqli_connect("localhost", "root", "", "assignment");

  if(mysqli_connect_errno()){
    die("Cannot Connect to the database".mysqli_connect_error());
  }
//upload and retreive image
define("UPLOAD_SRC", $_SERVER['DOCUMENT_ROOT'] . "/myproject/DIP224/uploadForAdmin/");
define("FETCH_SRC", "http://localhost/myproject/DIP224/uploadForAdmin/");

?>