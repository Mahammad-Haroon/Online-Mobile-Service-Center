<style>
.gig {
  /* font-size: 72px; */
  background: -webkit-linear-gradient(#00B074,#2B9BFF);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
:root {
    --primary:#00bfff;
    --secondary: #5cdb95;
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
            <!-- <a href="index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5"> -->
            <img src="img/GS1.jpg" alt="GS" class="user-img" width="75">    
            <h1 class="gig">SmartRepair</h1>
            <!-- </a> -->
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="homepage.php" class="nav-item nav-link ">Home</a>
                    <a href="orders.php" class="nav-item nav-link ">Orders</a>
                    <a href="requests.php" class="nav-item nav-link ">Requests</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <!-- <a href="profile.php" class="nav-item nav-link ">Profile</a> -->


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">More</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <!-- <a href="orders.php" class="dropdown-item">Repair Orders</a>
                            <a href="job-list.php" class="dropdown-item">Repair Requests</a> -->
                            <a href="profile.php" class="dropdown-item">Profile</a>
                            <a href="controller/logout.php" onclick="return confirm('Are you sure you want to logout?')" class="dropdown-item">Logout</a>
                        </div>
                    </div> 
                    <!-- <a href="index.php" class="nav-item nav-link">Log Out</a> -->
                </div>
                <!-- <a href="job.php" class="btn btn-primary     rounded-0 py-4 px-lg-5 d-none d-lg-block" class="gig">Post A Job<i class="fa fa-arrow-right ms-3"></i></a> -->
            </div>
        </nav>