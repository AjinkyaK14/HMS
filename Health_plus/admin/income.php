<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Total Income</title>
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
					<div class="col-md-2"></div>
					<div class="col-md-8">	
					<h5 class="text-center" style="color: #5d8989;">TOTAL INCOME OF THE HOSPITAL</h5><br>

					<?php
						$query = "SELECT * FROM income";
						$res = mysqli_query($connect,$query);
						$output = "";

						$output .="
							<table class='table table-bordered shadow' style='border-radius: 10px; background-color: white;'>
								<tr>
									<th class='text-center'>ID</th>
									<th class='text-center'>Doctor</th>
									<th class='text-center'>Patient</th>
									<th class='text-center'>Date Discharged</th>
									<th class='text-center'>Fees</th>
								</tr>";
						if (mysqli_num_rows($res) < 1) 
						{
							$output .= "
								<tr>
									<td colspan='5' class='text-center'>No Patients Discharged Yet.</td>
								</tr>";
						}
						while($row = mysqli_fetch_array($res))
						{
							$output .= "
								<tr>
									<td class='text-center'>".$row['id']."</td>
									<td class='text-center'>".$row['doctor']."</td>
									<td class='text-center'>".$row['patient']."</td>
									<td class='text-center'>".$row['date_discharge']."</td>
									<td class='text-center'>".$row['amount_paid']."</td>";
						}
						$output .= "
							</tr>
						</table>";
						echo $output;
					?>
					<div class="col-md-2"></div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>