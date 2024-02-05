<?php
include("include/connection.php");
$show = "";
if (isset($_POST['apply'])) 
{
	$firstname = $_POST['fname'];
	$surname = $_POST['sname'];
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$password = $_POST['pass'];
	$confirm_password = $_POST['con_pass'];

	$error = array();

	if (empty($firstname)) 
	{
		$error['apply'] = "Enter Firstname";
	}
	elseif (empty($surname)) 
	{
		$error['apply'] = "Enter Surname";
	}
	elseif (empty($username)) 
	{
		$error['apply'] = "Enter Username";
	}
	elseif (empty($email)) 
	{
		$error['apply'] = "Enter Email Address";
	}
	elseif ($gender == "") 
	{
		$error['apply'] = "Select Gender";
	}
	elseif (empty($phone)) 
	{
		$error['apply'] = "Enter Contact Number";
	}
	elseif (empty($password)) 
	{
		$error['apply'] = "Enter Password";
	}
	elseif ($confirm_password != $password) 
	{
		$error['apply'] = "Both The Passwords Do Not Match";
	}

	if (count($error) == 0) 
	{
		$query = "INSERT INTO doctors(firstname,surname,username,email,gender,contact,password,data_reg,status,profile,salary) VALUES ('$firstname','$surname','$username','$email','$gender','$phone','$password',NOW(),'Pending','doctor.jpg','0')";

		$result = mysqli_query($connect,$query);
		$q = "SELECT * FROM doctors WHERE email='$email'";
		$res = mysqli_query($connect,$q);
		$row = mysqli_fetch_array($res);

		if ($res) 
		{
			echo ("<script>alert('Your UserID is ".$row['id']."')</script>");
		}
		else
		{
			echo "<script>alert('Failed To Apply')</script>";
		}
	}
}

if (isset($error['apply']))
{
	$s = $error['apply'];

	$show = "<h5 class='text-center alert alert-danger'>$s</h5>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Apply Now!!</title>
</head>
<body style="background-color: #d1e0e0;">

	<?php
		include("include/header.php");
	?>

	<div class="container-fluid" style="margin-top: 50px; position:fixed; height:90%; overflow-y:auto; width: 100%; margin:auto;">
		<div class="col-md-12">
			<div class="row">
				<div style="width:50%; margin-left:27%; margin-top: 5px;">
					<h4 class="text-center my-4" style="color: #5d8989;">Fill In The Details For Your Application</h4>
						<div>
							<?php
								echo $show;
							?>
						</div>
					<form method="post">
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
						</div><br>
						<div class="form-group">
							<label>Surname</label>
							<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">
						</div><br>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
						</div><br>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
						</div><br>
						<div class="form-group">
							<label>Select Gender</label>
							<select name="gender" class="form-control">
								<option value="">Select Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div><br>
						<div class="form-group">
							<label>Contact Number</label>
							<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Contact Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
						</div><br>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div><br>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
						</div><br>
						<input type="submit" name="apply" value="Apply Now" class="btn btn-success">
						<p style="font-size: 0.35cm; font-style: italic;" class="my-2"> I already have an account <b><a href="doctorlogin.php" style="color: red;" > Click here </a></p></b>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>