<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];

$sid=$_GET['s_id'];
$stmt=$admin->cud("DELETE FROM `student` WHERE `s_id`='$sid'","Deleted");
echo "<script>alert('Student record deleted successfully!');
window.location.href='../view_student.php';
</script>";




?>