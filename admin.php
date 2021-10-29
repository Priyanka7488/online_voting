<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
crossorigin="anonymous">
<title>action</title>
<style>
body{
padding: 20px;
}
.parent-div{
width:400px;
border:2px solid purple;
margin: 0 auto;
border-radius: 10px;
background-color: honeydew;
height:550px;
float: right;
}
section{
width:30%;
float:left;
height:530px;
background-color:orange;
border-radius: 10px;
border:2px solid purple;
}
.block{
display:block;
width:70%;
border:none;
background-color: mediumaquamarine;
color: black;
padding: 8px 14px;
font-size: 16px;
cursor:pointer;
text-align:center;
}
.block:hover{
background-color: blue;
color: blueviolet;
}
</style>
</head>
<body>
<div class="main" align="center" >
<section>
<h2 style="background-color: aqua;">
<h4 style="background-color:magenta;" class="test">WELCOME TO
ADMIN</h4>
<button class="block">RESET VOTING</button><br>
<button class="block">ADD CANDIDATES</button><br>
<button class="block">UPDATE/DELETE CANDIDATES</button><br>
<button class="block">ADD A VOTER</button><br>
<button class="block">UPDATE A VOTER</button><br>
<h2 align="center"><button class="btn btn-danger">logout</button>
</h2>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>
</body>
</html>
