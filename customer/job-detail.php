<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['s_id']))
{
    header('Location:index.php');
}
$sid=$_SESSION['s_id'];

$jid=$_GET['j_id'];

$stmt=$admin->ret("SELECT * FROM `job` where `j_id`='$jid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$cid=$row['c_id'];
$stmt2=$admin->ret("SELECT * FROM `client` where `c_id`='$cid'");
$row2=$stmt2->fetch(PDO::FETCH_ASSOC);

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
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border gig" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php 
        include 'navbar.php';
        ?>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="job-list.php">Job List</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="../client/controller/<?php echo $row['j_image']; ?>" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3"><?php echo $row['j_title']; ?></h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt gig me-2"></i><?php echo $row['j_location']; ?></span>
                                <span class="text-truncate me-3"><i class="far fa-clock gig me-2"></i><?php echo $row['j_unit'],$row['j_duration']; ?></span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt gig me-2"></i><?php echo $row['j_wage']; ?>/-</span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p><?php echo $row['j_desc']; ?></p>
                            <!-- <h4 class="mb-3">Responsibility</h4>
                            <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right gig me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                                <li><i class="fa fa-angle-right gig me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                                <li><i class="fa fa-angle-right gig me-2"></i>Rebum vero dolores dolores elitr</li>
                                <li><i class="fa fa-angle-right gig me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                                <li><i class="fa fa-angle-right gig me-2"></i>Diam diam stet erat no est est</li>
                            </ul> -->
                            
                        </div>
        
                        <div class="">
                            <!-- <h4 class="mb-4">Apply For The Job</h4> -->
                            <form method="post" action="controller/apply-job.php">
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <!-- <input type="text" class="form-control" placeholder="Your Name"> -->
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <!-- <input type="email" class="form-control" placeholder="Your Email"> -->
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <!-- <input type="text" class="form-control" placeholder="Portfolio Website"> -->
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <!-- <input type="file" class="form-control bg-white"> -->
                                    </div>
                                    <div class="col-12">
                                        <!-- <textarea class="form-control" rows="5" placeholder="Coverletter"></textarea> -->
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" name="jid" id=""  value="<?php echo $jid; ?>">
                                        <input type="hidden" name="sid" id=""  value="<?php echo $sid; ?>">
                                        <button class="btn btn-primary w-25" name="apply"  type="submit" onclick="return confirm('Are you sure you want to apply for the job?')">Apply Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summary</h4>
                            <p><i class="fa fa-angle-right gig me-2"></i>Published On: <?php echo $row['j_posteddate']; ?> </p>
                            <p><i class="fa fa-angle-right gig me-2"></i>Duration: <?php echo $row['j_unit']," ",$row['j_duration'],"s"; ?></p>
                            <p><i class="fa fa-angle-right gig me-2"></i>Wage:<?php echo "Rs ",$row['j_wage'],"/-"; ?></p>
                            <p><i class="fa fa-angle-right gig me-2"></i>Location: <?php echo $row['j_location']; ?></p>
                            <!-- <p class="m-0"><i class="fa fa-angle-right gig me-2"></i>Date Line: 01 Jan, 2045</p> -->
                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Client Detail</h4>
                            <!-- <p class="m-0">Ipsum dolor ipsum accusam stet et et diam dolores, sed rebum sadipscing elitr vero dolores. Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata aliquyam et rebum est ipsum lorem diam. Et lorem magna eirmod est et et sanctus et, kasd clita labore.</p> -->
                            <p><i class="fa fa-angle-right gig me-2"></i>Client Name: <?php echo $row2['c_name']; ?> </p>
                            <p><i class="fa fa-angle-right gig me-2"></i>Email: <?php echo $row2['c_email']; ?> </p>
                            <p><i class="fa fa-angle-right gig me-2"></i>Address: <?php echo $row2['c_address'],' ',$row2['c_city']; ?> </p>
                            <p><i class="fa fa-angle-right gig me-2"></i>Phone No.: <?php echo $row2['c_phone']; ?> </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->


        <!-- Footer Start -->
        <?php 
        include 'footer.php';
        ?>
        <!-- Footer End -->


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
</body>

</html>