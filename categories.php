<?php include("./partials-font/menu.php")?>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
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
    <a href="category-foods.php?id=<?php echo $id ;?>">
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


    <!-- social Section Starts Here -->
    <?php include("./partials-font/footer.php")?>