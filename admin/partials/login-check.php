<?php
if(!isset($_SESSION['user'])){


    $_SESSION['no-login-massage']="<div style='color:red;'>Plase login to access to Admin</div>" ;
    header("location:./admin-login.php");
   
}




?>