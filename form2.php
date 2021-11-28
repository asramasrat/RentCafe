<?php session_start();?>
<html>
<head>
    <title>
        Rent Cafe
    </title>
    <link rel="stylesheet" href="form2.css">
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
         
        $emailErr ="";
        $passErr = "";
        $cpassErr = "";
        if(isset($_POST["submit"]))
        {
            if (empty($_POST["email"])) 
            {
                $emailErr = 'Email Id is Required';
            }
            else
            {
                $email = $_POST['email'];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = 'Please Enter Valid Email Id!';
                }
            }
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
            if($emailErr == "" && $passErr == "" && $cpassErr == "" && isset($_POST['submit']))
            {
                
                $fname=$_SESSION["fname"];
                $lname=$_SESSION["lname"]; 
                $gender=$_SESSION["gender"];
                $d=$_SESSION["dob"];                
                $phone=$_SESSION["phone"];
                $city=$_SESSION["city"];
                setcookie('EMAIL',$_POST['email'],time()+ 3600);
                $server = "localhost";
                $username = "root";
                $pass = "";
                $dbname = "rent_cafe";
                $password = $_POST['password'];
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $conn = mysqli_connect($server, $username, $pass, $dbname);

                $query="insert into client_details(fname,lname,gender,dob,phone,city,email,password) values(?,?,?,?,?,?,?,?)";
                $pst=mysqli_prepare($conn,$query);
                mysqli_stmt_bind_param($pst,"ssssisss",$fname,$lname,$gender,$d,$phone,$city,$email,$hashedPassword);
                mysqli_stmt_execute($pst);
                // $query = "insert into client_details(fname,lname,gender,dob,phone,city,email,password) values('$fname','$lname','$gender','$d','$phone','$city','$email','$hashedPassword')";
                // $run = mysqli_query($conn,$query);
                header("Location: prefer1.php");
            }        
        }
        if(isset($_POST['back']))
        {
            header("Location: form.php");
        }
    ?>
    <div class="row container_form">
        <div class="form_left col-sm-0 col-md-6 col-6">
            <img src="logoImage.svg" width="420px" height="470px">
        </div>
        <div class="form_right col-sm-12 col-md-6 col-6">
            <br/>
            <h2>&emsp;REGISTRATION</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <br>
                <label for="em">&emsp;&emsp;&emsp;&emsp;&emsp;Email&emsp;</label>
                <input type="text" name="email" id="name" placeholder="Enter Email" autofocus autocomplete="OFF">
                <span class="error">* <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $emailErr;?>
                </span><br>

                <label for="pass">&emsp;&emsp;&emsp;&emsp;Password</label>
                <input type="password" name="password" id="pass" placeholder="Enter Password" autofocus autocomplete="OFF">
                <span class="error">* <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $passErr;?>
                </span><br>

                <label for="pass">Confirm Password</label>
                <input type="password" name="cpassword" id="pass" placeholder="Re-enter Password" autofocus autocomplete="OFF">
                <span class="error">* <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $cpassErr;?>
                </span><br>
                
                <div class="subm">
                    &emsp;&emsp;&emsp;&emsp;
                    <input type="submit" class="btn btn-danger cl" id="back" name="back" value="Back">&emsp;&emsp;
                    <input type="submit" class="btn btn-primary cl" id="submit" name="submit" value="Submit">
                </div>
            </form> 
        </div>
    </div>
</body>
</html>