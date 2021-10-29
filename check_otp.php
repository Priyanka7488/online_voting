<?php
session_start();
$con=mysqli_connect('localhost','root','','onlinevote');
$otp=$_POST['otp'];
$email=$_SESSION['EMAIL'];
$res=mysqli_query($con,"select * from register where email='$email' and otp='$otp'");
$count=mysqli_num_rows($res);
if($count>0){
	mysqli_query($con,"update register set otp='', otpfinal='' where email='$email'");
	echo "yes";
}else{
	echo "not_exist";
}
?>