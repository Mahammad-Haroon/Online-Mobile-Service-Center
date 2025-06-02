<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['c_id']))
{
    header('Location:index.php');
}
$cid=$_SESSION['c_id'];


$prid=$_GET['pr_id'];
$stmt1=$admin->ret("SELECT * FROM `product` where `pr_id`='$prid'");
$row1=$stmt1->fetch(PDO::FETCH_ASSOC);

$stmt=$admin->ret("SELECT * FROM `client` where `c_id`='$cid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GigSource - Part Time Job Organizer For Students</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/GS1.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-xxl py-5">
            <div class="container col-lg-12">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Confirm your order here</h1>
                <div class="card card-body" style="display:flex;flex-direction: row;flex-wrap: wrap;gap:20px;justify-content: center;">
                    <h5 class="text-center wow fadeInUp" data-wow-delay="0.1s"><u>Fill your shipping address</u></h5>
                    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-3 wow slideInUp"  data-wow-delay="0.1s">
                                <h4 class="mb-4">Product Summary</h4>
                                    <p><i class="fa fa-angle-right text-primary me-2"></i>Product: <?php echo $row1['pr_name']; ?></p>
                                    <p><i class="fa fa-angle-right text-primary me-2"></i>Price: <?php echo $row1['pr_amt']; ?></p>
                            
                                    <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i> Posted Date: <?php echo $row1['pr_posteddate']; ?></p>
                            </div>
                        <div class="card-body mt-5 bg-light"> 
                            <div class="row">
                                <h5 class="mb-4 text-center">Shipment details</h5>
                                <form method="POST" action="controller/order-product.php">
                                    
                                
                                <div class="input-group mb-3">
                                    <input type="hidden" name="c_id" class="form-control" aria-label="Username" value="<?php echo $cid; ?>" required>
                                    <input type="hidden" name="pr_id" class="form-control" aria-label="Username" value="<?php echo $prid; ?>" required>
                                    <input type="hidden" name="c_name" value="<?php echo $row['c_name']; ?>" class="form-control" aria-label="Username" placeholder="enter product name here" required>
                                    <input type="hidden" name="c_phone" value="<?php echo $row['c_phone']; ?>" class="form-control" aria-label="Username" placeholder="enter product name here" required>
                                     <input type="hidden" name="c_email" value="<?php echo $row['c_email']; ?>" class="form-control" aria-label="Username" placeholder="enter product name here" required>
    
                                    <span class="input-group-text">Address</span>

                                    <input type="text" name="c_address" value="<?php echo $row['c_address']; ?>" class="form-control" aria-label="Username" placeholder="enter product name here" required>
                                    <span class="input-group-text">City</span>
                                    <input type="text" name="c_city" value="<?php echo $row['c_city']; ?>" class="form-control" aria-label="Username" placeholder="enter product name here" required>
                                    <span class="input-group-text">Pincode</span>
                                    <input type="number" name="c_pin" value="<?php echo $row['c_pin']; ?>" class="form-control" aria-label="Username" placeholder="enter product price here" required>
                                    <span class="input-group-text">State</span>
                                    <input type="text" name="c_state" value="<?php echo $row['c_state']; ?>" class="form-control" aria-label="Username" placeholder="enter product price here" required>
                                </div>
                            </div>             
                        </div>

                        <div class="card-body mt-5 bg-light"> 
                            <div class="row">
                                <h5 class="mb-4 text-center">Payment</h5>

                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="paymentMethod" type="radio" value="card" onclick="paytype(this.value)" class="custom-control-input"  >
                                        <label class="custom-control-label" for="credit">Credit card/Debit card</label>

                                        <div style="display:none;" id="card_div">
                                            <div class="row">
                                                <div class="col-md-6 mb-3"> 

                                                    <label for="cc-name">Name on card</label>
                                                    <input type="text" name="cardname" class="form-control" id="cc-name" placeholder="" pattern="[a-zA-z]+{20}" title="use only lowercase letter, don't use space in between">
                                                    
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="cc-number">Credit card number</label>
                                                    <input type="text"  name="cardno" class="form-control" id="cc-number" placeholder="**** **** **** ****" pattern="[0-9 ]{19}" title="use spaces after every 4 digits.">
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="cc-expiration">Expiration</label>
                                                    <input type="month" name="expiry"  class="form-control" id="cc-expiration" placeholder="" title="pick the expiry date of your card">
                                                    
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="cc-cvv">CVV</label>
                                                    <input type="text"  name="cvv" class="form-control" id="cc-cvv" placeholder="***" pattern="[0-9]{3}" title="don't use space, cvv number should be in 3 digits">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="custom-control custom-radio">
                                        <input id="cash" name="paymentMethod" type="radio" value="cash" onclick="paytype(this.value)" class="custom-control-input" required="">
                                        <label class="custom-control-label" for="cash">Cash On Delivery </label>
                                        <div style="display:none;" id="cash_div">
                                            <p>Pay once you receive product</p>
                                        </div>
                                    </div> -->
                                    <div class="custom-control custom-radio">
                                        <input id="upi" name="paymentMethod" type="radio" value="upi" onclick="paytype(this.value)" class="custom-control-input" >
                                        <label class="custom-control-label" for="upi">UPI</label>
                                        <div style="display:none;" id="upi_div">
                                            <div class="Pement">
                                                <div class="form-box">
                                                    <label>Scan and Pay</label><br>
                                                        <img src="img/qr.svg" height="100px" width="100px">
                                                </div>
                                                <br>
                                                <div class="form-box">
                                                    <label>Trans / Id</label>
                                                    <input name="tid"  type="text" name="transaction" placeholder="0000 0000 0000 0000 " pattern="[0-9]{12}">
                                                </div>    
                                            </div>
                                        </div>          
                                    </div>
                                </div>             
                            </div>
                        </div>
                     <div class="row mt-4" style="margin-left: 85%;width:25%;">
                        <div class="col-sm-12">
                            <button class="btn btn-success" type="submit" name="confirm" value="Insert"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<script>
        function paytype(myvalue) {

if (myvalue == 'card') { //radio button id
  document.getElementById('card_div').style.display = 'block'; //div id
  document.getElementById('upi_div').style.display = 'none';
  document.getElementById('cash_div').style.display = 'none';

} else if (myvalue == 'upi') {
  document.getElementById('card_div').style.display = 'none';
  document.getElementById('upi_div').style.display = 'block';
  document.getElementById('cash_div').style.display = 'none';
} else {
  document.getElementById('card_div').style.display = 'none';
  document.getElementById('upi_div').style.display = 'none';
  document.getElementById('cash_div').style.display = 'block';
}

}
    </script>

</body>
</html>