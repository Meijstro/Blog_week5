<!DOCTYPE html>
<?php include("database.php") ?>
<head>
<title></title>
<link rel="stylesheet" href="blog.css">
<script src= "jquery-3.3.1.min.js"></script>
<script src="filter.js"></script>
</head>
<body>

  <div class="categorieen">
    <h2 class="header2">Zoek op categorie</h2>
  <ul class="ul">
    <li><button id="allbtn">All</button></li>
    <li><button id="fcbtn">FC Groningen</button></li>
    <li><button id="cryptobtn">Cryptovaluta</button></li>
    <li><button id="trumpbtn">Trump</button></li>
  </ul>
  <br> <br>
<div>
  <form class="form" action="" method="POST">
    <h2 class="header2"> Zoek in articles </h2>
    <input id="zoekterm" type="text" name="zoekterm" required><br><br>
    <input class="button" type="submit" name= "button2" value="Search">
  </form>
</div>

  <div class="bericht" id="all">
    <?php
    if (isset($_POST['button2'])) {
              $zoekterm = $_POST['zoekterm'];

    // use data from the database and show it
    $sql= "SELECT * FROM articles WHERE message LIKE '%$zoekterm%' ORDER BY timestamp DESC;";
    $result= mysqli_query($connection,$sql);
    while($row= mysqli_fetch_assoc($result))
    {
      echo "<div class='category_".$row['categorie']."'><br>"."<b>".$row["user"]."</b>"." "."<span>".$row["timestamp"].
           "</span>"."<br>"."<br>"."&nbsp;&nbsp;".$row["message"]."<br>"."<br>".
           '<form class="form" action="comment.php" method="POST">'.
           '<input class="button" type="submit" value="Reageer">'.
           '<input type="hidden" name="article_id" value="'.$row['id'].'">'."</form>"."<hr></div>";
    }
  }
  else{

  // use data from the database and show it
    $sql= "SELECT * FROM articles ORDER BY timestamp DESC;";
    $result= mysqli_query($connection,$sql);
    while($row= mysqli_fetch_assoc($result))
    {
      echo "<div class='category_".$row['categorie']."'><br>"."<b>".$row["user"]."</b>"." "."<span>".$row["timestamp"].
           "</span>"."<br>"."<br>"."&nbsp;&nbsp;".$row["message"]."<br>"."<br>".
           '<form class="form" action="comment.php" method="POST">'.
           '<input class="button" type="submit" value="Reageer">'.
           '<input type="hidden" name="article_id" value="'.$row['id'].'">'."</form>"."<hr></div>";
  }
}


    ?>
  </div>
  </div>

</body>
</html>
