<?php
include '../../config.php';
$admin=new Admin();

// $sajid=$_GET['sajid'];
if(isset($_POST['postj']))
{
    $feedback=$_POST['feedback'];
    $cid=$_POST['cid'];
    $sajid=$_POST['sajid'];

    $stmt=$admin->cud("INSERT INTO `feedback`( `f_date`, `saj_id`, `c_id`, `f_message`) VALUES (Now(),'$sajid','$cid','$feedback')","Inserted");
    echo "<script>alert('Feedback Sent Successfully');
     window.location.href='../job-list.php';
    </script>";
    
}
if(isset($_POST['postp']))
{
    $feedback=$_POST['feedback'];
    $cid=$_POST['cid'];
    $oid=$_POST['oid'];

    $stmt=$admin->cud("INSERT INTO `feedback`( `f_date`, `o_id`, `c_id`, `f_message`) VALUES (Now(),'$oid','$cid','$feedback')","Inserted");
    echo "<script>alert('Feedback Sent Successfully');
     window.location.href='../product-list.php';
    </script>";
    
}

?>