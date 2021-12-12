<?php include("./partials-font/menu.php")?>
<section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to Contact with us.</h2>
             <?php
             
             if (isset($_SESSION['comments'])) {
                echo $_SESSION['comments'] ;  
                unset($_SESSION['comments']);   
               }
             
             
             
             
             ?>
            <form action="" method="post" class="order">
                
                <fieldset>
                    <legend>Contact Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Exp/Taijul" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="+008.........." class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="...........@gmail.com" class="input-responsive" required>

                    <div class="order-label">Comments</div>
                    <textarea name="coment" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" onclick="myFunction()" value="Confirm Order" class="btn btn-primary">
                    <div id="snackbar">Added successfully</div>
                </fieldset>

            </form>
          <?php 
          if(isset($_POST['submit'])){ 
           $customer_name=$_POST['full-name'];
           $customer_contact=$_POST['contact'];
           $customer_email=$_POST['email'];
           $customer_comments=$_POST['coment'];

           $sql2="INSERT INTO contact(full_name,number,email,comment)VALUES(' $customer_name','$customer_contact',' $customer_email','$customer_comments')";
            $res2=mysqli_query($conn,$sql2);
              if($res2==true){
             $_SESSION['comments']="<div class='text-center' style='color: chartreuse;'>Food order  Successfully</div>";
              header('location:contact.php');

              }else{
          
                $_SESSION['comments']="<div class='text-center ' style='color: red;>Food order  Unsuccessfully</div>";

                header('location:contact.php');  

              ;
              }


          }
          
          
          
          
          
          ?>
        </div>
    </section>

<?php include("./partials-font/footer.php")?>