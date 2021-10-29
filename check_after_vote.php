<?php
session_start();
$con=mysqli_connect('localhost','root','','onlinevote');
// $otp=$_POST['otp'];
$email=$_SESSION['EMAIL'];
$sql=mysqli_query($con,"select * from register where email='$email'");
$row2=mysqli_fetch_assoc($sql);
$voterid=$row2["voterid"];
$otp=$_POST["otp"];

$res=mysqli_query($con,"select * from register where email='$email' and vote_otp='$otp'");
$count=mysqli_num_rows($res);
if($count>0){
	$s="SELECT * from add_candidate where partyname='".$_SESSION["value"]."'";
$rp=mysqli_query($con,$s);
while($row=mysqli_fetch_assoc($rp))
{
$partyname=$row["partyname"];
$candidatename=$row["candidatename"];
$countvote=$row["countvote"];


$sql2="INSERT into vote_claim(party_name,candidate_name,otp,voter_id) values('".$partyname."','".$candidatename."','".$otp."','".$voterid."')";
$query=mysqli_query($con,$sql2);
$sql="UPDATE add_candidate SET countvote='".$countvote."'+1 where partyname='".$partyname."' ";
$no=mysqli_query($con,$sql);
$sqlf="UPDATE register SET flag=1 where email='$email' ";
$no2=mysqli_query($con,$sqlf);

}
    
	mysqli_query($con,"update register set otp='', otpfinal='' where email='$email'");
	$_SESSION["username"]=$email;
	echo "yes";
}else{
	echo "not_exist";
}
?>