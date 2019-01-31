<?php
$host = "localhost";
$user = "root";
$password ="";
$database = "database";

$CaseNo = "";
$CaseTitle = "";
$DateFiled = "";
$DateReceived = "";
$CaseCategory = "";

$Nature = "";
$NatureDescription = "";
$CaseStatus = "";
$IfOthers = "";
$DateReturnedtoOCC = "";
$DateRemoved = "";
$Reason = "";
$OtherDetails = "";

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

$AccusedStatus = "";
$DetentionDate = "";
$DateArrested = "";
$BailDate = "";
$VoluntarySurrenderDate = "";
$DetentionPlace = "";
$DateReleased = "";
$ReleaseReason = "";

$InitialSetting = "";
$ActualArraignmentDate = "";
$PreTrialDate = "";
$PromulgationDate = "";
$Plea = "";
$PleaDate = "";
$DateRevived = "";
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
    $posts[0] = $_POST['CaseNo'];
    $posts[1] = $_POST['CaseTitle'];
    $posts[2] = $_POST['DateFiled'];
    $posts[3] = $_POST['DateReceived'];
    $posts[4] = $_POST['CaseCategory'];

    $posts[5] = $_POST['Nature'];
    $posts[6] = $_POST['NatureDescription'];
    $posts[7] = $_POST['CaseStatus'];
    $posts[8] = $_POST['IfOthers'];
    $posts[9] = $_POST['DateReturnedtoOCC'];
    $posts[10] = $_POST['DateRemoved'];
    $posts[11] = $_POST['Reason'];
    $posts[12] = $_POST['OtherDetails'];

    $posts[13] = $_POST['AccusedLname'];
    $posts[14] = $_POST['AccusedFname'];
    $posts[15] = $_POST['AccusedMi'];
    $posts[16] = $_POST['AccusedAlias'];
    $posts[17] = $_POST['AccusedDOB'];
    $posts[18] = $_POST['AccusedGender'];
    $posts[19] = $_POST['AccusedStatus'];
    $posts[20] = $_POST['AccusedAge'];
    $posts[21] = $_POST['AccusedContactNo'];
    $posts[22] = $_POST['AccusedAddress'];

    $posts[23] = $_POST['AccusedStatus'];
    $posts[24] = $_POST['DetentionDate'];
    $posts[25] = $_POST['DateArrested'];
    $posts[26] = $_POST['BailDate'];
    $posts[27] = $_POST['VoluntarySurrenderDate'];
    $posts[28] = $_POST['DetentionPlace'];
    $posts[29] = $_POST['DateReleased'];
    $posts[30] = $_POST['ReleaseReason'];

    $posts[31] = $_POST['InitialSetting'];
    $posts[32] = $_POST['ActualArraignmentDate'];
    $posts[33] = $_POST['PreTrialDate'];
    $posts[34] = $_POST['PromulgationDate'];
    $posts[35] = $_POST['Plea'];
    $posts[36] = $_POST['PleaDate'];
    $posts[37] = $_POST['DateRevived'];
    $posts[38] = $_POST['DateArchived'];
    
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM `case information` INNER JOIN `case details` 
    ON `case information`.`CaseNo` = `case details`.`CaseNo`";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $CaseNo = $row['CaseNo'];
                $CaseTitle = $row['CaseTitle'];
                $DateFiled = $row['DateFiled'];
                $DateReceived = $row['DateReceived'];
                $CaseCategory = $row['CaseCategory'];


                $Nature = $row['Nature'];
                $NatureDescription = $row['NatureDescription'];
                $CaseStatus = $row['CaseStatus'];
                $IfOthers = $row['IfOthers'];
                $DateReturnedtoOCC = $row['DateReturnedtoOCC'];
                $DateRemoved = $row['DateRemoved'];
                $Reason = $row['Reason'];
                $OtherDetails = $row['OtherDetails'];
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}

