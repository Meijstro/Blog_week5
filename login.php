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
if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection, $sql);
    if($result == true)
    {
        session_start();
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($connection, $sql);
        $subjects = mysqli_fetch_assoc($result);
        $_SESSION['current_user_id'] = $subjects['id'];
        header("Location: index.php");
    }
    else {
        echo "Invalid username or password!";
    }
}
?>

  <div class="categorieen">
    <h1 id="header1">Welkom</h1>
</div>
  <form class="form" action="" method="POST">
    <input class="textfield" type="text" name="username" placeholder="username" required> <br> <br>
    <input class="textfield" type="password" name="password" placeholder="password" required> <br> <br> <br>
    <input type="submit" class="button1" name="login" value="Login">
  </form>

  <br> <br>

  <input class="button1" type="button" value="Create account" onclick="window.location.href='register.php'">


</body>
</html>
