<?php include("partials/menu.php");?>

<div class="main-content">
        <div class="wrapper">
          <h1>Add Food</h1>
          <br>
          <?php 
      if (isset($_SESSION['upload'])) {
        echo $_SESSION['upload'] ;  
        unset($_SESSION['upload']);   
       }
     
      ?>
          <br>
          <br>
          <form action="" method="post" enctype="multipart/form-data">
             <table class="">
                 <tr>
                     <td>Title:</td>
                     <td><input type="text" name="title" id="" placeholder="Category title"></td>
                 </tr>
                 <tr>
                     <td>Description:</td>
                     <td>
                         <textarea name="description" id="" cols="30" rows="5" placeholder="description of the food"></textarea>
                    </td>
                 </tr>
                 <tr>
                     <td>Price:</td>
                     <td>
                         <input type="number" name="price">
                    </td>
                 </tr>
                 <tr>
                     <td>Select Image</td>
                     <td>
                         <input type="File" name="image">
                    </td>
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
                                  <option value="<?php echo $id?>"><?php echo $title?></option>
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
                     <td><input  type="radio" name="featured" id="" value="Yes">Yes
                     <input type="radio" name="featured" id="" value="No">No
                    </td>
                 </tr>
                 <tr>
                     <td>Active:</td>
                     <td><input  type="radio" name="active" id="" value="Yes">Yes
                     <input type="radio" name="active" id="" value="No">No
                    </td>
                 </tr>
            
                  <tr>
                     <td colspan="2">
                         <input type="submit" name="submit" id="" value="Add Category" class="btn-secondary">
                    </td>
                 </tr>

             </table>
          </form>
          <?php 
           if(isset($_POST['submit'])){
             $title=$_POST['title'];
             $description=$_POST['description'];
             $price=$_POST['price'];
             
             $category=$_POST['category'];
             if(isset($_POST['featured'])){
                $feature=$_POST['featured'];
     
            }else{
                $feature='No';
            }
          if(isset($_POST['active'])){
              $active=$_POST['active'];
     
          }else{
              $active='No';
          }
          if (isset($_FILES['image']['name'])) {
            $image_name=$_FILES['image']['name'];
             if($image_name!=""){
    
             
                // change image ext
            $ext=end(explode('.',$image_name));
             $image_name="Category-food-".rand(000,999).'.'.$ext;
    
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
        $sql2="INSERT INTO tbl_food SET
               title='$title',
               description='$description',
               price='$price',
               image_name='$image_name',
               category_id='$category',
               feature='$feature',
               active='$active'
               ";
               $res2=mysqli_query($conn,$sql2);
               if($res2==true){
                $_SESSION['add']="<div style='color: aqua;'>Add food</div>" ;
                header("location:manage-food.php");

               }else{
                $_SESSION['add']="<div style='color: aqua;'> Failed Add food</div>" ;
                header("location:manage-food.php");
               }
           }
          ?>
        </div>
    </div>
  

<?php include("partials/footer.php")?>