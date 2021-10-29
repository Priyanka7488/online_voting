<html>

<head>
    <title>ONLINE VOTING</title>
    <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"href="stylecs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    
    .login-form {
        width: 340px;
        margin: 50px auto;
    }

    .login-form h2 {
        margin: 0 0 15px;
    }

    .form-control,
    .btn {
        min-height: 38px;
        border-radius: 2px;
    }

    /* .btn {        
        font-size: 15px;
        font-weight: bold;
    } */
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
font-size:20px;
font-family: serif;
font-style: normal;
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

    /* .navbar ul {
        overflow: auto;
    }

    .navbar li {
        float: left;
        list-style: none;
        margin-left: 13px;
        margin-right: 20px;
        text-align: center;
        margin-bottom: 1.5px;
    }

    .navbar li a {
        padding: 3px 3px;
        text-decoration: none;
        text-align: center;
        color: floralwhite;
    }

    .navbar li a:hover {
        color: rgba(2, 230, 247, 0.651);
        border-radius: 3px;

    } */


    .textlayout {
        font-family: serif;
        font-style: normal;
        font-size: 15px;
        font-weight: bold;
    }
    </style>
</head>

<body>

    <div class="background">
        <img src="images/ELECTION_LOGO.jpg" height="220" width="100%" />
       
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
                <li><a href="contactus.php">Contact us</a></li>
               
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
                    <h2 class="text-center" style="background-color: ">Sign In Here</h2>
                        <div class="col-sm-12 login-form" style="background-color: ">
                            <form method="post">
                                <!-- <h2 class="text-center">Log in</h2> -->
                                <div class="form-group first_box">
                                    <input type="text" id="email" class="form-control" placeholder="Enter Email"
                                        required="required"><br>
                                    <span id="email_error" class="field_error"></span>
                                    <span id="email_error2" class="field_error"></span>
                                </div>
                                <div class="form-group first_box">
                                    <button type="button" class="btn btn-primary btn-block" onclick="send_otp()">Send
                                        OTP</button>
                                </div>
                                <div class="form-group second_box">
                                    <input type="text" id="otp" class="form-control" placeholder="Enter OTP"
                                        required="required"><br>
                                    <span id="otp_error" class="field_error"></span>
                                </div>
                                <div class="form-group second_box">
                                    <button type="button" class="btn btn-primary btn-block"
                                        onclick="submit_otp()">Submit OTP</button>
                                </div>
                                <div>

                                    For New Users<a href="home_page.php">Register here</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </ul>
        </div>
        </section>
    </div>
    </div>
    </div>
    <footer>
        <div class="foot" style="background-color: rgb(127, 184, 250); text-align: center;">&COPY;2021 by MCE Motihari
        </div>
    </footer>
    <script>
    _

    function send_otp() {
        var email = jQuery('#email').val();
        jQuery.ajax({
            url: 'send_otp.php',
            type: 'post',
            data: 'email=' + email,
            success: function(result) {
                if (result == 'yes') {
                    jQuery('.second_box').show();
                    jQuery('.first_box').hide();
                }
                 if (result == 'not_exist') {
                    jQuery('#email_error').html('Please enter valid email');
                }
                if (result == 'not_exist2') {
                    jQuery('#email_error2').html('already voted');
                }
            }
        });
    }

    function submit_otp() {
        var otp = jQuery('#otp').val();
        jQuery.ajax({
            url: 'check_otp.php',
            type: 'post',
            data: 'otp=' + otp,
            success: function(result) {
                if (result == 'yes') {
                    window.location = 'intro.html'
                }
                if (result == 'not_exist') {
                    jQuery('#otp_error').html('Please enter valid otp');
                }
            }
        });
    }
    </script>
    <style>
    .second_box {
        display: none;
    }

    .field_error {
        color: red;
    }
    </style>
</body>

</html>