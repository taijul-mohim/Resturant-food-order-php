<?php 

include("../db/db.php"); 
$id=$_GET['id'];
$sql="DELETE FROM contact WHERE id='$id'";
$query=mysqli_query($conn,$sql);
if ($query==true) {
 $_SESSION['delete-contact']="<div style='color: aqua;'> Contact DELETE Successfully</div>";
 header("location:manage-contact.php");
}else{
    $_SESSION['delete-contact']="<div style='color: red;'>Contact DELETE Unsuccessfully</div>";
    header("location:-contact.php");
}


?>