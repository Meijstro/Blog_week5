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
      if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
            header("Location: login.php");
      }
   ?>

  <div id="wie">
  <input type="button" class="button1" value="Ik ben een blogger"
        onclick="window.location.href='blogger.php'">
</br> </br> </br>
  <input type="button" class="button1" value="Ik ben een lezer"
        onclick="window.location.href='all.php'">
 </div>

 <?php

 /*$username=$_POST["username"];
 $password=$_POST["password"];
 $sql="INSERT INTO inloggen(username, password)
 VALUES ('$username','$password')";
 $result= mysqli_query($connection,$sql);*/

  ?>
  <a href="logout.php">Log out</a>


</body>
</html>
