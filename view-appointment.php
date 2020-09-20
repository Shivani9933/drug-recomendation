<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("Location:login.php");
}
include "header.php";
include "sidenav.php";
include "Classes/PHPExcel.php";


function fnGetAccount($id,$link){
  $stmt = $link->prepare('Select * from tblaccount where iAccountId = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return $row['sAccountName'];
  }
  return "N/A";
}

function fnGetStateCode($id,$link){
  $stmt = $link->prepare('Select * from tblstatecode where sState like (select sState from tblaccount where iAccountId = ?)');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return $row['sStateCode'];
  }
  return "N/A";
}

?>
  <?php 
  if(isset($_POST['submitdata'])){
    
      $id = $_POST['id'];
      $contratcdate = $_POST['contratcdate'];
		$contratctime = $_POST['contratctime'];
		$patient = $_POST['patient'];
		
		$symptoms = $_POST['symptoms'];
		
		$remark = $_POST['remark'];


        //echo $contratcdate.','.$contratctime.','.$patient.','.$symptoms.','.$remark;
        
		$query = "UPDATE tblappointment SET sDate=?,sTime=?,iPatient=?,sSymptons=?,sPrescription=? WHERE iId = ?";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"ssissi",$contratcdate,$contratctime,$patient,$symptoms,$remark,$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           echo '<script> alert("Data Not Saved. Try Again.") </script>';
          }else{
             echo  '<script>alert("Data Saved.")</script>';

          }
      
      
          $stmt = $link->prepare('Select * from tblappointment where iId = ?');
          $stmt->bind_param('i', $id);
          $stmt->execute();
          $result = $stmt->get_result();
        if(!isset($result)){
          $message = "No Data.";
        }
        else{
              while ($row = $result->fetch_assoc()){
                 $obj = $row;
              }
           
        }
  }else if(isset($_POST['delete'])){
        $id = $_POST['id'];
    // echo '<script> alert("I m here.") </script>';
     $query = "delete from tblcontract where iId= ?";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"i",$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           echo '<script> alert("Data Not Deleted. Try Again.") </script>';
          }else{
             echo  '<script>alert("Data Deleted.")</script>';
          }
  }

  if(isset($_POST['complete'])){
    $id = $_POST['id'];
    $loadingqty = fnGetLoaidngQty($id,$link);
    $query = "Update tblcontract set dQuantityTo = ? where iId = ?";
        
      $stmt = mysqli_prepare($link,$query);
      mysqli_stmt_bind_param($stmt,"di",$loadingqty,$id);
      $ret = mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);

      $stmt = $link->prepare('Select * from tblcontract where iId = ?');
      $stmt->bind_param('i', $id);
      $stmt->execute();
      $result = $stmt->get_result();
      if(!isset($result)){
        $message = "No Data.";
      }
      else{
            while ($row = $result->fetch_assoc()){
               $obj = $row;
            }
         
      }
  }
  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $stmt = $link->prepare('Select * from tblappointment where iId = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
      if(!isset($result)){
        $message = "No Data.";
      }
      else{
            while ($row = $result->fetch_assoc()){
               $obj = $row;
            }
         
      }
  }

  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Appointment
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Appointment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">View Appointment Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="view-appointment.php" method="post">
                <!-- text input -->
                  
                  
                  <div class="row">
                	
		                <div class="col-md-6 form-group">
		                  <label>Date</label>
		                  <input type="date" class="form-control" placeholder="Date" name="contratcdate" id="contratcdate" required disabled value="<?php if(isset($obj['sDate'])) echo $obj['sDate']; ?>">
		                </div>
                        
                        <div class="col-md-6 form-group">
		                  <label>Time</label>
		                  <input type="time" class="form-control" placeholder="Date" name="contratctime" id="contratctime" required disabled value="<?php if(isset($obj['sTime'])) echo $obj['sTime']; ?>">
		                </div>
                	</div>
                

                 <div class="row">
                	
		                <div class="col-md-12 form-group">
		                <label>Patient</label>
		                <select class="form-control select2" style="width: 100%;" name="patient" id="patient">
		                		<?php 
					      		$stmt = $link->prepare('Select * from tblaccount order by sAccountName');
						        $stmt->execute();
						        $result = $stmt->get_result();
							      if(!isset($result)){
							        echo "No Data";
							      }
							      else{
							            while ($row = $result->fetch_assoc()){ 
		                	?>
		                   <option value="<?php echo $row['iAccountId']?>" <?php if(isset($obj['iPatient']) && $obj['iPatient'] == $row['iAccountId']) echo "selected" ; ?>><?php echo $row['sAccountName']?></option>
		                   <?php }
			                	}
			                 ?>
		                </select>
		              </div>

		           </div>


		             <div class="row">
                		<div class="col-md-12 form-group">
		                  <label>Symptoms</label>
                            <textarea class="form-control" placeholder="Symptoms" name="symptoms" id="symptoms" required disabled><?php if(isset($obj['sSymptons'])) echo $obj['sSymptons']; ?></textarea>
		                  
		                </div>
		                
		                
		             
		            </div>

		               <div class="row">

                		
		                 <div class="col-md-12 form-group">
		                  <label>Prescription Given</label>
                             <textarea class="form-control" placeholder="Prescription Given" name="remark" id="remark" required disabled><?php if(isset($obj['sPrescription'])) echo $obj['sPrescription']; ?></textarea>
		                  
		                </div>

		            </div>
                  
                  
                  
              
                <input type="hidden" name="id" value="<?php if(isset($obj['iId'])) echo $obj['iId'] ?>">
                <?php if(isset($obj['iId'])) { ?>
                        <div class="form-group m-b-5">
                          <div class="col-lg-12">
                            <center>
                            
                            <input type="button" name="edit" value="Edit" class="btn btn-warning" id="btnEdit" onclick="showEdit();">
                            <input type="submit" name="delete" value="Delete" class="btn btn-danger" id="btnDelete" onclick="return confirm('Are you sure you want to Delete this Contract?');" style="margin-right: 2%">
                            <input type="submit" name="submitdata" value="Update" class="btn btn-success" id="btnSubmit" style="display: none" onclick="return confirm('Are you sure you want to Update this Appointment?');">
                          </center>
                          </div>
                        </div>
                   
                <?php } ?>
              </form>
               <script type="text/javascript">
                      
                      function showEdit(){
                        document.getElementById('contratcdate').disabled = false;
                        document.getElementById('contratctime').disabled = false;
                        document.getElementById('patient').disabled = false;
                        document.getElementById('symptoms').disabled = false;
                        document.getElementById('remark').disabled = false;
                        
                        document.getElementById('btnSubmit').style.display = "block";
                        document.getElementById('btnEdit').style.display = "none";
                        document.getElementById('btnDelete').style.display = "none";
                        
                      }

                    </script>

            </div>
            <!-- /.box-body -->
          </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
  include "footer.php";
  ?>