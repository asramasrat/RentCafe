<?php

	$server = "localhost";
	$username = "root";
	$passowrd = "";
	$dbname = "rentcafe";

	$conn = mysqli_connect($server, $username, $passowrd, $dbname);

	if(isset($_POST['submit']))
	{
		if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['cpassword']))
		{
			$email = $_POST['email'];
			$pass = $_POST['password'];
			$cpass = $_POST['cpassword'];

			$query = "insert into info(email,pass,cpass) values('$email','$pass','$cpass')";

			$run = mysqli_query($conn,$query) or die(mysql_error());

			if($run)
				echo "Form is Submitted Successfully!!!";
			else
				echo "Form is not Submitted!";
		}
		else
			echo "All Fields are required!";
	}

?>