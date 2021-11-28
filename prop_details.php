<html>
<head>
    <link rel="stylesheet" href="prop_details.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
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
        			<a class="nav-link" href="solution.html" style="margin-right: 1.2rem; font-weight: bold;">HOW IT WORKS</a>
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

    <?php
        $pid=$_GET["id"];
        $server = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "rent_cafe";

        // Create database connection
        $db = new mysqli($server, $username, $pass, $dbname);

        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $query = $db->query("SELECT * FROM properties_details WHERE pid = $pid");
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                $imageURL1 = 'asset/'.$row["cover_pic"];
                $imageURL2 = 'asset/'.$row["pic1"];
                $imageURL3 = 'asset/'.$row["pic2"];
                $imageURL4 = 'asset/'.$row["pic3"];
    
    ?>
    
    <div class="container">
        <div class="top-details row mt-2 mb-4 d-flex">
            <div class="col-sm-9">
                <h4><?php echo $row["size"];?></h4>
                <p><?php echo $row["sqft"];?> sq.ft</p>
                <p><?php echo $row["address"];?>
            </div>
            <div class="text-right col-sm-3 mt-2 ">
                <h4 class="font-weight-bold mb-4">₹ <?php echo $row["price"];?></h4>
                <?php if(isset($_COOKIE["EMAIL"])) : ?>
                <a href="contact.php?id=<?php echo $row["pid"];?>" class="cn-bt" >Contact Owner</a>
                <?php else: ?>
                <p> To Contact Owner
                <a href="login.php">Login </a> /
                <a href="signup.php">SignUp </a>
                
                <?php endif; ?>
            </div>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block img-fluid w-100" src="<?php echo $imageURL1; ?>" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block img-fluid w-100" src="<?php echo $imageURL2; ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block img-fluid w-100" src="<?php echo $imageURL3; ?>" alt="Third slide">
            </div>
            <div class="carousel-item">
            <img class="d-block img-fluid w-100" src="<?php echo $imageURL4; ?>" alt="Fourth slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>

        <div class="desc mt-4">
            <h4>Description</h4>
            <hr>
            <p><?php echo $row["descr"];?>
            </p>
            <hr>
            <div class="row mt-3 mb-4">
                <div class="col-md-6">
                    <p><strong>Rental Value:</strong> ₹ <?php echo $row["price"];?></p>
                    <hr>
                    <p><strong>Near Public Transport:</strong> <?php echo $row["public_trans"];?></p>
                    <hr>
                    <p><strong>Rectify Problem:</strong> <?php echo $row["rec_prob"];?></p>
                    <hr>
                </div>
                <div class="col-md-6 border-left border-secondary ">
                    <p><strong>Ammentities:</strong> <?php echo $row["amenities"];?></p>
                    <hr>
                    <p><strong>Furnished:</strong> <?php echo $row["furnished"];?></p>
                    <hr>
                    <p><strong>Lift Available:</strong> <?php echo $row["lift"];?></p>
                    <hr>
                </div>
            </div>

        </div>
    </div>
    <?php }
        }else{ ?>
           <div class="d-flex m-auto justify-content-center"> <h4 class="text-center"> Properties Details Not Found ....</h4></div>
        <?php } ?>
</body>
</html>