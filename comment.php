<!DOCTYPE html>
<?php session_start();?>
<?php include("database.php") ?>
<head>
<title></title>
<link rel="stylesheet" href="blog.css">
<script src= "jquery-3.3.1.min.js"></script>
</head>
<body>
  <?php
  if(isset($_SESSION['current_user_id'])){
      ?>
<div class="categorieen">
  <ul class="ul">
    <li><a href="all.php">Go back</a></li>
  </ul>
<?php
  $article_id = $_POST['article_id'];
  $sql= "SELECT * FROM articles WHERE id='$article_id'";
  $result= mysqli_query($connection,$sql);
    while($row= mysqli_fetch_assoc($result))
      {
        echo "<div class=bericht>"."<div class='category_".$row['categorie']."'><br>"."<b>".$row["user"]."</b>"." "."<span>".$row["timestamp"].
             "</span>"."<br>"."<br>"."&nbsp;&nbsp;".$row["message"]."<br>"."<br>"."<hr>"."</div>";
}
  $sql= "SELECT * FROM comments, articles WHERE articles.id='$article_id' AND articles.id = comments.article_id ORDER BY comments.timestamp";
  $result= mysqli_query($connection,$sql);
  while($row= mysqli_fetch_assoc($result))
      {
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['comment'].
             "<br>"."<br>"."<hr>";
}

  ?>

<br>
<div class="categorieen">


<form class="form" action="" method="POST">
  <h2 class="header2"> Comment: </h2>
    <textarea id="text_comment" type="text" name="comment" required></textarea>
    <input type="hidden" name="article_id" value="<?php echo $article_id;?>"/>
    <input class="button" type="submit" name="button4" value="Verzenden"/>
</form>
</div>
  <?php

    if(isset($_POST['button4']))
    {
      $comment = $_POST['comment'];
      $article_id = $_POST['article_id'];
      $sql = "INSERT INTO comments(comment, article_id)
            VALUES ('$comment',$article_id)";
      $result = mysqli_query($connection,$sql);
  }
  ?>

<?php } else{
  echo "failed to log in";
  header("Location: login.php");
}
?>


</body>
</html>
