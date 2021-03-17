
<?php
      $server = "localhost";
      $username = "root";
      $passwrd = "";
      $dbname = "rent_cafe";
      $conn = mysqli_connect($server, $username, $passwrd, $dbname);
      require 'phpmailer/PHPMailer.php';
      require 'phpmailer/SMTP.php';
      require 'phpmailer/Exception.php';
      $mail = new PHPMailer\PHPMailer\PHPMailer;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'mohd.mansha@gmail.com';
      $mail->Password = 'Mansha@456';
      $mail->SMTPSecure = 'tsl';
      $mail->Port = 587;
      $mail->setFrom('mohd.mansha@gmail.com');
     
      $sql='SELECT * from client_details WHERE gender="female"';
      $res=mysqli_query($conn,$sql);
      if(mysqli_num_rows($res)>0){
       while($x=mysqli_fetch_assoc($res)){
            $mail->addAddress($x['email']);
       }

         $mail->isHTML(true);
      $mail->Subject = 'Demo: Password Recovery Instruction';
      
      $mail->Body    = "<b>Hello</b><br>You have requested for your password recovery.Click here to reset your password. If you are unable to click the link then copy the below link and paste in your browser to reset your password.<br>";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      if(!$mail->send()) 
      {
        echo 'fail';
 
      }else 
      {
        echo 'success';
      }
   

      }
      else
      {
            echo "no data";
      }
      
      ?>