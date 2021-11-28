<!DOCTYPE html>
<html>
<head>
	<title>
      Rent Cafe | Login
	</title>
	<link rel="stylesheet" href="forgot.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<?php
  require 'phpmailer/PHPMailer.php';
  require 'phpmailer/SMTP.php';
  require 'phpmailer/Exception.php';
  
    $email =$emailErr = $dob = $dobErr ="";
    $flag=0;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
      if (empty($_POST["email"])) 
      {
        $emailErr = "Email is required";
      } 
      else 
      {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }

      if (empty($_POST["dob"])) 
            {
                    $dobErr = "DOB is required<br>"; 
            } 
      else{
        $dob=$_POST["dob"];
      }
      
      if($emailErr == "" && $dobErr == "" && isset($_POST['clear']))
      {
          $server = "localhost";
          $username = "root";
          $passwrd = "";
          $dbname = "rent_cafe";
          $conn = mysqli_connect($server, $username, $passwrd, $dbname);
          $mail = new PHPMailer\PHPMailer\PHPMailer;
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'rcafe034@gmail.com';
          $mail->Password = 'rentcafe@123';
          $mail->SMTPSecure = 'tsl';
          $mail->Port = 587;
          $mail->setFrom('rcafe034@gmail.com');
          $query = "SELECT fname,email,dob from client_details where email='$email' AND dob='$dob'";
          $result = mysqli_query($conn,$query);
          $count = mysqli_num_rows($result);

          if ($count == 1) {
          $row = mysqli_fetch_assoc($result);
          $fname=$row['fname'];
          $emailt= $row['email'];
          $token = generateRandomString();
          $query = mysqli_query($conn, "INSERT INTO recovery_keys (emailt, token) VALUES ('$emailt', '$token') ");
          $mail->addAddress($row['email']);
          $mail->isHTML(true);
          $mail->Subject = 'Password Recovery Instruction';
          $link='http://localhost/rent-cafe/reset.php?token='.$token;
          $mail->Body    = '<h3><b>Hello '.$fname.'</b></h3><br><br>You have requested for your password recovery.To reset your password click the following link '.$link;
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      if(!$mail->send()) 
      {
        $dobErr = 'Something went wrong Try again!';
 
      }else 
      { $flag=1;
        
 
      }



        }
          
          else {
            
            $dobErr="No Account found with this email";
            
          }
    
       
          
      } 
    }
  
    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    function generateRandomString($length = 20) 
    {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++)
      {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return md5($randomString);
 
    } 
    

   

	?>
<div class="row container_form">
        <div class="form_left col-sm-0 col-md-6 col-6">
            <img src="logoImage.svg" width="420px" height="470px">
        </div>
        <div class="form_right col-sm-12 col-md-6 col-6">
        <h2>Recover Password</h2><br>	
        <p>Forgot your password? No problem, we will fix it. Just type your email below and we will send you password recovery instruction to your email. Follow easy steps to get back to your account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label for="email">&emsp;&emsp;Email&emsp;&emsp;</label>
        <input type="text" name="email" placeholder="Enter Email" autocomplete="OFF">
        <span class="error">*<br><?php 
        if($_SERVER["REQUEST_METHOD"]=="POST"){ 
        echo $emailErr;}?></span>
        <br>
        <label for="doc">Date of Birth&emsp;</label>
        <input type="Date" id="dob" name="dob" autocomplete="OFF">
        <span class="error">*<br><?php if($_SERVER["REQUEST_METHOD"]=="POST"){ echo $dobErr;}?></span>
        <?php if($flag==1 ): ?>
          <p style="color:#5068A9">A recovery mail has been sent to your email!</p>
        <?php endif; ?>
        <br>
        <div class="subm">
        	<input type="submit" id="clear" name="clear" value="SUBMIT" class="btn btn-primary cl">
        </div> 
        </form>	
        </div>	
</body>
</html>