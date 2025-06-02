<?php
include '../../config.php';
$admin=new Admin();
$cid=$_SESSION['c_id'];

if(isset($_POST['cancel']))
{
$oid=$_POST['idd'];
$stmt=$admin->cud("DELETE FROM `client_order` WHERE `o_id`='$oid'","Deleted");
echo "<script>alert('Order cancelled successfully!');
window.location.href='../orders.php';
</script>";



}
?>
