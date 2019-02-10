<?php
$host = "localhost";
$user = "root";
$password ="";
$database = "database";

// $BorrowID = "";
$CaseNo = "";
$BorrowersName = "";
$BorrowReason = "";
$DateTimeBorrowed = "";
// $DateTimeReturned = "";
$BorrowStatus = "";
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
    //$posts[0] = $_POST['BorrowID'];
    $posts[1] = $_POST['CaseNo'];
    $posts[2] = $_POST['BorrowersName'];
    $posts[3] = $_POST['BorrowReason'];
    $posts[4] = $_POST['DateTimeBorrowed'];
    //$posts[5] = $_POST['DateTimeReturned'];
    $posts[6] = $_POST['BorrowStatus'];
    $posts[7] = $_POST['ReleasedBy'];
    //$posts[8] = $_POST['ApprovedBy'];

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
    
         $insert_Query = "INSERT INTO `borrow transaction`(`CaseNo`, `BorrowersName`, `BorrowReason`,`DateTimeBorrowed`, `BorrowStatus`,`ReleasedBy`) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[6]','$data[7]')";
        
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
  <h2>Borrow Logs Entry</h2>
  <form action="entryborrowlogs.php" method="post">
          <hr>
          <div class="form-group row">
             <div class="col-xs-4">
                 <label for="caseno">Case Number:</label>
                  <input type="text" class="form-control" id="caseno" name="CaseNo" placeholder="Enter Case Number" value="<?php echo $CaseNo;?>">
               </div>
              </div>
              <hr>
           <div class="form-group row">
               <div class="col-xs-4">
                 <label for="borrowersname">Borrower's Name:</label>
                  <input type="text" class="form-control" id="borrowersname" name="BorrowersName" placeholder="Enter Borrower's Name" value="<?php echo $BorrowersName;?>">
               </div>
          </div>
          <div class="form-group row">
               <div class="col-xs-8">
                 <label for="borrowreason">Reason:</label>
                  <input type="text" class="form-control" id="borrowreason" name="BorrowReason" placeholder="Reason to Borrow" value="<?php echo $BorrowReason;?>">
               </div>
          </div>
          <div class="form-group row">
               <div class="col-xs-4">
                 <label for="datetimeborrowed">Date & Time Borrow:</label>
                  <input type="date" class="form-control" id="datetimeborrowed" name="DateTimeBorrowed" placeholder="Enter Time Borrowed" value="<?php echo $DateTimeBorrowed;?>">
               </div>
               <div class="col-xs-4">
                 <label for="datetimereturend">Date & Time Returned:</label>
                  <input type="date" class="form-control" id="datetimereturned" name="DateTimeReturned" placeholder="Enter Time Borrowed" value="<?php echo $DateTimeReturned;?>" disabled>
               </div>
          </div>
           <div class="form-group row">
               <div class="col-xs-4">
                 <label for="borrowstatus">Borrow Status:</label>
                  <input type="text" class="form-control" id="borrowstatus" name="BorrowStatus" placeholder="" value="<?php echo $BorrowStatus;?>">
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
                  <input type="text" class="form-control" id="approvedby" name="ApprovedBy" placeholder="" value="<?php echo $ApprovedBy;?>" disabled>
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



    
