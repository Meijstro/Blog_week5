<!DOCTYPE html>
<?php include("database.php") ?>
<head>
<title></title>
<link rel="stylesheet" href="blog.css">
<script src= "jquery-3.3.1.min.js"></script>
<script type="text/javascript" src=""></script>
</head>


<body>

  <?php
  $error = "";
  if(isset($_POST['register'])){
      $add_username = mysqli_real_escape_string($connection, $_POST['username']);
      $add_password = mysqli_real_escape_string($connection, $_POST['password']);
      $sql = "SELECT * FROM users WHERE username = '$add_username';";
      $result = mysqli_query($connection, $sql);
      $encrypt_password=md5($add_password);
      if($result->num_rows < 1){

          $sql = "INSERT INTO users (username, password)
                      VALUES ('$add_username','$encrypt_password');";
          $result = mysqli_query($connection, $sql);
          if($result!=1)
          {
              echo "Something went wrong, try again!";
          }
          else{
              echo "You succesfully created an account!";
          }
      }else{
          echo "This username already exists, try another!";
      }
  }
  ?>

  <div class="categorieen">
    <h1 id="header1">Welkom</h1>
</div>
  <form class="form" action="" method="POST">
    <input class="textfield" type="text" name="username" placeholder="username" required> <br> <br>
    <input class="textfield" type="password" name="password" placeholder="password" required> <br> <br> <br>
    <input type="submit" class="button1" name="register" value="Create account">
  </form>

  <br> <br>

  <input type="button" class="button1" value="Go back" onclick="window.location.href='login.php'">


</body>
</html>
