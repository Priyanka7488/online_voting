<?php
session_start();
$con=mysqli_connect('localhost','root','','onlinevote');
$email=$_POST['email'];
$res=mysqli_query($con,"select * from register where email='$email'");
$count=mysqli_num_rows($res);
$row=mysqli_fetch_assoc($res);
$fname=$_POST["fname"];
$midname=$_POST["midname"];
$lname=$_POST["lname"];
$fpname=$_POST["fpname"];
$pmidname=$_POST["pmidname"];
$plname=$_POST["plname"];
$dob=$_POST["dob"];
$gender=$_POST["gender"];
$nation=$_POST["nation"];
$state=$_POST["state"];
$constituency=$_POST["constituency"];
$segment=$_POST["segment"];
$mblno=$_POST["mblno"];
$pincode=$_POST["pincode"];
$adhar=$_POST["adhar"];
$voterid=$_POST["voterid"];
$email=$_POST["email"];
$img=$_FILES["img"]["name"];
$today = date("Y-m-d");
$diff= date_diff(date_create($dob),date_create($today));
$age= $diff ->format ('%y');
if($age>=17)
 {
$sql="insert into register(fname,midname,lname,fpname,pmidname,plname,dob,gender,nation,state,constituency,segment,mblno,
pincode,adhar,voterid,email,img) values('".$fname."','".$midname."','".$lname."','".$fpname."',
'".$pmidname."','".$plname."','".$dob."','".$gender."','".$nation."','".$state."','".$constituency."','".$segment."'
,'".$mblno."','".$pincode."','".$adhar."','".$voterid."','".$email."','".$img."')";

if(move_uploaded_file($_FILES["img"]["tmp_name"]
,"image/".$img))
{
$no=mysqli_query($con,$sql);
 if($no!=0)
 $status=1;
 else
 $status=0;
 }
else
$error=1;
}
else{
	$error=2;
}
if($count>0){
	$otp=rand(11111,99999);
	$fname=$row["fname"];
	// $lname=$count["lname"];
	// mysqli_query($con,"update register set otp='$otp' where email='$email'");
	$html= $fname.",your OTP for E-voting system is ".$otp;
	mailer($email,'OTP Verification',$html);
	echo "yes";
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
	$mail->SetFrom("kripriyanka7488@gmail.com");
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