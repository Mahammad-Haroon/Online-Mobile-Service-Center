<?php
include '../../config.php';
$admin=new Admin();
$cid=$_SESSION['c_id'];
// $jid=$_GET['j_id'];
if(isset($_POST['update']))
{
   
    $saj_id=$_POST['saj_id'];
    $status=$_POST['status'];

    $stmt=$admin->ret("SELECT * FROM `student_apply_jobs` WHERE `saj_id`='$saj_id'");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
     
    $jid=$row['j_id'];


    $stmt=$admin->cud("UPDATE `student_apply_jobs` SET `saj_updateddate`=Now(),`saj_status`='$status' WHERE `saj_id`='$saj_id' ","updated");
    echo "<script>alert('Status updated successfully!');
    window.location.href='../applications.php?j_id=$jid';
    </script>";
    
}
