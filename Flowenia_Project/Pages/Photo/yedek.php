// else{
//    $query = "SELECT * FROM Books";

//   $result = mysqli_query($connection, $query);
//   $numRows = mysqli_num_rows($result);
//   $arr = array();
//   $check=false;

//   for ($i = 0; $i < $numRows; $i++) {
//       $row = mysqli_fetch_assoc($result);
//    $check=false;
//       if(count($arr)>0){
//         for ($j = 0; $j<count($arr); $j++){

        
//         // $arr[$i] = $row['publisher'];
//         if($row['book_name']==$arr[$j]){
//           $check=true;
//           break;
//         }
//       }if($check==false){
//           $arr[$i] = $row['book_name'];
//           echo "<li id='books_li'><div id='men'>  <a href='general.php?id=" . urlencode($row['id']) . "'><img src=' $row[photo_path]' alt=''></a>
//           <p>$row[book_name]</p>
//           <p>$row[author_name]</p>
//           </div></li>";
          
//         }
 
        
    
//       }else{
//         $arr[$i] = $row['book_name'];
//         echo "<li id='books_li'><div id='men'>  <a href='general.php?id=" . urlencode($row['id']) . "'><img src=' $row[photo_path]' alt=''></a>
//         <p>$row[book_name]</p>
//         <p>$row[author_name]</p>
//         </div></li>";
//       }

//   }
// }



<!-- 



<!-- echo "<li id='li_d' type='none'>
            <input type='checkbox' name='' id='$row[author_name]'>
            <label for='$row[author_name]'>$row[author_name]</label></li>"; -->


        <!-- <li id="books_li"><div id="men">
            deneme
            </div></li>
            <li id="books_li"><div  id="men">
            kal
            </div>
        </li> -->

        <!--<?php

  
  

  // header("Location: " . $_SERVER["REQUEST_URI"]);

 

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $category = $_POST['category_type'];
    $author = $_POST['type_author'];
    $language = $_POST['type_language'];
    $vote = $_POST['type_vote'];
    $check=false;
    
        include "mysql_connect.php";
        $query = "SELECT * FROM Books";
        $result = mysqli_query($connection, $query);
        $numRows= mysqli_num_rows($result);
        for ($i = 0; $i < $numRows; $i++) {
          $row = mysqli_fetch_assoc($result);
       if($row['author_name']==$author && $row['language']==$language){
        echo "<label for=''>$row[book_name] kal</label></li>";
       }
       
  
  
        
      
      }
    }
      
      
    
  
  
  ?>  -->
 -->