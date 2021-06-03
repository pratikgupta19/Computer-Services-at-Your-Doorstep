<?php
define('TITLE', 'PROFILE');
define('PAGE', 'profile');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_tlogin'])){
  $tEmail = $_SESSION['tEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 if(isset($_REQUEST['submit'])){
  // Checking for Empty Fields
  if(($_REQUEST['about'] == "") || ($_REQUEST['mobile_no'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $eId = $_REQUEST['empId'];
    $eMobile = $_REQUEST['mobile_no'];
    $about = $_REQUEST['about'];
    
    
    $sql = "UPDATE Technician_tb SET mobile_no = '$eMobile', about = '$about' WHERE t_id = '$eId'";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
    }
  }
  }
   
?>
<div class="col-sm-5 mt-5 jumbotron col-md-6 mo">
<?php
  $sql3 = "SELECT t_name FROM Technician_tb WHERE temail = '".$tEmail."'";
  $result3 = $conn->query($sql3);
  $row3 = $result3->fetch_assoc();
  $t_name = $row3["t_name"];
  $sql = "SELECT rno FROM workdone_tb WHERE assign_tech = '".$t_name."'" ;
  $result = $conn->query($sql);
  $donework = $result->num_rows;
  $sql1 = "SELECT * FROM Technician_tb WHERE temail = '$tEmail'";
  $result1 = $conn->query($sql1);
  $row = $result1->fetch_assoc();
  $sql = "SELECT TIMESTAMPDIFF(MONTH, Date_of_join, now())+0 AS expr from Technician_tb WHERE temail = '$tEmail'";
  $result = $conn->query($sql);
  $ex = $result->fetch_assoc();
?>
	<form action="" method="POST">
		<h1 class="text-center">PROFILE</h1>
		<div class="text-center">
        		<img src="<?php if(isset($row[ 'profile_pi'])) {echo "../Admin/".$row['profile_pi']; }else{echo "../Admin/uploadprofile/profile.png";}?>" width="150px" height="150px" style="border-radius: 50%" class="avatar img-circle img-thumbnail" alt="avatar">
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
        <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="<?php if(isset($row['mobile_no'])) {echo $row['mobile_no']; }?>">
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
      		<textarea type="text" rows="6" class="form-control" id="about" name="about"><?php if(isset($row['about'])) {echo $row['about']; }?></textarea> 
    	</div>
      <div class="form-group">
          <label for="texperience">No of Work Done Till Date</label>
          <input type="text" class="form-control" id="workdone" name="workdone" value="<?php if(isset($row['t_name'])) {echo $donework; }?>" readonly>
      </div>
      <div class="float-right">
      <button type="submit" class="btn btn-success" name="submit">Submit</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
      <a href="Dashboard.php" class="btn btn-secondary">Close</a>
      </div><br><br>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
    </div>
	</form>	
</div>	
<?php
include('includes/footer.php'); 
?>