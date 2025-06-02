<?php
include '../config.php';
$admin=new Admin();

if(!isset($_SESSION['a_id']))
{
    header('Location:index.php');
}
$aid=$_SESSION['a_id'];
$stmt=$admin->ret("SELECT * FROM `admin` WHERE `a_id`='$aid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

?>


<!doctype html>
<html lang="en">
	
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images//GS1.jpg" type="image/png"/>
	<!-- <img src="assets/images/GS1.jpg" class="logo-icon" alt="logo icon"> -->
	<!--plugins-->
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
	<link href="assets/css/icons.css" rel="stylesheet"/>
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet"/>
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/images/GS1.jpg" rel="stylesheet">
	<!-- <img src="assets/images/GS1.jpg" class="logo-icon" alt="logo icon"> -->
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css"/>
	<link rel="stylesheet" href="assets/css/semi-dark.css"/>
	<link rel="stylesheet" href="assets/css/header-colors.css"/>
	<title>SmartRepair | Admin</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<?php 
		include 'includes/sidebar.php';
		?>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
			<?php 
		        include 'includes/header.php';
		      ?>	
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   <div class="col">
					 <div class="card radius-10 border-start border-0 border-4 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
								<?php  
                      $stmts = $admin -> ret("SELECT COUNT(*) FROM `client_order`");
                      $rows2 = $stmts -> fetch(PDO::FETCH_ASSOC);
                      $order2 = implode($rows2);

                      $stmts2 = $admin -> ret("SELECT COUNT(*) FROM `client_order` where `o_date`=CURDATE()");
                      $rows3 = $stmts2 -> fetch(PDO::FETCH_ASSOC);
                      $order3 = implode($rows3);

                      
                      
                      ?>
								   <p class="mb-0 text-secondary">Total Orders</p>
								   <span><h4 class="my-1 text-danger"><?php echo $order2,' Orders'; ?></h4></span>
								   <span class="text-success ml-2 mb-0 font-weight-medium" style="font-size:12px;">+<?php echo $order3; ?> Order</span>
								
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-cart'></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-danger">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
							   <?php  
                      $stmts = $admin -> ret("SELECT SUM(`p_totalamt`) FROM `payment`");
                      $rowssss = $stmts -> fetch(PDO::FETCH_ASSOC);
                      $orderssss = implode($rowssss);
                      $stm = $admin -> ret("SELECT SUM(`p_adminamt`) FROM `payment`");
                      $row = $stm-> fetch(PDO::FETCH_ASSOC);
                      $order = implode($row);
                      
                      ?>
								   <p class="mb-0 text-secondary">Total Revenue</p>
								   <h4 class="my-1 text-danger"><?php echo $orderssss; ?>
								   <span class="text-success ml-2 mb-0 font-weight-medium" style="font-size:12px;">+<?php echo $order; ?> Income</span>
								</h4>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-wallet'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <!-- <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-success">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Bounce Rate</p>
								   <h4 class="my-1 text-success">34.6%</h4>
								   <p class="mb-0 font-13">-4.5% from last week</p>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> -->
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-warning">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
							   <?php  
                      $stmts = $admin -> ret("SELECT COUNT(*) FROM `student`");
                      $rowss = $stmts -> fetch(PDO::FETCH_ASSOC);
                      $students = implode($rowss);
                      
                      ?>
									<p class="mb-0 text-secondary">Total Students</p>
									<h4 class="my-1 text-info"><?php echo $students,' Student'; ?></h4>
									<!-- <p class="mb-0 font-13">+2.5% from last week</p> -->
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-warning">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
							   <?php  
                      $stmts = $admin -> ret("SELECT COUNT(*) FROM `client`");
                      $rowss = $stmts -> fetch(PDO::FETCH_ASSOC);
                      $clients = implode($rowss);
                      
                      ?>
									<p class="mb-0 text-secondary">Total Clients</p>
									<h4 class="my-1 text-info"><?php echo $clients,' Clients'; ?></h4>
									<!-- <p class="mb-0 font-13">+2.5% from last week</p> -->
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
				</div><!--end row-->

				

				 <div class="card radius-10">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">Recent Orders</h6>
							</div>
							<div class="dropdown ms-auto">
								<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="javascript:;">Action</a>
									</li>
									<li><a class="dropdown-item" href="javascript:;">Another action</a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="javascript:;">Something else here</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
                         <div class="card-body">
						 <div class="table-responsive">
						   <table class="table align-middle mb-0">
							<thead class="table-light">
							 <tr>
							 <th> SL No</th>
                            <th> Order ID </th>
                            <th> Order Date </th>
                            <th> Client Name </th>
                            <th> Contact Number </th>
                            <th> Address </th>
                            <th> Status </th>
							 </tr>
							 </thead>
							  <?php
                          $i=1;
                          $stmtt=$admin->ret("SELECT * FROM `client_order` inner join `client` on client.c_id=client_order.c_id order by `o_date` DESC LIMIT 5");
                          while($row=$stmtt->fetch(PDO::FETCH_ASSOC)){

                          ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['o_id']; ?></td>
                            <td><?php echo $row['o_date']; ?></td>
                            <td>
                              <img src="../client/controller/<?php echo $row['c_profilepic']; ?>" style="height:30px;width:30px;border-radius:50%;" alt="image" />
                              <span class="pl-2"><?php echo $row['c_name']; ?> </span>
                            </td>
                            <td> <?php echo $row['c_phone']; ?> </td>
                            <td> <?php echo $row['c_address']; ?>, <?php echo $row['c_city']; ?> </td>

                            <?php if ($row['o_status']=="placed") { ?>
                              <td>
                              Placed
                            </td>
                            <?php } else if($row['o_status']=="packed"){?>
                            <td>
                              Packed
                            </td>
                            <?php } else if($row['o_status']=="shipped"){?>
                              <td>
                              Shipped
                            </td>
                          <?php } else if($row['o_status']=="delivered"){?>
                              <td>
                              Delivered
                            </td>
                          <?php } else if($row['o_status']=="canceled"){?>
                              <td>
                              Cancelled
                            </td>
                            <?php } ?>
                          </tr>
                        <?php } ?>
						    </tbody>
						  </table>
						  </div>
						 </div>
					</div>


					<div class="row">
						<div class="col-12 col-lg-7 col-xl-12 d-flex" style="gap:30px">
						  <div class="card radius-10 w-100">
							<div class="card-header bg-transparent">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Recent jobs</h6>
									</div>
								</div>
							</div>
 
							 <div class="card-body">
								<div class="row">
								<div class="row  col-lg-12">
					<div class="col">
					<?php
								$stmt2=$admin->ret("SELECT * FROM `job`  inner join `client` on client.c_id=job.c_id order by `j_posteddate` DESC LIMIT 5" );
                            while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
                            ?>
						<div class="card col-lg-12">
							<div class="row g-0">
								<div class="col-md-4 d-flex justify-content-center align-items-center" style="width:100px;height:100px;">
									<img src="../client/controller/<?php echo $row2['j_image']?>" style="width:50px;height:50px;" alt="..." class="card-img">
								</div>
								
								<div class="col-md-8">
									<div class="card-body">
										<h6 class="card-title"><?php echo $row2['j_title']?></h6>
										<p class="card-text">Posted by <?php echo $row2['c_name']?>.</p>
										<p class="card-text"><small class="text-muted">Posted on <?php echo $row2['j_posteddate']?></small>
										</p>
									</div>
								</div>
								
							</div>
						</div>
						<?php } ?>
					</div>
					
				</div>
				
								</div>
							 </div>
						   </div>
						  <div class="card radius-10 w-100">
							<div class="card-header bg-transparent">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Recent Product</h6>
									</div>
								</div>
							</div>

							 <div class="card-body">
								<div class="row">
								<div class="row  col-lg-12">
					<div class="col">
					<?php
								$stmt2=$admin->ret("SELECT * FROM `product`  inner join `student` on student.s_id=product.s_id order by `pr_posteddate` DESC LIMIT 5" );
                            while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
                            ?>
						<div class="card col-lg-12">
							<div class="row g-0">
								<div class="col-md-4 d-flex justify-content-center align-items-center" style="width:100px;height:100px;">
									<img src="../student/controller/<?php echo $row2['pr_image']?>" style="width:50px;height:50px;" alt="..." class="card-img">
								</div>
								
								<div class="col-md-8">
									<div class="card-body">
										<h6 class="card-title"><?php echo $row2['pr_name']?></h6>
										<p class="card-text">Posted by <?php echo $row2['s_name']?>.</p>
										<p class="card-text"><small class="text-muted">Posted on <?php echo $row2['pr_posteddate']?></small>
										</p>
									</div>
								</div>
								
							</div>
						</div>
						<?php } ?>
					</div>
					
				</div>
				
								</div>
							 </div>
						   </div>
						</div>
			   
						

					 <!-- <div class="row row-cols-1 row-cols-lg-3">
						 <div class="col d-flex">
                           <div class="card radius-10 w-100">
							   <div class="card-body">
								<p class="font-weight-bold mb-1 text-secondary">Weekly Revenue</p>
								<div class="d-flex align-items-center mb-4">
									<div>
										<h4 class="mb-0">$89,540</h4>
									</div>
									<div class="">
										<p class="mb-0 align-self-center font-weight-bold text-success ms-2">4.4% <i class="bx bxs-up-arrow-alt mr-2"></i>
										</p>
									</div>
								</div>
								<div class="chart-container-0 mt-5">
									<canvas id="chart3"></canvas>
								  </div>
							   </div>
						   </div>
						 </div>
						 <div class="col d-flex">
							<div class="card radius-10 w-100">
								<div class="card-header bg-transparent">
									<div class="d-flex align-items-center">
										<div>
											<h6 class="mb-0">Orders Summary</h6>
										</div>
										<div class="dropdown ms-auto">
											<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="javascript:;">Action</a>
												</li>
												<li><a class="dropdown-item" href="javascript:;">Another action</a>
												</li>
												<li>
													<hr class="dropdown-divider">
												</li>
												<li><a class="dropdown-item" href="javascript:;">Something else here</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container-1 mt-3">
										<canvas id="chart4"></canvas>
									  </div>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">Completed <span class="badge bg-gradient-quepal rounded-pill">25</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Pending <span class="badge bg-gradient-ibiza rounded-pill">10</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Process <span class="badge bg-gradient-deepblue rounded-pill">65</span>
									</li>
								</ul>
							</div>
						  </div>
						  <div class="col d-flex">
							<div class="card radius-10 w-100">
								 <div class="card-header bg-transparent">
									<div class="d-flex align-items-center">
										<div>
											<h6 class="mb-0">Top Selling Categories</h6>
										</div>
										<div class="dropdown ms-auto">
											<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="javascript:;">Action</a>
												</li>
												<li><a class="dropdown-item" href="javascript:;">Another action</a>
												</li>
												<li>
													<hr class="dropdown-divider">
												</li>
												<li><a class="dropdown-item" href="javascript:;">Something else here</a>
												</li>
											</ul>
										</div>
									 </div>
								 </div>
								<div class="card-body">
								   <div class="chart-container-0">
									 <canvas id="chart5"></canvas>
								   </div>
								</div>
								<div class="row row-group border-top g-0">
									<div class="col">
										<div class="p-3 text-center">
											<h4 class="mb-0 text-danger">$45,216</h4>
											<p class="mb-0">Clothing</p>
										</div>
									</div>
									<div class="col">
										<div class="p-3 text-center">
											<h4 class="mb-0 text-success">$68,154</h4>
											<p class="mb-0">Electronic</p>
										</div>
									 </div>
								</div>end row -->
							</div>
						  </div>
					 </div>end row

			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">oyright © 2022. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->


	<!-- search modal -->
    <div class="modal" id="SearchModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
		  <div class="modal-content">
			<div class="modal-header gap-2">
			  <div class="position-relative popup-search w-100">
				<input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
				<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i class='bx bx-search'></i></span>
			  </div>
			  <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="search-list">
				   <p class="mb-1">Html Templates</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Web Designe Company</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-dropbox fs-4' ></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Software Development</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Online Shoping Portals</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
				   </div>
				</div>
			</div>
		  </div>
		</div>
	  </div>
    <!-- end search modal -->




	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/chartjs/js/chart.js"></script>
	<script src="assets/js/index.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>
		new PerfectScrollbar(".app-container")
	</script>
</body>

</html>