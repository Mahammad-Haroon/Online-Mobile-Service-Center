<?php
include '../../config.php';
$admin=new Admin();
$sid=$_SESSION['s_id'];

$prid=$_GET['pr_id'];
$stmt=$admin->cud("DELETE FROM `product` WHERE `pr_id`='$prid'","Deleted");
echo "<script>alert('Product deleted successfully!');
window.location.href='../product-list.php';
</script>";

?>