<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['s_id']))
{
    header('Location:index.php');
}
$sid=$_SESSION['s_id'];


// $prid=$_GET['pr_id'];
// $stmt1=$admin->ret("SELECT * FROM `product` where `pr_id`='$prid'");
// $row1=$stmt1->fetch(PDO::FETCH_ASSOC);

// $stmt=$admin->ret("SELECT * FROM `client` where `s_id`='$sid'");
// $row=$stmt->fetch(PDO::FETCH_ASSOC);
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
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Your Orders</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <?php 
                            $stmt=$admin->ret("SELECT * FROM `client_order` inner join `product` on product.pr_id=client_order.pr_id WHERE `s_id`='$sid'");
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <input type="hidden" name="pr_id" value="<?php echo $row['pr_id']; ?>">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="../student/controller/<?php echo $row['pr_image']; ?>" alt="abc" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"><?php echo $row['pr_name']; ?></h5>
                                            <!-- <span class="text-truncate me-3"><i class="fa fa-info-circle gig" aria-hidden="true">&nbsp;</i><?php echo $row['pr_description']; ?></span> -->
                                            
                                            <span class="text-truncate me-3"><i class="far fa-money-bill-alt gig me-2"></i><?php echo $row['pr_amt']; ?></span>
                                            <span class="text-truncate me-0"><i class="far fa-calendar-alt gig me-2"></i><?php echo $row['o_date']; ?> </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center text-center">

                                        <div class="d-flex mb-3 gap-3">
                                            <?php if ($row['o_status']=="shipped") { ?> 
                                                <button class="btn btn-success">
                                                        <i class="fa fa-truck fa-2x" aria-hidden="true"></i>

                                                    </button>                                         
                                                </div>
                                            <h6><?php echo $row['o_status']; ?></h6>
                                            <?php } else if ($row['o_status']=="cancelled") { ?> 
                                                <form method="POST" action="controller/cancelorder.php">
                                                    <input type="hidden" name="idd" value="<?php echo $row['o_id'];?>" >
                                                </form>
                                        </div>
                                            <h6><?php echo $row['o_status']; ?></h6>
                                            <?php } else if($row['o_status']=="delivered"){ ?>
                                                <form method="POST" action="controller/cancelorder.php">
                                                    <input type="hidden" name="idd" value="<?php echo $row['o_id'];?>" >
                                                    <a href="feedbackp.php?o_id=<?php echo $row['o_id'];?>">
                                            <button type="button" class="btn btn-light ">Feedback</button>
                                            </a>
                                        
                                                    <button title="status" type="button" class="btn btn-dark text-white">

                                                    
                                           
                                        
                                                    
                                                    <!-- <i class="bi bi-box2-heart"></i> -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-box2-heart" viewBox="0 0 16 16">
  <path d="M8 7.982C9.664 6.309 13.825 9.236 8 13 2.175 9.236 6.336 6.31 8 7.982Z"/>
  <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4h-8.5Zm0 1H7.5v3h-6l2.25-3ZM8.5 4V1h3.75l2.25 3h-6ZM15 5v10H1V5h14Z"/>
</svg>
                                                    </button> 
                                                </form>
                                        </div>
                                            <h6><?php echo $row['o_status']; ?></h6>
                                        <?php } else if($row['o_status']=="packed"){ ?>
                                                 <form method="POST" action="controller/cancelorder.php">
                                                    <input type="hidden" name="idd" value="<?php echo $row['o_id'];?>" >
                                                    <button title="status" type="button" class="btn btn-warning text-white">
                                                        <i class="fa fa-gift fa-2x" aria-hidden="true"></i>   
                                                    </button> 
                                                    <h6><?php echo $row['o_status']; ?></h6>
                                                    <button title="cancel order" name="cancel" onclick="return confirm('Are you sure, you want to cancel the order?')" class="btn btn-danger">
                                                        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>  
                                                    </button> 
                                                    <h6>Cancel</h6>


                                                </form>
                                        </div>
                                          
                                        <?php } else {?>
                                                <form method="POST" action="controller/cancelorder.php">
                                                    <input type="hidden" name="idd" value="<?php echo $row['o_id'];?>" >
                                                    <div>
                                                    <button title="status" type="button" class="btn btn-success text-white">
                                                    <i class="bi bi-check-circle-fill" style="font-size:30px"></i>
                                                     </button>
                                                    <h6> <?php echo $row['o_status']; ?></h6>
                                                    <button title="cancel order" name="cancel" onclick="return confirm('Are you sure, you want to cancel the order?')" class="btn btn-danger">
                                                        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>  
                                                    </button>
                                                    </div> 
                                                    <h6> Cancel</h6>
                                                </form>
                                    </div>
                                       
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                  
                </div>  
                
            </div>
            
        </div>
           <!-- Footer Start -->
           <?php 
        include 'footer.php';
        ?>
        <!-- Footer End --> 
                                        </div> 
    </body>
</html>