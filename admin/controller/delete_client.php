<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];

$cid=$_GET['c_id'];
$stmt=$admin->cud("DELETE FROM `client` WHERE `c_id`='$cid'","Deleted");
echo "<script>alert('Student record deleted successfully!');
window.location.href='../view_client.php';
</script>";




?>