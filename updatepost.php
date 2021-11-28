<?php 
$id=$_GET['id'];
// die($id);
session_start();
// $_SESSION["pid"]=$id;

?>
<html>
<head>
    <link rel="stylesheet" href="addnew.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<!-- <div > -->
	<form class="row container_form" id="addpost" action="updateprocess.php" enctype="multipart/form-data" method="POST">
	<input type="hidden" name="id" value = <?=$id?>>
            <div class="form_left col-sm-0 col-md-6 col-6">    
			<h2 class="mt-3" >Rent your Property</h4>
			<div class="mt-4">
				<label for="size">&emsp;Size: </label>
				<input type="text" name="size" id="size" placeholder=" Appartment Size" autofocus autocomplete="OFF">
			</div>
			<div class="mt-3">
				<label for="area">&emsp;Area: </label>
				<input type="number" name="area" id="area" placeholder=" Covered Area sq.ft." autocomplete="OFF">
			</div>
			<div class="mt-3">
				<label for="price">&emsp;Price: </label>
				<input type="number" name="price" id="price" placeholder=" Enter Monthly Rent"  autocomplete="OFF">
			</div>
			<div class="mt-3">
				<label for="location">&emsp;Location: </label>
				<input type="text" name="location" id="location" placeholder=" Location"  autocomplete="OFF">
			</div>
			<div class="mt-3">
				<label for="address">&emsp;Address: </label>
				<input type="text" name="address" id="address" placeholder=" Address" autocomplete="OFF">
			</div>
			<div class="mt-3">
				<label for="description">&emsp;Description: </label>
				<textarea  name="description" id="description" form="addpost">	</textarea>
			</div>
			<div class="mt-3">
			<label for="trans" id="l1">Nearest to public transport?</label>
			<label class="rad">
			<input type="radio" name="trans" value="yes">&emsp;<span class="checkmark"></span>						</label><span class="rad_label">Yes</span>
			<label class="rad">
			<input type="radio" name="trans" value="no">&emsp;<span class="checkmark"></span>						</label><span class="rad_label">No</span>
			</div>
            </div>
            <div class="form_right mt-5 pt-5 col-sm-12 col-md-6 col-6 ">
				
				<div class="mt-3">
				<label for="problem" id="l1">Rectifying Problems?</label>
				<label class="rad">
				<input type="radio" name="problem" value="owner">&emsp;<span class="checkmark"></span>
				</label><span class="rad_label">Owner</span>
				<label class="rad">
				<input type="radio" name="problem" value="you">&emsp;<span class="checkmark"></span>
				</label><span class="rad_label">You</span>
				</div>
				<div class="mt-3">
				<label for="ammenty" id="l1">What ammentites you want?</label>
				<label class="checkbox-inline">
				<input type="checkbox" id="customCheck" value="wifi" name="ammentites1">&emsp;
				</label><span class="rad_label">WIFI</span><label class="checkbox-inline">
				<input type="checkbox" id="customCheck" value="ac" name="ammentites2">&emsp;
				</label><span class="rad_label">AC</span>
				<label class="checkbox-inline">
				<input type="checkbox" id="customCheck" value="tv" name="ammentites3">&emsp;
				</label><span class="rad_label">TV</span>
				</div>
				<div class="mt-3">
				<label for="lift" id="l1">Lift:</label>&emsp;
				<label class="rad">
				<input type="radio" name="lift" value="yes">&emsp;<span class="checkmark"></span>
				</label><span class="rad_label">Yes</span>
				<label class="rad">
				<input type="radio" name="lift" value="no">&emsp;<span class="checkmark"></span>
			</label><span class="rad_label">No</span>
				</div>
				<div class="mt-3">
				<label for="furniture" id="l1">Furnished:</label>
				<label class="rad">
				<input type="radio" name="furniture" value="yes">&emsp;<span class="checkmark"></span>
				</label><span class="rad_label">Yes</span>
				<label class="rad">
				<input type="radio" name="furniture" value="no">&emsp;<span class="checkmark"></span>
			</label><span class="rad_label">No</span>
				</div>
				<div class="mt-3">
					Select Cover Image to Upload:
					<input type="file" name="file1">
					<!-- <input type="submit" name="img1" value="Upload"> -->
				<!-- </form> -->
				</div>
				<div class="mt-3">
					Select Image 1 to Upload:
					<input type="file" name="file2">
					<!-- <input type="submit" name="img2" value="Upload"> -->
				<!-- </form> -->
				</div>
				<div class="mt-3">
					Select Image 2 to Upload:
					<input type="file" name="file3">
					<!-- <input type="submit" name="img3" value="Upload"> -->
				<!-- </form> -->
				</div>
				<div class="mt-3">
					Select Image 3 to Upload:
					<input type="file" name="file4">
					<!-- <input type="submit" name="img4" value="Upload"> -->
				<!-- </form> -->
				</div>
				
				      <div class="subm">
                        &emsp;&emsp;&emsp;&emsp;
                        <input type="submit" class="btn btn-primary cl" id="submit" name="submit" value="Submit">
                    </div>
			</div>
			</form> 
        <!-- </div>  -->

	</body>
</html>