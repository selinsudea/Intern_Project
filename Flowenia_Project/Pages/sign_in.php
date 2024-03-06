<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name_surname = $_POST['namesurname'];
    $email = $_POST['e_mail'];
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    $check=false;
    if (empty($name_surname) || empty($email) || empty($user_name) || empty($password)) {
      if(empty(trim($user_name))){
        $username_error = "Username field is empty";
     }if(empty(trim($name_surname))){
      $name_error = "Name Surname field is empty";
     }
     if(empty(trim($email))){
      $email_error = "Email field is empty";
     }
     if(empty(trim($password))){
      $password_error = "Password field is empty";
     }
        // header("Location: sign_in.php");
        // exit();
    } else {
        include "mysql_connect.php";
        if(strlen($password)>=8){
      
        for($i=0;$i<strlen($password);$i++){
          // if($password[$i]>=65&&$password[$i]<=90){
          //   $check=true;
          //   break;
          // }
          if (ctype_upper($password[$i])) {
            $check = true;
            break;
        }

        }
        $pattern='/^[a-zA-Z0-9]+$/';
          
        if($check==true){
          if(preg_match($pattern,$user_name)){
         
          
        $query = "INSERT INTO flowenia(namesurname, email, username, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $name_surname, $email, $user_name, $password);
        $sonuc = mysqli_stmt_execute($stmt);
         header("Location: login.php");
         exit();
        // if ($sonuc) {
        //     // echo "kayıt eklendi";
        // } else {
        //     echo "kayıt eklenemedi";
        // }
          }
          else{
            $password_error = "Türkçe karakter içeremez ";
          }
      }
      else{
        $password_error = "Password have to be at least 8 characters long  and contain at least one uppercase letter! ";
        // header("Location: sign_in.php");
        // exit();
      }
      }
      else{
        $password_error = "Password have to be at least 8 characters long  and contain at least one uppercase letter! ";
      }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in</title>
    <link rel="stylesheet" href="sign_in_page.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php
   if($username_error != null){
      ?> <style>.u_error{display:block}</style> <?php
   }if($name_error != null){
    ?> <style>.n_error{display:block}</style> <?php
 }if($email_error!=null){
  ?> <style>.e_error{display:block}</style> <?php
 }if($password_error!=null){
  ?> <style>.p_error{display:block}</style> <?php
 }
  
?>
  </head>
  <body>
    <header class="main-header">
      <a href="#" id="main-header__logo">Flowenia</a>
      <nav class="main-nav">
        <ul class="main-nav__items">
          <li class="main-nav__item">
            <a href="nav_page.html">Home</a>
          </li>
          <li class="main-nav__item">
            <a href="#">Contact</a>
          </li>
          <li class="main-nav__item">
            <a href="login.php">Login</a>
          </li>
        </ul>
      </nav>
    </header>
    <main>
      <div id="sign_in_div">
        <form action="sign_in.php" method="POST">
          <h2 id="h2_sign_in">Sign Up</h2>
          <ul id="sign_in_ul">
            <li>
              <label for="namesurname_c">Name Surname:</label>
              <input type="text" name="namesurname" id="namesurname_c"  value="<?php echo $namesurname; ?>" />
              <div class="n_error">
      <?php echo $name_error; ?>
  </div>
            </li>
            <li>
              <label for="email_c">E-mail:</label>
              <input type="email" name="e_mail" id="email_c"  value="<?php echo $e_mail; ?>"/>
              <div class="e_error">
      <?php echo $email_error; ?>
  </div>
            </li>

            <li>
              <label for="username_c">Username:</label>
              <input type="text" name="username" id="username_c" value="<?php echo $username; ?>" />
              <div class="u_error">
      <?php echo $username_error; ?>
  </div>
            </li>
            <li>
              <label for="password_c">Password:</label>

              <input type="password" name="password" id="password_c" value="<?php echo $password; ?>" />
              <div class="p_error">
      <?php echo $password_error; ?>
  </div>
            </li>
          </ul>
          <button type="submit"  class="btn btn-info" id="button_login">Sign Up</button>
          <!-- <input type="button" id="button_login" value="Sign in" /> -->
        </form>
      </div>
    </main>
  </body>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
