<?php include("partials/menu.php");?>

    <!-- main contain section start  -->
    <div class="main-content">
        <div class="wrapper">
          <h1>Manage Contact</h1>
           <br> <br>
           <br>
          <?php
           if (isset($_SESSION['add'])) {
        echo $_SESSION['add'] ;  
       unset($_SESSION['add']);   
        }
        if (isset($_SESSION['delete-contact'])) {
          echo $_SESSION['delete-contact'] ;  
         unset($_SESSION['delete-contact']);   
          }
          
  

        ?>
        <br>
        <br>
    
    <table class="tbl-full">
  <tr>
    <th>S.N.</th>
    <th>Full name</th>
    <th>Number</th>
    <th>email</th>
    <th>Comment</th>
    
  </tr>
  <?php
  $sql="SELECT * FROM contact";
  $query=mysqli_query($conn,$sql);
  $sn=1;
  while($row=mysqli_fetch_array($query)){
   $id=$row['id'] ;
   $name=$row['full_name'];
    $number=$row['number'];
   $email=$row['email'];    
    $comment=$row['comment'];



   
  ?>
  <tr>
    <td><?php echo $sn++;?></td>
    <td><?php echo $name?></td>
    <td><?php echo $number?></td>
    <td><?php echo $email ?> </td>
    <td><?php echo $comment ?> </td>
    <td>
      <a class="btn-danger" href="delete-contact.php?id=<?php echo $id?>">Delete Admin</a>
    </td>
  </tr>
  <?php }?>
  
</table>
        
        </div>
    </div>
    <!-- main contain section end -->



    <!-- footer section -->
   <?php include("partials/footer.php")?>
   