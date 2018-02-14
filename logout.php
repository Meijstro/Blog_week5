<!DOCTYPE html>
<head>
<title></title>
<link rel="stylesheet" href="blog.css">
<script src= "jquery-3.3.1.min.js"></script>
<script type="text/javascript" src=""></script>
</head>
<body>
<?php session_start(); ?>
<?php

session_unset();
 ?>
<br> <br> <br>
 <h2 class="header2"> You have succesfully logged out! </h2>
 <br> <br>
 <input type="button" class="button1" value="Login" onclick="window.location.href='login.php'">
</body>
</html>
