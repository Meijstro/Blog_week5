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
      if($result->num_rows < 1){
          
          $sql = "INSERT INTO users (username, password)
                      VALUES ('$add_username','$add_password');";
          $result = mysqli_query($connection, $sql);
          if($result!=1)
          {
              echo "Er is iets fout gegaan, probeer opnieuw!";
          }
          else{
              echo "U heeft succesvol een nieuw user account aagemaakt!";
          }
      }else{
          echo "De username die je gekozen hebt bestaat al.";
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


</body>
</html>
