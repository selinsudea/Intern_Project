<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $old_username =  $_GET['user_name'];
    $old_password = ($_POST['old_password']);
    $new_password=$_POST['new_password'];
    $password=$_POST['complaint'];
 
    $check = false;

    if (empty($old_username)) {
   
        $complaint_error = "Complaint field is empty";
      
     
    } else {
      if(  $new_password== $password){

        if(strlen($password)>=8){
      
          for($i=0;$i<strlen($password);$i++){
          
            if (ctype_upper($password[$i])) {
              $check = true;
              break;
          }
  
          }
          if($check==true){
            include "mysql_connect.php";
            $check=false;
            $query = "SELECT * FROM flowenia";
            $result = mysqli_query($connection, $query);
            $numRows = mysqli_num_rows($result);
    
                for($i=0; $i<$numRows; $i++){
                    $row = mysqli_fetch_assoc($result);
                    
                    
                    
                
                        if($row['username']==$old_username&&$row['password']==$old_password){
                            $query2 = "UPDATE flowenia SET password='$new_password' WHERE username='$old_username'";
        
                            $result2= mysqli_query($connection, $query2);
                            $complaint_error = "Kullanıcı adı başarı ile değiştirilmiştir.";
                            header("Location: login.php");
                            exit();
                            break;
                        }
                       
                  
                }
          }else{
            $complaint_error = "Password have to be at least 8 characters long  and contain at least one uppercase letter! ";
          }
        }
      }else{
        $complaint_error = "Passwords don't match!";
      }
      }
        
        
     
       
       

      
 
    
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="change_password.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php
   if($complaint_error != null){
      ?> <style>.c_error{display:block}</style> <?php
   }
   ?>
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
                    <a href="books.php">Books</a>
                </li>
               
        </ul>
      </nav>
    </header>
    <main>
      <div id="contact_div">
        <form action="#" method="POST">
          <h2 id="h2_contact">Change Password</h2>
          <ul id="contact_ul">
            <li>
            <label for="old_password_lc">Old Password:</label>
             <input type="text" name="old_password" id="old_password_lc">
            </li>
            <li>
              <label for="new_password_lc">New Password:</label>
            <input type="text" name="new_password" id="new_password_lc">

            </li>
            <li>
              <label for="password_lc">New Password:</label>
            <input type="text" name="complaint" id="password_lc" value="<?php echo $complaint; ?>" />
            <div class="c_error">
               <?php echo $complaint_error; ?>
            </div>
            </li>
          </ul>
          <button type="submit" id="button_login" class="btn btn-info" >Change</button>

        </form>
      </div>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>