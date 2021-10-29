<?php
session_start();
if(1)
{
$sess=$_SESSION["username"];
$con=mysqli_connect("localhost","root","","onlinevote");
if(!$con)
die("server could not connected");
$sql="select * from register where email='$sess'";
$rs=mysqli_query($con,$sql);
}
if(isset($_POST["bjp"])){
$value="bjp";}	
elseif(isset($_POST["app"])){
$value="app";
}
elseif(isset($_POST["inc"])){
$value="inc";
}
elseif(isset($_POST["cpi"])){
$value="cpi";
}
elseif(isset($_POST["bsp"])){
$value="bsp";
}
elseif(isset($_POST["ncp"])){
$value="ncp";
}
elseif(isset($_POST["nota"])){
$value="nota";
}
if(isset($value)){
$_SESSION["value"] = $value;
// $s="SELECT * from add_candidate where partyname='".$_SESSION["value"]."'";
// $rp=mysqli_query($con,$s);
// while($row=mysqli_fetch_assoc($rp))
// {
// $partyname=$row["partyname"];
// $countvote=$row["countvote"];

// $sql="UPDATE add_candidate SET countvote='".$countvote."'+1 where partyname='".$partyname."' ";
// $no=mysqli_query($con,$sql);
if($rs!=0)
{
    $otp=rand(11111,99999);
    $sqlque="update register set vote_otp='$otp' where email='$sess'";
    $nor=mysqli_query($con,$sqlque);
    // mysqli_query($con,"insert into register (vote_otp) values('".$otp."') where email='$sess'");
	$subject="otp";
    $msg = "PLEASE verify you are the one to vote ".$otp;
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
        
        header('location:after_vote_otp.php');
	}
	echo $msg;
}
// header("location:sign.php");
else
echo "not voted";
}
// }
// }
// else
// header("location:sign.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Welcome to Aapka Adhikaar</title>
    <!-- <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css"> -->
    <script>
    var bleep = new Audio();
    bleep.src = "Images/censor-beep-01.mp3";
    </script>

    <style>
    body {
        background-image: url('Images/w7.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;


    }

    #profile {
        background-color: rgba(255, 255, 255, 0.85);
        padding: 30px;
     }

    .table {
        background-color: rgb(255, 255, 255, 0.85);

    }

    #c1 {
        padding: 5px 5px;

    }

    #votebtn {
        padding: 7px 30PX;
        font-size: 18px;
        border-radius: 50px;
    }



    input[type=submit]:hover {
        background: #280d9e;
    }

    input[type=submit]:active {
        background: #86a3f3;
    }


    #headerSection {
        padding: 30px;
        color: white;

    }
    </style>
</head>

<body>
    <div>
        <center>
            <div id="headerSection">
                <h1>
                    <b> Online Voting System</b>
                </h1>
            </div>
        </center>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-11">
                            <div id="profile">
                                <!-- <center> <img src="Images/dol.jpg" width="150" height="150"></center><br> -->
                                <!-- <b>Name:</b><br><br>
                                <b>Mobile:</b><br><br>
                                <b>Address:</b><br><br>
                                <b>Marrital Status:</b><br><br>
                                <b>Sex:</b><br><br> -->
                                <?php
                                 while($row=mysqli_fetch_assoc($rs))
                                  {
                                    $fname=$row["fname"];
                                    $midname=$row["midname"];
                                    $lname=$row["lname"];
                                    $adhar=$row["adhar"];
                                    $mblno=$row["mblno"];
                                    $voterid=$row["voterid"];  
                                    $img="image/".$row["img"];
                                    echo "<center><img src='$img' width= 150 height=150></center><br>";
                                    echo '<b>Voter Name:</b>&nbsp'.$fname.'&nbsp'.$midname.'&nbsp'.$lname.' <br>';
                                    echo '<b>Adhar no:</b>&nbsp'.$adhar.'<br>';
                                    echo '<b>Voter no:</b>&nbsp'.$voterid.'<br>';
                                    echo '<b>Mobile no:</b>&nbsp'.$mblno.'<br>';
                                    }
                                    ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-1"></div> -->
            <div class="col-sm-7">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-11">
                            <table class="table text-center table-hover">
                                <form action="<?php $_PHP_SELF ?>" class="shadow-lg p-4" method="POST">

                                    <thead class="thead-light">
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Candidate Name</th>
                                            <th>Party Name</th>
                                            <th>Party Symbol</th>
                                            <th>Aapka Adhikaar</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                    <?php
                                       $value="bjp";
                                      $p="SELECT * from add_candidate where partyname='".$value."'";
                                      $rt=mysqli_query($con,$p);
                                                while($row=mysqli_fetch_assoc($rs))
                                                {
                                                  $fname=$row["fname"];
                                                  $midname=$row["midname"];
                                                  $lname=$row["lname"];
                                                  $adhar=$row["adhar"];
                                                  $mblno=$row["mblno"];
                                                  $voterid=$row["voterid"];  
                                                  $imgparty="admin_dashboard/image/".$row["symbol"];
                                                  $img="image/".$row["img"];
                                                  echo " <td><b>1.</b></td>";
                                                  echo ' <td>BJP</td>';
                                                  echo ' <td><b>Bhartiya janta party</b></td>';
                                                  echo '<td><img src='$imgparty' width=70 height=70></><br>';
                                                  echo '<b>Mobile no:</b>&nbsp'.$mblno.'<br>';
                                                  }
                                                  ?>
                                                   ?>
    
                                       
                                       
                                       
                                        
                                      	      
                                               echo "<td><img src='$imgparty' width=70 height=70></><br>";
                                               }
                                           ?>
                                        <td>
                                            <input class="btn btn-primary" onmousedown="bleep.play()" type="submit"
                                                value="vote" name="bjp" id="votebtn">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>2.</b></td>
                                        <td>inc</td>
                                        <td><b>indian national congress</b></td>
                                        <?php
                                          $value="inc";
                                           $p="SELECT * from add_candidate where partyname='".$value."'";
                                         $rt=mysqli_query($con,$p);
                                            while($row=mysqli_fetch_assoc($rt))
                                              {
                                            	 $imgparty="admin_dashboard/image/".$row["symbol"];
                                                echo "<td><img src='$imgparty' width=70 height=70></><br>";
                                              }
                                            ?>
                                        <td>
                                            <input class="btn btn-primary" onmousedown="bleep.play()" type="submit"
                                                name="inc" value="vote" id="votebtn">

                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td><b>3.</b></td>
                                        <td>Abc</td>
                                        <td><b>JDU</b></td>
                                        <td><img src="Images/cons2.webp" height="60" width="60"></td>
                                        <td>
                                            <form><input class="btn btn-primary" onmousedown="bleep.play()"
                                                    type="submit" name="votebtn" value="vote" id="votebtn">
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>4.</b></td>
                                        <td>Abc</td>
                                        <td><b>BJP</b></td>
                                        <td><img src="Images/constuency.jpg" height="60" width="60"></td>
                                        <td>
                                            <form><input class="btn btn-primary" onmousedown="bleep.play()"
                                                    type="submit" name="votebtn" value="vote" id="votebtn">
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>5.</b></td>
                                        <td>Abc</td>
                                        <td><b>NOTA</b></td>
                                        <td><img src="Images/nota.png" height="60" width="60"></td>
                                        <td>
                                            <form><input class="btn btn-primary" onmousedown="bleep.play()"
                                                    type="submit" name="votebtn" value="vote" id="votebtn">
                                            </form>
                                        </td>
                                    </tr> -->
                                </form>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript" src="js/jquery.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                crossorigin="anonymous"></script>

</body>

</html>