<?php


include("../db/db.php"); 
$id=$_GET['id'];
$sql="DELETE FROM tbl_food WHERE id='$id'";
$query=mysqli_query($conn,$sql);
if ($query==true) {
 $_SESSION['delete-food']="<div style='color: aqua;'> Food DELETE Successfully</div>";
 header("location:manage-food.php");
}else{
    $_SESSION['delete-food']="<div style='color: red;'>food DELETE Unsuccessfully</div>";
    header("location:manage-food.php");
}




?>