<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['apply']))
{
    $sid=$_POST['sid'];
    $jid=$_POST['jid'];

        $status="applied";
        $stmt=$admin->cud("INSERT INTO `student_apply_jobs`( `saj_date`, `j_id`, `s_id`, `saj_status`) VALUES (Now(),'$jid','$sid','$status')","Inserted");
        echo "<script>alert('Applied Successfully');
        window.location.href='../job-list.php';
        </script>";







   

}

?>