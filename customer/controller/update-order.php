<?php
include '../../config.php';
$admin=new Admin();
$sid=$_SESSION['s_id'];

if(isset($_POST['update']))
{
   
    $oid=$_POST['o_id'];
     $status=$_POST['status'];

    $stmt=$admin->ret("SELECT * FROM `client_order` WHERE `o_id`='$oid'");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
     
    $prid=$row['pr_id'];


    $stmt=$admin->cud("UPDATE `client_order` SET `o_updatedate`=Now(),`o_status`='$status' WHERE `o_id`='$oid' ","updated");
    echo "<script>alert('Status updated successfully!');
    window.location.href='../orders.php';
    </script>";
    
}
