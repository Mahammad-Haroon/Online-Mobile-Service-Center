<?php 
include '../../config.php';
$admin=new Admin();
if (isset($_POST['confirm'])) {
    $prid=$_POST['pr_id'];
    $cid=$_POST['c_id'];
    $ostatus="ordered";

    $name=$_POST['c_name'];
    $email=$_POST['c_email'];
    $phone=$_POST['c_phone'];
    $address=$_POST['c_address'];
    $city=$_POST['c_city'];
    $pin=$_POST['c_pin'];
    $state=$_POST['c_state'];
    $tid=$_POST['tid'];
    $sstatus="placed";

    $pay_mode=$_POST['paymentMethod'];
    // $pstatus="pending";
    $ppstatus="paid";

    $stmt2=$admin->ret("SELECT * FROM `product` WHERE `pr_id`='$prid'");
    $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
    $amt=$row2['pr_amt'];
    $a=$amt*10/100;
    $s=$amt*90/100;  

     if ($pay_mode=="card") {
        $stmt=$admin->Rcud("INSERT INTO `client_order`(`o_date`, `pr_id`, `c_id`,  `o_status`)VALUES(Now(),'$prid','$cid','$sstatus')");
        
        $stmt5=$admin->cud("INSERT INTO `payment`( `p_date`, `o_id`, `p_mode`, `p_totalamt`, `p_adminamt`, `p_studentamt`, `p_status`) VALUES (Now(),'$stmt','$pay_mode','$amt',' $a','$s','$ppstatus')",'saved');
        
        $stmt3=$admin->cud("INSERT INTO `product_shipping`(`o_id`,`ps_name`,`ps_phone`,`ps_email`,`ps_address`,`ps_city`,`ps_pin`,`ps_state`,`ps_status`)VALUES('$stmt','$name','$phone','$email','$address','$city','$pin','$state','$sstatus')",'saved');
        

        echo "<script>alert('Thank you for ordering, visit us again...');
        window.location='../product-list.php';</script>";
    

    }else{

        $stmt=$admin->Rcud("INSERT INTO `client_order`(`o_date`, `pr_id`, `c_id`,  `o_status`)VALUES(Now(),'$prid','$cid','$sstatus')");

        $stmt6=$admin->cud("INSERT INTO `payment`( `p_date`, `o_id`, `p_mode`, `p_totalamt`, `p_adminamt`, `p_studentamt`,`t_id`, `p_status`) VALUES (Now(),'$stmt','$pay_mode','$amt',' $a','$s', '$tid','$ppstatus')",'saved');
        
                
        $stmt3=$admin->cud("INSERT INTO `product_shipping`(`o_id`,`ps_name`,`ps_phone`,`ps_email`,`ps_address`,`ps_city`,`ps_pin`,`ps_state`,`ps_status`)VALUES('$stmt','$name','$phone','$email','$address','$city','$pin','$state','$sstatus')",'saved');
        echo "<script>alert('Thank you for ordering, visit us again...');
        window.location='../product-list.php';</script>";

    }
  }

?>
