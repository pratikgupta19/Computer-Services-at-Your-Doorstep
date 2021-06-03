<?php
define('TITLE', 'PROFILE');
define('PAGE', 'viewtechnician');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_login'])){
  $uEmail = $_SESSION['uEmail'];
 } else {
  echo "<script> location.href='RequesterLogin1.php'; </script>";
 } 
?>
<div class="mt-5 mowi">
<form action="" method="POST" class="mx-3" style="margin-right: 4rem;">
    <div class="form-group mx-3" >
      <label for="Search" style="margin-bottom: 1rem;">View Technician: </label>
      <input type="text" class="form-control" id="search" name="search">
    </div>
    <button type="submit" class="btn btn-danger ml-3">Search</button>
  </form>
  <?php 
  if(isset($_REQUEST['search']))
{   $search=$_REQUEST['search'];

    if ($_REQUEST['search'] == "")
    {
      $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fileds </div>';
    }

    else
    {	//Display No of Work done by the Technician
        $sql = "SELECT rno FROM workdone_tb WHERE assign_tech = '$search'" ;
 		$result = $conn->query($sql);
		$donework = $result->num_rows;
      $sql1 = "SELECT * FROM Technician_tb WHERE t_name ='$search'";
      $result1 = $conn->query($sql1);
      $row = $result1->fetch_assoc();
      if($result1->num_rows == 1){
          $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Technician Profile</div>';
      }
      else {
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Technician Profile not found</div>';
      }
      //$result1 = $conn->query($sql1);
      //$row = $result1->fetch_assoc();
      $sql2 = "SELECT TIMESTAMPDIFF(MONTH, Date_of_join, now())+0 AS expr from Technician_tb WHERE t_name ='$search'";
      $result2 = $conn->query($sql2);
      $ex = $result2->fetch_assoc();
    }
}

?>
<?php if(isset($msg)) { echo($msg);}
?>
<div class="col-sm-5 mt-5 jumbotron col-md-9">

	<form action="" method="POST">
		<h1 class="text-center">TECHNICIAN PROFILE</h1>
		<div class="text-center">
        		<img src="<?php if(isset($row[ 'profile_pi'])) {echo "../Admin/".$row['profile_pi']; }
        		else{echo "../Admin/uploadprofile/profile.png";}?>" width="150px" height="150px" style="border-radius: 50%" class="avatar img-circle img-thumbnail" alt="Profile pic">
    </div></hr><br>
    <div class="form-group">
      		<label for="t_name">Name</label>
      		<input type="text" class="form-control" id="t_name" name="tname" value="<?php if(isset($row['t_name'])) {echo $row['t_name']; }?>" readonly>
  	</div>
    <div class="form-group">
          <label for="temail">Email</label>
          <input type="text" class="form-control" id="temail" name="temail" value="<?php if(isset($row['temail'])) {echo $row['temail']; }?>" readonly>
    </div>
    <div class="form-group">
        <label for="requestermobile">Mobile</label>
        <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="<?php if(isset($row['mobile_no'])) {echo $row['mobile_no']; }?>" readonly>
    </div>
    <div class="form-group">
      		<label for="City">City</label>
      		<input type="text" class="form-control" id="city" name="city" value="<?php if(isset($row['city'])) {echo $row['city']; }?>" readonly>
    </div>
  	<div class="form-group">
      		<label for="texperience">Experience</label>
      		<input type="text" class="form-control" id="experience" name="experience" value="<?php if(isset($row['experience'])) {echo round(($row['experience']+$ex['expr'])/12,2)." Years"; }?>" readonly>
  	</div>
  	<div class="form-group">
      		<label for="about">About</label><br>
      		<textarea type="text" rows="6" class="form-control" id="about" name="about" readonly><?php if(isset($row['about'])) {echo $row['about']; }?></textarea> 
    </div>
    <div class="form-group">
          <label for="texperience">No of Work Done Till Date</label>
          <input type="text" class="form-control" id="workdone" name="workdone" value="<?php if(isset($row['t_name'])) {echo $donework; }?>" readonly>
    </div>
  </form>
</div></div>
<?php
include('includes/footer.php'); 
?>