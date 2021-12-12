<?php include("partials/menu.php");?>

    <!-- main contain section start  -->
    <div class="main-content">
        <div class="wrapper">
          <h1>Manage Food</h1>
           <br> <br>
           <br>
          <?php
          if (isset($_SESSION['add'])) {
            echo $_SESSION['add'] ;  
           unset($_SESSION['add']);   
            }
            if (isset($_SESSION['upload'])) {
              echo $_SESSION['upload'] ;  
              unset($_SESSION['upload']);   
             }
             if (isset($_SESSION['delete-food'])) {
              echo $_SESSION['delete-food'] ;  
              unset($_SESSION['delete-food']);   
             }
             if (isset($_SESSION['update'])) {
              echo $_SESSION['update'] ;  
              unset($_SESSION['update']);   
             }

        ?>
        
        <br> <br> <br>
      <a  class="btn-primary" href="add-food.php">Add Food</a>


    <br> <br> <br> <br>
    <table class="tbl-full">
  <tr>
    <th>S.N.</th>
    <th>Title</th>
    <th>Image</th>
    <th>Price</th>
    <th>Description</th>
    <th>Featured</th>
    <th>Active</th>
    <th>Actions</th>
  </tr>
  <?php
  $sql="SELECT * FROM tbl_food";
  $query=mysqli_query($conn,$sql);
  $sn=1;
  while($row=mysqli_fetch_array($query)){
   $id=$row['id'] ;
   $title=$row['title'];
    $image=$row['image_name'];
   $featured=$row['feature'];
   $price=$row['price'];   
   $description=$row['description'];    
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
  <td><?php echo $price;?></td>
  <td><?php echo $description ?> </td>
     <td><?php echo $featured;?></td>
    <td><?php echo $active ?> </td>
   
    <td>
      <a class="btn-secondary" href="update-food.php?id=<?php echo $id?>">Update Food</a>
      <a class="btn-danger" href="delete-food.php?id=<?php echo $id?>">Delete Food</a>
    </td>
  </tr>
  <?php }?> 
 
  
</table>
        
        </div>
    </div>
    <!-- main contain section end -->



    <!-- footer section -->
   <?php include("partials/footer.php")?>