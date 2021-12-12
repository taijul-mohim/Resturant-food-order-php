<?php include("partials/menu.php");?>

<!-- main contain section start  -->
<div class="main-content">
  <div class="wrapper">
    <h1>Manage admin</h1>
       <br>
      <?php 
      if (isset($_SESSION['add'])) {
        echo $_SESSION['add'] ;  
        unset($_SESSION['add']);   
       }
       if (isset($_SESSION['delete'])) {
        echo $_SESSION['delete'] ;  
        unset($_SESSION['delete']);   
       }
       if (isset($_SESSION['update'])) {
        echo $_SESSION['update'] ;  
        unset($_SESSION['update']);   
       }
       if (isset($_SESSION['user_not_found'])) {
        echo $_SESSION['user_not_found'] ;  
        unset($_SESSION['user_not_found']);   
       }
       if (isset($_SESSION['pwd_not_match'])) {
        echo $_SESSION['pwd_not_match'] ;  
        unset($_SESSION['pwd_not_match']);   
       }
       if (isset($_SESSION['change_pass'])) {
        echo $_SESSION['change_pass'] ;  
        unset($_SESSION['change_pass']);   
       }
    
      
      ?>
      
      <br>
      <br>

      <a  class="btn-primary" href="add-admin.php">Admin Add</a>

 <br> <br> <br>
    <table class="tbl-full">
  <tr>
    <th>S.N.</th>
    <th>Full Name</th>
    <th>User name</th>
    <th>Action</th>
  </tr>
  <?php 
  $sql="SELECT * FROM tbl_admin";
  $query=mysqli_query($conn,$sql);
  $sn=1;
  while($row=mysqli_fetch_assoc($query)){
     $id=$row["id"];
     $full_name=$row["full_name"];
    $user_name=$row['user_name'];
  
  ?>
 
    <td><?php echo $sn++ ;?></td>
    <td><?php  echo $full_name;?></td>
    <td><?php echo $user_name;?></td>
    <td>
    <a class="btn-primary" href="update-password.php?id=<?php echo $id; ?>">Change pass</a>
      <a class="btn-secondary" href="update-admin.php?id=<?php echo $id;?>">Update admin</a>
      <a class="btn-danger" href="delete-admin.php?id=<?php echo $id;?>">Delete Admin</a>
    </td>
  </tr>
  <?php }?>
  
</table>

  </div>
</div>
<!-- main contain section end -->



<!-- footer section -->
<?php include("partials/footer.php")?>