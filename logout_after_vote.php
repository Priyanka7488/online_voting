<?php
session_start();
    $subject="SUCCESSFUL VOTING";
    $sess=$_SESSION['EMAIL'];
    $msg = "You have voted successfully<br><p style='color:green'>THANK YOU FOR YOUR VALUABLE VOTE</p>";
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
	$mail->Body =$msg;
	$mail->AddAddress($sess);
	$mail->IsHTML(true);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		return 0;
	}else{
        header('location:sign.php');
	}
	echo $msg;
unset($_SESSION['IS_LOGIN']);
unset($_SESSION['EMAIL']);
header('location:sign.php');
die();
?>