// Update
if(isset($_POST['update']))
{
    $data = getPosts();

    // foreach ($data as $key => $value) {
    //   if (empty($value)) {
    //     $errorMsg .= "$key is empty<br>";
    //   }
    // }

    // if(empty($errorMsg)) {
    
         $update_Query1 = "UPDATE `case information` SET `CaseTitle`='$data[1]', `DateFiled`='$data[2]',`DateReceived`='$data[3]',`CaseCategory`='$data[4]' WHERE `CaseNo`=$data[0]";

         $insert_Query2 = "UPDATE `case details` SET `Nature`='$data[5]',`NatureDescription`='$data[6]',`CaseStatus`='$data[7]',`IfOthers`='$data[8]',`DateReturnedtoOCC`='$data[9]',`DateRemoved`='$data[10]',`Reason`='$data[11]',`OtherDetails`='$data[12]' WHERE `CaseNo`=$data[0]";

         //$insert_Query3 = "UPDATE `accused information` SET (`AccusedLname`,`AccusedFname`,`AccusedMi`,`AccusedAlias`,`AccusedDOB`,`AccusedGender`,`AccusedStatus`,`AccusedAge`,`AccusedContactNo`,`AccusedAddress`) VALUES ('$data[13]','$data[14]','$data[15]','$data[16]','$data[17]','$data[18]','$data[19]','$data[20]','$data[21]','$data[22]')";

          //$insert_Query4 = "UPDATE `arraignment information` SET (`AccusedStatus`,`DetentionDate`,`DateArrested`,`BailDate`,`VoluntarySurrenderDate`,`DetentionPlace`,`DateReleased`,`ReleaseReason`) VALUES ('$data[23]','$data[24]','$data[25]','$data[26]','$data[27]','$data[28]','$data[29]','$data[30]')";

           //$insert_Query5 = "UPDATE `pre-trial information` SET (`InitialSetting`,`ActualArraignmentDate`,`PreTrialDate`,`PromulgationDate`,`Plea`,`PleaDate`,`DateRevived`,`DateArchived`) VALUES ('$data[31]','$data[32]','$data[33]','$data[34]','$data[35]','$data[36]','$data[37]','$data[38]')";

      try{
          $update_Result = mysqli_query($connect, $update_Query1);
          $insert_Result = mysqli_query($connect, $insert_Query2);
          // $insert_Result = mysqli_query($connect, $insert_Query3);
          // $insert_Result = mysqli_query($connect, $insert_Query4);
          // $insert_Result = mysqli_query($connect, $insert_Query5);
          
          if($update_Result)
          {
              if(mysqli_affected_rows($connect) > 0)
              {
                  echo 'Data Updated';
              }else{
                  echo 'Data Not Updated';
              }
          }
      } catch (Exception $ex) {
          echo 'Error Update '.$ex->getMessage();
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
       <li style="background-color: black" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Update <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="updatecaserecords.php">Case Records</a></li>
          <li><a href="updateborrowlogs.php">Borrow Logs</a></li>
        <!--   <li><a href="#">Report on Drugs Cases</a></li>
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
  <h2>Case Records</h2>
  <form action="updatecaserecords.php" method="post">
     <div class="form-group row">
      <div class="col-xs-3">
      <label for="number">Case Number:</label>
       <input type="number" class="form-control" id="number" name="CaseNo" placeholder="Enter Case Number" value="<?php echo $CaseNo;?>">
     </div>
   </div>
   <div class="form-group row">
      <div class="col-xs-3">
       <input type="submit" name="search" value="Find">
     </div>
   </div>
  <ul class="nav nav-tabs nav-justified">
    <li class="active">
      <a data-toggle="tab" href="#case-info-tab">
        <b>CASE INFORMATION</b>
      </a>
    </li>
    <li>
      <a data-toggle="tab" href="#case-proc-tab">
       <b>CASE PROCEDURE</b>
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
             <div class="form-group row">
               <div class="col-xs-12">
                 <label for="casetitle">Case Title:</label>
                 <input type="text" class="form-control" id="casetitle" name="CaseTitle" placeholder="Enter Case Title" value="<?php echo $CaseTitle;?>">
               </div>
            </div>
            <div class="form-group row">
               <div class="col-xs-3">
                 <label for="datefiled">Date Filed:</label>
                 <input type="date" class="form-control" id="datefiled" name="DateFiled" placeholder="Enter Date Filed" value="<?php echo $DateFiled;?>">
               </div>
              <div class="col-xs-3">
                 <label for="daterecieved">Date Recieved:</label>
                 <input type="date" class="form-control" id="daterecieved" name="DateReceived" placeholder="Enter Date Recieved" value="<?php echo $DateReceived;?>">
               </div>
             </div>
          <hr>
              <div class="form-group row">
               <div class="col-xs-8">
                 <label for="casecategory">Case Category:</label>
                 <input type="text" class="form-control" id="casecategory" name="CaseCategory" placeholder="Enter Case Category" value="<?php echo $CaseCategory;?>">
               </div>
             </div>
             <div class="form-group row">
               <div class="col-xs-8">
                 <label for="naturecase">Nature Case:</label>
                 <input type="text" class="form-control" id="naturcase" name="Nature" placeholder="Enter Nature" value="<?php echo $Nature;?>">
               </div>
             </div>
            <div class="form-group row">
               <div class="col-xs-8">
                 <label for="naturedescription">Nature/Description:</label>
                 <input type="text" class="form-control" id="naturedescription" name="NatureDescription" placeholder="Enter Nature Description" value="<?php echo $NatureDescription;?>">
               </div>
             </div>
            <div class="form-group row">
               <div class="col-xs-4">
                 <label for="casestatus">Case Status:</label>
                  <input type="text" class="form-control" id="casestatus" name="CaseStatus" placeholder="Enter Case Status" value="<?php echo $CaseStatus;?>">
               </div>
               <div class="col-xs-4">
                 <label for="statusifothers">Status if Others,:</label>
                 <input type="text" class="form-control" id="statusifothers" name="IfOthers" placeholder="Enter Status if Others" value="<?php echo $IfOthers;?>">
               </div>
             </div>
          <hr>
         <div class="form-group row">
            <div class="col-xs-4">
              <label>For Drugs Case:</label>
           </div>
         </div>
           <div class="form-group row">
               <div class="col-xs-4">
                 <label for="amount">Amount Involved:</label>
                 <input type="number" class="form-control" id="amount" name="Amount" placeholder="Enter Amount Involved" value="<?php echo $Amount;?>">
               </div>
               <div class="col-xs-4">
                 <label for="grams">Weight in Grams Involved:</label>
                 <input type="number" class="form-control" id="grams" name="Grams" placeholder="Enter Weight in Grams Involved" value="<?php echo $Grams;?>">
               </div>
             </div>
          <hr>
           <div class="form-group row">
            <div class="col-xs-3">
              <label>For Inhibited Cases:</label>
           </div>
            <div class="col-xs-4">
              <label>Remove from Case Docket:</label>
           </div>
         </div>
          <div class="form-group row">
               <div class="col-xs-3">
                 <label for="datereturned">Date Returned to OCC or Transferred to other Branch/Court:</label>
                 <input type="date" class="form-control" id="datereturned" name="DateReturnedtoOCC" placeholder="" value="<?php echo $DateReturnedtoOCC;?>">
               </div>
                <div class="col-xs-3">
                 <label for="dateremoved">Date Removed:</label>
                 <input type="date" class="form-control" id="dateremoved" name="DateRemoved" placeholder="" value="<?php echo $DateRemoved;?>">
               </div>
                <div class="col-xs-6">
                 <label for="reason">Reason:</label>
                 <input type="text" class="form-control" id="reason" name="Reason" placeholder="Reason" value="<?php echo $Reason;?>">
               </div>
             </div>
              <div class="form-group row">
               <div class="col-xs-3">

               </div>
                <div class="col-xs-9">
                 <label for="otherdetails">Other Details:</label>
                 <input type="text" class="form-control" id="otherdetails" name="OtherDetails" placeholder="Enter Other Details" value="<?php echo $OtherDetails;?>">
               </div>
             </div>
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
        <div class="form-group row">
               <div class="col-xs-8">
                 <label for="lastname">Last Name:</label>
                  <input type="text" class="form-control" id="lastname" name="AccusedLname" placeholder="Enter Last Name" value="<?php echo $AccusedLname;?>">
               </div>
          </div>
           <div class="form-group row">
               <div class="col-xs-8">
                 <label for="firstname">First Name:</label>
                  <input type="text" class="form-control" id="firstname" name="AccusedFname" placeholder="Enter First Name" value="<?php echo $AccusedFname;?>">
               </div>
          </div>
           <div class="form-group row">
               <div class="col-xs-8">
                 <label for="middlename">Middle Name:</label>
                  <input type="text" class="form-control" id="middlename" name="AccusedMi" placeholder="Enter Middle Name" value="<?php echo $AccusedMi;?>">
               </div>
          </div>
           <div class="form-group row">
               <div class="col-xs-8">
                 <label for="aliasname">Alias Name:</label>
                  <input type="text" class="form-control" id="aliasname" name="AccusedAlias" placeholder="Enter Alias Name" value="<?php echo $AccusedAlias;?>">
               </div>
          </div>
           <div class="form-group row">
               <div class="col-xs-4">
                 <label for="dob">Date of Birth:</label>
                  <input type="date" class="form-control" id="dob" name="AccusedDOB" placeholder="Enter Date of Birth" value="<?php echo $AccusedDOB;?>">
               </div>
                <div class="col-xs-4">
                 <label for="gender">Gender:</label>
                  <input type="text" class="form-control" id="gender" name="AccusedGender" placeholder="Enter Gender" value="<?php echo $AccusedGender;?>">
               </div>
          </div>
           <div class="form-group row">
               <div class="col-xs-4">
                 <label for="status">Present Status:</label>
                  <input type="text" class="form-control" id="status" name="AccusedStatus" placeholder="Enter Status" value="<?php echo $AccusedStatus;?>">
               </div>
                <div class="col-xs-4">
                 <label for="age">Age in the time of Commission of Crime:</label>
                  <input type="number" class="form-control" id="age" name="AccusedAge" placeholder="Enter Age" value="<?php echo $AccusedAge;?>">
               </div>
          </div>
           <div class="form-group row">
               <div class="col-xs-4">
                 <label for="contactno">Contact Number:</label>
                  <input type="number" class="form-control" id="contactno" name="AccusedContactNo" placeholder="Enter Contact Number" value="<?php echo $AccusedContactNo;?>">
               </div>
             </div>
               <div class="form-group row">
               <div class="col-xs-8">
                 <label for="address">Address:</label>
                  <input type="text" class="form-control" id="address" name="AccusedAddress" placeholder="Enter Address" value="<?php echo $AccusedAddress;?>">
               </div>
             </div>
        <hr>
        </div>
        <div id="case-proc-2-tab" class="tab-pane fade">
        <hr>
         <div class="form-group row">
               <div class="col-xs-4">
                 <label for="statuscase">Status for this Case:</label>
                  <input type="text" class="form-control" id="statuscase" name="AccusedStatus" placeholder="Enter Status for this Case" value="<?php echo $AccusedStatus;?>">
               </div>
             </div>
              <div class="form-group row">
               <div class="col-xs-4">
                 <label for="detentiondate">Date of Detention:</label>
                  <input type="date" class="form-control" id="detentiondate" name="DetentionDate" placeholder="" value="<?php echo $DetentionDate;?>">
               </div>
               <div class="col-xs-4">
                 <label for="arrestdate">Date of Arrest:</label>
                  <input type="date" class="form-control" id="arrestdate" name="DateArrested" placeholder="" value="<?php echo $DateArrested;?>">
               </div>
             </div>
               <div class="form-group row">
               <div class="col-xs-4">
                 <label for="datebail">Date of Bail:</label>
                  <input type="date" class="form-control" id="datebail" name="BailDate" placeholder="" value="<?php echo $BailDate;?>">
               </div>
               <div class="col-xs-4">
                 <label for="datesurrender">Date of Voluntary Surrender:</label>
                  <input type="date" class="form-control" id="datesurrender" name="VoluntarySurrenderDate" placeholder="" value="<?php echo $VoluntarySurrenderDate;?>">
               </div>
             </div>
              <div class="form-group row">
               <div class="col-xs-4">
                 <label for="detentionplace">Place of Detention:</label>
                  <input type="text" class="form-control" id="detentionplace" name="DetentionPlace" placeholder="Enter Detention Place" value="<?php echo $DetentionPlace;?>">
               </div>
             </div>
              <div class="form-group row">
               <div class="col-xs-4">
                 <label for="datereleased">Date of Released:</label>
                  <input type="date" class="form-control" id="datereleased" name="DateReleased" placeholder="" value="<?php echo $DateReleased;?>">
               </div>
               <div class="col-xs-4">
                 <label for="reasonrelease">Reason for Release:</label>
                  <input type="text" class="form-control" id="reasonrelease" name="ReleaseReason" placeholder="Enter Reason for Release" value="<?php echo $ReleaseReason;?>">
               </div>
             </div>
        <hr>
         <div class="form-group row">
               <div class="col-xs-4">
                 <label for="initialsetting">Date Initial Setting:</label>
                  <input type="date" class="form-control" id="initialsetting" name="InitialSetting" placeholder="" value="<?php echo $InitialSetting;?>">
               </div>
               <div class="col-xs-4">
                 <label for="plea">Plea:</label>
                  <input type="text" class="form-control" id="plea" name="Plea" placeholder="Enter Plea" value="<?php echo $Plea;?>">
               </div>
             </div>
              <div class="form-group row">
               <div class="col-xs-4">
                 <label for="actualarraignment">Date of Actual Arraignment:</label>
                  <input type="date" class="form-control" id="actualarraignment" name="ActualArraignmentDate" placeholder="" value="<?php echo $ActualArraignmentDate;?>">
               </div>
               <div class="col-xs-4">
                 <label for="pleabargaining">Date of Plea Bargaining, if any:</label>
                  <input type="date" class="form-control" id="pleabargaining" name="PleaDate" placeholder="" value="<?php echo $PleaDate;?>">
               </div>
             </div> <div class="form-group row">
               <div class="col-xs-4">
                 <label for="pre-trialdate">Date of Pre-Trial:</label>
                  <input type="date" class="form-control" id="pre-trialdate" name="PreTrialDate" placeholder="" value="<?php echo $PreTrialDate;?>">
               </div>
               <div class="col-xs-4">
                 <label for="daterevived">Date Revived:</label>
                  <input type="date" class="form-control" id="daterevived" name="DateRevived" placeholder="" value="<?php echo $DateRevived;?>">
               </div>
             </div> 
             <div class="form-group row">
               <div class="col-xs-4">
                 <label for="promulgationdate">Date of Promulgation Sentence:</label>
                  <input type="date" class="form-control" id="promulgationdate" name="PromulgationDate" placeholder="" value="<?php echo $PromulgationDate;?>">
               </div>
               <div class="col-xs-4">
                 <label for="datearchived">Date Archived:</label>
                  <input type="date" class="form-control" id="datearchived" name="DateArchived" placeholder="" value="<?php echo $DateArchived;?>">
               </div>
             </div>
             <hr>
        </div>
      </div>
    </div>
  <!-- <div> -->
        
                <!-- Input For Add Values To Database-->
                <!-- <button type="button" class="btn btn-danger btn-lg">SAVE</button>
                <button type="button" class="btn btn-danger btn-lg">CLEAR</button> -->
                <input type="submit" name="update" value="Update">
                <input type="submit" name="update" value="Clear">
                
                
               
            </div>
  </div>
</section>

<!-- <footer>
   <p>All Rights Reserve 2018</p> 
</footer> -->






</body>
</html>



    
