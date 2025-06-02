<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['register']))
{
    $name=$_POST['s_name'];
    $phone=$_POST['s_phone'];
    $email=$_POST['s_email'];
    $address=$_POST['s_address'];
    $city=$_POST['s_city'];
    $state=$_POST['s_state'];
    $pincode=$_POST['s_pin'];
    $college=$_POST['s_collegename'];
    $password=$_POST['s_password'];
    $status="registered";
    $profilepic="upload/".basename($_FILES['s_profilepic']['name']);
    move_uploaded_file($_FILES['s_profilepic']['tmp_name'],$profilepic);

    $collegeid="upload/".basename($_FILES['s_collegeidproof']['name']);
    move_uploaded_file($_FILES['s_collegeidproof']['tmp_name'],$collegeid);
   
    $stmt2=$admin->ret("SELECT * FROM `student` ");
    while($row2=$stmt2->fetch(PDO::FETCH_ASSOC))
    {
    if($email==$row2['s_email'])
     {
        echo "<script>alert('Account Already exist.Please Sign In');
        window.location.href='../index.php';
        </script>";
        
     }
    }
    echo $name;
    $stmt=$admin->cud("INSERT INTO `student`(`s_name`, `s_phone`, `s_email`, `s_address`,`s_city`,`s_state`,`s_pin`, `s_password`,`s_profilepic`,`s_collegename`, `s_collegeidproof`,`s_createddate`,`s_status`) VALUES ('$name','$phone','$email','$address','$city','$state','$pincode','$password','$profilepic','$college','$collegeid',Now(),'$status')","Inserted");
    echo "<script>alert('Registered Successfully!Login to explore more...');
    window.location.href='../index.php';
    </script>";
    
}


if(isset($_POST['signin']))
{
    
    $email=$_POST['u_email'];
    $password=$_POST['u_password'];
    $stmt=$admin->ret("SELECT * FROM `student` WHERE `s_email`='$email' AND `s_password`='$password'");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $num=$stmt->rowCount();
    if($num>0)
    {
        $status=$row['s_status'];
        if($status=="Approved" || $status=="Updated")
        {
        $sid=$row['s_id'];
        $_SESSION['s_id']=$sid;
        echo "<script>alert('Logged In Successfully!You are good to go...');
        window.location.href='../homepage.php';
        </script>";
        }
        else {
            echo "<script>alert('Your account has not been verified by the admin! Please try again');
            window.location.href='../index.php';
            </script>";
            }
    }
    else
    {
        echo "<script>alert('Incorrect Email or Password!Please try again...');
        window.location.href='../index.php';
        </script>";
    }
}


?>