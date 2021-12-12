<?php 
include("../db/db.php"); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <?php 
         if (isset($_SESSION['login'])) {
            echo $_SESSION['login'] ;  
            unset($_SESSION['login']);   
           }
           if (isset($_SESSION['no-login-massage'])) {
            echo $_SESSION['no-login-massage'] ;  
            unset($_SESSION['no-login-massage']);   
           }
        
        
        ?>
        <br><br>
         <form action="" method="POST" class="text-center">
             User name:  <br>
             <input type="text" name="username" placeholder="Enter Username"> <br> <br>
             Password : <br>
             <input type="password" name="password" placeholder="Enter Password"><br> <br>
             <input type="submit" name="submit" value="login" class="btn-primary">
         </form>
        <p class="text-center">Create by <a href="">Taijul islam </a></p>
    </div>
</body>
</html>
<?php 
 if (isset($_POST['submit'])) {
     $username=mysqli_real_escape_string($conn,$_POST['username']);
     $password=md5($_POST['password']);
     $sql="SELECT * FROM tbl_admin WHERE user_name='$username' AND pass='$password'";
     $res=mysqli_query($conn,$sql);
     $count=mysqli_num_rows($res);
     if($count==1)
     {
        $_SESSION['login']="<div style='color: aqua;'>login successfully</div>" ;
        $_SESSION['user']=$username;
        header("location:../admin");
     }else{
        $_SESSION['login']="<div style='color: red;'>Incorrect Username and pass</div>" ;
        header("location:admin-login.php");
     }
 }

