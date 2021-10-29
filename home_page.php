<!DOCTYPE html>
<html>
<?php
$status=2;
$error=0;
session_start();
$con=mysqli_connect("localhost","root","","onlinevote");
if(!$con)
die("server could not connected");
if(isset($_POST["submitbutton"]))
{
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
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
$img=$_FILES["img"]["name"];
$today = date("Y-m-d");
$diff= date_diff(date_create($dob),date_create($today));
$age= $diff ->format ('%y');
$res2=mysqli_query($con,"select * from voters where voter_id='$voterid' and adhar='$adhar'");
$count2=mysqli_num_rows($res2);
if($count2!=0){
$res3=mysqli_query($con,"select * from register where voterid='$voterid' and adhar='$adhar'");
$count3=mysqli_num_rows($res3);
if($count3==0)
{
if($age>=17)
{
$sql="insert into register(fname,midname,lname,fpname,pmidname,plname,dob,gender,nation,state,constituency,segment,mblno,
pincode,adhar,voterid,email,password,cpassword,img) values('".$fname."','".$midname."','".$lname."','".$fpname."',
'".$pmidname."','".$plname."','".$dob."','".$gender."','".$nation."','".$state."','".$constituency."','".$segment."'
,'".$mblno."','".$pincode."','".$adhar."','".$voterid."','".$email."','".$password."','".$cpassword."','".$img."')";

if(move_uploaded_file($_FILES["img"]["tmp_name"]
,"image/".$img))
{
$no=mysqli_query($con,$sql);
if($no!=0){
	$subject="SUCCESSFULLY Registered";
    $msg = "Dear ".$fname.",<br>Your registration has done successfully for E-VOTING SYSTEM.";
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
	$mail->AddAddress($email);
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
}

else
$status=0;
}
else
$error=1;
}
else{
	$error=2;
}
}
else{
	$error=4;
}
}
else{
	$error=3;
}
}
?>
<head>
<title>ONLINE VOTING</title>

<link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"href="stylecs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css"> 

        <style>
           .navbar {
        width:100%;
        
    height:60px;
    background-color:black;
    /* border-style:groove; */

    }
    .navbar ul
 {
   padding:0px;
}
.navbar ul li
{
float:left;
background-color:black;
width:140px;
height:50px;
line-height:40px;
font-family: serif;
font-style: normal;
font-size:20px;
text-align:center;
list-style:none;
opacity:0.8;
}
.navbar ul li a
{
display:block;
text-decoration:none;
color:white;
}

.navbar ul li ul
{
display:none;
}
.navbar ul li:hover > ul
{
display:block;
}
.navbar ul li:hover {
background-color:#32cd32;
opacity:0.9;
}
        

	 .textlayout
	 {  font-family: serif;
	 	font-style: normal;
	 	font-size: 15px;
	 	font-weight: bold;
	 }

</style>
</head>
<body>

<div class="background">
    <img src="images/ELECTION_LOGO.jpg" height="220" width="1300"/>
  </div>
  <header>
            
  <nav class="navbar">
            <ul>
			<li><a class="active" href="index.php">Home</a></li>
                <li><a href="constituencies/index.html">Constituencies</a></li>
                <li><a href="#">Parties</a>
                <ul>
         <li><a href="bjp.html">BJP</a></li>
         <li><a href="rjd.html">RJD</a></li>
         <li><a href="jdu.html">JDU</a></li>
         <li><a href="inc.html">INC</a></li>
   </ul>
            </li>
                <li><a href="result/result.php">Show result</a></li>
                <!-- <li><a href="#">Survey</a></li> -->
                <li><a href="contact.php">Contact us</a></li>
               
            </ul>
            <a href="admin_dashboard/login.php" class="icon" style="float:right;padding:0px;display:block;text-decoration:none;color:white;"><i class="fa fa-user fa-2x"></i> Admin </a>
        </nav>
                 </div>
                 <div class="welcome-text">
                    </div>
                </header>

