<?php
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body style="background-color: #d1e0e0;">
	<?php
	include("../include/header.php");

	include("../include/connection.php");
	?>
	<style type="text/css">
	.center 
	{
		margin: auto;
		width: 60%;
		padding: 5px;
	}
</style>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="position:fixed; margin-left: -15px; height: 100%;">

				<?php
				 include("sidenav.php");
				?>

			</div>
			<div class="col-md-10" style="margin-top: 20px;  position:fixed; left:230px; height:90%; overflow-y:auto;">
				<div class="center"><h3 class="my-2 text-center" style="color: #5d8989;">ADMIN DASHBOARD</h3><br></div>
				<div class="col-md-12 my-1">
					<div class="row" style="margin-left: 210px;">
					<div class="col-md-3 bg-success mx-2" style="height: 130px;">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-8">
									<?php
									 $ad = mysqli_query($connect,"SELECT * from admin");
									 $num = mysqli_num_rows($ad);
									 ?>
									<h5 class="my-2 text-white" style="font-size: 0.7cm;"><?php echo $num; ?></h5>
									<h5 class="text-white" style="font-size: 0.5cm;">Total</h5>
									<h5 class="text-white" style="font-size: 0.5cm;">Admins</h5>
								</div>
								<div class="col-md-4">
									<a href="Admin.php"><i class="fa fa-address-card fa-3x my-4" style="color: white;"></i></a>
								</div>
							</div>
						</div>
					</div>

						<div class="col-md-3 bg-info mx-2" style="height: 130px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
										<?php
											$doctor = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Approved'");
											$num2 = mysqli_num_rows($doctor);
										?>
										<h5 class="my-2 text-white" style="font-size: 0.7cm;"><?php echo $num2; ?></h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Total</h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Doctors</h5>
									</div>
									<div class="col-md-4">
									<a href="doctor.php"><i class="fa fa-user-md fa-3x my-4" style="color: white;"></i></a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3 bg-warning mx-2" style="height: 130px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">

										<?php
											$p = mysqli_query($connect,"SELECT * FROM patient");
											$pp = mysqli_num_rows($p);
										?>


										<h5 class="my-2 text-white" style="font-size: 0.7cm;"> <?php echo $pp; ?></h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Total</h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Patients</h5>
									</div>
									<div class="col-md-4">
									<a href="patient.php"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></i></a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">

										<?php
											$r = mysqli_query($connect,"SELECT * FROM report");
											$rr = mysqli_num_rows($r);
										?>

										<h5 class="my-2 text-white" style="font-size: 0.7cm;"> <?php echo $rr; ?> </h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Total</h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Queries</h5>
									</div>
									<div class="col-md-4">
									<a href="report.php"><i class="fa fa-flag fa-3x my-4" style="color: white;"></i></a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
										<?php

											$job = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Pending'");

											$num1 = mysqli_num_rows($job);

										?>
										<h5 class="my-2 text-white" style="font-size: 0.7cm;"><?php echo $num1; ?></h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Total</h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Job Requests</h5>
									</div>
									<div class="col-md-4">
									<a href="job_request.php"><i class="fa fa-book-open fa-3x my-4" style="color: white;"></i></a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">

										<?php
											$in = mysqli_query($connect,"SELECT sum(amount_paid) AS profit FROM income");
											$row = mysqli_fetch_array($in);
											$inc = $row['profit'];
										?>

										<h5 class="my-2 text-white" style="font-size: 0.7cm;"> <?php echo $inc; ?> </h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Total</h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Income</h5>
									</div>
									<div class="col-md-4">
									<a href="income.php"><i class="fa fa-money-check-alt fa-3x my-4" style="color: white;"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>		
			</div>
		</div>
 	</div>
</div>
</body>
</html>