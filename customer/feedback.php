<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['s_id']))
{
    header('Location:index.php');
}
$sid=$_SESSION['s_id'];
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Feedback</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="product-list.php">Product List</a></li> -->
                        <li class="breadcrumb-item text-white active" aria-current="page">Feedback</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Order Detail Start -->
        <div class="container-xxl py-5">
          <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Feedback</h1>
              <div class="card card-body" style="display:flex;flex-direction: row;flex-wrap: wrap;gap:20px;justify-content: center;">
                <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="job-item p-4 mb-4">
                                <table class="table btn btn-primary">
                                    <thead>
                                        <tr >
                                        <th>Sl</th>
                                        <th>Date</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Job Title</th>
                                        <th>Job Date</th>
                                        <th>Feedback</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $s=1;
                                        $stmt=$admin->ret("SELECT * FROM `feedback` inner join `client`on client.c_id=feedback.c_id  inner join `student_apply_jobs` on student_apply_jobs.saj_id=feedback.saj_id inner join `job` on job.j_id=student_apply_jobs.j_id inner join `student`on student.s_id=student_apply_jobs.s_id where student_apply_jobs.s_id='$sid' ");
                                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                    <tr>
                                        <td><?php echo $s++; ?></td>
                                        <td><?php echo $row['f_date'];?></td>
                                        <td><?php echo $row['f_id'];?></td>
                                        <td>
                                          <img width="30" height="30" style="border-radius:100%;" src="../client/controller/<?php echo $row['c_profilepic'];?>">&nbsp;&nbsp;<?php echo $row['c_name'];?> 
                                        </td>
                                        <td><?php echo $row['j_title'];?></td>
                                        <td><?php echo $row['saj_date'];?></td>
                                        <td><?php echo $row['f_message'];?></td>
                                    </tr> 
                                    <?php }?>
                                    </tbody>
                                </table>
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