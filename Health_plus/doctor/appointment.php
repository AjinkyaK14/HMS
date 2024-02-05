<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Total Appointments</title>
</head>
<body style="background-color: #d1e0e0;">

	<?php
		include("../include/header.php");
		include("../include/connection.php");
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="position:fixed; margin-left: -15px; height: 100%;">
					
					<?php
						include("sidenav.php");
					?>

				</div>
				<div class="col-md-10" style="margin-top: 50px; position:fixed; left:230px; height:90%; overflow-y:auto;">
					<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
					<h5 class="text-center" style="color: #5d8989;">TOTAL APPOINTMENTS</h5><br>

					<?php
						$query = "SELECT * FROM appointment WHERE status='Pending'";
						$res = mysqli_query($connect,$query);

						$output = "";

						$output .= "
							<table class='table table-bordered shadow' style='border-radius: 10px; background-color: white; '>
								<tr>
									<th class='text-center'>Firstname</th>
									<th class='text-center'>Surname</th>
									<th class='text-center'>Gender</th>
									<th class='text-center'>Contact Number</th>
									<th class='text-center'>Action</th>
								</tr>";
						if (mysqli_num_rows($res) < 1) 
						{
							$output .="
								<tr>
									<td colspan='5' class='text-center'>No New Appointments</td>
								</tr>";
						}
						while ($row = mysqli_fetch_array($res))
						{
							$output .="
								<tr>
									<td class='text-center'>".$row['firstname']."</td>
									<td class='text-center'>".$row['surname']."</td>
									<td class='text-center'>".$row['gender']."</td>
									<td class='text-center'>".$row['contact']."</td>
									<td class='text-center'>
										<a href='discharge.php?id=".$row['id']."'>
										<button class='btn btn-info' style='display: block; margin: auto;'>Check</button>
										</a>
									</td>";
						}
						$output .= "
								</tr>
							</table>";
						echo $output;
					?>
					</div>
					<div class="col-md-3"></div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>