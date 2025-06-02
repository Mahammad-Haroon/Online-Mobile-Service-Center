<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['submit']))
{
    $name=$_POST['s_name'];
    $phone=$_POST['s_phone'];
    $email=$_POST['s_email'];
    $location=$_POST['s_location'];
    $password=$_POST['s_password'];
    $ownername=$_POST['s_ownername'];
    $businesshour=$_POST['s_businesshour'];
    $desc=$_POST['s_desc'];
    $status="registered";
    
    $photo="upload/".basename($_FILES['s_photo']['name']);
    move_uploaded_file($_FILES['s_photo']['tmp_name'],$photo);

    $stmt2=$admin->ret("SELECT * FROM `service_center` ");
    while($row2=$stmt2->fetch(PDO::FETCH_ASSOC))
    {
    if($email==$row2['s_email'])
     {
        echo "<script>alert('Account Already exist.Please Sign In');
        window.location.href='../index.php';
        </script>";
        
     }
    }

    $stmt=$admin->cud("INSERT INTO `service_center`(`s_username`, `s_phone`, `s_email`, `s_password`, `s_location`, `s_ownername`, `s_businesshour`, `s_desc`,`s_photo`, `s_createddate`, `s_status`) VALUES ('$name','$phone','$email','$password','$location','$ownername','$businesshour','$desc','$photo',Now(),'$status')","Inserted");
    echo "<script>alert('Registered successfully! Login to explore more');
    //  window.location.href='../index.php';
    </script>";
    
}





if(isset($_POST['signin']))
{
    $email=$_POST['u_email'];
    $password=$_POST['u_password'];
    $stmt=$admin->ret("SELECT * FROM `service_center` WHERE `s_email`='$email' AND `s_password`='$password'");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $num=$stmt->rowCount();
    if($num>0)
    {
        $status=$row['s_status'];
        if($status=="Approved" || $status=="updated")
        {
            $sid=$row['s_id'];
            $_SESSION['s_id']=$sid;
            // print_r($_SESSION);

            echo "<script>alert('Logged In Successfully! You are good to go..');
            window.location='../homepage.php';
            </script>";
            
        }
        else 
        {
            echo "<script>alert('Your account has not been verified by the admin! Please try again later');
            window.location.href='../index.php';
            </script>";
        }
    }
    else
    {
        echo "<script>alert('Incorrect Email or Password!Please Try Again');
        window.location.href='../index.php';
        </script>";
    }
}



?>