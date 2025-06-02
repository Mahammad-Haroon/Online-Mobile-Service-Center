<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['post']))
{
    $location=$_POST['location'];
    $stmt=$admin->cud("INSERT INTO `location`(`l_name`, `l_posteddate`, `l_status`) VALUES ('$location',Now(),'Available')","Inserted");
    echo "<script>alert('Location Added Successfully');
    window.location.href='../view_location.php';
     </script>";
    if($stmt)
    {
        echo $location;
    }
    }
    if(isset($_POST['update']))
    {
        $lid=$_POST['lid'];
        $status=$_POST['status'];
        $location=$_POST['location'];
        $stmt=$admin->cud("UPDATE `location` SET `l_name`='$location',`l_updatedate`=Now(),`l_status`='$status' WHERE `l_id`='$lid'","Inserted");
        echo "<script>alert('Location updated Successfully');
        window.location.href='../view_location.php';
         </script>";
        }
    

    ?>