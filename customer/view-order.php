<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['s_id']))
{
    header('Location:index.php');
}
$sid=$_SESSION['s_id'];

$oid=$_GET['o_id'];
$stmt=$admin->ret("SELECT * FROM `client_order` inner join `product` on product.pr_id=client_order.pr_id inner join `client` on client.c_id=client_order.c_id inner join `payment` on client_order.o_id=payment.o_id where client_order.o_id='$oid'");
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
    <div class="container-xxl bg-white p-0">

        <!-- Navbar Start -->
        <?php 
        include 'navbar.php';
        ?>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Order Details</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="product-list.php">Product List</a></li> -->
                        <li class="breadcrumb-item text-white active" aria-current="page">Order Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Update Orders</h1>
                <div class="card card-body" style="display:flex;flex-direction: row;flex-wrap: wrap;gap:20px;justify-content: center;">
                        
                        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="controller/<?php echo $row['pr_image']; ?>" alt="" style="width: 150px; height: 150px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3"><?php echo $row['pr_name']; ?></h3>
                                
                                
                                <span class="text-truncate me-5"><i class="far fa-money-bill-alt gig me-2"></i><?php echo 'Rs ',$row['pr_amt'],'/-'; ?></span>
                                <span class="text-truncate me-0"><i class="far fa-calendar-alt gig me-2"></i>Posted on - <?php echo $row['o_date']; ?> </span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Product Description</h4>
                            <p><?php echo $row['pr_description']; ?>.</p>
                            
                        </div>
                        <div class="col-4">
                            <form method="POST" action="controller/update-order.php">
                                <input type="hidden" name="o_id" readonly value="<?php echo $oid; ?>">
                                <!-- <input type="hidden" name="pr_id" readonly value="<?php echo $row['c_id']; ?>"> -->
                                <div class="col-sm-8 text-secondary" style="width: 40vw;display: flex;gap: 20px;align-items: center;padding:5px;">
                                    <?php if($row['o_status']=="canceled" || $row['o_status']=="delivered"){ ?>
                                        <label style="width:20vw;color: black;"><strong>Order Status</strong></label>
                                    <?php }else {?>
                                    <label style="width:20vw"><strong>Update Status</strong></label>
                                <?php } ?>
                                    <select required name="status" class="form-control">

                                        <option value="" hidden >Update status</option>
                                        <?php if($row['o_status']=="canceled"){ ?>
                                            <option <?php if ($row['o_status']=="canceled") {?> readonly selected
                                                <?php } ?>>Canceled</option>
                                            <?php }else if($row['o_status']=="delivered"){ ?>
                                                <option <?php if ($row['o_status']=="delivered") {?> readonly selected
                                                <?php } ?>>Delivered</option>
                                            <?php } else {?>

                                            <option value="placed" <?php if ($row['o_status']=="placed") {?> selected
                                                <?php } ?>>Placed</option>
                                            <option value="packed" <?php if ($row['o_status']=="packed") {?> selected
                                                <?php } ?>>Packed</option>
                                            <option value="shipped" <?php if ($row['o_status']=="shipped") {?> selected
                                                <?php } ?>>Shipped</option>
                                            <option value="delivered" <?php if ($row['o_status']=="delivered") {?> selected
                                                <?php } ?>>Delivered</option>
                                            <?php } ?>  
                                    </select>
                                    <?php 

                                    if($row['o_status']=="canceled"){ ?>

                                        <?php } else if ($row['o_status']=="delivered") { ?>
                                            
                                        <?php }else{ ?>
                                            <button class="btn btn-primary w-50" style="height:45px" type="submit" name="update"><i class="bi bi-telegram"></i>&nbsp;&nbsp;Update</button>
                                        <?php } ?>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
        
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-3 wow slideInUp" data-wow-delay="0.1s">
                            <?php
                            $stmt=$admin->ret("SELECT * FROM `client_order` inner join `client` on client.c_id=client_order.c_id WHERE client_order.o_id='$oid'");
                                $t=$stmt->fetch(PDO::FETCH_ASSOC);
                             ?>
                            <h4 class="mb-4">Client Detail</h4>
                            <p class="m-0">
                                <table>
                                    <tr>
                                        <td style="width: 50%;">
                                            Name
                                        </td>
                                        <td>
                                            <?php echo $t['c_name']; ?> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">
                                            Email ID
                                        </td>
                                        <td>
                                            <?php echo $t['c_email']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">
                                            Contact
                                        </td>
                                        <td>
                                            <?php echo $t['c_phone']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;margin-top: -10px;">
                                            Address
                                        </td>
                                        <td>
                                            <?php echo $t['c_address']; ?>, <?php echo $t['c_city']; ?> - <?php echo $t['c_pin']; ?>, <?php echo $t['c_state']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;margin-top: -10px;">
                                            Amount Paid
                                        </td>
                                        <td>
                                            Rs.<?php echo $row['p_totalamt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;margin-top: -10px;">
                                            Income
                                        </td>
                                        <td>
                                            Rs.<?php echo $row['p_studentamt']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;margin-top: -10px;">
                                            Payment mode
                                        </td>
                                        <td>
                                            <?php echo $row['p_mode']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;margin-top: -10px;">
                                            Payment date
                                        </td>
                                        <td>
                                            <?php echo $row['p_date']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;margin-top: -10px;">
                                            Transaction ID
                                        </td>
                                        <td>
                                            <?php echo $row['t_id']; ?>
                                        </td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    </div>
            </div>
        </div>
            
                        
            <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
        </div>
        <!-- Job End -->




</body>
</html>
