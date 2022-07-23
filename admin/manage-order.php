<?php include("partials/menu.php");?>

    <!-- main contain section start  -->
    <div class="main-content">
        <div class="wrapper">
          <h1>Manage Food</h1>

          <table class="tbl-full">
            <br>
            <br>
            <?php
            
            if (isset($_SESSION['order'])) {
              echo $_SESSION['order'] ;  
             unset($_SESSION['order']);   
              }
            
            
            
            ?>
            <br>
            <br>
  <tr>
    <th>S.N.</th>
    <th>Food</th>
    <th>Price</th>
    <th>Qty.</th>
    <th>Total</th>
    <th>Order Date</th>
    <th>Status</th>
    <th>Customer name</th>
    <th>Contact</th>
    <th>Email</th>
    <th>Adress</th>
    <th>Actions</th>
  </tr>
  <?php
  $sql="SELECT * FROM table_order ORDER BY id DESC";
  $query=mysqli_query($conn,$sql);
  $sn=1;
  while($row=mysqli_fetch_array($query)){
   $id=$row['id'] ;
   $food=$row['food'];
    $price=$row['price'];
   $qty=$row['qty'];
   $total=$row['total'];
   $order_date=$row['order_date'];   
   $status=$row['status'];    
    $coustomer_name=$row['coustomer_name'];
    $contact=$row['coustomer_contact'];
    $email=$row['coustomer_email'];
    $adress=$row['coustomer_adress'];
    


   
  ?>
  <tr>
    <td><?php echo $sn++;?></td>
    <td><?php echo $food?></td>
  <td><?php echo $price;?></td>
  <td><?php echo $qty ?> </td>
     <td><?php echo $total?></td>
    <td><?php echo $order_date ?> </td>
    <td><?php 
          if($status=="Ordered"){
            echo "  <label for> $status</label>" ;
          }elseif($status=="On Delivery"){
            echo "  <label style='color :orange'>$status</label>";

          }elseif($status=="Delivered"){
            echo "  <label style='color :green'>$status</label>";
          }elseif ($status=="Cancelled") {
            "  <label style='color :red'>$status</label>";
          }
    
    
    
    
    
    
    ?> </td>
    <td><?php echo $coustomer_name ?> </td>
    <td><?php echo $contact ?> </td>
    <td><?php echo $email ?> </td>
    <td><?php echo $adress ?> </td>
    <td>
      <a class="btn-secondary" href="update-order.php?id=<?php echo $id?>">Update Order</a>
      <a class="btn-secondary" href="delete-order.php?id=<?php echo $id?>">Delete Order</a>
    </td>
  </tr>
  <?php }?> 
 
  
</table>
         
        </div>
    </div>
    <!-- main contain section end -->



    <!-- footer section -->
   <?php include("partials/footer.php")?>