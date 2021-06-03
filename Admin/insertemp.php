<?php
define('TITLE', 'Add New Technician');
define('PAGE', 'technician');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
if(isset($_REQUEST['empsubmit'])){
 // Checking for Empty Fields
 if(($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['inputdate'] == "") || ($_REQUEST['experience'] == "") || ($_REQUEST['about'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "") || ($_REQUEST['empPass'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
   // Assigning User Values to Variable
   $eName = $_REQUEST['empName'];
   $eCity = $_REQUEST['empCity'];
   $date = $_REQUEST['inputdate'];
   $eExp = $_REQUEST['experience'];
   $about = $_REQUEST['about'];
   $eMobile = $_REQUEST['empMobile'];
   $eEmail = $_REQUEST['empEmail'];
   $ePass = $_REQUEST['empPass'];

   $myfile = $_FILES['profile'];
    $filename = $myfile['name'];
    $filepath = $myfile['tmp_name'];
    $fileError = $myfile['error'];
    if($fileError == 0){
      $destfile = 'uploadprofile/'.$filename;

    }
   $sql1 = "INSERT INTO Technician_tb (profile_pi, t_name, city, Date_of_join, experience, about, mobile_no, temail, password) VALUES ('$destfile', '$eName', '$eCity', '$date', '$eExp','$about', '$eMobile', '$eEmail', '$ePass')";
  
   if($conn->query($sql1) == TRUE){
    // below msg display on form submit success
    move_uploaded_file($filepath, $destfile);
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
   }
   
   

 }
 }
?>
<div class="col-sm-6 mt-5 jumbotron mo">
  <h3 class="text-center">Add New Technician</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="file">Profle Pic</label>
        <input type="file" class="form-control" id="profile" name="profile">
      </div>
    <div class="form-group">
      <label for="empName">Name</label>
      <input type="text" class="form-control" id="empName" name="empName">
    </div>
    <div class="form-group">
      <label for="empCity">City</label>
      <input type="text" class="form-control" id="empCity" name="empCity">
    </div>
    <div class="form-group">
        <label for="inputDate">Date of Join</label>
        <input type="date" class="form-control" id="inputDate" name="inputdate">
      </div>
    <div class="form-group">
      <label for="empCity">Experience(Month)</label>
      <input type="text" class="form-control" id="experience" name="experience" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="empCity">About</label>
      <textarea rows="3" type="text" class="form-control" id="about" name="about"></textarea> 
    </div>
    <div class="form-group">
      <label for="empMobile">Mobile</label>
      <input type="text" class="form-control" id="empMobile" name="empMobile" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="empEmail">Email</label>
      <input type="email" class="form-control" id="empEmail" name="empEmail">
    </div>
    <div class="form-group">
      <label for="empPass">Password</label>
      <input type="text" class="form-control" id="empPass" name="empPass">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="empsubmit" name="empsubmit">Submit</button>
      <a href="technician.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<?php
include('includes/footer.php'); 
?>