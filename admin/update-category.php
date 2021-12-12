<?php include("partials/menu.php");?>

<div class="main-content">
        <div class="wrapper">
          <h1>Update Category</h1>
          <br>
          <?php 
          if(isset($_GET['id'])){
          $id=$_GET['id'];
         $sql="SELECT * FROM tbl_category WHERE id='$id'";
         $res=mysqli_query($conn,$sql);
         while($row=mysqli_fetch_assoc($res)){
            $id=$row["id"];
            $title=$row['title'];
            $current_image=$row['image_name'];
            $featured=$row['featured'];
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
        
       $title=$_POST['title'];
        // $current_image=$_POST['image_name'];
        $featured=$_POST['featured'];
        $active=$_POST['active'];
        if(isset($_FILES['image']['name'])){
            $image_name=$_FILES['image']['name'];
            if ($image_name!="") {
                     // change image ext
        $ext=end(explode('.',$image_name));
        $image_name="Food_Category_".rand(000,999).'.'.$ext;

       $source_path=$_FILES['image']['tmp_name'];
       $destination="../images/category/".$image_name;
       $uplode=move_uploaded_file($source_path,$destination);
      if ($uplode==false) {
       $_SESSION['upload']="<div style='color: aqua;'>Faild to upload Image.</div>" ;
       header("location:add-category.php");
       die();
          # code...
      }
      if($current_image!=""){
        $remove_path="../images/category/".$current_image;
      $remove=unlink($remove_path);
      if($remove==false){
        $_SESSION['failed-remove']="Failed to remove current image";
        header("location:manage-categorie.php");
        die();
      }
      }
      

            }else{
                $image_name=$current_image;
            }

        }else{
            $image_name=$current_image;
        }
        $sql2="UPDATE tbl_category SET  title='$title', image_name='$image_name',featured='$featured', active='$active' WHERE id='$id' ";
        $query=mysqli_query($conn,$sql2);
        if($query==true){
            $_SESSION['update']="Update successfully";
            header("location:manage-categorie.php");
        }else{
            $_SESSION['update']="Failed to Update";
            header("location:manage-categorie.php");
        }

       }
       
       
       
       ?>
        </div>
    </div>



<?php include("partials/footer.php")?>