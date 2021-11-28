
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="profile.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital@0;1&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<?php 
		if(isset($_COOKIE['EMAIL']))
		{
			$email =  $_COOKIE['EMAIL'];	
		}
		  $server = "localhost";
          $username = "root";
          $passwrd = "";
          $dbname = "rent_cafe";
		  $conn = mysqli_connect($server, $username, $passwrd, $dbname);
		  $query = "SELECT fname,lname,gender,dob,phone,city from client_details where email='$email'";
		  $result = mysqli_query($conn,$query);
		  $count = mysqli_num_rows($result);
		  $row = mysqli_fetch_assoc($result);
          $fname=$row['fname'];
		  $lname=$row['lname'];
		  $gender=$row['gender'];
		  $dob=$row['dob'];
		  $phone=$row['phone'];
		  $city=$row['city'];
          
	?>
</head>
<body>
	<!-- Navbar -->
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
	<div id="fullcontainer" class="container bg-white justify-content-around">
        <div class="row">
            <div class="form_left col-12 col-md-6">
                <img src="logoImage.svg" width="auto" height="470px" class="d-none d-md-block px-3">
            </div>
            <div class="form_right col-12 col-md-6">
                <h2>PROFILE DETAILS</h2>
                <div class="data">
	            
	                <label for="fn">&emsp;&emsp;Name&emsp; </label>
	                <span><?php echo $fname." ".$lname;?></span>
	       
                    <br>
                    
                    <label for="gender">&emsp;&emsp;Gender</label>&emsp;
                    <span><?php echo $gender;?></span>
                   
                    <br>
                    <label for="dob">Date of Birth</label>
                    <span><?php echo $dob;?></span>

                    <br>
                    <label for="pn">&emsp;&emsp;Phone&emsp;</label>
                    <span><?php echo $phone;?></span>

                    <br>
                    <label for="ct">&emsp;&emsp;&emsp;City&emsp;</label>
                    <span><?php echo $city;?></span>

                    <br>
                    <div class="subm">
                        <a href="form.php" class="btn btn-primary cl" id="edit" name="edit">Edit</a>
                    </div>
                </div> 
            </div>
            
        </div>
    </div>

	
</body>
</html>