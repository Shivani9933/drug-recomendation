<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("Location:login.php");
}
include "header.php";
include "sidenav.php";


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


?>

  



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Patient Report
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Patient Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="patient-report.php" method="post">
                <!-- text input -->
               <div class="row">
                	
                     <div class="col-md-4 form-group">
                      <label>Patient</label>
		                <select class="form-control select2" style="width: 100%;" name="patient">
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
		                  <option value="<?php echo $row['iAccountId']?>"><?php echo $row['sAccountName']?></option>
		                   <?php }
			                	}
			                 ?>
		                </select>
                    </div>
                   <div class="col-md-1 form-group">
                       <label>.</label>
                       <input type="submit" value="View" name="view" class="btn btn-success form-control">
                   </div>
                 
                </div>
            </form>
					


            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                     
                      <th>Date</th>
                      <th>Symptoms</th>
                      <th>Prescription</th>
                      
                </tr>
                </thead>
                <tbody>
                  <?php 
                  if(isset($_POST['view'])){
                      
                      $patient = $_POST['patient'];
                      
                      $stmt = $link->prepare("Select * from tblappointment where iPatient = ? ORDER BY iId DESC");
                      $stmt->bind_param('i', $patient);
                      
                      
                    

                    
                $stmt->execute();
                $result = $stmt->get_result();
               
                if(!isset($result)){
                  echo "No Data";
                }
                else{
                  $count =0;
                      while ($row = $result->fetch_assoc()){ 

                               
                  ?>
                <tr>
                  
                  <td><?php echo htmlentities(date('d-M-Y', strtotime($row['sDate'])), ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities($row['sSymptons'], ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities($row['sPrescription'], ENT_QUOTES); ?></td>
                  
                </tr>
                <?php }
                  }
                    }
                 
                  ?>
                  
                </tbody>
              
              </table>
            </div>
					
				<!-- <div class="col-md-12" style="margin-top: 2%">
					<table id="example1" class="table table-bordered table-striped">
             <thead>
						<tr>
		                  <th>Sr No</th>
		                  <th>Customer Name</th>
		                  <th>Loan Amount</th>
		                  <th>Total Interest</th>
		                  <th>Total Paid</th>
		                  <th>Total Paid Interest</th>
		                  <th>Net Balance Due</th>
		                </tr>
                  </thead>
                  <tbody>
		                <tr>
		                 
		                  <td>1</td>
		                  <td>ABC</td>
		                  <td>25000</td>
		                  <td>10000</td>
		                  <td>5000</td>
		                  <td>10000</td>
		                  <td>20000</td>
		                </tr>
		               
		                </tbody>
		              </table>
		
				</div>
 -->
              
              
    		  
              
	            <!--     <center>
	                	<a href="index.php" class="btn btn-warning">Cancel</a>
	                	<input type="submit" name="Submit" class="btn btn-primary">
					</center> -->
              
            </div>
            <!-- /.box-body -->
          </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> 

  <script type="text/javascript">
  	

function initSelect() {
  $('.select2').select2();
}

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
});

</script>

  <?php 
  include "footer.php";
  ?>



  	 // $('#datepicker').datepicker({
    //   autoclose: true,
    // });

  	  // $(document).ready(function(){
     //                var date_input=$('input[name="fromdate"],input[name="todate"]');
     //                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
     //                var options={
     //                  format: 'dd/mm/yyyy',
     //                  container: container,
     //                  todayHighlight: true,
     //                  autoclose: true,
     //                };
     //                date_input.datepicker(options);
     //              })

  	 // $('#datepicker1').datepicker({
    //   autoclose: true
    // });

  