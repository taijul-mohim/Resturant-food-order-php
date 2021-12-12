<?php include("partials/menu.php");?>

<div class="main-content">
        <div class="wrapper">
          <h1>Update Category</h1>
          <br>
          <?php 
          if(isset($_GET['id'])){
          $id=$_GET['id'];
         $sql="SELECT * FROM tbl_food WHERE id='$id'";
         $res=mysqli_query($conn,$sql);
         while($row=mysqli_fetch_assoc($res)){
            
            $title=$row['title'];
            $description=$row['description'];
            $price=$row['price'];
            $current_image=$row['image_name'];
            $current_category=$row['category_id'];
            $featured=$row['feature'];
            $active=$row['active'];
         
        } 


          }else{



          }
          ?>
          <br>
          <br>
          <form action="" method="post" enctype="multipart/form-data">
             <table class="">
                 <tr>
                     <td>Title:</td>
                     <td><input type="text" name="title" id="" placeholder="Category title" value="<?php echo $title;?>"></td>
                 </tr>

                 <tr>
                     <td>Description:</td>
                     <td>
                         <textarea name="description" id="" cols="30" rows="5" placeholder="description of the food"><?php echo $description?></textarea>
                    </td>
                 </tr>


                 <tr>
                     <td>Price:</td>
                     <td>
                         <input type="number" name="price" value="<?php echo $price;?>">
                    </td>
                 </tr>

                 <tr>
                     <td>Current Image</td>
                     <td> 
                  <?php
                   if($current_image!=""){

                   ?>
                      <img style="width:100px;" src="../images/category/<?php echo $current_image;?>" alt=""> 
                    <?php
                  }else{
                      echo "<div style='color:red' >Image Not added</div>";
                   }
                  
                  
                  
                   ?>

                     </td>
                 </tr>

                 <tr>
                     <td>Select Image:</td>
                     <td><input type="file" name="image" id="" ></td>
                 </tr>

                  
                 <tr>
                     <td>Category:</td>
                     <td>
                         <select name="category" id="">
                        <?php
                        
                        $sql="SELECT * from tbl_category WHERE active='Yes'";
                        $query=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($query);
                        if($count>0){
                            while($row=mysqli_fetch_assoc($query)){
                                $id=$row['id'];
                                $title=$row['title'];
                                ?>
                                  <option <?php if($current_category==$id){echo 'Selected';}?> value="<?php echo $id?>"><?php echo $title?></option>
                                <?php
                            }

                        }else{

                            ?>
                             <option value="">No category found</option>
                            <?php
                        }
                        
                        
                        
                        ?>
                         </select>
                    </td>
                 </tr>

                 <tr>
                     <td>Featured:</td>
                     <td><input <?php if($featured=='Yes'){echo 'checked';}?> type="radio" name="featured" id="" value="Yes">Yes
                     <input <?php if($featured=='No'){echo 'checked';}?> type="radio" name="featured" id="" value="No">No
                    </td>
                 </tr>
                 <tr>
                     <td>Active:</td>
                     <td><input <?php if($active=='Yes'){echo 'checked';}?> type="radio" name="active" id="" value="Yes">Yes
                     <input <?php if($active=='No'){echo 'checked';}?>  type="radio" name="active" id="" value="No">No
                    </td>
                 </tr>
                 <tr>
                     <td colspan="2">
                         <input type="submit" name="submit" id="" value="Update Category" class="btn-secondary">
                    </td>
                 </tr>

             </table>
          </form>
       <?php 
   if(isset($_POST['submit'])){
       $id=$_GET['id'];
    $title=$_POST['title']; 
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    $feature=$_POST['featured'];
    $active=$_POST['active'];
    if (isset($_FILES['image']['name'])) {
        $image_name=$_FILES['image']['name'];
         if($image_name!=""){

         
            // change image ext
        $ext=end(explode('.',$image_name));
         $image_name="Food_Category_".rand(000,999).'.'.$ext;

        $source_path=$_FILES['image']['tmp_name'];
        $destination="../images/category/".$image_name;
        $uplode=move_uploaded_file($source_path,$destination);
       if ($uplode==false) {
        $_SESSION['upload']="<div style='color: aqua;'>Faild to upload Image.</div>" ;
        header("location:add-food.php");
        die();
           # code...
       }
    }

    }else{
     $image_name="";
    }
    $sql3="UPDATE tbl_food SET
     title='$title',
    image_name='$image_name',
    description='$description',
    price='$price',
    category_id=' $category',
    feature='$feature',
    active='$active' 
    WHERE id=$id";
    $res3=mysqli_query($conn,$sql3);
    if($res2==true){
        $_SESSION['update']="Update food successfully";
    header("location:manage-food.php");

    }else{
        $_SESSION['add']="Update food successfully";
        header("location:manage-food.php");
    }
   }
   
   
   
       
       
       
       ?>
        </div>
    </div>



<?php include("partials/footer.php")?>



