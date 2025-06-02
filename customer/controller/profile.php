<?php
include '../../config.php';
$admin=new Admin();
$sid=$_SESSION['s_id'];
if(isset($_POST['newdp']))
{
    $profilepic="upload/".basename($_FILES['dp']['name']);
    move_uploaded_file($_FILES['dp']['tmp_name'],$profilepic);

    $stmt=$admin->cud("UPDATE `student` SET `s_profilepic`='$profilepic' WHERE `s_id`='$sid'","Inserted");
    echo "<script>alert('Profile picture updated successfully!');
    window.location.href='../profile.php';
   </script>";
    
}


if(isset($_POST['edit']))
{
    $name=$_POST['s_name'];
    $phone=$_POST['s_phone'];
    $email=$_POST['s_email'];
    $address=$_POST['s_address'];
    $city=$_POST['s_city'];
    $state=$_POST['s_state'];
    $pincode=$_POST['s_pin'];
    $college=$_POST['s_college'];
    $password=$_POST['s_password'];
    $cpassword=$_POST['s_confirmpassword'];
    $status="Updated";

    $stmt2=$admin->ret("SELECT * FROM `student` WHERE `s_id`='$sid'");
    $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
    


    if($password==$cpassword)
    {
        if($password=="" || $cpassword=="")
        {
            $stmt=$admin->cud("UPDATE `student` SET `s_name`='$name',`s_phone`='$phone',`s_email`='$email',`s_address`='$address',`s_city`='$city',`s_state`='$state',`s_pin`='$pincode',`s_collegename`='$college',`s_updateddate`=Now(),`s_status`='$status' WHERE `s_id`='$sid'","updated");
        echo "<script>alert('Profile Updated Successfully');
        window.location.href='../profile.php';
         </script>";
        }
        else{

        
            $stmt=$admin->cud("UPDATE `student` SET `s_name`='$name',`s_phone`='$phone',`s_email`='$email',`s_address`='$address',`s_city`='$city',`s_state`='$state',`s_pin`='$pincode',`s_password`='$password',`s_collegename`='$college',`s_updateddate`=Now(),`s_status`='$status' WHERE `s_id`='$sid'","updated");
        echo "<script>alert('Profile Updated Successfully');
        window.location.href='../profile.php';
         </script>";
        }
    }
    else
    {
        echo "<script>alert('Password is not matching!');
        window.location.href='../profile.php';
        </script>";
    }
}




?>