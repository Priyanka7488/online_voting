 <?php

	$conn = mysqli_connect("localhost","root","","onlinevote") or die("Connection failed");

	if($_POST['type'] == "" ){
		$sql = "SELECT * FROM state_id";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['cid']}'>{$row['cname']}</option>";
		}
	}else if($_POST['type'] == "stateData"){

		$sql = "SELECT * FROM district_id WHERE state_id = {$_POST['id']}";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['did']}'>{$row['dname']}</option>";
		}
	}else if($_POST['type'] == "districtData"){

		$sql = "SELECT * FROM segment_id WHERE district = {$_POST['id']}";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['seg_id']}'>{$row['signame']}</option>";
		}
	}
	

	echo $str;
 ?>
