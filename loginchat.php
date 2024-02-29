<?php
session_start();
if(isset($_SESSION['email'])){

?>

<?php
include "db.php";


if (isset($_POST["name"]) && isset($_POST["Id"])) {

  $name = $_POST["name"];
  $Id = $_POST["Id"];

  $q = "SELECT * FROM `users` WHERE uname='$name' && Id='$Id'";

  if ($rq = mysqli_query($db, $q)) {

    if (mysqli_num_rows($rq) == 1) {

      $_SESSION["userName"] = $name;
      $_SESSION["Id"] = $Id;
      header("location: index.php");



    } else {


      $q = "SELECT * FROM `users` WHERE Id='$Id'";
      if ($rq = mysqli_query($db, $q)) {
        if (mysqli_num_rows($rq) == 1) {
          echo "<script>alert($Id+' is already taken by another person')</script>";
        } else {

          $q = "INSERT INTO `users`(`uname`, `Id`) VALUES ('$name','$Id')";
          if ($rq = mysqli_query($db, $q)) {
            $q = "SELECT * FROM `users` WHERE uname='$name' && Id='$Id'";
            if ($rq = mysqli_query($db, $q)) {
              if (mysqli_num_rows($rq) == 1) {

                $_SESSION["userName"] = $name;
                $_SESSION["Id"] = $Id;
                header("location: index.php");

              }
            }

          }

        }
      }
    }
  }


}


?>
<html>

<head>
  <script>

    function handleCustomButtonClick() {

      window.location.href = 'login.html';
    }
  </script>
  <style>
   
    .form {
      display: flex;
      flex-direction: column;
      gap: 10px;
      background-color: #ffffff;
      padding: 30px;
      width: 450px;
      border-radius: 20px;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      margin-left: auto;
      margin-right: auto;

    }

    ::placeholder {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .form button {
      align-self: flex-end;
    }

    .flex-column>label {
      color: #151717;
      font-weight: 600;
    }

    .inputForm {
      border: 1.5px solid #ecedec;
      border-radius: 10px;
      height: 50px;
      display: flex;
      align-items: center;
      padding-right: 10px;
      transition: 0.2s ease-in-out;

    }

    .input {
      margin-left: 10px;
      border-radius: 10px;
      border: none;
      width: 85%;
      height: 100%;
    }

    .input:focus {
      outline: none;
    }

    .inputForm:focus-within {
      border: 1.5px solid #2d79f3;
    }

    .flex-row {
      display: flex;
      flex-direction: row;
      align-items: center;
      gap: 10px;
      justify-content: space-between;
    }

    .flex-row>div>label {
      font-size: 14px;
      color: black;
      font-weight: 400;
    }

    .span {
      font-size: 14px;
      margin-left: 5px;
      color: #2d79f3;
      font-weight: 500;
      cursor: pointer;
    }

    .button-submit {
      margin: 20px 0 10px 0;
      background-color: #151717;
      border: none;
      color: white;
      font-size: 15px;
      font-weight: 500;
      border-radius: 10px;
      height: 50px;
      width: 100%;
      cursor: pointer;
    }

    .button-submit:hover {
      background-color: #252727;
    }

    .p {
      text-align: center;
      color: black;
      font-size: 14px;
      margin: 5px 0;
    }

    .btn {
      margin-top: 10px;
      width: 100%;
      height: 50px;
      border-radius: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: 500;
      gap: 10px;
      border: 1px solid #ededef;
      background-color: white;
      cursor: pointer;
      transition: 0.2s ease-in-out;
    }


    .btn:hover {
      border: 1px solid #2d79f3;
      ;
    }


    .image-container {
      width: 100%;
    }

    .image-container img {
      width: 100%;
      height: auto;
      border-radius: 10px;
      
    }
    .imagehome {
                height: 30px;
                width: auto;
                margin-right: 0px;
                display: flex;
                position: absolute;
                margin-top: 3%;
                margin-left: 3%;
                background-color: transparent;
            }

            .imagehome:hover {

                height: 6%;
                border-radius: 10px;
            }

            .imagehome a:hover img {
                transform: scale(1.4);
            }

   


    body {
      background-color:#dddbdb;
    }
    .reason{
     
      text-align: center;
    }
  </style>

</head>

<body>

<a href="../main.php">
<img src="../mainpng/home.png" class="imagehome">
  </a>
  <form class="form" method="post" action="">
    

    <div class="image-container">


      <img src="pride2.jpg" alt="Description of the image">
    </div>
    <div class="reason">
      <a href="Reason.html">Why should I login again?</a>
    </div>
    <div class="flex-column">
      <label>Cyber Name </label>
    </div>
    <div class="inputForm">

      <input type="text" name="name" class="input" placeholder="Enter your Cyber Name" required>
    </div>

    <div class="flex-column">
      <label>Password </label>
    </div>
    <div class="inputForm">

      <input type="text" name="Id" class="input" placeholder="Enter your ID" required>

    </div>



    </div>
    <input type="submit" class="button-submit" value="submit">
  </form>

</body>

</html>
<?php
}else{
  header('location:../login.html');
}
?>