<?php


$host = "localhost";
$user = "root";
$password ="";
$database = "database";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}


$accusedId = $_GET['accused_id'];
$accusedInfo = null;


$query = "SELECT * FROM `accused information` WHERE AccusedID = $accusedId";

if ($result = mysqli_query($connect, $query))
{
	$accusedInfo = mysqli_fetch_assoc($result);
} 
else {
	echo mysqli_error($connect);
}


$caseInfo = null;
$query = "SELECT * FROM `case information` WHERE CaseNo = {$accusedInfo['CaseNo']}";

if ($result = mysqli_query($connect, $query))
{
	$caseInfo = mysqli_fetch_assoc($result);
} 
else {
	echo mysqli_error($connect);
}

?>

<html>
<header>
<style>
	* { font-family: monospace; }
	body {
		margin: 0.25in 0.5in;
	}

	.table td,th {
		border: 1px solid black;
	}

	.table th {
		text-align: center;
	}
</style>
</header>
<body>

	<div style="text-align: center;">
		Regional Trial Court<br>
		Branch 96, Mandaue City, Cebu<br>
	</div>

	<br>

	<table>
		<tr>
			<td style="min-width: 64px">Last Name:</td>
			<td style="text-transform: uppercase;">
				<?php echo $accusedInfo['AccusedLname']; ?>
			</td>
		</tr>
		<tr>
			<td style="min-width: 64px">First Name:</td>
			<td style="text-transform: uppercase;">
				<?php echo $accusedInfo['AccusedFname']; ?>
			</td>
		</tr>
		<tr>
			<td style="min-width: 64px">Middle Name:</td>
			<td style="text-transform: uppercase;">
				<?php echo $accusedInfo['AccusedMi']; ?>
			</td>
		</tr>
		<tr>
			<td style="min-width: 64px">Alias Name:</td>
			<td style="text-transform: uppercase;">
				<?php echo $accusedInfo['AccusedAlias']; ?>
			</td>
		</tr>
		<tr>
			<td style="min-width: 64px">Present Status:</td>
			<td style="text-transform: uppercase;">
				<?php echo $accusedInfo['AccusedStatus']; ?>
			</td>
		</tr>
	</table>
	<hr>


	<table class="table" style="border-collapse: collapse; width: 100%">
		<tr>
			<th>&nbsp;</th>
			<th>Case Number</th>
			<th>Case Title</th>
			<th>Date Receive</th>
			<th>Case Status</th>
		</tr>

		<tr>
			<td>1</td>
			<td><?php echo $caseInfo['CaseNo']; ?></td>
			<td><?php echo $caseInfo['CaseTitle']; ?></td>
			<td><?php echo $caseInfo['DateReceived']; ?></td>
			<td><?php echo $caseInfo['CaseStatus']; ?></td>
		</tr>
	</table>
<script>
	window.print();
</script>
</body>
</html>

