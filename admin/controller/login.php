<?php
include '../../config.php';
$admin=new Admin();
if(isset($_POST['signin']))
{
    $email=$_POST['a_email'];
    $password=$_POST['a_password'];
    $stmt=$admin->ret("SELECT * FROM `admin` WHERE `a_email`='$email' AND `a_password`='$password'");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $num=$stmt->rowCount();
    
    if($num>0)
    {
        $aid=$row['a_id'];
        $_SESSION['a_id']=$aid;
        echo "<script>alert('Logged In Successfully!');
        window.location.href='../dashboard.php';
        </script>";
    }
    else
    {
        echo "<script>alert('Incorrect Email or Password!');
        window.location.href='../index.php';
        </script>";
    }
}

if(isset($_POST['save']))
{
    $aid=$_SESSION['a_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm=$_POST['confirmpassword'];
    
    $profilepic="upload/".basename($_FILES['pic']['name']);
    move_uploaded_file($_FILES['pic']['tmp_name'],$profilepic);
    $stmt2=$admin->ret("SELECT * FROM `admin` WHERE `a_id`='$aid'");
    $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
    $pass2=$row2['a_password'];


    if($password==$confirm)
    {
        if($password=="" || $confirm=="")
        {
            $stmt=$admin->cud("UPDATE `admin` SET `a_name`='$name',`a_email`='$email',`a_password`='$pass2',`a_profilepic`='$profilepic' WHERE `a_id`='$aid'","updated");
        echo "<script>alert('Profile Updated Successfully');
        window.location.href='../profile.php';
         </script>";
        }
        else{

        
        $stmt=$admin->cud("UPDATE `admin` SET `a_name`='$name',`a_email`='$email',`a_password`='$password',`a_profilepic`='$profilepic' WHERE `a_id`='$aid'","updated");
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