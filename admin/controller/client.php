<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['approve']))
{
    $cid=$_POST['cid'];
    $status="approved";
    $stmt=$admin->cud("UPDATE `client` SET `c_status`='$status' WHERE `c_id`='$cid'","Updated");

    echo "<script>alert('Approved Successfully!');
    window.location.href='../clients.php';
    </script>";


}

if(isset($_POST['reject']))
{

    $cid=$_POST['cid'];
    $status="rejected";
    $stmt=$admin->cud("UPDATE `client` SET `c_status`='$status' WHERE `c_id`='$cid'","Updated");

    echo "<script>alert('Rejected Successfully!');
    window.location.href='../clients.php';
    </script>";
}



?>