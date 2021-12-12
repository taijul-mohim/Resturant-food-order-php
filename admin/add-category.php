<?php include("partials/menu.php");?>

<div class="main-content">
        <div class="wrapper">
          <h1>Add admin</h1>
          <br>
          <?php 
      if (isset($_SESSION['add'])) {
        echo $_SESSION['add'] ;  
        unset($_SESSION['add']);   
       }
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
                     <td>Select Image:</td>
                     <td><input type="file" name="image" id="" ></td>
                 </tr>
                 <tr>
                     <td>Featured:</td>
                     <td><input type="radio" name="featured" id="" value="Yes">Yes
                     <input type="radio" name="featured" id="" value="No">No
                    </td>
                 </tr>
                 <tr>
                     <td>Active:</td>
                     <td><input type="radio" name="active" id="" value="Yes">Yes
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
       
        </div>
    </div>
    <?php 
    if(isset($_POST['submit'])){
       $title=$_POST['title'];
       if(isset($_POST['featured'])){
           $fetured=$_POST['featured'];

       }else{
           $fetured='No';
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
    }

    }else{
     $image_name="";
    }
     $sql="INSERT INTO tbl_category (title,image_name , featured,active)VALUES('$title','$image_name','$fetured','$active')";
     $query=mysqli_query($conn,$sql);
     if ($query==true) {
        $_SESSION['add']="Category add successfully";
        header("location:manage-categorie.php");
       }else{
        $_SESSION['add']="Failed to add";
        header("location:manage-categorie.php");
    
       }


    }
    
    
    
    
    
    ?>


<?php include("partials/footer.php")?>