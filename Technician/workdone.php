<?php
define('TITLE', 'Work Done');
define('PAGE', 'workdone');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_tlogin'])){
  $tEmail = $_SESSION['tEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>
<div class="col-sm-9 col-md-10 mt-5">
  <?php 
  $sql1 = "SELECT t_name FROM Technician_tb WHERE temail = '".$tEmail."'";
 $result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$t_name = $row1["t_name"];
 $sql = "SELECT * FROM workdone_tb WHERE assign_tech = '".$t_name."'";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
  echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">Req ID</th>
      <th scope="col">Request Info</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Mobile</th>
      <th scope="col">Work Done No</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
    echo '<tr>
    <th scope="row">'.$row["request_id"].'</th>
    <td>'.$row["request_info"].'</td>
    <td>'.$row["requester_name"].'</td>
    <td>'.$row["requester_add1"].',<br>'.$row["requester_add2"].'</td>
    <td>'.$row["requester_city"].'</td>
    <td>'.$row["requester_mobile"].'</td>
    <td>'.$row["work_date"].'</td>
    <td>'.$row["amount"]." ".'RS</td>
    <td><form action="viewdonework.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["request_id"] .'><button type="submit" class="btn btn-warning" name="view" value="View"><i class="far fa-eye"></i></button></form>
      <form action="viewbill1.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["request_id"] .'><button type="submit" class="btn btn-secondary" name="view" value="View"><i class="fas fa-file-invoice"></i></button></form>
    </td>
    </tr>';
   }
   echo '</tbody> </table>';
  } else {
    echo "No Work Done Yet";
  }
  ?>
</div>
</div>
</div>
<?php
include('includes/footer.php'); 
?>