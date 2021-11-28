<?php session_start();
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
?>
<html>
<head>
    <link rel="stylesheet" href="contact.css">
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
    $dobErr ="";
        $server = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "rent_cafe";
        $conn = mysqli_connect($server, $username, $pass, $dbname);
        // Create database connection
        $db = new mysqli($server, $username, $pass, $dbname);

        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $pid=$_GET["id"];
        // Get images from the database
        $query1 = $db->query("SELECT email FROM properties_details WHERE pid LIKE '%$pid%'");
        
        if($query1->num_rows > 0){
            while($row1 = $query1->fetch_assoc()){
                $email=$row1["email"];
            }
        }
        $query = $db->query("SELECT fname,lname,phone FROM client_details WHERE email LIKE '%$email%'");
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                $fname=$row["fname"];
                $lname=$row["lname"];
                $phone=$row["phone"];
            }
        }

        $uemail=$_COOKIE["EMAIL"];

    $query2 = "SELECT fname,lname from client_details where email='$email'";
    $result1 = mysqli_query($conn,$query2);
    $row4 = mysqli_fetch_assoc($result1);
    $ownerfname = $row4['fname'];
    $ownerlname = $row4['lname'];

    $query3 = "SELECT size,small_addr from properties_details where pid='$pid'";
    $result2 = mysqli_query($conn,$query3);
    $row2 = mysqli_fetch_assoc($result2);
    $size = $row2['size'];
    $small_addr = $row2['small_addr'];
    
    if(isset($_POST["notify"]))
        { 

            $server = "localhost";
            $username = "root";
            $pass = "";
            $dbname = "rent_cafe";
            // $db = new mysqli($server, $username, $pass, $dbname);
            $conn = mysqli_connect($server, $username, $pass, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query7="insert into notify(owneremail,uemail,pid) values(?,?,?)";
            $pst=mysqli_prepare($conn,$query7);
            mysqli_stmt_bind_param($pst,"ssi",$email,$uemail,$pid);
            mysqli_stmt_execute($pst);
// die($email.$uemail.$pid);

            $mail = new PHPMailer\PHPMailer\PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'rcafe034@gmail.com';
            $mail->Password = 'rentcafe@123';
            $mail->SMTPSecure = 'tsl';
            $mail->Port = 587;
            $mail->setFrom('rcafe034@gmail.com');
            $query1 = "SELECT fname,lname,email,phone from client_details where email='$uemail'";
            $result = mysqli_query($conn,$query1);
            $row6 = mysqli_fetch_assoc($result);
            $ufname=$row6['fname'];
            $ulname=$row6['lname'];
            $uphonet= $row6['phone'];
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'NOTIFICATION: Response on property ad posted on RentCafe ';
            $mail->Body    = '<h3><b>Hello '.$ownerfname.' '.$ownerlname.'</b></h3>This mail from RENTCAFE is to notify you that you
            have a response to your property ad posted on rent cafe.<br>'.$ufname.' '.$ulname.' is interested in your '.$size.' '.$small_addr.' property<br> Following are the contact details of '.$ufname.
            ' :<br> PHONE NUMBER : '.$uphonet.'<br>EMAIL: '.$uemail;
            $mail->AltBody ='This is the body in plain text for non-HTML mail clients';

        

        if(!$mail->send()) 
      {
        $dobErr = 'Something went wrong Try again!';
 
      }
      
      else 
      { $dobErr = 'A notification mail has been sent to user';
        // header("Location: contact.php?id=$pid");
      }
    }
        
        ?>
    <div class="container">
		<div class="row">
            <div class="ct text-center ">
            <div class="box1">
                <table class="table borderless">
                    <h4>Owner Contact Details</h4>
                    <tbody>
                        <tr align="center">
                            <td id="title">Owner Name:</td>
                            <td id="sub"><?php echo $fname." ".$lname;?></td>
                        </tr>
                        <tr align="center">
                            <td id="title">Email:</td>
                            <td id="sub"><?php echo $email;?></td>
                        </tr>
                        <tr align="center">
                            <td id="title">Phone No.:</td>
                            <td id="sub"><?php echo $phone;?></td>
                        </tr>
                    </tbody>
                </table>
                <form action="" method="POSt">
                    <input type="submit" id="notify" class="btn btn-primary ml-3" style="margin-right: 0.75rem;background-color: #12213F!important;" value="Notify Owner" name="notify"/> 
                </form>
                <?php echo $dobErr;?>
            </div>
            </div>
        </div>
    </div>
    </body>
</html>