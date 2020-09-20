<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("Location:login.php");
}


include "Classes/PHPExcel.php";

include "header.php";
include "sidenav.php";


			// $sheet
		 //    ->setCellValue('A13', 'KTI/N/')
		 //    ->setCellValue('B13', 'Date :')
		 //    ->setCellValue('B18', 'KTI/N/')
		 //    ->setCellValue('B19', 'KTI/N/')
		 //    ->setCellValue('B22', 'KTI/N/')
		 //    ->setCellValue('B23', 'KTI/N/')
		 //    ->setCellValue('B25', 'KTI/N/')
		 //    ->setCellValue('B26', 'KTI/N/')
		 //    ->setCellValue('B30', 'KTI/N/')
		 //    ->setCellValue('B30', 'KTI/N/')
		 //    ->setCellValue('B35', 'KTI/N/')
		 //    ->setCellValue('B37', 'KTI/N/')
		 //    ->setCellValue('B39', 'KTI/N/')
		 //    ->setCellValue('B42', 'KTI/N/')
		 //    ->setCellValue('B44', 'KTI/N/')
		 //    ->setCellValue('B46', 'KTI/N/');


		 //    exit();

function getIndianCurrency($number)
{
	
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return 'Rupees '.($Rupees ? $Rupees . '' : '') . $paise;
}

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
	if(isset($_POST['contratcdate'])){
		//$contractno = $_POST['contractno'];
		$contratcdate = $_POST['contratcdate'];
		$contratctime = $_POST['contratctime'];
		$patient = $_POST['patient'];
		
		$symptoms = $_POST['symptoms'];
		
		$remark = $_POST['remark'];


        echo $contratcdate.','.$contratctime.','.$patient.','.$symptoms.','.$remark;
        
		$query = "INSERT INTO tblappointment (sDate,sTime,iPatient,sSymptons,sPrescription) VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"ssiss",$contratcdate,$contratctime,$patient,$symptoms,$remark);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           echo '<script> alert("Data Not Saved. Try Again.") </script>';
          }else{
             echo  '<script>alert("Data Saved.")</script>';

          }
	}



?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Appointment
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Appointment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Appointment Details</h3>
            </div>
            <!-- /.box-header -->
            <?php if(!isset($flag)) { ?>
            <div class="box-body">
                <div class="col-md-6">
                <form role="form" method="post" action="add-appointment.php">
                <!-- text input -->
                <div class="row">
                	
		                <div class="col-md-6 form-group">
		                  <label>Date</label>
		                  <input type="date" class="form-control" placeholder="Date" name="contratcdate" required>
		                </div>
                        
                        <div class="col-md-6 form-group">
		                  <label>Time</label>
		                  <input type="time" class="form-control" placeholder="Date" name="contratctime" required>
		                </div>
                	</div>
                

                 <div class="row">
                	
		                <div class="col-md-12 form-group">
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

		           </div>


		             <div class="row">
                		<div class="col-md-12 form-group">
		                  <label>Symptoms</label>
                            <textarea class="form-control" placeholder="Symptoms" name="symptoms" required></textarea>
		                  
		                </div>
		                
		                
		             
		            </div>

		               <div class="row"   <?php if($_SESSION['type'] != 'D') { echo "style='display:none'"; } ?> >

                		
		                 <div class="col-md-12 form-group">
		                  <label>Prescription Given</label>
                             <textarea class="form-control" placeholder="Prescription Given" name="remark"></textarea>
		                  
		                </div>

		            </div>
              
               
                <center>
                	<a href="index.php" class="btn btn-warning">Cancel</a>
                	<input type="submit" name="Submit" value="Save" class="btn btn-success">
				</center>
              </form>
                </div>
              
            </div>
        <?php } else { ?>
        	<div class="box-body">
        		<a href="<?php echo $inputFileName; ?>" class="btn btn-success">Download</a>
        	</div>
        <?php } ?>
            <!-- /.box-body -->
          </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php 
  include "footer.php";
  ?>
<!-- Bootstrap 3.3.7 -->


  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>

  <script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> 

  <script type="text/javascript">
  	 $(document).ready(function(){
                    var date_input=$('input[name="enddate"],input[name="loandate"]');
                    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                    var options={
                      format: 'dd/mm/yyyy',
                      container: container,
                      todayHighlight: true,
                      autoclose: true,
                    };
                    date_input.datepicker(options);
                  })

function initSelect() {
  $('.select2').select2();
}

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
});


  </script>