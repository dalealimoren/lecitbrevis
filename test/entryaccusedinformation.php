<?php
$host = "localhost";
$user = "root";
$password ="";
$database = "database";

$AccusedID = "";
$CaseNo = "";
$AccusedLname = "";
$AccusedFname = "";
$AccusedMi = "";
$AccusedAlias = "";
$AccusedDOB = "";
$AccusedGender = "";
$AccusedStatus = "";
$AccusedAge = "";
$AccusedContactNo = "";
$AccusedAddress = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    // $posts[0] = $_POST['AccusedID'];
    $posts[1] = $_POST['CaseNo'];
    $posts[2] = $_POST['AccusedLname'];
    $posts[3] = $_POST['AccusedFname'];
    $posts[4] = $_POST['AccusedMi'];
    $posts[5] = $_POST['AccusedAlias'];
    $posts[6] = $_POST['AccusedDOB'];
    $posts[7] = $_POST['AccusedGender'];
    $posts[8] = $_POST['AccusedStatus'];
    $posts[9] = $_POST['AccusedAge'];
    $posts[10] = $_POST['AccusedContactNo'];
    $posts[11] = $_POST['AccusedAddress'];
    
    return $posts;
}

// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();

    // foreach ($data as $key => $value) {
    //   if (empty($value)) {
    //     $errorMsg .= "$key is empty<br>";
    //   }
    // }

    // if(empty($errorMsg)) {

         $insert_Query = "INSERT INTO `accused information`(`CaseNo`, `AccusedLname`,`AccusedFname`,`AccusedMi`,`AccusedAlias`,`AccusedDOB`,`AccusedGender`,`AccusedStatus`,`AccusedAge`,`AccusedContactNo`,`AccusedAddress`) VALUES ('$data[1]', '$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]')";

      try{
          
          $insert_Result = mysqli_query($connect, $insert_Query);
         
          if($insert_Result)
          {
              if(mysqli_affected_rows($connect) > 0)
              {
                  echo 'Data Inserted';
              }else{
                  echo 'Data Not Inserted';
              }
          }
      } catch (Exception $ex) {
          echo 'Error Insert '.$ex->getMessage();
      }
      
    }
// }
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<style>
  .navbar {
    position: fixed;
    width: 100%;
    margin-bottom: 0;
    background-color: #993300;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
}
.navbar li a, .navbar .navbar-brand {
    color: #fff !important;
}
.navbar-nav li a:hover, .navbar-nav li.active a {
    color: #993300 !important;
    background-color: #fff !important;
}
.navbar-nav li.active{
  color:white;
  padding-top:18px;
  padding-left: 20px;
}
.navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
}
.navbar-nav > li > .dropdown-menu { 
    background-color: #993300;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  padding-top: 40px;
}
.notification: {
  padding-top: 70px;
}

section{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 70px;
  color: black;
  font-style: normal;    
}
hr { 
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
}
input[type=submit] {
  background-color: #993300;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 4px;
}
input[type=submit]:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

</style>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Licit Brevis</a>
    </div>
    
    <?php  if (isset($_SESSION['username'])) : ?>
    <ul class="nav navbar-nav">
      <li class="active">
      Welcome <span class="glyphicon glyphicon-user"></span> <strong><?php echo $_SESSION['username']; ?></strong>
      <span class="glyphicon glyphicon-globe logo"></span>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
         <li style="background-color: black" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Entry <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="entrycaseinformation.php">Case Information</a></li>
          <li><a href="entryaccusedinformation.php">Accused Information</a></li>
          <li><a href="entryarraignment.php">Arraignment & Pre-Trial</a></li>
          <li><a href="entryborrowlogs.php">Borrow Logs</a></li>
        </ul>
      </li>
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Update <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="updatecaseinformation.php">Case Information</a></li>
          <li><a href="updateaccusedinformation.php">Accused Information</a></li>
          <li><a href="updatearraignment.php">Arraignment & Pre-Trial</a></li>
          <li><a href="updateborrowlogs.php">Borrow Logs</a></li>
         
        </ul>
      </li>
        <li><a href="search.php">Search</a></li>
         <li><a href="schedule.php">Schedule</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Reports <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="reports.php">Quarterly Report</a></li>
          <li><a href="borrowreports.php">Borrow Logs</a></li>
        </ul>
      </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon glyphicon-cog"></span> Settings <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Tools</a></li>
          <li><a href="#">Account Information</a></li>
          <li><a href="#">Station Information</a></li>
        </ul>
      </li>
      <li><a href="home.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
 <?php endif ?>

