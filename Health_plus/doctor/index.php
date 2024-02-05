<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor's Dashboard</title>
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
					include("../doctor/sidenav.php");
					?>

				</div>
				<div class="col-md-10" style="margin-top: 30px; position:fixed; left:230px; height:90%; overflow-y:auto;">
					<!--<div class="container-fluid">-->
						<div class="center"><h3 class="text-center my-2" style="color: #5d8989;"> DOCTOR DASHBOARD</h3><br></div>
						<div class="row" style="margin-left: 210px;">
							<div class="col-md-3 my-2 bg-info mx-2" style="height: 120px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<h5 class="my text-center" style="margin-top: 40px; font-size: 0.55cm;">MY PROFILE</h5>
										</div>
										<div class="col-md-4">
											<a href="profile.php"><i class="fa fa-user-circle fa-3x" style="color: white; margin-top: 30px;"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 my-2 bg-warning mx-2" style="height: 120px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">

											<?php
												$p = mysqli_query($connect,"SELECT * FROM patient");
												$pp = mysqli_num_rows($p);
											?>

											<h5 class="my" style="font-size: 30px; margin-top: 10px; margin-left: 10px; margin-bottom: 13px; font-size: 0.65cm"> <?php echo $pp; ?> </h5>
											<h5 class="my" style="margin-left: 10px; font-size: 0.5cm">Total</h5>
											<h5 class="my" style="margin-left: 10px; font-size: 0.5cm">Patients</h5>
										</div>
										<div class="col-md-4">
											<a href="patient.php"><i class="fa fa-procedures fa-3x" style="color: white; margin-top: 30px;"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 my-2 bg-success mx-2" style="height: 120px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">

											<?php
												$app = mysqli_query($connect,"SELECT * FROM appointment WHERE status='Pending'");
												$appp = mysqli_num_rows($app);
											?>

											<h5 class="my" style="font-size: 30px; margin-top: 10px; margin-bottom: 13px; margin-left: 10px; font-size: 0.65cm"> <?php echo $appp; ?></h5>
											<h5 class="my" style="margin-left: 10px; font-size: 0.5cm">Total</h5>
											<h5 class="my" style="margin-left: 10px; font-size: 0.5cm">Appointments</h5>
										</div>
										<div class="col-md-4">
											<a href="appointment.php"><i class="fa fa-calendar fa-3x" style="color: white; margin-top: 30px;"></i></a>
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