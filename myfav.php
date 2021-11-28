<?php session_start();?>
<html>
<head>
    <link rel="stylesheet" href="properties.css">
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
<div class="text-center my-4">
    <h2 class="font-weight-bold mb-2">My Favourites Properties</h2>
</div>
<div class="container pb-5 pt-2">
    <!-- First Row [Prosucts]-->
    <div class="row pb-5 mb-4">
    <?php
        $server = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "rent_cafe";

        // Create database connection
        $db1 = new mysqli($server, $username, $pass, $dbname);
        $db = new mysqli($server, $username, $pass, $dbname);            
        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $email=$_COOKIE['EMAIL'];
        // Get images from the database
        $query1 = $db1->query("SELECT fpid FROM saved_later WHERE email LIKE '%$email%'");
        $associativeArray=array();
        if($query1->num_rows > 0){
            while($row1 = $query1->fetch_assoc()){
                $associativeArray[$row1['fpid']] = $row1['fpid'];
                // $ppid=$row1["fpid"];
                // die($associativeArray);
            }}
            foreach($associativeArray as $k => $pid){
                // die($ppid);
                $ppid=$pid;
                $query = $db->query("SELECT * FROM properties_details WHERE pid = $ppid");
                // $query = $db->query("SELECT * FROM properties_details WHERE pid LIKE '%ppid%'");     
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){ 
                        $imageURL = 'asset/'.$row["cover_pic"];
        ?>
       
       <div class="col-lg-3 col-md-6 mb-4 mx-auto">
            <!-- Card-->
            <a class="custom-card" href="prop_details.php?id=<?php echo $row["pid"];?>">
            <div class="card rounded shadow border-0">
                <div class="card-header"><img class="header-img" src="<?php echo $imageURL; ?>" alt="" class="img-fluid d-block mx-auto "></div>
                <div class="card-body p-3">
                    <h5><?php echo $row["size"];?></h5>
                    <p class="small text-muted font-italic"><?php echo $row["small_addr"];?>, Mumbai</p>
                    <h5>₹ <?php echo $row["price"];?></h5>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>"/>
                        <a href="contact.php?id=<?php echo $row["pid"];?>" class="cn-bt" >Contact Now</a>
                        <!-- Modal -->
                        <a href="deletefav.php?id=<?php echo $row["pid"];?>" class="btn btn-primary ml-3" style="margin-right: 0.75rem;background-color: #12213F!important;">Delete</a>
                    </form>

                    <!-- <a class="fa fa-heart pull-right" href="#" style="font-size:30px;color:red"></a> -->
                </div>
            </div>
            </a>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Owner Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            
            ?>
            <div class="modal-body">
                <p><strong>Email ID:</strong> <?php echo $pemail; ?></p>
                <hr>
                <p><strong>Phone No.:</strong> <?php echo $pphone; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Contact Owner</button>
            </div>
            </div>
        </div>
        </div>
        </div>
        <?php 
        }}
        else{
        ?>
        <div class="d-flex m-auto justify-content-center"> <h4 class="text-center">No Properties Found ....</h4></div>
        <?php
            }}
         ?>

    </div>
</div>

</body>
</html>