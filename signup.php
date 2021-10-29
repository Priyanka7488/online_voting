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
if($password==$cpassword)
{
$sql="insert into register(fname,midname,lname,fpname,pmidname,plname,dob,gender,nation,state,constituency,segment,mblno,
pincode,adhar,voterid,email,password,cpassword,img) values('".$fname."','".$midname."','".$lname."','".$fpname."',
'".$pmidname."','".$plname."','".$dob."','".$gender."','".$nation."','".$state."','".$constituency."','".$segment."'
,'".$mblno."','".$pincode."','".$adhar."','".$voterid."','".$email."','".$password."','".$cpassword."','".$img."')";

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
}
?>
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color:grey">
</form>
<!-- The Modal (contains the Sign Up form) -->
 <!-- <div class="container" align="right">
 <div align="right" class="card bg-light"> -->
 <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">

<style>
	 .textlayout
	 {  font-family: serif;
	 	font-style: normal;
	 	font-size: 15px;
	 	font-weight: bold;
	 }

</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-8"></div>
		<div class="container col-sm-6"style="background-color: white" >
			<form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
				<?php
                    if($status==1)
                       // echo "<tr><td style='color:red;'>successfully Resgistration</td></tr>";	
                       header('location:home_page.php');
                        else if($status==0)
                      echo "Unable Resgistration";
                      if($error==1)
                      echo "password and confirm password should be same";
                        ?>	
				<h1 class="text-center">Register Here</h1>
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
					       	   <input  class="form-control" name="state" value="BIHAR" readonly="true">
					       </div>
                    </div>

                    <div class="row">
					       <div class="col-sm-8">Constituency Name</div>
					</div>

					<div class="row">
					       <div class="col-sm-8">
					       	   <input  class="form-control" value="EAST CHAMPARAN" name="constituency" readonly="true">
					       </div>
					</div>

					<div class="row">
					       <div class="col-sm-8">Constituency Segment</div>
					</div>
					<div class="row">
					       <div class="col-sm-8">
					       	   <select name="segment"class="form-control" required="true">
					       	   	  <option>Select Constituency Segment</option>
					       	   	  <option>Chiraia</option>
					       	   	  <option>Dhaka</option>
					       	   	  <option>Govindganj</option>
					       	   	  <option>Harsidhi (SC)</option>
					       	   	  <option>Kalyanpur,Purvi Champaran</option>
					       	   	  <option>Kesaria</option>
					       	   	  <option>Madhuban</option>
					       	   	  <option>Motihari</option>
					       	   	  <option>Narkatiya</option>
					       	   	  <option>Pipra,Purvi Champaran</option>
					       	   	  <option>Sugauli</option>
					       	   	 
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
</body>

</html>