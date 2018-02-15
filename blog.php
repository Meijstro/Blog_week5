<!DOCTYPE html>
<?php session_start();?>
<?php include("database.php") ?>
<head>
<title></title>
<link rel="stylesheet" href="blog.css">
<script src= "jquery-3.3.1.min.js"></script>
<script type="text/javascript" src=""></script>
</head>
<body>
  <?php
  if(isset($_SESSION['current_user_id'])){
      ?>

<div class="categorieen">
   <ul class="ul">
     <li><a href="all.php">Go to Blog</a></li>
   </ul>

 <div class="bericht" id="all">
   <?php
   // show written article to blogger
    echo "<br>"."<b>".$_POST["blogger"]."</b>". " ";
    echo "<br>"."<br>";
    echo "&nbsp;&nbsp;".$_POST["bericht"];
    echo "<hr>";


   // send the data to database
   $bericht=$_POST["bericht"];
   $blogger=$_POST["blogger"];
   $categorie=$_POST["categorie"];
   $sql="INSERT INTO articles(user, message, categorie)
   VALUES ('$blogger','$bericht','$categorie')";
   $result= mysqli_query($connection,$sql);

    ?>
 </div>
</div>
<?php } else{
  echo "failed to log in";
  header("Location: login.php");
}
?>

</body>
</html>
