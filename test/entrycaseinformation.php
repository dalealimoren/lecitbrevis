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
$CaseNature = "";
$NatureDescription = "";
$CaseStatus = "";
$AmountInvolved = "";
$WeightinGrams = "";
$DateReturnedorTransfered = "";
$DateRemoved = "";
$Reason = "";
$OtherDetails = "";

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
    $posts[2] = $_POST['CaseTitle'];
    $posts[3] = $_POST['DateFiled'];
    $posts[4] = $_POST['DateReceived'];
    $posts[5] = $_POST['CaseCategory'];
    $posts[6] = $_POST['CaseNature'];
    $posts[7] = $_POST['NatureDescription'];
    $posts[8] = $_POST['CaseStatus'];
    $posts[9] = $_POST['AmountInvolved'];
    $posts[10] = $_POST['WeightinGrams'];
    $posts[11] = $_POST['DateReturnedorTransfered'];
    $posts[12] = $_POST['DateRemoved'];
    $posts[13] = $_POST['Reason'];
    $posts[14] = $_POST['OtherDetails'];

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
    
         $insert_Query = "INSERT INTO `case information`(`CaseNo`,`CaseTitle`,`DateFiled`,`DateReceived`,`CaseCategory`,`CaseNature`,`NatureDescription`,`CaseStatus`,`AmountInvolved`,`WeightinGrams`,`DateReturnedorTransfered`,`DateRemoved`,`Reason`,`OtherDetails`) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]')";

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


  $caseCategories = [];
  $query = "SELECT * FROM `case category`";
  if ($result = mysqli_query($connect, $query))
  {
    while ($row = mysqli_fetch_assoc($result)) {
      $caseCategories[] = $row;
    }
  } 
  else {
    echo mysqli_error($connect);
  }


  $caseRemarks = [];
  $query = "SELECT * FROM `caseremarks`";
  if ($result = mysqli_query($connect, $query))
  {
    while ($row = mysqli_fetch_assoc($result)) {
      $caseRemarks[] = $row;
    }
  } 
  else {
    echo mysqli_error($connect);
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

/*footer{

    background-color: #993300;
    padding: 10px;
    text-align: center;
    color: white;
    
}
p.normal {
  font-style: bold;
}*/
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
  <h2>Case Information Entry</h2>
  <hr>
  <form action="entrycaseinformation.php" method="post">
     <div class="form-group row">
      <div class="col-xs-3">
      <label for="number">Case Number:</label>
       <input type="number" class="form-control input-sm" id="number" name="CaseNo" placeholder="Enter Case Number" value="<?php echo $CaseNo;?>">
     </div>
   </div>

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
                 <input type="text" class="form-control input-sm" id="casetitle" name="CaseTitle" placeholder="Enter Case Title" value="<?php echo $CaseTitle;?>">
               </div>
            </div>
            <div class="form-group row">
               <div class="col-xs-3">
                 <label for="datefiled">Date Filed:</label>
                 <input type="date" class="form-control input-sm" id="datefiled" name="DateFiled" placeholder="Enter Date Filed" value="<?php echo $DateFiled;?>">
               </div>
              <div class="col-xs-3">
                 <label for="daterecieved">Date Recieved:</label>
                 <input type="date" class="form-control input-sm" id="daterecieved" name="DateReceived" placeholder="Enter Date Recieved" value="<?php echo $DateReceived;?>">
               </div>
             </div>
          <hr>
              <div class="form-group row">
               <div class="col-xs-8">
                 <label for="casecategory">Case Category:</label>
                 <select class="form-control input-sm" id="casecategory" name="CaseCategory" placeholder="Enter Case Category">
                  <?php
                    foreach ($caseCategories as $category) {
                      echo "<option value='{$category['Description']}'>{$category['Description']}</option>";
                    }
                  ?>
                 </select>
               </div>
             </div>
             <div class="form-group row">
               <div class="col-xs-8">
                 <label for="naturecase">Nature Case:</label>
                 <input type="text" class="form-control input-sm" id="naturcase" name="CaseNature" placeholder="Enter Nature" value="<?php echo $CaseNature;?>">
               </div>
             </div>
            <div class="form-group row">
               <div class="col-xs-8">
                 <label for="naturedescription">Nature/Description:</label>
                 <input type="text" class="form-control input-sm" id="naturedescription" name="NatureDescription" placeholder="Enter Nature Description" value="<?php echo $NatureDescription;?>">
               </div>
             </div>
            <div class="form-group row">
               <div class="col-xs-4">
                 <label for="casestatus">Case Status:</label>
                 <select class="form-control input-sm" id="casestatus" name="CaseStatus" placeholder="Enter Case Status">
                  <?php
                    foreach ($caseRemarks as $remark) {
                      echo "<option value='{$remark['Description']}'>{$remark['Description']}</option>";
                    }
                  ?>
                 </select>
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
                 <input type="number" class="form-control input-sm" id="amount" name="AmountInvolved" placeholder="Enter Amount Involved" value="<?php echo $AmountInvolved;?>">
               </div>
               <div class="col-xs-4">
                 <label for="grams">Weight in Grams Involved:</label>
                 <input type="number" class="form-control input-sm" id="grams" name="WeightinGrams" placeholder="Enter Weight in Grams Involved" value="<?php echo $WeightinGrams;?>">
               </div>
             </div>
          <hr>
           <div class="form-group row">
            <div class="col-xs-4">
              <label>For Inhibited Cases:</label>
           </div>
            <div class="col-xs-4">
              <label>Remove from Case Docket:</label>
           </div>
         </div>
          <div class="form-group row">
               <div class="col-xs-4">
                 <label for="datereturned">Date Returned to OCC or Transferred to other Branch/Court:</label>
                 <input type="date" class="form-control input-sm" id="datereturned" name="DateReturnedorTransfered" placeholder="" value="<?php echo $DateReturnedorTransfered;?>">
               </div>
                <div class="col-xs-3">
                 <label for="dateremoved">Date Removed:</label>
                 <input type="date" class="form-control input-sm" id="dateremoved" name="DateRemoved" placeholder="" value="<?php echo $DateRemoved;?>">
               </div>
                <div class="col-xs-4">
                 <label for="reason">Reason:</label>
                 <input type="text" class="form-control input-sm" id="reason" name="Reason" placeholder="Reason" value="<?php echo $Reason;?>">
               </div>
             </div>
              <div class="form-group row">
               <div class="col-xs-4">

               </div>
                <div class="col-xs-7">
                 <label for="otherdetails">Other Details:</label>
                 <input type="text" class="form-control input-sm" id="otherdetails" name="OtherDetails" placeholder="Enter Other Details" value="<?php echo $OtherDetails;?>">
               </div>
             </div>
             <hr>
              <input type="submit" name="insert" value="Save">
              <input type="submit" name="insert" value="Clear">
</form>
</section>
</body>
</html>



		
