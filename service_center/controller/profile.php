<?php
include '../../config.php';
$admin=new Admin();
$cid=$_SESSION['c_id'];
if(isset($_POST['newdp']))
{
    $profilepic="upload/".basename($_FILES['dp']['name']);
    move_uploaded_file($_FILES['dp']['tmp_name'],$profilepic);

    $stmt=$admin->cud("UPDATE `client` SET `c_profilepic`='$profilepic' WHERE `c_id`='$cid'","Inserted");
    echo "<script>alert('Profile picture updated successfully!');
     window.location.href='../profile.php';
    </script>";
    
}


if(isset($_POST['edit']))
{
    $name=$_POST['c_name'];
    $phone=$_POST['c_phone'];
    $email=$_POST['c_email'];
    $address=$_POST['c_address'];
    $city=$_POST['c_city'];
    $state=$_POST['c_state'];
    $pincode=$_POST['c_pin'];
    $adhar=$_POST['c_adharnumber'];
    $password=$_POST['c_password'];
    $cpassword=$_POST['c_confirmpassword'];
    $status="Updated";

    $stmt2=$admin->ret("SELECT * FROM `client` WHERE `c_id`='$cid'");
    $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
    


    if($password==$cpassword)
    {
        if($password=="" || $cpassword=="")
        {
            $stmt=$admin->cud("UPDATE `client` SET `c_name`='$name',`c_adharnumber`='$adhar',`c_phone`='$phone',`c_email`='$email',`c_address`='$address',`c_city`='$city',`c_state`='$state',`c_pin`='$pincode',`c_updateddate`=Now(),`c_status`='$status' WHERE `c_id`='$cid'","updated");
        echo "<script>alert('Profile Updated Successfully');
        window.location.href='../profile.php';
         </script>";
        }
        else{

        
            $stmt=$admin->cud("UPDATE `client` SET `c_name`='$name',`c_adharnumber`='$adhar',`c_phone`='$phone',`c_email`='$email',`c_address`='$address',`c_city`='$city',`c_state`='$state',`c_pin`='$pincode',`c_password`='$password',`c_updateddate`=Now(),`c_status`='$status' WHERE `c_id`='$cid'","updated");
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