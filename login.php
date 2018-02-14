<!DOCTYPE html>
<head>
<title></title>
<link rel="stylesheet" href="blog.css">
<script src= "jquery-3.3.1.min.js"></script>
<script type="text/javascript" src=""></script>
</head>


<body>

  <?php
    session_start();

    $username = "username";
    $password = "password";

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header("Location: index.php");
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] == $username && $_POST['password'] == $password)
      {
            $_SESSION['loggedin'] = true;
            header("Location: index.php");
          }
        }
  ?>

  <div class="categorieen">
    <h1 id="header1">Welkom</h1>
</div>
  <form class="form" action="" method="POST">
    <input class="textfield" type="text" name="username" placeholder="username" required> <br> <br>
    <input class="textfield" type="password" name="password" placeholder="password" required> <br> <br> <br>
    <input type="submit" class="button1" value="Login">
  </form>

  <br> <br>

  <input class="button1" type="button" value="Create account" onclick="window.location.href='register.php'">


</body>
</html>
