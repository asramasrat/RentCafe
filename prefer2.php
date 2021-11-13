
<!DOCTYPE html>
<html>
<head>
	<title>Preference Form</title>
	<link rel="stylesheet" href="prefer.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&family=Roboto:ital,wght@0,300;0,400;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php
	$trans = $problem = $aminities = $lift = $furniture = "";
	$Err="";
	if ($_SERVER["REQUEST_METHOD"] == "POST")
        { 
        	if(empty($_POST["trans"])){
                $Err="All fields are required<br>";
            }
            else
            {
                $trans=$_POST['trans'];
            }
            if(empty($_POST["problem"])){
                $Err="All fields are required<br>";
            }
            else
            {
                $problem=$_POST['problem'];
            }
            if(isset($_POST['ammentites1'])){
                $aminities .= $_POST['ammentites1'];
                
            }
            
            if(isset($_POST['ammentites2'])){
            	$aminities .= ",";
                $aminities .= $_POST['ammentites2'];
                
            }
            
            if(isset($_POST['ammentites3'])){
            	$aminities .= ",";
                $aminities .= $_POST['ammentites3'];


            }
            
            if(empty($_POST["lift"])){
                $Err="All fields are required<br>";
            }
            else
            {
                $list=$_POST['lift'];
            }
            if(empty($_POST["furniture"])){
                $Err="All fields are required<br>";
            }
            else
            {
                $furniture=$_POST['furniture'];
            }
            
            if($Err == "" && isset($_POST['next']))
        {  
        	$transval = $_POST['trans'];
        	$problemval = $_POST['problem'];
        	$liftval = $_POST['lift'];
        	$furnitureval = $_POST['furniture'];
        	$email = $_COOKIE['EMAIL'];
        	$server = "localhost";
            $username = "root";
            $pass = "";
            $dbname = "rent_cafe";
            $conn = mysqli_connect($server, $username, $pass, $dbname);
            $query="insert into apartpref(email,transport,problem,aminities,lift,furniture) values(?,?,?,?,?,?)";
                $pst=mysqli_prepare($conn,$query);
                mysqli_stmt_bind_param($pst,"ssssss",$email,$transval,$problemval,$aminities,$liftval,$furnitureval);
                mysqli_stmt_execute($pst);

            

            header("Location: prefer3.php");
        }
    }
    if(isset($_POST['back']))
        {
            header("Location: prefer1.php");
        }


            


	?>
	<div id="fullcontainer" class="container bg-white justify-content-around">
        <div class="row">
        	<div class="form_left col-12 col-md-6">
				<img src="asset/Logo.svg" width="auto" height="auto" class="d-none d-md-block px-3" style="margin-top: 10%; margin-left: 5%;">
            </div>
		</div>

		<div class="row">
			<div class="col-5">
				<h4>Preference Form</h4>
				<h6 style="margin-left: 8%;">Hello <?php echo  $_COOKIE['EMAIL']; ?></h6>
				<ul class="pre_list">
					<li class="d1 listtick">
						<label class="l1">User’s Personality</label>
					</li>
					<li class = "vertical" style="border-color:#4F66D0;"></li>
					<li class="d2 listtick">
						<label class="l1">Perference with Apartment</label>
					</li>
					<li class = "vertical"></li>
					<li class="d3">
						<label class="l1">Perference with Roomate</label>
					</li>
				</ul>
				<img src="asset/p2.svg" width="auto" height="auto" class="d-none d-md-block px-3">
			</div>
			<div class="col-7">
	            <div class="card text-center" id="formbg">
					<h3 style="margin-top: 10%; margin-bottom: 5%;">User Preference with apartment</h3>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
						<table id="table1"; cellspacing="5px" cellpadding="5%";>
							<tr>
								<td><label for="trans" id="l1">Nearest to public transport?</label></td>
								<td class="op"><label class="rad">
									<input type="radio" name="trans" value="yes">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Yes</span></td>
								<td class="op"><label class="rad">
									<input type="radio" name="trans" value="no">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">No</span></td>
							</tr>

							<tr>
								<td><label for="problem" id="l1">Rectifying Problems?</label></td>
								<td class="op"><label class="rad">
									<input type="radio" name="problem" value="owner">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Owner</span></td>
								<td class="op"><label class="rad">
									<input type="radio" name="problem" value="you">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">You</span></td>
							</tr>

							<tr>
								<td><label for="ammenty" id="l1">What ammentites you want?</label></td>
								<td class="op"><label class="checkbox-inline">
									<input type="checkbox" id="customCheck" value="wifi" name="ammentites1">&emsp;
									</label><span class="rad_label">WIFI</span></td>
								<td class="op"><label class="checkbox-inline">
									<input type="checkbox" id="customCheck" value="ac" name="ammentites2">&emsp;
									</label><span class="rad_label">AC</span></td>
								<td class="op"><label class="checkbox-inline">
									<input type="checkbox" id="customCheck" value="tv" name="ammentites3">&emsp;
									</label><span class="rad_label">TV</span></td>
							</tr>
							
							<tr>
								<td><label for="bed" id="l1">Lift:</label>&emsp;
								<td class="op"><label class="rad">
									<input type="radio" name="lift" value="yes">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Yes</span></td>
								<td class="op"><label class="rad">
									<input type="radio" name="lift" value="no">&emsp;<span class="checkmark"></span>
								</label><span class="rad_label">No</td>
							</tr>

							<tr>
								<td><label for="furniture" id="l1">Furnished:</label></td>
								<td class="op"><label class="rad">
									<input type="radio" name="furniture" value="yes">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Yes</span></td>
								<td class="op"><label class="rad">
									<input type="radio" name="furniture" value="no">&emsp;<span class="checkmark"></span>
								</label><span class="rad_label">No</span></td>
							</tr>
						</table>
						<table>
							<tr>
								<span class="error" style="color: red;"><br>&emsp;&emsp;<?php echo $Err;?></span><br>
							</tr>
						</table>
						<div class="subm" style="margin-bottom: 5%;">&emsp;&emsp;&emsp;&emsp;
							<input type="submit" class="btn btn-danger cl" id="back" name="back" value="Back">&emsp;&emsp;
							<input type="submit" class="btn btn-primary cl" id="next" name="next" value="Next">
						</div>
					</form> 
				</div>
			</div>
		</div>
    </div>
</body>
</html>