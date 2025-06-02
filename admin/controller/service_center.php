<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['approve']))
{
    $sid=$_POST['sid'];
    $status="Approved";
    $stmt=$admin->cud("UPDATE `service_center` SET `s_status`='$status' WHERE `s_id`='$sid'","Updated");

    echo "<script>alert('Approved Successfully!');
    window.location.href='../service_centers.php';
    </script>";


}

if(isset($_POST['reject']))
{

    $sid=$_POST['sid'];
    $status="Rejected";
    $stmt=$admin->cud("UPDATE `service_center` SET `s_status`='$status' WHERE `s_id`='$sid'","Updated");

    echo "<script>alert('Rejected Successfully!');
    window.location.href='../service_centers.php';
    </script>";
}



?>