<?php
$db = mysqli_connect('localhost', 'root', '') or die('not connected');
  mysqli_select_db($db, 'project') or die('not selected');
?>