<br>
<div class="container-fluid">
	<div class="row">
	  <div class="col-sm-6">
	  	
        <div class="container">
                    <div class="left">
                      <div class="intro" style="text-align: center;"><h2>INTRODUCTION</h2></div>
					  <p>In the<b> E-Voting System</b>, people can cast their vote through online. In this <b>system</b><br>the administration adds all voters list in the database. After adding the information, administrator provides login details with voter id to the users. The voters can vote for the candidates by entering their login id and password.</p>
					  
                    </div>
					<div class="image">
						<img src="images\vote.jpg" height="600" width="400"></div>
                    <div class="right">
                        <p></p>
                    </div>
                    
                </div>
                <section class="about">
                    <div class="about-title">
                        <ul class="right-nav">
                            
                        
                    </div>
                </section>


	  </div>

		<div class="container col-sm-6">
			<div class="container-fluid">
	<div class="row">
		<h2 class="text-center" style="background-color: ">Register Here</h2>
		<div class="col-sm-12" style="background-color: ">
			<form class="textlayout" action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
				<?php
				    
					if($error==3)
			   echo "<p style='color:red;'>*Voter Name Is Not Registered In Voter List</p>";

			   if($error==4)
			   echo "<p style='color:red;'>*Voter has already registered</p>";
			
			
                    if($status==1)
                       // echo "<tr><td style='color:red;'>successfully Resgistration</td></tr>";	
                       header('location:sign.php');
                        else if($status==0)
						echo "<p style='color:red;'>Unable Resgistration</p>";
                    //   if($error==1)
                    //   echo "password and confirm password should be same";
                        ?>	
				
			    <div class="form-group">
				    <label>Enter Elector's Name</label>
				    <div>
					    <div class="row">
					       <div class="col-sm-4">
						       <input type="text" class="form-control" name="fname"placeholder="first name" required="true">
					        </div>
					       
					        <div class="col-sm-4">
					           <input type="text" class="form-control" name="midname"placeholder="middle name">
					        </div>
					        
					        <div class="col-sm-4">
						       <input type="text" class="form-control" name="lname"placeholder="last name">
					        </div>
				        </div>
				    </div>

				    <label>Enter Father's /Husband's Name</label>
				    <div>
					    <div class="row">
					       <div class="col-sm-4">
						       <input type="text" class="form-control" name="fpname"placeholder="first name" required="true">
					        </div>
					       
					        <div class="col-sm-4">
					           <input type="text" class="form-control" name="pmidname"placeholder="middle name">
					        </div>
					        
					        <div class="col-sm-4">
						       <input type="text" class="form-control"name="plname" placeholder="last name">
					        </div>
				        </div>
				    </div>
				    <div class="row">
					       <div class="col-sm-4">Choose DOB</div>
					       <div class="col-sm-4">Select Gender</div>
					</div>

					<div class="row">
					       <div class="col-sm-4">
					       	  <input type="date" name="dob"class="form-control" placeholder="select date" required="true">
								 <?php
						   if($error==2)
                      echo "<p style='color:red;'>*age is not completed</p>";
					  ?>
							</div>
					       <div class="col-sm-4">
					       	   <select  name="gender"class="form-control">
					       	   	  <option>Select Gender</option>
					       	   	  <option>Female</option>
					       	   	  <option>Male</option>
					       	   	  <option>Others</option>
					       	   </select>
					       </div>
					</div>

					<div class="row">
					       <div class="col-sm-4">Nationality</div>
					       <div class="col-sm-4">State</div>
					</div>

					<div class="row">
					       <div class="col-sm-4">
					       	   <input  class="form-control" name="nation" value="INDIAN" readonly="true">
					       </div>
					       <div class="col-sm-4">
                                            <select id="state" name="state" class="form-control" >
                                                <option>Select State Name</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-8">District Name</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-8">
                                            <select id="district" name="constituency" class="form-control"
                                               >
                                                <option value="">Select </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-8">Constituency Segment</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <select id="segment" name="segment" class="form-control" >
                                                <option>Select Constituency Segment</option>

                                            </select>
                                        </div>
                                    </div>


					<div class="row">
					       <div class="col-sm-4">Enter Mobile Number</div>
					       <div class="col-sm-4">Enter Pin Code</div>
                    </div>

                    <div class="row">
					       <div class="col-sm-4">
					       	   <input  name="mblno"class="form-control" type="" placeholder="Mobile Number">
					       </div>

					       <div class="col-sm-4">
					       	   <input  class="form-control" type="text" name="pincode" placeholder="Pin Code">
					       </div>
					</div>

					<div class="row">
					       <div class="col-sm-4">Enter Aadhar Number</div>
					       <div class="col-sm-4">Enter Voter Id</div>
                    </div>

                    <div class="row">
					       <div class="col-sm-4">
					       	   <input  class="form-control" type="text"name="adhar" placeholder="Aadhar Number">
					       </div>

					       <div class="col-sm-4">
					       	   <input  class="form-control" type="text" name="voterid"placeholder="Voter Id Number">
					       </div>
					</div>

					<div class="row">
					       <div class="col-sm-8">Enter Email Address</div>
                    </div>

                    <div class="row">
					       <div class="col-sm-8">
					       	   <input  class="form-control" type="email" name="email" placeholder="Email Address">
					       </div>
					</div>

                    <div class="row">
					       <div class="col-sm-4">Create Password</div>
					       <div class="col-sm-4">Retype Password</div>
                    </div>

                    <div class="row">
					       <div class="col-sm-4">
					       	   <input  class="form-control" type="password" name="password" placeholder="Password">
					       </div>

					       <div class="col-sm-4">
					       	   <input  class="form-control" type="password" name="cpassword" placeholder="Retype Password">
					       </div>
					</div>

					<div class="row">
					       <div class="col-sm-8">Upload Current Image</div>
                    </div>

                    <div class="row">
					       <div class="col-sm-8">
					       	   <input  name="img" type="file">
					       </div>
					</div>



					<div>
					       
					       	   <input type="checkbox">  I agree to all<a href="#">Terms And Condition</a>
					      
					</div>
                    <br>
                    <div class="row">
					       <div class="col-sm-4">
					       	   <input  class="btn btn-primary form-control" type="submit" name="submitbutton" value="Register">
					       </div>

					       <div class="col-sm-4">
					       	   <input  class="btn btn-secondary form-control" type="submit" value="Reset">
					       </div>
					</div>

					<h6><b>Note: </b>All the Information should be filles according to <b>Valid UID </b>or<b> Voter-Id</b></h6>
					



   
                </div>
		</form>	
	</div>
</div>
</div>
</div>
</div>
</div>
<footer>
                   <div class="foot" style="background-color: rgb(127, 184, 250); text-align: center;">&COPY;2021 by MCE Motihari</div>
                </footer>
				<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
				$(document).ready(function() {
        function loadData(type, category_id) {
            $.ajax({
                url: "load-cs.php",
                type: "POST",
                data: {
                    type: type,
                    id: category_id
                },
                success: function(data) {
                    if (type == "stateData") {
                        $("#district").html(data);
                    } else {
                        $("#state").append(data);
                    }
                    if (type == "districtData") {
                        $("#segment").html(data);
                    }

                }
            });
        }


        loadData();

        $("#state").on("change", function() {
            var state = $("#state").val();

            if (state != "") {
                loadData("stateData", state);
            } else {
                $("#district").html("");
            }


        })
        $("#district").on("change", function() {
            var district = $("#district").val();

            if (district != "") {
                loadData("districtData", district);
            } else {
                $("#segment").html("");
            }


        })

    });
    </script>
</body>
</html>