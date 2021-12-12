<?php include("partials/menu.php");?>
    <!-- main contain section start  -->
    <div class="main-content">
        <div class="wrapper">
          <h1>Change pass</h1>
          <br>
          <?php 
          $id=$_GET['id'];
      
      ?>
          <br>
          <br>
          <form action="" method="post">
             <table class="tbl-30">
                 <tr>
                     <td>Current Password :</td>
                     <td><input type="password" name="current_password" id="" placeholder="Current pass"></td>
                 </tr>
                 <tr>
                     <td>New Password:</td>
                     <td><input type="password" name="new_password" id="" placeholder="New pass"></td>
                 </tr>
                 <tr>
                     <td>Confirm Password:</td>
                     <td><input type="password" name="confirm_password"  placeholder="Confirm pass"></td>
                 </tr>
                 <tr>
                     <td colspan="2">
                         <input type="submit" name="submit" id="" value="change pass" class="btn-secondary">
                    </td>
                 </tr>

             </table>
          </form>
       
        </div>
    </div>
    <!-- main contain section end -->
    <?php
    if (isset($_POST['submit'])) {
        $crrent_password=md5($_POST['current_password']); 
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);
        $sql="SELECT * FROM tbl_admin WHERE id=$id AND pass='$crrent_password'";
        $res=mysqli_query($conn,$sql);
        if ($res==true) {
            $count=mysqli_num_rows($res);
            if($count==1){
                if ($new_password==$confirm_password) {
                    $sql2="UPDATE tbl_admin SET pass='$new_password' WHERE id='$id'";
                    $query=mysqli_query($conn,$sql2);
                    if($query==true){
                    $_SESSION['change_pass']="<div style='color: aqua;'>Update pass</div>" ;
                    header("location:manage-admin.php");
                    }else{
                        $_SESSION['change_pass']="<div style='color: aqua;'>Cant change  pass</div>" ;
                        header("location:manage-admin.php");
                    }

                }else{
                    $_SESSION['pwd_not_match']="<div style='color: aqua;'>Pass did not match</div>" ;
                    header("location:manage-admin.php");
                }
            }else{
                $_SESSION['user_not_found']="<div style='color: aqua;'>Admin Update UNSuccessfully</div>" ;
                header("location:manage-admin.php");
        
            }
        }
      
    }
    
    ?>
 <!-- footer section -->
   <?php include("partials/footer.php");?>