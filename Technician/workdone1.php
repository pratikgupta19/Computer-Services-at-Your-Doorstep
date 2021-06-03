<?php  
define('TITLE', 'Add Amount');
define('PAGE', 'work');
include('includes/header.php'); 
include('../dbConnection.php');  
session_start();
if(isset($_SESSION['is_tlogin'])){
 $tEmail = $_SESSION['tEmail'];
} else {
 echo "<script> location.href='login.php'; </script>";
}
if(isset($_REQUEST['add'])){
  $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $uEmail = $row['uEmail'];
 }

 //  Assign work Order Request Data going to submit and save on db assignwork_tb table
 if(isset($_POST['submit'])){
  // Checking for Empty Fields
  if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['address1'] == "") || ($_REQUEST['address2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['assigntech'] == "") || ($_REQUEST['amount'] == "") || ($_REQUEST['inputdate'] == "")){
   // msg displayed if required field missing

   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    
    //$myfile = addslashes(file_get_contents($_FILES["myfile"]["tem_name"]));
  	
 
 	//echo $row4['uEmail'];
 	
    $rid = $_REQUEST['request_id'];
    $sql4 = "SELECT * FROM assignwork_tb WHERE request_id = '".$rid."'";
 	$result4 = $conn->query($sql4);
 	$row4 = $result4->fetch_assoc();
 	$uEmail = $row4['uEmail'];
    $rinfo = $_REQUEST['request_info'];
    $rdesc = $_REQUEST['requestdesc'];
    $rname = $_REQUEST['requestername'];
    $radd1 = $_REQUEST['address1'];
    $radd2 = $_REQUEST['address2'];
    $rcity = $_REQUEST['requestercity'];
    $rstate = $_REQUEST['requesterstate'];
    $rzip = $_REQUEST['requesterzip'];
    $remail = $_REQUEST['requesteremail'];
    $rmobile = $_REQUEST['requestermobile'];
    $rassigntech = $_REQUEST['assigntech'];
    $amount = $_REQUEST['amount'];
    
    $rdate = $_REQUEST['inputdate'];
    $myfile = $_FILES['myfile'];
    $filename = $myfile['name'];
    $filepath = $myfile['tmp_name'];
    $fileError = $myfile['error'];
    if($fileError == 0){
      $destfile = 'uploadbill/'.$filename;
      

      //echo $destfile;
    
    $sql = "INSERT INTO workdone_tb (request_id, request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, assign_tech, amount, myfile, work_date, uEmail) VALUES ('$rid', '$rinfo','$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rassigntech', '$amount', '$destfile', '$rdate', '$uEmail')";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
      move_uploaded_file($filepath, $destfile);
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Details Add Successfully </div>';
       $sql1 = "DELETE FROM assignwork_tb WHERE request_id = $rid";
        if($conn->query($sql1) == TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
       //echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
        } else {
        echo "Unable to Delete Data";
        }
     
    
   
    
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add details Work </div>';
    }
  }
  }
  }
 // Assign work Order Request Data going to submit and save on db assignwork_tb table [END]
 ?>
<div class="col-sm-5 mt-5 jumbotron moa">
  <!-- Main Content area Start Last -->
  <form action="" method="POST" enctype="multipart/form-data">
    <h3 class="text-center">Upload Bill & Amount</h3>
    <div class="form-group">
      <label for="request_id">Request ID</label>
      <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($row['request_id'])) {echo $row['request_id']; }?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="request_info">Request Info</label>
      <input type="text" class="form-control" id="request_info" name="request_info" value="<?php if(isset($row['request_info'])) {echo $row['request_info']; }?>"readonly>
    </div>
    <div class="form-group">
      <label for="requestdesc">Description</label>
      <textarea  rows="3" class="form-control" id="requestdesc" name="requestdesc" ><?php { echo $row['request_desc']; } ?></textarea> 
    </div>
    <div class="form-group">
      <label for="requestername">Name</label>
      <input type="text" class="form-control" id="requestername" name="requestername" value="<?php if(isset($row['requester_name'])) { echo $row['requester_name']; } ?>"readonly>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="address1">Address Line 1</label>
        <input type="text" class="form-control" id="address1" name="address1" value="<?php if(isset($row['requester_add1'])) { echo $row['requester_add1']; } ?>"readonly>
      </div>
      <div class="form-group col-md-6">
        <label for="address2">Address Line 2</label>
        <input type="text" class="form-control" id="address2" name="address2" value="<?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; }?>"readonly>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="requestercity">City</label>
        <input type="text" class="form-control" id="requestercity" name="requestercity" value="<?php if(isset($row['requester_city'])) {echo $row['requester_city']; }?>"readonly>
      </div>
      <div class="form-group col-md-4">
        <label for="requesterstate">State</label>
        <input type="text" class="form-control" id="requesterstate" name="requesterstate" value="<?php if(isset($row['requester_state'])) { echo $row['requester_state']; } ?>"readonly>
      </div>
      <div class="form-group col-md-4">
        <label for="requesterzip">Zip</label>
        <input type="text" class="form-control" id="requesterzip" name="requesterzip" value="<?php if(isset($row['requester_zip'])) { echo $row['requester_zip']; } ?>"
           readonly>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="requesteremail">Email</label>
        <input type="email" class="form-control" id="requesteremail" name="requesteremail" value="<?php if(isset($row['requester_email'])) {echo $row['requester_email']; }?>"readonly>
      </div>
      <div class="form-group col-md-4">
        <label for="requestermobile">Mobile</label>
        <input type="text" class="form-control" id="requestermobile" name="requestermobile" value="<?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; }?>"
          readonly>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="assigntech">Technician Name</label>
        <input type="email" class="form-control" id="assigntech" name="assigntech" value="<?php if(isset($row['assign_tech'])) {echo $row['assign_tech']; }?>"readonly>
      </div>
      <div class="form-group col-md-6">
        <label for="assigntech">Amount</label>
        <input type="text" class="form-control" id="amount" name="amount" onkeypress="isInputNumber(event)">
      </div>
      
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="file">Upload Bill</label>
        <input type="file" class="form-control" id="myfile" name="myfile">
      </div>
      <div class="form-group col-md-6">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="inputdate">
      </div>
    </div>
    <div class="float-right">
      <button type="submit" class="btn btn-success" name="submit">Submit</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  <?php if(isset($msg)) {echo $msg; } ?>
</div> <!-- Main Content area End Last -->
</div> <!-- End Row -->
</div> <!-- End Container -->
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