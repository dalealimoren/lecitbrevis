<?php
$host = "localhost";
$user = "root";
$password ="";
$database = "entry";

$CaseNo = "";
$CaseTitle = "";
$DateFiled = "";
$DateReceived = "";
$CaseCategory = "";
$Nature = "";
$NatureDescription = "";

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
    $posts[0] = $_POST['CaseNo'];
    $posts[1] = $_POST['CaseTitle'];
    $posts[2] = $_POST['DateFiled'];
    $posts[3] = $_POST['DateReceived'];
    $posts[4] = $_POST['CaseCategory'];
    $posts[5] = $_POST['Nature'];
    $posts[6] = $_POST['NatureDescription'];

    return $posts;
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();

    foreach ($data as $key => $value) {
      if (empty($value)) {
        $errorMsg .= "$key is empty<br>";
      }
    }

    if(empty($errorMsg)) {
    
         $insert_Query1 = "INSERT INTO `case information`(`CaseNo`, `CaseTitle`, `DateFiled`,`DateReceived`,`CaseCategory`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";
         $insert_Query2 = "INSERT INTO `case details`(`Nature`,`NatureDescription`) VALUES ('$data[5]','$data[6]')";
      try{
          $insert_Result = mysqli_query($connect, $insert_Query1);
          $insert_Result = mysqli_query($connect, $insert_Query2);
          
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
h3
{
  text-align: center;
}

section{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 70px;
  font-family: "Comic Sans MS";
  color: black;
  font-style: normal;

    
    /*text-align: center;
    color: white;*/
    
}
h1 {
  text-shadow: 3px 2px black;
}
hr { 
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 5px;
} 

footer{

    background-color: #993300;
    padding: 10px;
    text-align: center;
    color: white;
    
}
p.normal {
  font-style: bold;
}
. button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 30px;
  width: 30px;
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
      Welcome <span class="glyphicon glyphicon-user"></span> <strong><?php echo $_SESSION['username']; ?></strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-globe logo"></span>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="ucr.php">Update Case Records</a></li> -->
         <li style="background-color: black" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Entry <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="add.php">Case Records</a></li>
          <!-- <li><a href="#">Case Summary</a></li>
          <li><a href="#">Report on Drugs Cases</a></li>
          <li><a href="#">List of Cases</a></li> -->
          <li><a href="log.php">Borrow Logs</a></li>
        </ul>
      </li>
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Update <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="update.php">Case Records</a></li>
          <!-- <li><a href="#">Case Summary</a></li>
          <li><a href="#">Report on Drugs Cases</a></li>
          <li><a href="#">List of Cases</a></li> -->
          
          <!-- <li><a href="update.php">Logs</a></li> -->
        </ul>
      </li>
        <!-- <li><a href="ad.php">Update</a></li> -->
        <li><a href="ad.php">Search</a></li>
         <li><a href="cal.php">Schedule</a></li>
        <!-- <li><a href="log.php">Entry Logs</a></li> -->
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Reports <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="rep.php">Quarterly Report</a></li>
          <li><a href="rep.php">Borrow Logs</a></li>
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
  <form action="entrycaserecords.php" method="post">
    <h1>CASE RECORDS<br><br></h1>
      <font color="red">Case Number:</font>
       <input type="number" name="CaseNo" placeholder="Case Number" value="<?php echo $CaseNo;?>"><br><br>
  <ul class="nav nav-tabs nav-justified">
    <li class="active">
      <a data-toggle="tab" href="#case-info-tab">
        CASE INFORMATION
      </a>
    </li>
    <li>
      <a data-toggle="tab" href="#case-proc-tab">
        CASE PROCEDURE
      </a>
    </li>
  </ul>

  <div class="tab-content">
    <div id="case-info-tab" class="tab-pane fade in active">
      <?php
        if (isset($errorMsg)) {
          echo '<div class="alert alert-danger" role="alert">';
          echo $errorMsg;
          echo '</div>';
        }
        ?>
          <hr> 
              <font color="red">Case Title:</font> 
                <input type="text" size="120" name="CaseTitle" placeholder="Case Title" value="<?php echo $CaseTitle;?>"><br><br>
              <font color="red">Date Filed:</font>
                <input type="date" name="DateFiled" placeholder="Date Filed" value="<?php echo $DateFiled;?>">
              <font color="red">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Date Received:</font>
                <input type="date" name="DateReceived" placeholder="Date Received" value="<?php echo $DateReceived;?>"><br><br>
          <hr>
              <font color="red">Case Category:</font>
                <input type="text" size="119" name="CaseCategory" placeholder="Case Category" value="<?php echo $CaseCategory;?>"><br><br>
              <font color="red">Nature Case:</font>
               <input type="text" size="120" name="Nature" placeholder="Nature Case" value="<?php echo $Nature;?>"><br><br>
            <font color="red">Nature Description:</font>
              <input type="text" size="115" name="Nature" placeholder="Nature Description" value="<?php echo $Nature;?>"><br><br>
            <font color="red">Case Status:</font>
              <input type="text" size="40" name="CaseStatus" placeholder="Case Status" value="<?php echo $CaseStatus;?>">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <font color="red">Status, if others:</font>
              <input type="text" size="50" name="Status" placeholder="" value="<?php echo $Status;?>"><br><br>
          <hr>
          <b>For Drugs Case<br><br></b>
            <font color="red">Amount Involve:</font>
              <input type="text" size="37" name="Amount" placeholder="Amount Involve" value="<?php echo $Amount;?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           <font color="red">Weight in Grams Involve:</font>
            <input type="text" size="45" name="Weight" placeholder="Weight Involve" value="<?php echo $Weight;?>"><br><br>
          <hr>
  </form>
</div>

    <div id="case-proc-tab" class="tab-pane fade">

      <ul class="nav nav-tabs"><br>
        <li class="active">
          <a data-toggle="tab" href="#case-proc-1-tab">
            I. ACCUSED INFORMATION
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#case-proc-2-tab">
            II. ARRAIGNMENT AND PRE-TRAIL
          </a>
        </li>
      </ul>

      <div class="tab-content">
        <div id="case-proc-1-tab" class="tab-pane fade in active">
          <hr>
          <font color="red">Last Name:</font>
           <input type="text" name="LastName" placeholder="Last Name" value="<?php echo $LastName;?>"><br><br>
          <font color="red">First Name:</font>
           <input type="text" name="FirstName" placeholder="First Name" value="<?php echo $FirstName;?>"><br><br>
          <font color="red">Middle Name:</font>
           <input type="text" name="MiddleName" placeholder="Middle Name" value="<?php echo $MiddleName;?>"><br><br>
          <font color="red">Alias Name:</font>
           <input type="text" name="AliasName" placeholder="Alias Name" value="<?php echo $AliasName;?>"><br><br>
          <font color="red">Date of Birth:</font>
           <input type="date" name="DateFiled" placeholder="Date Filed" value="<?php echo $DateFiled;?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <font color="red">Gender: &nbsp</font>
            <input type="radio" name="gender" value="male" checked> Male
            <input type="radio" name="gender" value="female"> Female<br><br>
        <font color="red">Present Status:</font>
         <input type="text" name="PresentStatus" placeholder="Present Status" value="<?php echo $PresentStatus;?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <font color="red">Age in the time of Commission of Crime:</font>
         <input type="text" name="PresentStatus" placeholder="Present Status" value="<?php echo $PresentStatus;?>"><br><br>
        <font color="red">Contact Numbers:</font>
         <input type="text" name="ContactNumbers" placeholder="Contact Numbers" value="<?php echo $ContactNumbers;?>"><br><br>
        <font color="red">Address:</font>
         <input type="text" name="Address" placeholder="Address" value="<?php echo $Address;?>"><br>
        <hr>
        </div>
        <div id="case-proc-2-tab" class="tab-pane fade">
        <hr>
         <font color="red">Status for this Case: &nbsp</font>
          <input type="radio" name="Detainee" value="Detainee" checked>Detainee &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="Non-Detainee" value="Non-Detainee">Non-Detainee<br><br>
        <font color="red">Date of Detention:</font>
          <input type="date" name="DateFiled" placeholder="Date Filed" value="<?php echo $DateFiled;?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <font color="red">Date of Arrest:</font>
          <input type="date" name="DateFiled" placeholder="Date Filed" value="<?php echo $DateFiled;?>"><br><br>
        <font color="red">Date of Bail:</font>
          <input type="date" name="DateFiled" placeholder="Date Filed" value="<?php echo $DateFiled;?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <font color="red">Date of Voluntary Surrender:</font>
          <input type="date" name="DateFiled" placeholder="Date Filed" value="<?php echo $DateFiled;?>"><br><br>
        <font color="red">Place of Detendtion:</font>
          <input type="text" name="PlaceDetendtion" placeholder="Place of Detendtion" value="<?php echo $PlaceDetendtion;?>"><br><br>
        <font color="red">Date of Released:</font>
          <input type="date" name="DateFiled" placeholder="Date Filed" value="<?php echo $DateFiled;?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <font color="red">Reason for Release:</font>
          <input type="text" name="ReasonRelease" placeholder="Reason for Release" value="<?php echo $ReasonforRelease;?>"><br>
        <hr>
        <font color="red">Date Initial Setting:</font>
         <input type="date" name="DateInitialSetting" placeholder="Date Initial Setting" value="<?php echo $DateInitialSetting;?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <font color="red">Plea:</font>
         <input type="text" name="Plea" placeholder="Plea" value="<?php echo $Plea;?>"><br><br>
        <font color="red">Date of Actual Arraignment:</font>
          <input type="DateActualArraignment" name="Date of Actual Arraignment" placeholder="Date of Actual Arraignment" value="<?php echo $DateActualArraignment;?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <font color="red">Date of Plea Bargaining, if any:</font>
         <input type="date" name="DatePleaBargaining" placeholder="Date of Plea Bargaining" value="<?php echo $DatePleaBargaining;?>"><br><br> 
        <font color="red">Date of Pre-Trial:</font>
         <input type="date" name="DatePreTrial" placeholder="Date of Pre-Trial" value="<?php echo $DatePreTrial;?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <font color="red">Date Revived:</font>
         <input type="date" name="DateRevived" placeholder="Date Revived" value="<?php echo $DateRevived;?>"><br><br>
        <font color="red">Date of Promulgatation Sentence:</font>
         <input type="date" name="DatePromulgatationSentence" placeholder="Date of Promulgatation Sentence" value="<?php echo $DatePromulgatationSentence;?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <font color="red">Date Archived:</font>
          <input type="date" name="DateArchived" placeholder="Date Archived" value="<?php echo $DateArchived;?>">
        <hr>
              </div>
      </div>

    </div>
      <div>
        <br><br><br>
                <!-- Input For Add Values To Database-->
                <button type="button" class="btn btn-danger btn-lg">SAVE</button>
                <button type="button" class="btn btn-danger btn-lg">CLEAR</button>
                
                
               
            </div>
  </div>
</section>

<!-- <footer>
   <p>All Rights Reserve 2018</p> 
</footer> -->






</body>
</html>



		
