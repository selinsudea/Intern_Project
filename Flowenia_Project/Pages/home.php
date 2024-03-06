<?php

   if (isset($_GET['huser_name'])) {
       $user_name = urldecode($_GET['huser_name']);
       echo   $user_name."him";
   }
?>

<?php
 if(isset($_POST['username_l'],$_POST['password_l']))
  {
    $user_name = $_POST['username_l'];
    $password = $_POST['password_l'];
    $check=false;

    if (empty($user_name) || empty($password)) {
        header("Location: login.php");
        exit();
    } else {
        include "mysql_connect.php";
        $query = "SELECT * FROM flowenia";

        $result = mysqli_query($connection, $query);
        $numRows = mysqli_num_rows($result);

        for ($i = 0; $i < $numRows; $i++) {
            $row = mysqli_fetch_assoc($result);
            if($row['username']==$user_name&&$row['password']==$password){
                $check=true;
                break;
            }
  
        }
        if($check==false){
            header("Location: login.php");
            exit();
        }else{
          // header("Location: home.php");
          
          // exit();
        }

        mysqli_free_result($result);
        // No need to call mysqli_stmt_execute($stmt); here, as it is unrelated to the current code.

         mysqli_close($connection);
    }
}
?>
<?php
include "mysql_connect.php";

// Form gönderildiğinde işlem yap
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['author'], $_POST['book_name'], $_POST['publisher'], $_POST['comment'], $_POST['language'], $_POST['vote'])) {
       
        $author = $_POST['author'];
        $book_name = $_POST['book_name'];
        $publisher = $_POST['publisher'];
        $comment = $_POST['comment'];
        $language = $_POST['language'];
        $vote = (float)$_POST['vote'];

        if(empty( $_POST['author'])||empty($_POST['book_name'])||empty($_POST['publisher'])||empty($_POST['comment'])||empty($_POST['language'])||(($vote<=0)||($vote>5))){
       
          $complaint_error= "Complaint field is empty";
}else{


        // Güvenli bir şekilde veri eklemek için hazırlıklı ifadeler (prepared statements) kullanın
        $query = "INSERT INTO allbooks (author_name, book_name, publisher, comment, language, vote,date) VALUES (?, ?, ?, ?, ?, ?,NOW())";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "sssssd", $author, $book_name, $publisher, $comment, $language, $vote);
        $sonuc = mysqli_stmt_execute($stmt);
}
     
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Flowenia</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php
   if($complain != null){
      ?> <style>.c_error{display:block}</style> <?php
   }
   ?>
  </head>
  <body>
    <header class="main-header">
      <a href="#" id="main-header__logo">Flowenia</a>
      <nav class="main-nav">
        <ul class="main-nav__items">
        <!-- <li class="main-nav__item">
            <a href="books.php">Books</a>
          </li> -->
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
            <ul id="asagi_ul">
              <li> <?php
    echo "<a href='changeusername.php?username=" . urlencode($user_name) . "'>Change Username</a>";
  ?>
  
             </li>
             
              <li>
         
                <?php
    echo "<a href='change_password.php?user_name=" . urlencode($user_name) . "'>Change Password</a>";
  ?>
              </li>

              <li><a href="login.php">Log out</a></li>
            </ul>
          </li>
        
        </ul>
      </nav>
    </header>

    <div id="about_div">
      <form action="home.php"  method="POST">
     
      <ul id="home_ul">
        <li>
        <label for="author_lc" id="author_l">Author:</label>
    <select name="author" id="author_lc">
    <?php 
    include "mysql_connect.php";
    $query = "SELECT * FROM Books";

    $result = mysqli_query($connection, $query);
    $numRows = mysqli_num_rows($result);
    $arr = array();
    $check=false;

    for ($i = 0; $i < $numRows; $i++) {
        $row = mysqli_fetch_assoc($result);
     $check=false;
        if(count($arr)>0){
          for ($j = 0; $j<count($arr); $j++){

          
          // $arr[$i] = $row['publisher'];
          if($row['author_name']==$arr[$j]){
            $check=true;
            break;
          }
        }if($check==false){
            $arr[$i] = $row['author_name'];
            echo "<option value='" . $arr[$i] . "'>" . $arr[$i] . "</option>";
          }
   
          
      
        }else{
          $arr[$i] = $row['author_name'];
          echo "<option value='" . $arr[$i] . "'>" . $arr[$i] . "</option>";
        }
  
    }
    // for ($i = 0; $i < $numRows; $i++) {
    //     $row = mysqli_fetch_assoc($result);
    //     $arr[$i] = $row['author_name'];
    //     echo "<option value='" . $arr[$i] . "'>" . $arr[$i] . "</option>";
    // }
