<?php 

include("../db/db.php"); 
$id=$_GET['id'];
$sql="DELETE FROM tbl_category WHERE id='$id'";
$query=mysqli_query($conn,$sql);
if ($query==true) {
 $_SESSION['delete-food']="<div style='color: aqua;'> Category DELETE Successfully</div>";
 header("location:manage-categorie.php");
}else{
    $_SESSION['delete-food']="<div style='color: red;'>Category DELETE Unsuccessfully</div>";
    header("location:manage-categorie.php");
}


?>