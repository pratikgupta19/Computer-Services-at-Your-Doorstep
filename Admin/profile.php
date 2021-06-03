<?php
define('TITLE', 'PROFILE');
define('PAGE', 'technician');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }  
?>
<div class="col-sm-5 mt-5 jumbotron col-md-6 mo">
<?php
  
  $sql1 = "SELECT * FROM Technician_tb WHERE t_id = {$_REQUEST['id']}";
  $result1 = $conn->query($sql1);
  $row = $result1->fetch_assoc();
  $sql = "SELECT TIMESTAMPDIFF(MONTH, Date_of_join, now())+0 AS expr from Technician_tb WHERE t_id = {$_REQUEST['id']}";
  $result = $conn->query($sql);
  $ex = $result->fetch_assoc();
  if(isset($row['t_name'])){
    $name = $row['t_name'];
   }
  $sql = "SELECT rno FROM workdone_tb WHERE assign_tech = '$name'" ;
  $result = $conn->query($sql);
  $donework = $result->num_rows;
?>
	<form action="" method="POST">
		<h1 class="text-center">PROFILE</h1>
		<div class="text-center">
        		<img src="<?php if(isset($row[ 'profile_pi'])) {echo $row['profile_pi'];}else{echo "uploadprofile/profile.png";}?>" width="150px" height="150px" style="border-radius: 50%" class="avatar img-circle img-thumbnail" alt="avatar">
      	</div></hr><br>
        <div class="form-group">
          <label for="empId">Emp ID</label>
          <input type="text" class="form-control" id="empId" name="empId" value="<?php if(isset($row[ 't_id'])) {echo $row['t_id']; }?>" readonly>
    </div>
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
          <label for="City">Date of Join</label>
          <input type="date" class="form-control" id="Date_of_join" name="Date_of_join" value="<?php if(isset($row['Date_of_join'])) {echo $row['Date_of_join']; }?>" readonly>
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
    </div>
	</form>	
</div>	
<?php
include('includes/footer.php'); 
?>