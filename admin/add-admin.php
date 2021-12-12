<?php include("partials/menu.php");?>
    <!-- main contain section start  -->
    <div class="main-content">
        <div class="wrapper">
          <h1>Add admin</h1>
          <br>
          <?php 
    //   if (isset($_SESSION['add'])) {
    //     echo $_SESSION['add'] ;  
    //     unset($_SESSION['add']);   
    //    }
      
      
      ?>
          <br>
          <br>
          <form action="" method="post">
             <table class="">
                 <tr>
                     <td>Full NAME:</td>
                     <td><input type="text" name="full_name" id="" placeholder="Full-Name"></td>
                 </tr>
                 <tr>
                     <td>USER NAME:</td>
                     <td><input type="text" name="user_name" id="" placeholder="User-name"></td>
                 </tr>
                 <tr>
                     <td>Password:</td>
                     <td><input type="password" name="password"  placeholder="password"></td>
                 </tr>
                 <tr>
                     <td colspan="2">
                         <input type="submit" name="submit" id="" value="Add admin" class="btn-secondary">
                    </td>
                 </tr>

             </table>
          </form>
       
        </div>
    </div>
    <!-- main contain section end -->



    <!-- footer section -->
   <?php include("partials/footer.php");?>
   <?php
   
   if(isset($_POST['submit'])){
    $full_name=$_POST['full_name'];
    $user_name=$_POST['user_name'];
   $password=md5($_POST['password']);
   $sql="INSERT INTO tbl_admin(full_name,user_name,pass)VALUES('$full_name','$user_name','$password')";
   $result=mysqli_query($conn,$sql);
   if ($result==true) {
    $_SESSION['add']="Admin added succesfully";
    header("location:manage-admin.php");
   }else{
    $_SESSION['add']="Failed to add";
    header("location:add-admin.php");

   }

   }
   
   
   
   
   
   ?>