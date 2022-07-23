<?php include("./partials-font/menu.php")?>
   <?php
    if(isset($_GET['food_id'])){
        $food_id=$_GET['food_id'];
        $sql="SELECT * FROM tbl_food WHERE id=$food_id";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count==1){

         $row=mysqli_fetch_assoc($res);
       
         $title=$row['title'];
         $price=$row['price'];
         $image_name=$row['image_name'];


        }else{
         header("");
        }
    }else{


    }
   
   
   
   
   ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                    <?php
                 if($image_name==""){
                     echo "<div class='error'> Image not added </div>" ;
                 }else{
                   ?>
                     <img src="images/category/<?php echo $image_name;?>" alt="Momo" class="img-responsive img-curve">
                   <?php
                 }
                
                
                
                ?>
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title ;?></h3>
                        <input type="hidden" name="food" id="" value="<?php echo $title;?>"> 
                        <p class="food-price"><?php echo $price;?></p>
                         <input type="hidden" name="price" id="" value="<?php echo $price;?>"> 
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Taijul" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="+008.........." class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="...........@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
          <?php 
          if(isset($_POST['submit'])){ 
           $food=$_POST['food'];
           $price=$_POST['price'];
           $qty=$_POST['qty'];
           $total=$price * $qty;
           $order_date=date("Y-m-d h:i:sa");
           $status="Ordered";
           $customer_name=$_POST['full-name'];
           $customer_contact=$_POST['contact'];
           $customer_email=$_POST['email'];
           $customer_adress=$_POST['address'];

           $sql2="INSERT INTO table_order(id,food,price,qty,total,order_date,status,coustomer_name,coustomer_contact,coustomer_email,coustomer_adress)VALUES( '',' $food',' $price','$qty','$total',' $order_date',' $status',' $customer_name','$customer_contact',' $customer_email','$customer_adress')";
            $res2=mysqli_query($conn,$sql2);
              if($res2==true){
        
             $_SESSION['order']="<div class='text-center' style='color: chartreuse;'>Food order  Successfully</div>";
              header('location:index.php');

              }else{
          
                $_SESSION['order']="<div class='text-center ' style='color: red;>Food order  Unsuccessfully</div>";

                header('location:index.php');  

              
              }


          }
          
          
          
          
          
          ?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
   <?php   include("./partials-font/footer.php")?> 
   