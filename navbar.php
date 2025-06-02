<style>
.gig {
  /* font-size: 72px; */
  background: -webkit-linear-gradient(#00B074,#2B9BFF);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
:root {
    --primary:#00bfff;
    --secondary:#5cdb95 ;
    --light: #EFFDF5;
    --dark: #2B3940;
}

.btn.btn-primary,
.btn.btn-secondary {
    color: #FFFFFF;
    background: -webkit-linear-gradient(#00B074,#2B9BFF);
} 

</style>

<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <!-- <a href="" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5"> -->
            <img src="img/GS1.jpg" alt="GS" class="user-img" width="75">    
            <h1 class="gig">SmartRepair</h1>
            <!-- </a> -->
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>

                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.php" class="dropdown-item">Job List</a>
                            <a href="job-detail.php" class="dropdown-item">Job Detail</a>
                        </div>
                    </div> -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Login</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="customer/index.php" class="dropdown-item">Customer</a>
                            <a href="service_center/index.php" class="dropdown-item">Service Center</a>
                        </div>
                    </div>
                </div>
                <!-- <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a> -->
            </div>
        </nav>