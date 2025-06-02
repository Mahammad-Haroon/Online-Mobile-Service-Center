<?php
include '../../config.php';
$admin=new Admin();
$sid=$_SESSION['s_id'];

if(isset($_POST['post']))
{
    $name=$_POST['name'];
    $price=$_POST['price'];
    $desc=$_POST['desc'];
    $quantity=$_POST['quantity'];
   
   
    $status="posted";

    $image="upload/".basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$image);


    $stmt=$admin->cud("INSERT INTO `product`( `s_id`,`pr_name`, `pr_description`, `pr_amt`, `pr_quantity`,`pr_image`, `pr_posteddate`, `pr_status`)
     VALUES ('$sid','$name','$desc','$price','$quantity','$image',Now(),'$status')","Inserted");
    echo "<script>alert('Product posted successfully!');
    window.location.href='../product-list.php';
    </script>";
    
}
$prid=$_GET['pr_id'];
if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $price=$_POST['price'];
    $desc=$_POST['desc'];
    $quantity=$_POST['quantity'];
    $status="Updated";

    $image="upload/".basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$image);


    $stmt=$admin->cud("UPDATE `product` SET `pr_name`='$name',`pr_description`='$desc',`pr_amt`='$price',`pr_quantity`='$quantity',`pr_image`='$image',`pr_updateddate`=Now(),`pr_status`='$status'  WHERE `pr_id`='$prid'","Updated");
    echo "<script>alert('Product updated successfully!');
    window.location.href='../product-list.php';
    </script>";
    
}

?>