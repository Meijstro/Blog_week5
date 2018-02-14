<!DOCTYPE html>
<head>
<title></title>
<link rel="stylesheet" href="blog.css">
<script src= "jquery-3.3.1.min.js"></script>
<script type="text/javascript" src=""></script>
</head>


<body>

  <?php
    if(isset($_POST['register'])){
      $add_username = mysqli_real_escape_string($connection, $_POST['username']);
      $add_password = mysqli_real_escape_string($connection, $_POST['password']);
      $sql = "SELECT * FROM users WHERE username = '$add_username';";
      $result = mysqli_query($connection, $sql);
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
