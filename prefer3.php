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
		$food= $smoke= $drink= $cleanliness= $late= $pet= $person= "";
		$Err= "";
		if ($_SERVER["REQUEST_METHOD"] == "POST")
        { 
        	if(empty($_POST["food"])){
                $Err="All fields are required<br>";
            }
            else
            {
                $food=$_POST['food'];
            }

            if(empty($_POST["smoke"])){
                $Err="All fields are required<br>";
            }
            else
            {
                $smoke=$_POST['smoke'];
            }
            if(empty($_POST["drink"])){
                $Err="All fields are required<br>";
            }
            else
            {
                $drink=$_POST['drink'];
            }
            if(empty($_POST["clean"])){
                $Err="All fields are required<br>";
            }
            else
            {
                $cleanliness=$_POST['clean'];
            }
            if(empty($_POST["late"])){
                $Err="All fields are required<br>";
            }
            else
            {
                $late=$_POST['late'];
            }
            if(empty($_POST["pet"])){
                $Err="All fields are required<br>";
            }
            else
            {
                $out=$_POST['pet'];
            }
            if(empty($_POST["person"])){
                $Err="All fields are required<br>";
            }
            else
            {
                $out=$_POST['person'];
            }


		if($Err == "" && isset($_POST['next']))
		{  
	    	$foodval = $_POST['food'];
	    	$smokeval = $_POST['smoke'];
	    	$drinkval = $_POST['drink'];
	    	$cleanval = $_POST['clean'];
	    	$lateval = $_POST['late'];
	    	$petval = $_POST['pet'];
	    	$personval = $_POST['person'];
	    	$email = $_COOKIE['EMAIL'];
	    	$server = "localhost";
	        $username = "root";
	        $pass = "";
	        $dbname = "rent_cafe";
	        $conn = mysqli_connect($server, $username, $pass, $dbname);
	        $query="insert into roommatepref(email,food,smoke,drink,clean,late,pet,person) values(?,?,?,?,?,?,?,?)";
	            $pst=mysqli_prepare($conn,$query);
	            mysqli_stmt_bind_param($pst,"ssssssss",$email,$foodval,$smokeval,$drinkval,$cleanval,$lateval,$petval,$personval);
	            mysqli_stmt_execute($pst);

	        

	        header("Location: home.php");
		}

	}
	if(isset($_POST['back']))
    {
        header("Location: prefer2.php");
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
					<li class = "vertical" style="border-color:#4F66D0;"></li>
					<li class="d3 listtick">
						<label class="l1">Perference with Roomate</label>
					</li>
				</ul>
				<img src="asset/p3.svg" width="auto" height="auto" class="d-none d-md-block px-3">
			</div>
			<div class="col-7">
				<div class="card text-center" id="formbg">
					<h3 style="margin-top: 10%; margin-bottom: 5%;">Preference with roommate</h3>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
						<table id="table1"; cellspacing="5px" cellpadding="5%";>
							<tr>
								<td><label for="gender" id="l1">Food:</label></td>
								<td class="op"><label class="rad">
									<input type="radio" name="food" value="veg">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Veg</span></td>
								<td class="op"><label class="rad">
									<input type="radio" name="food" value="non-veg">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Non-Veg</span></td>
							</tr>

							<tr>
								<td><label for="smoke" id="l1">Smoking:</label></td>
								<td class="op"><label class="rad">
									<input type="radio" name="smoke" value="ns">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Non-Smoker</span></td>
								<td class="op"><label class="rad">
									<input type="radio" name="smoke" value="s">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Smoker</span></td>
							</tr>

							<tr>
								<td><label for="drink" id="l1">Drinking:</label></td>
								<td class="op"><label class="rad">
									<input type="radio" name="drink" value="nd">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Non-Drinker</span></td>
								<td class="op"><label class="rad">
									<input type="radio" name="drink" value="d">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Drinker</span></td>
							</tr>

							<tr>
								<td><label for="clean" id="l1">Cleaniness:</label></td>
								<td class="op"><label class="rad">
									<input type="radio" name="clean" value="clean">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Clean</span></td>
								<td class="op"><label class="rad">
									<input type="radio" name="clean" value="avg">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Average</span></td>
							</tr>

							<tr>
								<td><label for="night" id="l1">Staying up late night:</label></td>
								<td class="op"><label class="rad">
									<input type="radio" name="late" value="sometimes">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Sometimes</span></td>
								<td class="op"><label class="rad">
									<input type="radio" name="late" value="often">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Often</span></td>
							</tr>

							<tr>
								<td><label for="pet" id="l1">Are you okay with pets?</label></td>
								<td class="op"><label class="rad">
									<input type="radio" name="pet" value="okay">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Yes</span></td>
								<td class="op"><label class="rad">
									<input type="radio" name="pet" value="notokay">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">No</span></td>
							</tr>

							<tr>
								<td><label for="person" id="l1">Type of person:</label></td>
								<td class="op"><label class="rad">
									<input type="radio" name="person" value="introvert">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Introvert</span></td>
								<td class="op"><label class="rad">
									<input type="radio" name="person" value="Extrovert">&emsp;<span class="checkmark"></span>
									</label><span class="rad_label">Extrovert</span></td>
							</tr>
						<table>
						<table>
							<tr>
								<span class="error" style="color: red;"><br>&emsp;&emsp;<?php echo $Err;?></span><br>
							</tr>
						</table>
						<div class="subm">
							<input type="submit" class="btn btn-danger cl" id="back" name="back" value="Back">&emsp;&emsp;
							<input type="submit" class="btn btn-primary cl" id="next" name="next" value="Submit">
						</div>
					</form> 
				</div>
			</div>
	    </div>
    </div>
</body>
</html>