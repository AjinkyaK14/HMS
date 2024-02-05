<?php

include("../include/connection.php");

$query = "SELECT * FROM doctors WHERE status = 'Pending' ORDER BY data_reg ASC";
$res = mysqli_query($connect,$query);


$output = "";

$output .="
	<table class='table table-bordered' style='border-radius: 10px; background-color: white; '>
		<tr>
			<th class='text-center'>ID</th>
			<th class='text-center'>Firstname</th>
			<th class='text-center'>Surname</th>
			<th class='text-center'>Username</th>
			<th class='text-center'>Email</th>
			<th class='text-center'>Gender</th>
			<th class='text-center'>Contact Number</th>
			<th class='text-center'>Date Registered</th>
			<th class='text-center'>Action</th>
";

if (mysqli_num_rows($res) < 1)
{
	$output .= "
		<tr>
		<td colspan='9' class='text-center'>No Job Requests Yet.</td>
		</tr>
	";
}

while ($row = mysqli_fetch_array($res)) 
{
	$output .="
		<tr>
		<td>".$row['id']."</td>
		<td>".$row['firstname']."</td>
		<td>".$row['surname']."</td>
		<td>".$row['username']."</td>
		<td>".$row['email']."</td>
		<td>".$row['gender']."</td>
		<td>".$row['contact']."</td>
		<td>".$row['data_reg']."</td>
		<td>
			<div class='col-md-12'>
				<div class='row'>
					<div class='col-md-6'>
						<button id='".$row['id']."' class='btn btn-success approve'> Approve </button>
					</div>
					<div class='col-md-6'>
						<button id='".$row['id']."' class='btn btn-danger reject'> Reject </button>
					</div>
				</div
			</div>
		</td>
	";
}

$output .= "
		</tr>
	</table>
";

echo $output;
?>