?>
</select>
        </li>
        <li>
        <label for="book_names" id="book_name_l">Book Name:</label>
        <select name="book_name" id="book_names">
        <?php 
    include "mysql_connect.php";
    $query = "SELECT * FROM Books";

    $result = mysqli_query($connection, $query);
    $numRows = mysqli_num_rows($result);
    $arr = array();

    for ($i = 0; $i < $numRows; $i++) {
        $row = mysqli_fetch_assoc($result);
        $arr[$i] = $row['book_name'];
        echo "<option value='" . $arr[$i] . "'>" . $arr[$i] . "</option>";
    }
    ?>
    </select>
        </li>
        <li>
        <label for="publishers" id="publisher_l">Publisher:</label>
        <select name="publisher" id="publishers">
        <?php 
    include "mysql_connect.php";
    $query = "SELECT * FROM Books";

    $result = mysqli_query($connection, $query);
    $numRows = mysqli_num_rows($result);
    $arr = array();
    $check=false;

    for ($i = 0; $i < $numRows; $i++) {
        $row = mysqli_fetch_assoc($result);
        $check=false;
        if(count($arr)>0){
          for ($j = 0; $j<count($arr); $j++){

          
          // $arr[$i] = $row['publisher'];
          if($row['publisher']==$arr[$j]){
            $check=true;
            break;
          }
        }if($check==false){
            $arr[$i] = $row['publisher'];
            echo "<option value='" . $arr[$i] . "'>" . $arr[$i] . "</option>";
          }
   
          
      
        }else{
          $arr[$i] = $row['publisher'];
          echo "<option value='" . $arr[$i] . "'>" . $arr[$i] . "</option>";
        }
  
    }

    ?>
    </select>
        </li>
  
   <li>
    <label for="language_c">Language:</label>
    <select name="language" id="language_c">
    <?php 
    include "mysql_connect.php";
    $query = "SELECT * FROM Books";

    $result = mysqli_query($connection, $query);
    $numRows = mysqli_num_rows($result);
    $arr = array();
    $check=false;

    for ($i = 0; $i < $numRows; $i++) {
        $row = mysqli_fetch_assoc($result);
     $check=false;
        if(count($arr)>0){
          for ($j = 0; $j<count($arr); $j++){

          
          // $arr[$i] = $row['publisher'];
          if($row['language']==$arr[$j]){
            $check=true;
            break;
          }
        }if($check==false){
            $arr[$i] = $row['language'];
            echo "<option value=' $arr[$i]'>" . $arr[$i] . "</option>";
          }
   
          
      
        }else{
          $arr[$i] = $row['language'];
          echo "<option value='$arr[$i] '>" . $arr[$i] . "</option>";
        }
  
    }

    ?>
    </select>
   </li>
   <li>
    <label for="vote_c">Vote:</label>
    <input type="number" name="vote" id="vote_c">
   </li>
   <li>
    <label for="comment_l">Comment:</label>
    <textarea id="comment_l" name="comment" rows="4" cols="50"><?php echo $comment; ?></textarea>
<div class="c_error"> 
<?php echo $complaint_error; ?>

</div>
   </li>
   <li> <button type="submit" class="btn btn-info" id="enter_btn">Enter</button></li>
<li>
  <label for="">If you couldn't find the book you were looking for,you can reach us through the <a href="contact.php">contact</a> section. </label></li>
      </ul>
   
      </form>
  
  

    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
