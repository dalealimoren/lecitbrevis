<?php
$host = "localhost";
$user = "root";
$password ="";
$database = "database";

$BorrowID = "";
$CaseNo = "";
$BorrowReason = "";
$DateTimeBorrowed = "";
$ReleasedBy = "";
$ApprovedBy = "";

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
    $posts[1] = $_POST['BorrowID'];
    $posts[2] = $_POST['CaseNo'];
    $posts[3] = $_POST['BorrowReason'];
    $posts[4] = $_POST['DateTimeBorrowed'];
    $posts[5] = $_POST['ReleasedBy'];
    $posts[6] = $_POST['ApprovedBy'];

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
    
         $insert_Query1 = "INSERT INTO `borrow header transaction`(`BorrowID`, `CaseNo`, `BorrowReason`,`DateTimeBorrowed`,`ReleasedBy`,`ApprovedBy`) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
        
      try{
          $insert_Result = mysqli_query($connect, $insert_Query1);
          
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
. button {
  background-color: #993300; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 30px;
  width: 60px;
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
          <li><a href="entrycaserecords.php">Case Records</a></li>
          <!-- <li><a href="#">Case Summary</a></li>
          <li><a href="#">Report on Drugs Cases</a></li>
          <li><a href="#">List of Cases</a></li> -->
          <li><a href="entryborrowlogs.php">Borrow Logs</a></li>
        </ul>
      </li>
       <li style="background-color: black"  class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Update <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="updatecaserecords.php">Case Records</a></li>
          <li><a href="updateborrowlogs.php">Borrow Logs</a></li>
         <!--  <li><a href="#">Report on Drugs Cases</a></li>
          <li><a href="#">List of Cases</a></li> -->
          
          <!-- <li><a href="update.php">Logs</a></li> -->
        </ul>
      </li>
        <!-- <li><a href="ad.php">Update</a></li> -->
        <li><a href="search.php">Search</a></li>
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
  <h2>Borrow Logs</h2>
  <form action="entryborrowlogs.php" method="post">
          <hr>
          <div class="form-group row">
               <div class="col-xs-4">
                 <label for="borrowid">Borrow ID:</label>
                  <input type="number" class="form-control" id="borrowid" name="BorrowID" placeholder="Enter Borrow ID" value="<?php echo $BorrowID;?>">
               </div>
               <div class="col-xs-4">
                 <label for="caseno">Case No:</label>
                  <input type="number" class="form-control" id="caseno" name="CaseNo" placeholder="Enter Case Number" value="<?php echo $CaseNo;?>">
               </div>
          </div>
          <div class="form-group row">
               <div class="col-xs-8">
                 <label for="borrowreason">Reason:</label>
                  <input type="text" class="form-control" id="borrowreason" name="BorrowReason" placeholder="Enter Reason" value="<?php echo $BorrowReason;?>">
               </div>
          </div>
          <div class="form-group row">
               <div class="col-xs-4">
                 <label for="datetimeborrowed">Date & Time Borrow:</label>
                  <input type="date" class="form-control" id="datetimeborrowed" name="DateTimeBorrowed" placeholder="Enter Time Borrowed" value="<?php echo $DateTimeBorrowed;?>">
               </div>
          </div>
          <br><br><br><br>
          <div class="form-group row">
             <div class="col-xs-4">
                 <label for="releaseby">Released By:</label>
                  <input type="text" class="form-control" id="releaseby" name="ReleasedBy" placeholder="" value="<?php echo $ReleasedBy;?>">
               </div>
               <div class="col-xs-4">
                 <label for="approvedby">Approved By:</label>
                  <input type="text" class="form-control" id="approvedby" name="ApprovedBy" placeholder="" value="<?php echo $ApprovedBy;?>">
               </div>
             </div>
            <hr>

            <input type="submit" name="insert" value="Save">
            <input type="submit" name="insert" value="Clear">

</section>





<!-- <footer>
   <p>All Rights Reserve 2018</p> 
</footer> -->






</body>
</html>



    
