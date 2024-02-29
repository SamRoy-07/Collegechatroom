
<?php
session_start();
include "db.php";
$msg = $_GET["msg"];
$Id = $_SESSION["Id"];

$q = "SELECT * FROM `users` WHERE Id='$Id'";
if ($rq = mysqli_query($db, $q)) {
  if (mysqli_num_rows($rq) == 1) {

    $q = "INSERT INTO `msg`(`Id`, `msg`) VALUES ('$Id','$msg')";
    $rq = mysqli_query($db, $q);


  }
}



?>