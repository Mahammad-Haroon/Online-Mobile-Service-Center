<!doctype html>
<html lang="en">
  <head>
  	<title>Service Provider Registration </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="folder/css/style.css">

	</head>
	<body  style="background-image: url(img/Login.jpg);background-size:cover;color:white;">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Registration Form</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-6"> 
					<div class="login-wrap p-0">
		      	
		      	<form method="post" action="controller/logreg.php" class="reg-form" enctype="multipart/form-data">

		      		<div class="form-group d-flex" style="gap:10px">
                         <label for="s_name" class="mt-3"> Username</label>
                         <input type="text" class="form-control" name="s_name"  required>
		      		</div>

					<div class="form-group d-flex" style="gap:10px">
                         <label for="s_password" class="mt-3" style="width:20%"> Password</label>
	                     <input id="password-field" type="password" class="form-control" name="s_password" required>
	                     <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password mt-4"></span>
	                </div>

                    <div class="form-group d-flex" style="gap:10px">
                         <label for="s_phone" class="mt-3" style="width:18%"> Phone No.</label>
		      		     <input type="tel" class="form-control" name="s_phone" required>
		      		</div>

                    <div class="form-group d-flex" style="gap:10px">
					     <label for="s_email" class="mt-3" style="width:20%" >E-mail</label>
		      			 <input type="email" class="form-control" name="s_email" required>
		      		</div>

					<div class="form-group d-flex flex-column" style="gap:10px">
    					<label for="s_location" class="mt-3" style="width:20%;">Location</label>
    					<textarea class="form-control" name="s_location" required rows="3"></textarea>
					</div>

					<div class="form-group d-flex" style="gap:10px">
                         <label for="s_ownername" class="mt-3"> Owner Name</label>
                         <input type="text" class="form-control" name="s_ownername"  required>
		      		</div>

					  <div class="form-group d-flex" style="gap:10px">
                         <label for="s_businesshour" class="mt-3"> Business Hour</label>
                         <input type="text" class="form-control" name="s_businesshour"  required>
		      		</div>

					<div class="form-group d-flex flex-column" style="gap:10px">
    					<label for="s_desc" class="mt-3" style="width:20%;">Description</label>
    					<textarea class="form-control" name="s_desc" required rows="3"></textarea>
					</div>

                    
                    <div class="form-group d-flex" style="gap:10px">
					     <label for="s_photo"  style="width:20%">Service Center Photo</label>
		      			 <input type="file" class="form-control"  name="s_photo" required>
		      		</div>

	                <div class="form-group">
	            	     <button type="submit" name="submit"  value="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
	                </div>

	            <!-- <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div> -->
	          </form>
	          <!-- <p class="w-100 text-center">&mdash; <a href="register.php">Click here</a> to register &mdash;</p> -->
	          <!-- <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div> -->
		      </div>
				</div>
			</div>
		</div>
	</section>

	 <script src="folder/js/jquery.min.js"></script>
     <script src="folder/js/popper.js"></script>
     <script src="folder/js/bootstrap.min.js"></script>
     <script src="folder/js/main.js"></script>

	 </body>
</html>

