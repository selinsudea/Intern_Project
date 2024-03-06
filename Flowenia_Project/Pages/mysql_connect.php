<?php
$connection=mysqli_connect("localhost","root","","floweniablog");
mysqli_set_charset($connection,"UTF8");
if(mysqli_connect_errno()>0){
    die("Hata".mysqli_connect_errno()) ;
}


?>