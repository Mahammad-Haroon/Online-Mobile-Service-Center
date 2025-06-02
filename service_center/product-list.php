<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['c_id']))
{
    header('Location:index.php');
}
$cid=$_SESSION['c_id'];
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
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php 
        include 'navbar.php';
        ?>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Product List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                        <li class="breadcrumb-item text-white active" aria-current="page">Product List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- products Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Product Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                   
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active" style="display:flex;flex-direction:row;flex-wrap:wrap;gap:20px;justify-content:center">
                            <?php
                            $stmt=$admin->ret("SELECT * FROM `product` ");
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <!-- <div class="product-item p-4 mb-4"> -->
                                
                            

                           <a href="product-detail.php?pr_id=<?php echo $row['pr_id']; ?>"> <div class="card" style="width: 18rem;">
                               <img src="../student/controller/<?php echo $row['pr_image']; ?>" style="width:250px;height:250px;" class="card-img-top" alt="...">
                             
                               <div class="card-body">
                                 <p class="card-text"><?php echo $row['pr_name']; ?><br><?php echo 'Rs ', $row['pr_amt'],'/-'; ?></p>
                                <div class="d-flex justify-content-center">
                                  <!-- <a class="btn btn-light btn-square me-3 bg-primary" href="update-product.php?pr_id=<?php echo $row['pr_id']; ?>"><i class="bi bi-pencil-square text-light"></i></a>
                                  <a class="btn btn-light btn-square me-3 bg-danger" href="controller/delete-product.php?pr_id=<?php echo $row['pr_id']; ?>" onclick="return confirm('Are you sure you want to delete this product?')"><i class="bi bi-trash text-light"></i></a> -->
                                </div>
                                <!-- <a class="btn btn-light btn-square me-3 bg-success" href="orders.php?pr_id=<?php echo $row['pr_id']; ?>"><i class="bi bi-eye text-light"></i></a> -->
                               </div>
                             </div>
                             </a>
                            <?php } ?>

                        </div>
                        <!-- <a class="btn btn-primary py-3 px-5" href="">Browse More products</a> -->

                    </div>
                </div>
            </div>
        </div>
        <!-- products End -->


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