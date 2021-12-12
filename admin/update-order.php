<?php include("partials/menu.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update order</h1>
        <br><br>
          <?php
          $id=$_GET['id'];
          
  $sql="SELECT * FROM table_order WHERE id=$id";
  $query=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($query);
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

        <form action="" method="post">
       <table>
           <tr>
               <td>Food Name</td>
               <td><?php echo $food ?></td>
           </tr>
           <tr>
               <td>Food Name</td>
               <td> <b><?php echo $price ?></b></td>
           </tr>
           <tr>
               <td>Qty</td>
                <td>
                    <input type="number" name="qty" value="<?php echo $qty;?>">
                </td>
           </tr>
           <tr>
               <td>Status</td>
               <td>
                   <select name="status" id="">
                       <option <?php if($status=="Ordered"){echo "selected";}?> value="Ordered">Ordered</option>
                       <option  <?php if($status=="On Delivery"){echo "selected";}?> value="On Delivery">On Delivery</option>
                       <option <?php if($status=="Delivered"){echo "selected";}?>  value="Delivered">Deliverd</option>
                       <option <?php if($status=="Cancelled"){echo "selected";}?>  value="Cancelled">Cancelled</option>
                   </select>
               </td>
           </tr>
            <tr>
                <td>Customer Name:</td>
                <td>
                    <input type="text" name="customer_name" value="<?php echo $coustomer_name;?>">
                </td>
            </tr>
            <tr>
                <td>Customer Contact:</td>
                <td>
                    <input type="text" name="customer_contact" value="<?php echo $contact ?>">
                </td>
            </tr>
            <tr>
                <td>Customer Email:</td>
                <td>
                    <input type="text" name="customer_email" value="<?php echo $email;?>">
                </td>
            </tr>
            <tr>
                <td>Customer Adress:</td>
                <td>
                    <textarea name="customer_adress" id="" cols="30" rows="10"><?php echo $adress;?></textarea>
                </td>
            </tr>
                <tr>
                    <td>
                    <input type="hidden" name="id"  value="<?php echo $id;?>"> 
                    <input type="hidden" name="price" value="<?php echo $price;?>">
                    </td>
                </tr>
           <tr>
               <td colspan="2">
                  
                   <input type="submit" class="btn btn-primary" name="submit" value="Update orderd">
               </td>
           </tr>
          
       </table>
     <?php 
     if(isset($_POST['submit'])){
       $qty=$_POST['qty'];
       $total=$price*$qty; 
       $status=$_POST['status'];    
        $coustomer_name=$_POST['customer_name'];
        $contact=$_POST['customer_contact'];
        $email=$_POST['customer_email'];
        $adress=$_POST['customer_adress'];
        $sql2="UPDATE table_order SET
                qty='$qty',
                total='$total',
                status='$status',
                coustomer_name='$coustomer_name',
                coustomer_contact='$contact',
                coustomer_email='$email',
                coustomer_adress='$adress'
                 WHERE id='$id'";
          $query2=mysqli_query($conn,$sql2);
          if($query2==true){
        
            $_SESSION['order']="<div class='text-center' style='color: chartreuse;'>Food order  Successfully</div>";
             header('location:manage-order.php');

             }else{
         
               $_SESSION['order']="<div class='text-center ' style='color: red;>Food order  Unsuccessfully</div>";

               header('location:manage-order.php ');  

            
             }    
     }
     ?>


        </form>
    </div>
</div>
<?php include("partials/footer.php")?>