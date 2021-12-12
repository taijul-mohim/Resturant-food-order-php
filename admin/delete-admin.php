<?php 
include("../db/db.php"); 
$id=$_GET['id'];
$sql="DELETE FROM tbl_admin WHERE id='$id'";
$query=mysqli_query($conn,$sql);
if ($query==true) {
 $_SESSION['delete']="<div style='color: aqua;'>Admin DELETE Successfully</div>";
 header("location:manage-admin.php");
}else{
    $_SESSION['delete']="<div style='color: red;'>Admin DELETE Successfully</div>";
    header("location:manage-admin.php");
}


?>
