<?php
include '../../config.php';
$admin=new Admin();
$cid=$_SESSION['c_id'];

$jid=$_GET['j_id'];
$stmt=$admin->cud("DELETE FROM `job` WHERE `j_id`='$jid'","Deleted");
echo "<script>alert('Job deleted successfully!');
window.location.href='../job-list.php';
</script>";




?>