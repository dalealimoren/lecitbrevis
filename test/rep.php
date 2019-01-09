<?php
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



.navvv{
  padding-top: 50px;
}



* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.section {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #993300;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 10%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}




</style>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Licit Brevis</a>
    </div>
    
    <?php  if (isset($_SESSION['username'])) : ?>
    <ul class="nav navbar-nav">
      <li class="active">
      Welcome <span class="glyphicon glyphicon-user"></span> <strong><?php echo $_SESSION['username']; ?></strong>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="ucr.php">Update Case Records</a></li> -->
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Entry <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="add.php">Case Records</a></li>
          <!-- <li><a href="#">Case Summary</a></li>
          <li><a href="#">Report on Drugs Cases</a></li>
          <li><a href="#">List of Cases</a></li> -->
          
          <li><a href="log.php">Logs</a></li>
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
        <!-- <li><a href="log.php">Entry Logs</a></li> -->
      <li class="dropdown" style="background-color: black"><a class="dropdown-toggle" data-toggle="dropdown">Reports <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="rep.php">Quarterly Report</a></li>
          <!-- <li><a href="#">Case Summary</a></li>
          <li><a href="#">Report on Drugs Cases</a></li>
          <li><a href="#">List of Cases</a></li> -->
          <li><a href="#">Statistics</a></li>
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
  

<div class="notification">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
  
</div>

<div class="navvv">
<div class="container">
  <h2>Quarterly Reports</h2>
  
</div>




</body>
</html>



    
