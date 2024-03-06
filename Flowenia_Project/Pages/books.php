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
    <title>Books</title>
    <link rel="stylesheet" href="books.css">
</head>
<body>
    <header class="main-header">
        <a href="#" id="main-header__logo">Flowenia</a>
        <nav class="main-nav">
            <ul class="main-nav__items">
                <li class="main-nav__item">
                    <a href="home.php">Home</a>
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

   

    <div class="content-wrapper">
        <div class="col-3">
            <form action="#" method="POST">
              
            <ul class="list-group">
            <li type="none">Category
		<ul >
			<li type="none" id="li_ed">Literature 
				<ul>
               </li>
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
          if($row['category']==$arr[$j]){
            $check=true;
            break;
          }
        }if($check==false){
            $arr[$i] = $row['category'];
            echo "<li id='li_d' type='none'>
            <input type='checkbox' name='category_type[]' id='$arr[$i]' value='$arr[$i]'>
            <label for='$arr[$i]'>$arr[$i]</label></li>";
            
          }
   
          
      
        }else{
          $arr[$i] = $row['category'];
          echo "<li id='li_d' type='none'>
            <input type='checkbox' name='category_type[]' id='$arr[$i]' value='$arr[$i]'>
            <label for='$arr[$i]'>$arr[$i]</label></li>";
        }
  
    }

    ?> 
					
				</ul>
                </li>
                    <li type="none" id="li_ed">Author
            <ul>
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
            echo "<li id='li_d' type='none'>
            <input type='checkbox' name='type_author[]' id='$arr[$i]' value='$arr[$i]'>
            <label for='$arr[$i]'>$arr[$i]</label></li>";
            
          }
   
          
      
        }else{
          $arr[$i] = $row['author_name'];
          echo "<li id='li_d' type='none'>
            <input type='checkbox' name='type_author[]' id='$arr[$i]' value='$arr[$i]'>
            <label for='$arr[$i]'>$arr[$i]</label></li>";
        }
  
    }

    ?> 
            </ul>
            </li>
            <li type="none" id="li_ed">Language
            <ul>
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
            echo "<li id='li_d' type='none'>
            <input type='checkbox' name='type_language[]' id='$arr[$i]' value='$arr[$i]'>
            <label for='$arr[$i]'>$arr[$i]</label></li>";
            
          }
   
          
      
        }else{
          $arr[$i] = $row['language'];
          echo "<li id='li_d' type='none'>
            <input type='checkbox' name='type_language[]' id='$arr[$i]'value='$arr[$i]'>
            <label for='$arr[$i]'>$arr[$i]</label></li>";
        }
  
    }
    ?> 
            </ul>
            </li>
            <li type="none" id="li_ed">Vote
            <ul>
         
            <li id='li_d' type='none'>
            <input type='checkbox' name='type_vote[]' id="vote_5" value='5'>
            <label for='vote_5'>⭐️⭐️⭐️⭐️⭐️</label></li>
            <li id='li_d' type='none'>
            <input type='checkbox' name='type_vote[]' id='vote_4' value='4'>
            <label for='vote_4'>⭐️⭐️⭐️⭐️</label></li>
            <li id='li_d' type='none'>
            <input type='checkbox' name='type_vote[]' id='vote_3'value='3'>
            <label for='vote_3'>⭐️⭐️⭐️</label></li>
            <li id='li_d' type='none'>
            <input type='checkbox' name='type_vote[]' id='vote_2'value='2'>
            <label for="vote_2">⭐️⭐️</label></li>
            <li id='li_d' type='none'>
            <input type="checkbox" name="type_vote[]" id='vote_1' value='1'>
            <label for="vote_1">⭐️</label></li>
            
            </ul>
            </li>
            
			</li>
            <button type="submit" id="btn_filter">Filter</button>
            
            </ul>
            </form>
        </div>

  
    <div id="books">

        <ul id="books_ul">
         
        <?php 
    include "mysql_connect.php";
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      if (isset($_POST['type_author']) && isset($_POST['type_language'])) {
    
        $authors = $_POST['type_author'];
        $languages = $_POST['type_language'];
        $types=$_POST['category_type'];
        $votes=$_POST['type_vote'];
       
        $query2 = "SELECT * FROM Books";
    
        $result2 = mysqli_query($connection, $query2);
        $numRows2 = mysqli_num_rows($result2);
      
      


        for ($i = 0; $i < $numRows2; $i++) {
            $row2 = mysqli_fetch_assoc($result2);
            if (in_array($row2['author_name'], $authors) && in_array($row2['language'], $languages)&&in_array($row2['category'], $types)&&in_array($row2['vote'], $votes)) {
             

              echo "<li id='filter_li'><div id='filter_div'>  <a href='general.php?id=" . urlencode($row2['id']) . "'><img src=' $row2[photo_path]' alt=''></a>
           
           

                        <p>$row2[book_name]</p>
                         <p>$row2[author_name]</p>
                         </div></li>";
            }
        }
      }
     
     header("Location: " . $_SERVER["REQUEST_URI"]);
    }
    else{
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
            if($row['book_name']==$arr[$j]){
              $check=true;
             break;
           }
         }if($check==false){
             $arr[$i] = $row['book_name'];
            // echo "<li id='books_li'><div id='men'>  <a href='general.php?id=" . urlencode($row['id']) . "'><img src=' $row[photo_path]' alt=''></a>
              echo "<li id='books_li'><div id='men'> <a href='general.php?id=" . urlencode($row['id']) . "&buser_name=" . urlencode($user_name) . "'><img src=' $row[photo_path]' alt=''></a>

             <p>$row[book_name]</p>
             <p>$row[author_name]</p>
             </div></li>";
             
            }
    
           
       
          }else{
           $arr[$i] = $row['book_name'];
          //  echo "<li id='books_li'><div id='men'>  <a href='general.php?id=" . urlencode($row['id']) . "'><img src=' $row[photo_path]' alt=''></a>
          echo "<li id='books_li'><div id='men'> <a href='general.php?id=" . urlencode($row['id']) . "&buser_name=" . urlencode($user_name) . "'><img src=' $row[photo_path]' alt=''></a>
           <p>$row[book_name]</p>
           <p>$row[author_name]</p>
            </div></li>";
         }
   
     }
   }

    
    
    

    

    ?> 

    </ul>
 
 

    </div>
    
 
    </div>
</body>
</html>

