<?php
session_start();
$con=mysqli_connect('localhost','root','','onlinevote');
$email=$_POST['email'];
$res=mysqli_query($con,"select * from register where email='$email'");
$count=mysqli_num_rows($res);
if($count>0){
	$res2=mysqli_query($con,"select * from register where email='$email' AND flag=0");
    $count2=mysqli_num_rows($res2);
    if($count2>0){
	$row=mysqli_fetch_assoc($res2);
	$otp=rand(11111,99999);
	$fname=$row["fname"];
	$password=$row["password"];
	$final=$otp.$password;
	mysqli_query($con,"update register set otp='$otp',otpfinal='$final' where email='$email'");
	// mysqli_query($con,"insert into register (otpfinal) values('".$final."') where email='$email'");
	$html= $fname.",Your OTP for E-Voting System is ".$otp;
	$_SESSION['EMAIL']=$email;
	mailer($email,'OTP Verification for Login',$html);
	echo "yes";
	}
	else{
		echo "not_exist2";
	}
}else{
	echo "not_exist";
}

function mailer($to,$subject, $msg){
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username = "khusihcs19@gmail.com";
	$mail->Password = "uttam7488@"; 
	// $mail->SetFrom("kripriyanka7488@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->IsHTML(true);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
	echo $msg;
}
	
?>