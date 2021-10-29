<!DOCTYPE html>
<html>
    <?php
session_start();
$con=mysqli_connect("localhost","root","","onlinevote");
if(!$con)
die("server could not connected");
if(isset($_POST["submitbutton"]))
{
  $name=$_POST["name"];
$email=$_POST["email"];
$message=$_POST["message"];
$subject="FEEDBACK";
    $subject="otp";
    //  $msg = $fname.",Your registration has done successfully";
    include('smtp/PHPMailerAutoload.php');
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure="tls";
    $mail->SMTPAuth=true;
    $mail->Username = "khusihcs19@gmail.com";
    $mail->Password = "uttam7488@"; 
    $mail->SetFrom("kripriyanka7488@gmail.com");
    $mail->Subject = $subject;
    $mail->Body ="Name: ".$name."<br>"."Email: ".$email."<br>".$website."<br><br>"."Message: ".$message;
    $mail->AddAddress("khusihcs19@gmail.com");
    $mail->IsHTML(true);
    $mail->SMTPOptions=array('ssl'=>array(
      'verify_peer'=>false,
      'verify_peer_name'=>false,
      'allow_self_signed'=>false
    ));
    if(!$mail->Send()){
      return 0;
    }else{
          header('location:contactus.php');
    }
    echo $message;
  }
  
  ?>
<head>
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>CONTACT US</title>
    <link rel="stylesheet" type="text/css"href="stylecs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css"href="contact2.css">

</head>
<body>
    
    <section class="contactus">
        <div class="contentshow">
            <h2><b>CONTACT  US </b></h2><br>
            <p>Went to get in touch? We'd love to hear from you. For any query regarding to this website, kindly Contact Us by entering 
                your Name, Email-Id, and Messages. We will try our best to respond to your query as soon as possible. 
                 </p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                            <p> Motihari College Of Engineering,<br>Motihari, 845401,<br>Bihar,India</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-phone"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                            <p> 9999999999</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                            <p> abc@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="contactusForm">
            <form  action="<?php $_PHP_SELF ?>" method="POST" >
                <h2>Send Message</h2>
                <div class="inputBox">
                    <input type="text" name="name" required="required">
                    <span>Full Name</span>
                </div>

                <div class="inputBox">
                    <input type="text" name="email" required="required">
                    <span>Email</span>
                </div>

                <div class="inputBox">
                    <textarea required="required"  name="message"></textarea>
                    <span>Type Your Message...</span>
                </div>

                <div class="inputBox">
                   <center> <input type="submit" name="submitbutton" required="required" value="Send"></center>
                </div>
                </form>
            </div>
            </div>
    </section>