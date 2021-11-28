<?php session_start();?>
<html>
<head>
	<title>Rent Cafe</title>
	<link rel="stylesheet" href="home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital@0;1&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<?php 
		if(isset($_COOKIE['EMAIL']))
		{
			$_SESSION["email"] =  $_COOKIE['EMAIL'];	
		}
	?>
</head>
<body>
	<nav class="navbar sticky-top navbar-expand-md navbar-light bg-light">
  		<img src="asset/Logo.svg">
  		<button class="navbar-toggler" data-toggle="collapse" data-target="#navlinks" aria-label="Togglenavigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
		<div class="collapse navbar-collapse" id="navlinks">
    		<ul class="navbar-nav ml-auto">
      			<li class="nav-item">
        			<a class="nav-link" href="home.php" style="margin-right: 1.2rem; font-weight: bold;">HOME</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="properties.php" style="margin-right: 1.2rem; font-weight: bold;">PROPERTIES</a>
				</li>
				<?php if(isset($_COOKIE['EMAIL'])) : ?>
					<li class="nav-item">
						<a class="nav-link" href="mylist.php" style="margin-right: 1.2rem; font-weight: bold;">MY LISTING</a>
					</li>
					<li class="nav-item">
        			<a class="nav-link" href="myfav.php" style="margin-right: 1.2rem; font-weight: bold;">MY FAVOURITES</a>
					</li>	
					<li class="nav-item">
						<a href="profile.php" class="nav-link" style="margin-right: 1.2rem; font-weight: bold;"><?php echo $_COOKIE['EMAIL'];?></a>
					</li>
					<li class="nav-item">
						<a href="notifications.php" class="nav-link" style="margin-right: 1.2rem; font-weight: bold;"><i class="fas fa-bell"></i></a>
					</li>
					<li class="nav-item">
						<a href="delete.php" class="btn btn-primary" style="background-color: #12213F!important;">LOGOUT</a>
					</li>
				<?php else : ?>
					<li class="nav-item">
						<a href="login.php" class="btn btn-primary" style="margin-right: 0.75rem;background-color: #12213F!important;">LOGIN</a>
					</li>
					<li class="nav-item">
						<a href="form.php" class="btn btn-primary" style="background-color: #12213F!important;">SIGNUP</a>
					</li>
				<?php endif; ?>
    		</ul>
  		</div>
	</nav>
	<div class="content">
		<div class="home_content fliud-container pr-3">
			<div class="row p-0">
				<div class="img_left col-12 col-md-6 p-0">
				</div>
				<div class="content_right col-12 col-md-6 p-0 justify-content-center">
					<div class="intro">
						<h1>Simple, Smarter Home Search</h1>
						<p>
							Everything you need to get your  Home<br>
							Faster & Easier
						</p>
						<?php if(isset($_COOKIE['EMAIL'])) : ?>
							<a href="properties.php" id="hbtn" class="btn btn-primary">All Properties</a>
							<a href="mylist.php" id="hbtn" class="btn btn-primary">My Listings</a>
						<?php else : ?>
							<a href="properties.php" id="hbtn" class="btn btn-primary">See All Properties</a>
						<?php endif; ?>
					</div>
				</div>		
			</div>
		</div>
		<div class="about_us pt-4 px-3 pb-2">
			<h1>About Us</h1>
			<p>
			Rent Cafe is a Mumbai based start-up, started by a group of friends from KJSCE, Mumbai with an aim to make the<br>
			relocation journey stress free without having to spend valuable time searching for flats, furniture and related<br>
			essential relocation services such as packer & movers.<br><br>
			To assist you in your relocation journey, Rent Cafe provides a one-stop solution for all your relocation needs starting<br> 
			from finding a perfect home matching your requirements. We will handpick the right properties for you matching<br>
			your requirements and budget and, guess what, you get to visit your shortlisted properties as per your schedule.<br><br>
			Other services include Find a Flat-mate, Buy or Sell used items, and find cooks/housemaids.<br><br>
			Isn’t it simple?
			</p>
		</div>
		<div class="our_services px-3" style="margin-top: 10%; margin-bottom: 10%; margin-left: 10%; margin-right: 10%;">
			<h1 style="text-align: center;">Our Services</h1>
			<img class="img-fluid" src="asset/LandingOurServices.jpg">
		</div>
		<div class="how_it_works px-3" style="margin-top: 10%; margin-bottom: 10%; margin-left: 10%; margin-right: 10%;">
			<h1 style="text-align: center;">How It Works?</h1>
			<img class="img-fluid" src="asset/LandingHowItWorks.jpg">
		</div>
		<div class="why_rc container" style="margin-top: 10%; margin-bottom: 10%; padding-left: 10%; padding-right: 10%;">
			<h1 style="text-align: center;">Why Rent Cafe</h1>
			<!-- <div class="row">
				<div class="img1 col-12 col-md-4">
					<div class="card mx-auto" style="width: 18rem;border:0px">
						<img class="card-img-top" src="asset/LandingWrc1.svg" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title">Save Money</h4>
						</div>
					</div>
				</div>
				<div class="img2 col-12 col-md-4 ">
					<div class="card mx-auto" style="width: 18rem;border:0px">
						<img class="card-img-top" src="asset/LandingWrc2.svg" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title">Convenience</h4>
						</div>
					</div>
				</div>
				<div class="img3 col-12 col-md-4">
					<div class="card mx-auto" style="width: 18rem;border:0px">
						<img class="card-img-top" src="asset/LandingWrc3.svg" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title">Reliable</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="img4 col-12 col-md-6">
					<div class="card mx-auto" style="width: 18rem;border:0px">
						<img class="card-img-top" src="asset/LandingWrc4.svg" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title">Money-Back Guarantee</h4>
						</div>
					</div>
				</div>
				<div class="img4 col-12 col-md-6">
					<div class="card mx-auto" style="width: 18rem;border:0px">
						<img class="card-img-top" src="asset/LandingWrc5.svg" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title">One-Stop <br>Service</h4>
						</div>
					</div>
				</div>
			</div> -->
			<div class="row">
				<img class="img-fluid m-3 p-3" src="asset/LandingWhyRC.png">
			</div>
		</div>
		<div class="footer fluid-container pt-5 pr-3 pb-3">
			<div class="row p-0 text-center">
				<div class="footer_logo col-12 col-md-4 p-0 text-center">
					<img src="asset/Logo.svg">
					<h5 class="pt-2">Follow Us On</h5>
					<img src="asset/FooterFacebook.jpg" class="px-1 rounded-circle">
					<img src="asset/FooterLinkedIn.jpg" class="px-1 rounded-circle">
					<img src="asset/FooterInstagram.jpg" class="px-1 rounded-circle">
				</div>
				<div class="footer_links col-12 col-md-4 p-0 text-white text-center">
					<h5 class="pt-2">&emsp;&emsp;&emsp;Quick Links:</h5>
					<h6><a class="text-white" href="home.php">Home</a><br></h6>
					<h6><a class="text-white" href="#">&emsp;Services</a><br></h6>
					<h6><a class="text-white" href="#">&emsp;&emsp;&emsp;Registration</a><br></h6>
				</div>
				<div class="footer_contact col-12 col-md-4 p-0 text-white text-center">
					<h5 class="pt-2">Contact Us:&emsp;&emsp;&emsp;&emsp;&emsp;</h5>
					<p><i class="fas fa-phone-alt"></i> 0223006002, 0223006003<br>
					<i class="far fa-envelope"></i> contactus@rentcafe.com<br>
					KJSCE, Vidyavihar, Mumbai, <br>
					Maharashtra - 400077, India</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>