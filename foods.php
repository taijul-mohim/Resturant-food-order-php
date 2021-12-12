<?php include("./partials-font/menu.php")?>

    <!-- fOOD sEARCH Section Starts Here -->
    <!-- <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section> -->
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
  $sql="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
  $query=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($query);
  if($count>0){
    while($row=mysqli_fetch_assoc($query)){
     $id=$row['id'];
     $title=$row['title'];
     $image=$row['image_name'];
  ?>
    <a href="">
            <div class="box-3 float-container">
                <?php
                 if($image==""){
                     echo "<div class='error'> Image not added </div>" ;
                 }else{
                   ?>
                     <img src="images/category/<?php echo $image;?>" alt="Momo" class="img-responsive img-curve">
                   <?php
                 }
                
                
                
                ?>
              

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>
           

  <?php
    }


  }else{
  echo "<div='error'> Category not Added </div>";

  }

  ?>
            
         

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
             $sql2="SELECT * FROM tbl_food WHERE active='Yes' AND feature='Yes' LIMIT 6";
             $res2=mysqli_query($conn,$sql2);
             $count2=mysqli_num_rows($res2);
             if($count2>0){
               while($row=mysqli_fetch_assoc($res2)){
                   $id=$row['id'];
                   $title=$row['title'];
                   $price=$row['price'];
                   $description=$row['description'];
                   $image_name=$row['image_name'];
                 ?>
                   <div class="food-menu-box">
                <div class="food-menu-img">
                <?php
                 if($image==""){
                     echo "<div class='error'> Image not added </div>" ;
                 }else{
                   ?>
                     <img src="images/category/<?php echo $image_name;?>" alt="Momo" class="img-responsive img-curve">
                   <?php
                 }
                
                
                
                ?>
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="food-price"><?php echo $price ;?></p>
                    <p class="food-detail">
                       <?php echo $description;?>
                    </p>
                    <br>

                    <a href="order.php?food_id=<?php echo $id ;?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>

                   
                 <?php
               }
             }else{

             }
            
            
            
            
            
            
            
            ?>

            

           

          

        

           

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include("./partials-font/footer.php")?>
    