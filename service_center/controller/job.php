<?php
include '../../config.php';
$admin=new Admin();
$cid=$_SESSION['c_id'];
$jid=$_GET['j_id'];
if(isset($_POST['post']))
{
    $title=$_POST['title'];
    $wage=$_POST['wage'];
    $desc=$_POST['desc'];
    $unit=$_POST['unit'];
    $duration=$_POST['duration'];
    $location=$_POST['location'];
   
    $status="posted";

    $image="upload/".basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$image);


    $stmt=$admin->cud("INSERT INTO `job`(`c_id`,`j_title`, `j_desc`, `j_location`, `j_wage`, `j_duration`, `j_unit`, `j_image`, `j_posteddate`, `j_status`) 
    VALUES ('$cid','$title','$desc','$location','$wage','$duration','$unit','$image',Now(),'$status')","Inserted");
    echo "<script>alert('Job posted successfully!');
    window.location.href='../job-list.php';
    
    </script>";
    
}
if(isset($_POST['update']))
{
    $title=$_POST['title'];
    $wage=$_POST['wage'];
    $desc=$_POST['desc'];
    $unit=$_POST['unit'];
    $duration=$_POST['duration'];
    $location=$_POST['location'];
    // $jid=$_POST['j_id'];
    $status="Updated";

    $image="upload/".basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$image);


    $stmt=$admin->cud("UPDATE `job` SET `j_title`='$title',`j_description`='$desc',`j_location`='$location',`j_wage`='$wage',`j_duration`='$duration',`j_unit`='$unit',`j_image`='$image',`j_updateddate`=Now(),`j_status`='$status' WHERE `j_id`='$jid'","Inserted");
    echo "<script>alert('Job updated successfully!');
    window.location.href='../job-list.php';
    </script>";
    
}

?>