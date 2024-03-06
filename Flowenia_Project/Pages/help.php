<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $complaint = ($_POST['complaint']);
$type=$_POST['type'];
    if (empty($complaint)) {
   
        $complaint_error = "Complaint field is empty";
     echo $type;
     
    } else {
        include "mysql_connect.php";

        


        $query = "INSERT INTO Complains(type,complain,date) VALUES (?,?,NOW())";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ss", $type,$complaint);
        $sonuc = mysqli_stmt_execute($stmt);
       header("Location: contact.php");
         exit();
      
 
    
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="help.css">
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
               
                <li class="main-nav__item">
                    <a href="#">Settings</a>
                </li>
        </ul>
      </nav>
    </header>
    <main>
      <div id="contact_div">
        <form action="help.php" method="POST">
          <h2 id="h2_contact">Contact</h2>
          <ul id="contact_ul">
            <li>
            <label for="type_c">Complain type:</label>
              <select name="type" id="type_c">
                <option value="Site complain">Site complain</option>
                <option value="Product availability">Product availability</option>
                <option value="Advice">Advice</option>
                <option value="General">General</option>
                <option value="Book Advice">Book Advice</option>
                </select>
            </li>
            <li>
              <label for="complaint_c">Complaint:</label>
              <textarea name="complaint" rows="4" cols="50" id="complaint_c"><?php echo $complaint; ?></textarea>
             <div class="c_error">
               <?php echo $complaint_error; ?>
            </div>
            </li>
          </ul>
          <button type="submit" id="button_login" class="btn btn-info" >Send</button>
    
        </form>
      </div>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>