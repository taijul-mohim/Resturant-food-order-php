<?php include("partials/menu.php");?>

    <!-- main contain section start  -->
    <div class="main-content">
        <div class="wrapper">
          <h1>Manage Categories</h1>
           <br> <br>
           <br>
          <?php
           if (isset($_SESSION['add'])) {
        echo $_SESSION['add'] ;  
       unset($_SESSION['add']);   
        }
        if (isset($_SESSION['delete-category'])) {
          echo $_SESSION['delete-category'] ;  
         unset($_SESSION['delete-category']);   
          }
          if (isset($_SESSION['update'])) {
            echo $_SESSION['update'] ;  
           unset($_SESSION['update']);   
            }
            if (isset($_SESSION['upload'])) {
              echo $_SESSION['upload'] ;  
              unset($_SESSION['upload']);   
             }
             if (isset($_SESSION['failed-remove'])) {
              echo $_SESSION['failed-remove'] ;  
              unset($_SESSION['failed-remove']);   
             }
  

        ?>
        
        <br> <br> <br>
      <a  class="btn-primary" href="add-category.php">Add Categories</a>


    <br> <br> <br> <br>
    <table class="tbl-full">
  <tr>
    <th>S.N.</th>
    <th>Title</th>
    <th>Image</th>
    <th>Featured</th>
    <th>Active</th>
    <th>Actions</th>
  </tr>
  <?php
  $sql="SELECT * FROM tbl_category";
  $query=mysqli_query($conn,$sql);
  $sn=1;
  while($row=mysqli_fetch_array($query)){
   $id=$row['id'] ;
   $title=$row['title'];
    $image=$row['image_name'];
   $featured=$row['featured'];    
    $active=$row['active'];



   
  ?>
  <tr>
    <td><?php echo $sn++;?></td>
    <td><?php echo $title?></td>
    <td>
      <?php 
      if($image!==''){
      ?>
      <img style="width:100px;" src="../images/category/<?php echo $image;?>" alt="">
      <?php
      }else{
        echo '<div class="error"> No image uploded</div>' ;
      }

      ?>
  </td>
    <td><?php echo $featured;?></td>
    <td><?php echo $active ?> </td>
    <td>
      <a class="btn-secondary" href="update-category.php?id=<?php echo $id?>">Update admin</a>
      <a class="btn-danger" href="delete-category.php?id=<?php echo $id?>">Delete Admin</a>
    </td>
  </tr>
  <?php }?>
  
</table>
        
        </div>
    </div>
    <!-- main contain section end -->



    <!-- footer section -->
   <?php include("partials/footer.php")?>
   