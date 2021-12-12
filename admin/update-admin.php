<?php include("partials/menu.php");?>
    <!-- main contain section start  -->
    <div class="main-content">
        <div class="wrapper">
          <h1>Add admin</h1>
          <br>
          <?php 
           $id=$_GET['id'];
            $sql="SELECT * FROM tbl_admin WHERE id='$id'";
            $query=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($query)){
            $id=$row["id"];
            $full_name=$row["full_name"];
            $user_name=$row['user_name']; 
        } 

        
            
             ?>
          <br>
          <br>
          <form action="" method="post">
             <table class="">
                 <tr>
                     <td>Full NAME:</td>
                     <td><input type="text" name="full_name" id="" placeholder="Full-Name" value="<?php echo $full_name;?>"></td>
                 </tr>
                 <tr>
                     <td>USER NAME:</td>
                     <td><input type="text" name="user_name" id="" placeholder="User-name" value="<?php echo $user_name;?>"></td>
                 </tr>
                 <tr>
                     <td colspan="2">
                     
                         <input type="submit" name="submit" id="" value="UPdate admin" class="btn-secondary">
                    </td>
                 </tr>

             </table>
          </form>
       
        </div>
    </div>
    <!-- main contain section end -->

<?php
if (isset($_POST['submit'])) {
    $full_name=$_POST['full_name'];
    $user_name=$_POST['user_name'];
    $sql="UPDATE tbl_admin SET full_name='$full_name' ,user_name='$user_name' WHERE id='$id'";
     $query=mysqli_query($conn,$sql);
     if ($query==true) {
         $_SESSION['update']="<div style='color: aqua;'>Admin Update Successfully</div>" ;
         header("location:manage-admin.php");
        
     }else{
        $_SESSION['update']="<div style='color: red;'>Admin Update unSuccessfully</div>" ;
        header("location:manage-admin.php");
    }
 }




?>

    <!-- footer section -->
   <?php include("partials/footer.php");?>