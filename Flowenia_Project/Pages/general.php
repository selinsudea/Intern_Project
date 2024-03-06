<?php
if (isset($_GET['buser_name'])) {
    $user_name = urldecode($_GET['buser_name']);


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="general.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<header class="main-header">
        <a href="#" id="main-header__logo">Flowenia</a>
        <nav class="main-nav">
            <ul class="main-nav__items">
            <li class="main-nav__item">
                    <!-- <a href="home.php">Home</a> -->
                    <?php
echo "<a href='home.php?huser_name=" . urlencode($user_name) . "'>Home</a>";
?>
                </li>
                <li class="main-nav__item">
                <?php
echo "<a href='books.php?buser_name=" . urlencode($user_name) . "'>Books</a>";
?>
                </li>
                <li class="main-nav__item">
                    <a href="help.php">Help</a>
                </li>
                <li class="main-nav__item">
                    <a href="#">Settings</a>
                </li>
              
            </ul>
        </nav>
    </header>


    <div class="content-wrapper">
    <div id="books">

        <ul id="books_ul">
        <?php 
    if (isset($_GET['id'])) {
        $id = urldecode($_GET['id']);

    }

    include "mysql_connect.php";
    $query = "SELECT * FROM Books";

    $result = mysqli_query($connection, $query);
    $numRows = mysqli_num_rows($result);
    $arr = array();

    for ($i = 0; $i < $numRows; $i++) {
        $row = mysqli_fetch_assoc($result);

     if($row['id']==$id){
      if($row['vote']==1){
        $vote="⭐️";
      }else if($row['vote']==2){
        $vote="⭐️⭐️";
      }
      else if($row['vote']==3){
        $vote="⭐️⭐️⭐️";
      }
      else if($row['vote']==4){
        $vote="⭐️⭐️⭐️⭐️";
      }
      else{
        $vote="⭐️⭐️⭐️⭐️⭐️";
      }

      echo "<li id='left_photo'><div id='flex_div'><div id='left_photodiv'> <img src='$row[photo_path]' alt='' width=200px height=300px >
      </div>
      <div id='right_photodiv'>
      <h2>$row[book_name]</h2>
      <p><b>by </b><a href='#'>
    $row[author_name]  </a><b>(Author)</b></p>
    <div id='kalem_div'>$vote </div>
    <p id='summary_p'>Summary:<br> $row[summary]  </p</p    
    </div> 
      </div></li>  ";
       
}
    }
    ?>


       
        
</ul>
    </div>
    </div>


  <!-- *********************** -->

  <div class="content-wrapper">
      

  
   
      <div id="comment_div">
   
  <ul id="comment_ul">

  <form action="#" method="POST">
      <?php 
     if (isset($_GET['id']) && isset($_GET['g_username'])) {
      $id = urldecode($_GET['id']);
      $username = urldecode($_GET['g_username']);
      echo "merhaba".$username;
  }
  
      include "mysql_connect.php";
      $query = "SELECT * FROM Books";
      $query2 = "SELECT * FROM allbooks";
   
      $result = mysqli_query($connection, $query);
      $numRows = mysqli_num_rows($result);
      $result2 = mysqli_query($connection, $query2);
      $numRows2 = mysqli_num_rows($result2);
  
      $arr = array();
      $vote;
      $yes;
      $no;
      for ($i = 0; $i < $numRows; $i++) {
         $row = mysqli_fetch_assoc($result);
      
       if($row['id']==$id){
      
     for($j = 0; $j < $numRows2; $j++){
      $row2 = mysqli_fetch_assoc($result2);

      if($row['author_name']==$row2['author_name']&&$row['book_name']==$row2['book_name']){
        if($row2['vote']==1){
          $vote="⭐️";
        }else if($row2['vote']==2){
          $vote="⭐️⭐️";
        }
        else if($row2['vote']==3){
          $vote="⭐️⭐️⭐️";
        }
        else if($row2['vote']==4){
          $vote="⭐️⭐️⭐️⭐️";
        }
        else{
          $vote="⭐️⭐️⭐️⭐️⭐️";
        }
        $yes=$row2['yes'];
        $no=$row2['no'];
        $value=0; 
        echo "<li id='about_book'>    

      <div id='flex_div'>
      <div id='leftcomment_div'
     > $vote <br> $row2[date]
     <br>Do you approve of the comment?   
      <div id=btn_a>
      ";
      $name=$row2['id'];
      $name2=$row2['id']."value";
      echo "
    
  
      <button type='submit' class='btn btn-outline-info btn-sm active' name=  $name>Yes <sub>($yes)<sub></button>
      <button type='submit' class='btn btn-outline-info btn-sm active' name=  $name2 >
      
      No <sub>($no)<sub></button>

     <!-- buton divi -->
     </div> 

     <!-- leftcomment_div divi -->
      </div> 
      <div id='rightcomment_div'>
    <p id='set_comment'> $row2[comment] </p>
      </div>
      <!-- rightcomment  divi -->
      </div>  
      </li>    
  
         "; 
      
         if(($_SERVER["REQUEST_METHOD"] === "POST") ){
  
          if(isset($_POST[$name])){
   
          $query3 = "UPDATE allbooks SET yes=$yes+1 WHERE id=$row2[id]";
          $result3 = mysqli_query($connection, $query3);
      
          }elseif(isset($_POST[$name2])){

          $query3 = "UPDATE allbooks SET no=$no+1 WHERE id=$row2[id]";
          $result3 = mysqli_query($connection, $query3);
 

          }

          header("Location: " . $_SERVER["REQUEST_URI"]);
        
         }
      }
     }
         break;
  }
      }

      
      
      ?>
  </form>
  </ul>

      </div>

     
      </div>
     


</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>

<!--     <a href='#'class='btn btn-outline-info btn-sm active'role='button' aria-pressed='true' id='yes_btn'>Evet <sub>($yes)<sub></a>
      <a href='#'class='btn btn-outline-info btn-sm active'role='button' aria-pressed='true'>Hayır <sub>($no)<sub></a> -->
<!--   // <button type='submit' class='btn btn-outline-info btn-sm active' name='yes_btn'>Yes <sub>($yes)<sub></button>
      // <button type='submit' class='btn btn-outline-info btn-sm active' name='no_btn'     No <sub>($no)<sub></button>>
       -->