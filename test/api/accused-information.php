<?php

$host = "localhost";
$user = "root";
$password ="";
$database = "database";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}


http_response_code(400);

if (isset($_POST['action']))
{
	$action = $_POST['action'];

	if ($action === 'search') {
		if (empty($_POST['caseno'])) {
			echo 'Case Number is required';
			return;
		}

		$caseno = $_POST['caseno'];

		$query = "SELECT * FROM `accused information` WHERE CaseNo = $caseno";

         
		if ($result = mysqli_query($connect, $query))
		{
			$response = [];
			while ($row = mysqli_fetch_assoc($result)) {
		        $response[] = $row;
		    }

		    http_response_code(200);
	    	header('Content-Type: application/json');
		    echo json_encode($response); 

		    return;
		} 
		else {
			echo mysqli_error($connect);
		}
	}
	elseif ($action === 'fetch') {
		if (empty($_POST['accusedid'])) {
			echo 'AccusedId is required';
			return;
		}

		$accusedid = $_POST['accusedid'];

		$query = "SELECT * FROM `accused information` WHERE AccusedID = $accusedid";

         
		if ($result = mysqli_query($connect, $query))
		{
			if ($result->num_rows === 0) {
				echo 'No results found';
			}
			else {
				$response = mysqli_fetch_assoc($result);

			    http_response_code(200);
		    	header('Content-Type: application/json');
			    echo json_encode($response); 

			    return;
			}
		} 
		else {
			echo mysqli_error($connect);
		}
	}
	elseif ($action === 'fetch-all') {
		$query = "SELECT * FROM `accused information`";

         
		if ($result = mysqli_query($connect, $query))
		{
			$response = [];
			while ($row = mysqli_fetch_assoc($result)) {
		        $response[] = $row;
		    }

		    http_response_code(200);
	    	header('Content-Type: application/json');
		    echo json_encode($response); 

		    return;
		} 
		else {
			echo mysqli_error($connect);
		}
	}
}
else {
	echo 'Action is required';
}