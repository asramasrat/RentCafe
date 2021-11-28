
<html>
<head>
    <title>
        Rent Cafe
    </title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        function passwordValidates( $password ) {
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) 
            {
                return false;
            }
            else 
            {
                return true;
            }
            // return preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/", $pass);
        }
         
        $flag=0;
        $passErr = "";
        $cpassErr = "";
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if (empty($_POST["password"]))
            {
                $passErr = 'Password is Required';
            }
            else
            {
                $pasword = $_POST['password'];
                $confirm = $_POST['cpassword'];

                if(!passwordValidates($pasword))
                {
                    $passErr='Password should be of 8 letters and contain uppercase and numbers';
                }
                if($pasword!=$confirm)
                {
                    $cpassErr='Password and confirm password are not matching!';
                }
            }
            if($passErr == "" && $cpassErr == "" && isset($_POST['clear']))
            { 
              if(isset($_GET['token'])){
                $token=$_GET['token'];
            
                $server = "localhost";
                $username = "root";
                $passwrd = "";
                $dbname = "rent_cafe";
                $conn = mysqli_connect($server, $username, $passwrd, $dbname);
                $newpassword=mysqli_real_escape_string($conn,$_POST['password']);
                $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
                $query = "SELECT emailt from recovery_keys where token='$token'";
                $result = mysqli_query($conn,$query);
                $count = mysqli_num_rows($result);
                if($count==1){
                  $row = mysqli_fetch_assoc($result);
                  $email=$row['emailt'];
                  $updatequery= "UPDATE client_details SET password='$hashedPassword' where email='$email'";
                  $iquery=mysqli_query($conn,$updatequery);

                  if($iquery){
                   $flag=1 ;
                 }
                  else{

                   $cpassErr="Your password is not updated. Try again.";
                  }
                }

                
                
            }
            else{
              $cpassErr="Something went wrong.Try again.";
            }        
        }
       } 
    ?>
    <div class="row container_form">
        <div class="form_left col-sm-0 col-md-6 col-6">
            <img src="logoImage.svg" width="420px" height="470px">
        </div>
        <div class="form_right col-sm-12 col-md-6 col-6">
            <br/>
            <h2>Reset Password</h2>
            <form action="" method="POST">
                <br>

                <label for="pass">&emsp;&emsp;New Password</label>
                <input type="password" name="password" id="pass" placeholder="Enter New Password" autofocus autocomplete="OFF">
                <span class="error">* <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $passErr;?>
                </span><br>

                <label for="pass">Confirm Password</label>
                <input type="password" name="cpassword" id="pass" placeholder="Re-enter Password" autofocus autocomplete="OFF">
                <span class="error">* <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $cpassErr;?>
                </span>
                <br>
                <?php if($flag==1 ): ?>
                <p style="color:#5068A9">You passowrd is updated!<a href="login.php">Log In</a></p>
                <?php endif; ?>
                <br>
                <div class="subm">
                <input type="submit" id="clear" name="clear" value="Update Password" class="btn btn-primary cl">
                </div> 
            </form> 
        </div>
    </div>
</body>
</html>
