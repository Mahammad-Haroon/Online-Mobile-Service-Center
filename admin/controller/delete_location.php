<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];

$lid=$_GET['l_id'];
$stmt=$admin->cud("DELETE FROM `location` WHERE `l_id`='$lid'","Deleted");
echo "<script>alert('Location Removed Successfully!');
window.location.href='../view_location.php';
</script>";




?>