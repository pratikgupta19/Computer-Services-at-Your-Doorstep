<?php
include('../dbConnection.php');

  if(isset($_REQUEST['Signup'])){
    // Checking for Empty Fields
    if(($_REQUEST['uName'] == "") || ($_REQUEST['uEmail'] == "") || ($_REQUEST['unPassword'] == "") || ($_REQUEST['ucPassword'] == "")){
      $regmsg = '<div class="alert alert-warning mt-2" role="alert"> All Fields are Required </div>';
    }
    /*if(($_REQUEST['unPassword']) != ($_REQUEST['ucPassword'])){
      $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Password does not match </div>'
    }*/
    else {
      $sql = "SELECT email FROM Userlogin WHERE email='".$_REQUEST['uEmail']."'";
      $result = $conn->query($sql);
      if($result->num_rows == 1){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Email ID Already Registered </div>';
      } else {
        // Assigning User Values to Variable
        $uName = $_REQUEST['uName'];
        $uEmail = $_REQUEST['uEmail'];
        $unPassword = $_REQUEST['unPassword'];
        $ucPassword = $_REQUEST['ucPassword'];
        if($unPassword!=$ucPassword){
          $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Password does not match </div>';
        }else{
        $sql = "INSERT INTO Userlogin(u_name, email, n_password, c_password) VALUES ('$uName','$uEmail', '$unPassword', '$ucPassword')";
        if($conn->query($sql) == TRUE){
          $regmsg = '<div class="alert alert-success mt-2" role="alert"> Account Succefully Created </div>';

        } else {
          $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Unable to Create Account </div>';
        }}
      }
    }
  }
?><!DOCTYPE html>
<html>
<head>
  <title>User Registration</title>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../css/URegistration.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  	<div class="mb-3 text-center mt-5" style="font-size: 30px;">
    <i class="fas fa-stethoscope"></i>
    <span>Computer Services @ Your Doorstep</span>
  </div>
  <div class="container pt-5" id="UserRegistration">

  <h2 class="text-center">Create an Account</h2>
  <div class="row mt-4 mb-4">
    <div class="col-md-6 offset-md-3">
      <form action="" class="shadow-lg p-4" method="POST">
        <div class="form-group">
          <i class="fas fa-user"></i><label for="name" class="pl-2 font-weight-bold">Name</label><br><br><input type="text"
            class="form-control" placeholder="Name" name="uName">
        </div>
        <div class="form-group">
          <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><br><br><input type="email"
            class="form-control" placeholder="Email" name="uEmail">
          <!--Add text-white below if want text color white-->
          <small class="form-text">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">New
            Password</label><br><br><input type="password" class="form-control" placeholder="Password" name="unPassword">
        </div>
        <div class="form-group">
          <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Conform
            Password</label><br><br><input type="password" class="form-control" placeholder="Password" name="ucPassword">
        </div>
        <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="Signup" style="border-color: #dc3545;">Sign Up</button>
        <em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms, Data
          Policy and Cookie Policy.</em>
        <?php if(isset($regmsg)) {echo $regmsg; 
        }

         ?>
        <br><p class="text-center">Already have an Account?  <a href="RequesterLogin.php">Login</a></p> 
      </form>
      <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back to Home</a></div>
    </div>
  </div>
  
</div>
</body>
</html>