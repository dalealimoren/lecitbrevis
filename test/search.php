<?php
$host = "localhost";
$user = "root";
$password ="";
$database = "database";

$AccusedID = "";
$AccusedLname = "";
$AccusedFname = "";
$AccusedMi = "";
$AccusedAlias = "";
$AccusedStatus = "";
$AccusedGender = "";
$AccusedDOB = "";
$AccusedAge = "";

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
    $posts[0] = $_POST['AccusedID'];
    $posts[1] = $_POST['AccusedLname'];
    $posts[2] = $_POST['AccusedFname'];
    $posts[3] = $_POST['AccusedMi'];
    $posts[4] = $_POST['AccusedAlias'];
    $posts[5] = $_POST['AccusedStatus'];
    $posts[6] = $_POST['AccusedGender'];
    // $posts[7] = $_POST['AccusedDOB'];
    // $posts[8] = $_POST['AccusedAge'];


    return $posts;
}


// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM `accused information` WHERE AccusedID = $data[0]";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $AccusedID = $row['AccusedID'];
                $AccusedLname = $row['AccusedLname'];
                $AccusedFname = $row['AccusedFname'];
                $AccusedMi = $row['AccusedMi'];
                $AccusedAlias = $row['AccusedAlias'];
                $AccusedStatus = $row['AccusedStatus'];
                // $AccusedDOB = $row['AccusedDOB'];
                // $AccusedAge = $row['AccusedAge'];
                $AccusedGender = $row['AccusedGender'];
               
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}


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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
/*h3
{
  text-align: center;
}*/

section{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 70px;
  /*font-family: "Comic Sans MS";*/
  color: black;
  font-style: normal;    
}
/*h1 {
  text-shadow: 3px 2px black;
}*/
hr { 
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  /*border-width: 5px;*/
} 

/*footer{

    background-color: #993300;
    padding: 10px;
    text-align: center;
    color: white;
    
}*/
p.normal {
  /*font-style: bold;*/
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
        <!-- <li><a href="ucr.php">Update Case Records</a></li> -->
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Entry <span class="caret"></span></a>
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
        <!-- <li><a href="ad.php">Update</a></li> -->
        <li style="background-color: black"><a href="search.php">Search</a></li>
         <li><a href="schedule.php">Schedule</a></li>
        <!-- <li><a href="log.php">Entry Logs</a></li> -->
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Reports <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="reports.php">Quarterly Report</a></li>
          <li><a href="borrowreports.php">Borrow Logs</a></li>
          <!-- <li><a href="#">Case Summary</a></li>
          <li><a href="#">Report on Drugs Cases</a></li>
          <li><a href="#">List of Cases</a></li> -->
          <!-- <li><a href="#">Statistics</a></li> -->
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
   <h2>Search Accused</h2>
  <form action="search.php" method="post">
     <div class="form-group row">
      <div class="col-xs-3">
      <label for="number">Accused ID:</label>
       <input type="number" class="form-control" id="number" name="AccusedID" placeholder="Enter Accused ID" value="<?php echo $AccusedID;?>">
     </div>
     <div class="col-xs-3">
      <label for="number"></label>
        <input type="submit" name="search" value="Search">
     </div>
   </div>
   <hr>
   <div class="form-group row">
      <div class="col-xs-5">
      <label for="number">Last Name:</label>
       <input type="text" class="form-control" id="number" name="AccusedLname" placeholder="Enter Last Name" value="<?php echo $AccusedLname;?>">
     </div>
   </div>
   <div class="form-group row">
      <div class="col-xs-5">
      <label for="firstname">First Name:</label>
       <input type="text" class="form-control" id="firstname" name="AccusedFname" placeholder="Enter First Name" value="<?php echo $AccusedFname;?>">
     </div>
   </div>
   <div class="form-group row">
      <div class="col-xs-3">
      <label for="middlename">Middle Name:</label>
       <input type="text" class="form-control" id="middlename" name="AccusedMi" placeholder="Enter Middle Name" value="<?php echo $AccusedMi;?>">
     </div>
   </div>
   <div class="form-group row">
      <div class="col-xs-3">
      <label for="alias">Alias:</label>
       <input type="text" class="form-control" id="alias" name="AccusedAlias" placeholder="Enter Alias Name" value="<?php echo $AccusedAlias;?>">
     </div>
   </div>
   <div class="form-group row">
      <div class="col-xs-3">
      <label for="status">Status:</label>
       <input type="text" class="form-control" id="status" name="AccusedStatus" placeholder="Enter Status" value="<?php echo $AccusedStatus;?>">
     </div>
   </div>
   <div class="form-group row">
      <div class="col-xs-3">
      <label for="gender">Gender:</label>
       <input type="text" class="form-control" id="gender" name="AccusedGender" placeholder="Enter Gender" value="<?php echo $AccusedGender;?>">
     </div>
   </div>
   <hr>
                <input type="submit" name="insert" value="View Cases of Accused">
                <input type="submit" name="insert" value="Clear">
 </form>
 </section>




<!-- <footer>
   <p>All Rights Reserve 2018</p> 
</footer> -->






</body>
</html>



    
 