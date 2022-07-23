<?php
include("../db/db.php"); 
$id=$_GET['id'];
$sql="DELETE FROM table_order WHERE id='$id'";
$query=mysqli_query($conn,$sql);
if ($query==true) {
 $_SESSION['delete-contact']="<div style='color: aqua;'> Contact DELETE Successfully</div>";
 header("location:manage-order.php");
}else{
    $_SESSION['delete-order']="<div style='color: red;'>Contact DELETE Unsuccessfully</div>";
    header("location:manage-order.php");
}



?>