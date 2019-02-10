<?php
$host = "localhost";
$user = "root";
$password ="";
$database = "database";

$CaseNo = "";
$AccusedStatus = "";
$DateofDetention = "";
$DateofArrest = "";
$DateofBail = "";
$DateofVoluntarySurrender = "";
$PlaceofDetention = "";
$DateofReleased = "";
$ReasonforRelease = "";

$InitialSettingDate = "";
$Plea = "";
$ActualArraignmentDate = "";
$PleaBargainDate = "";
$PreTrialDate = "";
$DateRevived = "";
$PromulgationDate = "";
$DateArchived = "";

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
    $posts[1] = $_POST['CaseNo'];
    $posts[2] = $_POST['AccusedStatus'];
    $posts[3] = $_POST['DateofDetention'];
    $posts[4] = $_POST['DateofArrest'];
    $posts[5] = $_POST['DateofBail'];
    $posts[6] = $_POST['DateofVoluntarySurrender'];
    $posts[7] = $_POST['PlaceofDetention'];
    $posts[8] = $_POST['DateofReleased'];
    $posts[9] = $_POST['ReasonforRelease'];

    $posts[10] = $_POST['InitialSettingDate'];
    $posts[11] = $_POST['Plea'];
    $posts[12] = $_POST['ActualArraignmentDate'];
    $posts[13] = $_POST['PleaBargainDate'];
    $posts[14] = $_POST['PreTrialDate'];
    $posts[15] = $_POST['DateRevived'];
    $posts[16] = $_POST['PromulgationDate'];
    $posts[17] = $_POST['DateArchived'];
    

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

          $insert_Query = "INSERT INTO `arraignment pre-trial`(`CaseNo`, `AccusedStatus`,`DateofDetention`,`DateofArrest`,`DateofBail`,`DateofVoluntarySurrender`,`PlaceofDetention`,`DateofReleased`,`ReasonforRelease`,`InitialSettingDate`,`Plea`,`ActualArraignmentDate`,`PleaBargainDate`,`PreTrialDate`,`DateRevived`,`PromulgationDate`,`DateArchived`) VALUES ('$data[1]', '$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]', '$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]','$data[16]','$data[17]')";

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
  <h2>Arraignment & Pre-Trial Entry</h2>
  <hr>
  <form action="entryarraignment.php" method="post">
     <div class="form-group row">
               <div class="col-xs-3">
                 <label for="caseno">Case Number:</label>
                  <input type="text" class="form-control input-sm" id="caseno" name="CaseNo" placeholder="Enter Case Number" value="<?php echo $CaseNo;?>">
               </div>
          </div>
          <hr>
    <div class="form-group row">
               <div class="col-xs-4">
                 <label for="statuscase">Status for this Case:</label>
                  <input type="text" class="form-control input-sm" id="statuscase" name="AccusedStatus" placeholder="Enter Status for this Case" value="<?php echo $AccusedStatus;?>">
               </div>
             </div>
              <div class="form-group row">
               <div class="col-xs-4">
                 <label for="detentiondate">Date of Detention:</label>
                  <input type="date" class="form-control input-sm" id="detentiondate" name="DateofDetention" placeholder="" value="<?php echo $DateofDetention;?>">
               </div>
               <div class="col-xs-4">
                 <label for="arrestdate">Date of Arrest:</label>
                  <input type="date" class="form-control input-sm" id="arrestdate" name="DateofArrest" placeholder="" value="<?php echo $DateofArrest;?>">
               </div>
             </div>
               <div class="form-group row">
               <div class="col-xs-4">
                 <label for="datebail">Date of Bail:</label>
                  <input type="date" class="form-control input-sm" id="datebail" name="DateofBail" placeholder="" value="<?php echo $DateofBail;?>">
               </div>
               <div class="col-xs-4">
                 <label for="datesurrender">Date of Voluntary Surrender:</label>
                  <input type="date" class="form-control input-sm" id="datesurrender" name="DateofVoluntarySurrender" placeholder="" value="<?php echo $DateofVoluntarySurrender;?>">
               </div>
             </div>
              <div class="form-group row">
               <div class="col-xs-4">
                 <label for="detentionplace">Place of Detention:</label>
                  <input type="text" class="form-control input-sm" id="detentionplace" name="PlaceofDetention" placeholder="Enter Detention Place" value="<?php echo $PlaceofDetention;?>">
               </div>
             </div>
              <div class="form-group row">
               <div class="col-xs-4">
                 <label for="datereleased">Date of Released:</label>
                  <input type="date" class="form-control input-sm" id="datereleased" name="DateofReleased" placeholder="" value="<?php echo $DateofReleased;?>">
               </div>
               <div class="col-xs-4">
                 <label for="reasonrelease">Reason for Release:</label>
                  <input type="text" class="form-control input-sm" id="reasonrelease" name="ReasonforRelease" placeholder="Enter Reason for Release" value="<?php echo $ReasonforRelease;?>">
               </div>
             </div>
        <hr>
         <div class="form-group row">
               <div class="col-xs-4">
                 <label for="initialsetting">Date Initial Setting:</label>
                  <input type="date" class="form-control input-sm" id="initialsetting" name="InitialSettingDate" placeholder="" value="<?php echo $InitialSettingDate;?>">
               </div>
               <div class="col-xs-4">
                 <label for="plea">Plea:</label>
                  <input type="text" class="form-control input-sm" id="plea" name="Plea" placeholder="Enter Plea" value="<?php echo $Plea;?>">
               </div>
             </div> <div class="form-group row">
               <div class="col-xs-4">
                 <label for="actualarraignment">Date of Actual Arraignment:</label>
                  <input type="date" class="form-control input-sm" id="actualarraignment" name="ActualArraignmentDate" placeholder="" value="<?php echo $ActualArraignmentDate;?>">
               </div>
               <div class="col-xs-4">
                 <label for="pleabargaining">Date of Plea Bargaining, if any:</label>
                  <input type="date" class="form-control input-sm" id="pleabargaining" name="PleaBargainDate" placeholder="" value="<?php echo $PleaBargainDate;?>">
               </div>
             </div> <div class="form-group row">
               <div class="col-xs-4">
                 <label for="pre-trialdate">Date of Pre-Trial:</label>
                  <input type="date" class="form-control input-sm" id="pre-trialdate" name="PreTrialDate" placeholder="" value="<?php echo $PreTrialDate;?>">
               </div>
               <div class="col-xs-4">
                 <label for="daterevived">Date Revived:</label>
                  <input type="date" class="form-control input-sm" id="daterevived" name="DateRevived" placeholder="" value="<?php echo $DateRevived;?>">
               </div>
             </div> <div class="form-group row">
               <div class="col-xs-4">
                 <label for="promulgationdate">Date of Promulgation Sentence:</label>
                  <input type="date" class="form-control input-sm" id="promulgationdate" name="PromulgationDate" placeholder="" value="<?php echo $PromulgationDate;?>">
               </div>
               <div class="col-xs-4">
                 <label for="datearchived">Date Archived:</label>
                  <input type="date" class="form-control input-sm" id="datearchived" name="DateArchived" placeholder="" value="<?php echo $DateArchived;?>">
               </div>
             </div>
             <hr>
              <input type="submit" name="insert" value="Save">
              <input type="submit" name="insert" value="Clear">
</form>
</section>
</body>
</html>


     
        
       
        
      <!--        <hr>
        </div>
      </div>
    </div> --> --> -->
  <!-- <div> -->
        
                <!-- Input For Add Values To Database-->
                <!-- <button type="button" class="btn btn-danger btn-lg">SAVE</button>
                <button type="button" class="btn btn-danger btn-lg">CLEAR</button> -->
               <!--  <input type="submit" name="insert" value="Save">
                <input type="submit" name="insert" value="Clear"> -->
                
                
               
 <!--            </div>
  </div>
</section> -->

<!-- <footer>
   <p>All Rights Reserve 2018</p> 
</footer> -->





<!-- 
</body>
</html> -->



		
