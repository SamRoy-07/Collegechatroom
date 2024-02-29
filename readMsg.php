<?php
session_start();
include "db.php";

$q = "SELECT * FROM `msg`";
if ($rq = mysqli_query($db, $q)) {

  if (mysqli_num_rows($rq) > 0) {

    while ($data = mysqli_fetch_assoc($rq)) {
      if($data["Id"]==$_SESSION["Id"]){
        ?>
  <p class="sender">
    <span><?= $data["Id"] ?></span>
    <?= $data["msg"] ?>
</p>

<?php
      }else{
?>
  <p>
    <span><?= $data["Id"] ?></span>
    <?= $data["msg"] ?>
</p>

<?php
      }
    }
  } else {

    echo "<h3> Chat is empty at this moment!!</h3>";
  }
}




?>