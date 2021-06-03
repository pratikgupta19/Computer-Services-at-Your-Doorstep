<?php
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_tlogin'])){
  $tEmail = $_SESSION['tEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
$sql1 = "SELECT t_name FROM Technician_tb WHERE temail = '$tEmail'";
 $result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$t_name = $row1["t_name"];

 $sql = "SELECT request_id FROM assignwork_tb WHERE assign_tech = '".$t_name."'" ;
 $result = $conn->query($sql);

 $assignwork = $result->num_rows;

$sql = "SELECT request_id FROM workdone_tb WHERE assign_tech = '".$t_name."'" ;
 $result = $conn->query($sql);

 $donework = $result->num_rows;
?>
<div class="col-sm-9 col-md-10">
  <div class="row mx-5 text-center">
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-header">Assigned Work</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $assignwork; ?>
          </h4>
          <a class="btn text-white" href="work.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Work Done</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $donework; ?>
          </h4>
          <a class="btn text-white" href="workdone.php">View</a>
        </div>
      </div>
    </div>
<?php
include('includes/footer.php'); 
?>