<section>
  <h2>Accused Information Entry</h2>
  <hr>
  <form action="entryaccusedinformation.php" method="post">
     <div class="form-group row">
               <div class="col-xs-3">
                 <label for="caseno">Case Number:</label>
                  <input type="text" class="form-control input-sm" id="caseno" name="CaseNo" placeholder="Enter Case Number" value="<?php echo $CaseNo;?>">
               </div>
          </div>
          <hr>
     <div class="form-group row">
               <div class="col-xs-8">
                 <label for="lastname">Last Name:</label>
                  <input type="text" class="form-control input-sm" id="lastname" name="AccusedLname" placeholder="Enter Last Name" value="<?php echo $AccusedLname;?>">
               </div>
          </div>
           <div class="form-group row">
               <div class="col-xs-8">
                 <label for="firstname">First Name:</label>
                  <input type="text" class="form-control input-sm" id="firstname" name="AccusedFname" placeholder="Enter First Name" value="<?php echo $AccusedFname;?>">
               </div>
          </div>
           <div class="form-group row">
               <div class="col-xs-8">
                 <label for="middlename">Middle Name:</label>
                  <input type="text" class="form-control input-sm" id="middlename" name="AccusedMi" placeholder="Enter Middle Name" value="<?php echo $AccusedMi;?>">
               </div>
          </div>
           <div class="form-group row">
               <div class="col-xs-8">
                 <label for="aliasname">Alias Name:</label>
                  <input type="text" class="form-control input-sm" id="aliasname" name="AccusedAlias" placeholder="Enter Alias Name" value="<?php echo $AccusedAlias;?>">
               </div>
          </div>
           <div class="form-group row">
               <div class="col-xs-4">
                 <label for="dob">Date of Birth:</label>
                  <input type="date" class="form-control input-sm" id="dob" name="AccusedDOB" placeholder="Enter Date of Birth" value="<?php echo $AccusedDOB;?>">
               </div>
                <div class="col-xs-4">
                 <label for="gender">Gender:</label>
                  <input type="text" class="form-control input-sm" id="gender" name="AccusedGender" placeholder="Enter Gender" value="<?php echo $AccusedGender;?>">
               </div>
          </div>
           <div class="form-group row">
               <div class="col-xs-4">
                 <label for="status">Present Status:</label>
                  <input type="text" class="form-control input-sm" id="status" name="AccusedStatus" placeholder="Enter Status" value="<?php echo $AccusedStatus;?>">
               </div>
                <div class="col-xs-4">
                 <label for="age">Age in the time of Commission of Crime:</label>
                  <input type="number" class="form-control input-sm" id="age" name="AccusedAge" placeholder="Enter Age" value="<?php echo $AccusedAge;?>">
               </div>
          </div>
           <div class="form-group row">
               <div class="col-xs-4">
                 <label for="contactno">Contact Number:</label>
                  <input type="number" class="form-control input-sm" id="contactno" name="AccusedContactNo" placeholder="Enter Contact Number" value="<?php echo $AccusedContactNo;?>">
               </div>
             </div>
               <div class="form-group row">
               <div class="col-xs-8">
                 <label for="address">Address:</label>
                  <input type="text" class="form-control input-sm" id="address" name="AccusedAddress" placeholder="Enter Address" value="<?php echo $AccusedAddress;?>">
               </div>
             </div>
             <hr>
              <input type="submit" name="insert" value="Add Accused">
              <input type="submit" name="insert" value="Clear">
</form>
</section>
</body>
</html>