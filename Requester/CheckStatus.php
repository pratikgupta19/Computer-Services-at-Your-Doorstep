<?php
define('TITLE', 'Status');
define('PAGE', 'CheckStatus');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $uEmail = $_SESSION['uEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
?>
<div class="col-sm-6 mt-5  mx-3 mowi">
  <form action="" class="mt-3" style="margin-right: 4rem;">
    <div class="form-group mx-3">
      <label for="checkid" style="margin-bottom: 1rem">Enter Request ID: </label>
      <input type="search" class="form-control" id="checkid" name="checkid" onkeypress="isInputNumber(event)">
    </div>
    <button type="submit" class="btn btn-danger ml-3">Search</button>
  </form>
  <?php
  if(isset($_REQUEST['checkid'])){
    if ($_REQUEST['checkid'] == ""){
      $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fileds </div>';
    }
    else{
      /*$id = $_REQUEST['checkid'];
      $sql3 = "SELECT request_id FROM assignwork_tb WHERE uEmail ='$uEmail'";
      $result3 = $conn->query($sq3);
    $row3 = $result3->fetch_assoc();
    $sql4 = "SELECT request_id FROM workdone_tb WHERE uEmail ='$uEmail'";
      $result4 = $conn->query($sq4);
    $row4 = $result4->fetch_assoc();
    /*if(($id in $result3->fetch_assoc())|| ($id in $result4->fetch_assoc())){
      $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill11 All Fileds </div>';
    }*/
    $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']} and uEmail ='$uEmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql1 = "SELECT * FROM workdone_tb WHERE request_id = {$_REQUEST['checkid']} and uEmail = '$uEmail'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $sql2 = "SELECT * FROM submitrequest_tb WHERE request_id = {$_REQUEST['checkid']} and uEmail ='$uEmail'";
    $result2 = $conn->query($sql2);
    $row2= $result2->fetch_assoc();
    if(isset($row['request_id']) && isset($row['uEmail']))
      { ?>
  <h3 class="text-center mt-5">Assigned Work Details</h3>
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td>Request ID</td>
        <td>
          <?php if(isset($row['request_id'])) {echo $row['request_id']; } ?>
        </td>
      </tr>
      <tr>
        <td>Request Info</td>
        <td>
          <?php if(isset($row['request_info'])) {echo $row['request_info']; } ?>
        </td>
      </tr>
      <tr>
        <td>Request Description</td>
        <td>
          <?php if(isset($row['request_desc'])) {echo $row['request_desc']; } ?>
        </td>
      </tr>
      <tr>
        <td>Name</td>
        <td>
          <?php if(isset($row['requester_name'])) {echo $row['requester_name']; } ?>
        </td>
      </tr>
      <tr>
        <td>Address Line 1</td>
        <td>
          <?php if(isset($row['requester_add1'])) {echo $row['requester_add1']; } ?>
        </td>
      </tr>
      <tr>
        <td>Address Line 2</td>
        <td>
          <?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; } ?>
        </td>
      </tr>
      <tr>
        <td>City</td>
        <td>
          <?php if(isset($row['requester_city'])) {echo $row['requester_city']; } ?>
        </td>
      </tr>
      <tr>
        <td>State</td>
        <td>
          <?php if(isset($row['requester_state'])) {echo $row['requester_state']; } ?>
        </td>
      </tr>
      <tr>
        <td>Pin Code</td>
        <td>
          <?php if(isset($row['requester_zip'])) {echo $row['requester_zip']; } ?>
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td>
          <?php if(isset($row['requester_email'])) {echo $row['requester_email']; } ?>
        </td>
      </tr>
      <tr>
        <td>Mobile</td>
        <td>
          <?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; } ?>
        </td>
      </tr>
      <tr>
        <td>Assigned Date</td>
        <td>
          <?php if(isset($row['assign_date'])) {echo $row['assign_date']; } ?>
        </td>
      </tr>
      <tr>
        <td>Technician Name</td>
        <td>
          <?php if(isset($row['assign_tech'])) {echo $row['assign_tech']; } ?>  
        </td>
      </tr>
      <tr>
        <td>Amount to Pay</td>
        <td></td>
      </tr>
      <tr>
        <td>Customer Sign</td>
        <td></td>
      </tr>
      <tr>
        <td>Technician Sign</td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <div class="text-center">
    <form class="d-print-none d-inline mr-3"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form>
    <form class="d-print-none d-inline" action="work.php"><input class="btn btn-secondary" type="submit" value="Close"></form>
  </div>
  <?php } 
  elseif (isset($row1['request_id']) && isset($row1['uEmail'])) {
    $_SESSION['rid'] = $_REQUEST['checkid'];
    echo '<div class="alert alert-success mt-4" role="alert">
      Entered id work is done </div>';
    //echo "<script> location.href='viewbill1.php'; </script>";
      include('viewbill1.php');
    //echo '<div class="alert alert-success mt-4" role="alert">
      //Entered id work is done </div>';
  }
  elseif (!(isset($row['request_id']) && isset($row['uEmail']) && isset($row1['request_id']) && isset($row1['uEmail']) || (isset($row2['request_id']) && isset($row2['uEmail'])))) {
    
    echo '<div class="alert alert-dark mt-4" role="alert">
      Request id is Invalid </div>';
  }
  else {
      echo '<div class="alert alert-dark mt-4" role="alert">
      Your Request is Still Pending </div>';
    }
  }  
 }?>

<?php if(isset($msg)) { echo($msg);}
?>

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