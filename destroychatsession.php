<?php
session_start();

// Unset specific session variables related to the chatroom
unset($_SESSION["userName"]);
unset($_SESSION["Id"]);

// Redirect to main.php
header("Location: ../main.php");
exit;
?>
