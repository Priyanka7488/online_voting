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
	$subject="otp";
    $msg = $fname.",Your registration has done successfully";
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username = "khusihcs19@gmail.com";
	$mail->Password = "khusbooraj"; 
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
?>
<head>
<title>Registration</title>
<link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css"> 
        <style>
            .navbar{
                background-color: rgb(98, 76, 240);
                border-radius: 6px;
                margin: 0;
				height: 50px;
				text-align: center;
				
            }
            .navbar ul{
                overflow: auto;
            }
            .navbar li{
                float: left;
                list-style: none;
                margin-left: 13px;
				 margin-right:20px;
				text-align: center;
				margin-bottom:1.5px;
            }
            .navbar li a{
                padding: 3px 3px;
                text-decoration: none;
				text-align: center;
                color: floralwhite;
            }
            .navbar li a:hover{
                color: rgba(2, 230, 247, 0.651);
                border-radius: 3px;
                
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
                <li><a class="active" href="#">Home</a></li>
                <li><a href="#">Constituencies</a></li>
                <li><a href="parties/party.php">Parties</a></li>
                <li><a href="#">Show result</a></li>
                <li><a href="#">Survey</a></li>
                <li><a href="#">Contact us</a></li>
                 <li><a href="admin_dashboard/index.php">Admin</a></li>
                 </ul>
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