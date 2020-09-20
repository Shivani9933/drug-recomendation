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

function fnGetProductName($id,$link){
  $stmt = $link->prepare('Select * from tblproduct where iProductId = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return $row['sProductName'];
  }
  return "N/A";
}

function fnGetLoaidngQty($id,$link){
  $stmt = $link->prepare('Select sum(sLoadingQty) as num from tblloadingunloading where sContractNo = ?');
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    // return $id;
    return number_format((float)$row['num'], 5, '.', '');
  }
  return 0;
}

function fnGetLoaidngAmount($id,$link){
  $stmt = $link->prepare('Select sum(sTotal) as num from tblloadingunloading where sContractNo = ?');
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    // return $id;
    return number_format((float)$row['num'], 2, '.', '');
  }
  return 0;
}

function fnGetPaymentAmount($id,$link){
  $stmt = $link->prepare('Select sum(dAmount) as num from tblpayemtloading where iLoadingId IN (select iId from tblloadingunloading where sContractNo = ?)');
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    // return $id;
    return number_format((float)$row['num'], 2, '.', '');
  }
  return 0;
}



?>

  



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pending Contracts
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pending Contracts</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Pending Contracts Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="pending-bills.php" method="post">
                <!-- text input -->
               <div class="row">
                	<div class="col-md-12">
                     <div class="col-md-4 form-group">
                      <label>Type</label>
                      <select class="form-control select2" name="type">
                        <option <?php if(isset($_POST['type']) && $_POST['type'] == 'General') echo "selected"; ?>>General</option>
                        <option <?php if(isset($_POST['type']) && $_POST['type'] == 'Productwise') echo "selected"; ?>>Productwise</option>
                        <option <?php if(isset($_POST['type']) && $_POST['type'] == 'Sellerwise') echo "selected"; ?>>Sellerwise</option>
                        <option <?php if(isset($_POST['type']) && $_POST['type'] == 'Buyerwise') echo "selected"; ?>>Buyerwise</option>
                      </select>
                    </div>
                     <div class="col-md-4 form-group"  id="productdiv">
                      <label>Product</label>
                      <select class="form-control select2" style="width: 100%;" name="product" id="product">
                        <option value=""></option>
                          <?php 
                      $stmt = $link->prepare('Select * from tblproduct order by sProductName');
                      $stmt->execute();
                      $result = $stmt->get_result();
                      if(!isset($result)){
                        echo "No Data";
                      }
                      else{
                            while ($row = $result->fetch_assoc()){ 
                        ?>
                        <option value="<?php echo $row['iProductId']?>" <?php if(isset($_POST['product']) && $_POST['product'] == $row['iProductId']) echo "selected"; ?>><?php echo $row['sProductName']?></option>
                         <?php }
                          }
                         ?>
                      </select>
                    </div>
                     <div class="col-md-4 form-group"  id="accountdiv">
                      <label>Account</label>
                       <select class="form-control select2" style="width: 100%;" name="account">
                        <option value=""></option>
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
                        <option value="<?php echo $row['iAccountId']?>" <?php if(isset($_POST['account']) && $_POST['account'] == $row['iAccountId']) echo "selected"; ?>><?php echo $row['sAccountName']?></option>
                         <?php }
                          }
                         ?>
                      </select>
                    </div>
                 
		                <div class="col-md-6 form-group">
		                  <label>From Date</label>
		                  <input type="date" name="fromdate" class="form-control" <?php if(isset($_POST['fromdate'])) echo "value='".$_POST['fromdate']."'"; ?> placeholder="From Date" name="fromdate">
		                </div>
		                 <div class="col-md-6 form-group">
		                  <label>To Date</label>
		                  <input type="date" name="todate" class="form-control" <?php if(isset($_POST['todate'])) echo "value='".$_POST['todate']."'"; ?> placeholder="To Date" name="todate">
		                </div>
 						
                	</div>
                </div>
                <CENTER>
                    <input type="submit" value="View" name="view" class="btn btn-success">
                    <input type="submit" value="Export" name="export" class="btn btn-warning">
                </CENTER>
            </form>
					


            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                      <th>BC No</th>
                      <th>BC Date</th>
                      <th>Product</th>
                      <th>Seller</th>
                      <th>Buyer</th>
                      <th>Contract Rate</th>
                      <th>Loading Bill</th>
                      <th>Balance Bill</th>
                      <th>View Loading</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                   $totalAmount = 0;
                $totalInterest = 0;
                $totalPaid = 0;
                $totalIntPaid = 0;
                $totalBalDue = 0;
                  if(isset($_POST['fromdate'])){
                    if($_POST['type'] == 'General'){
                      $stmt = $link->prepare("Select * from tblcontract where sDate >= ? and sDate <= ? and iFirmId = ?");
                      $stmt->bind_param('ssi', $_POST['fromdate'],$_POST['todate'],$_SESSION['userid']);

                    }else if($_POST['type'] == 'Productwise'){
                     $stmt = $link->prepare("Select * from tblcontract where sDate >= ? and sDate <= ? and iFirmId = ? and iProductId = ?");
                      $stmt->bind_param('ssii', $_POST['fromdate'],$_POST['todate'],$_SESSION['userid'],$_POST['product']);

                    }elseif ($_POST['type'] == 'Buyerwise') {
                      $stmt = $link->prepare("Select * from tblcontract where sDate >= ? and sDate <= ? and iFirmId = ? and iBuyer = ?");
                      $stmt->bind_param('ssii', $_POST['fromdate'],$_POST['todate'],$_SESSION['userid'],$_POST['account']);
                      
                    }elseif ($_POST['type'] == 'Sellerwise') {
                      $stmt = $link->prepare("Select * from tblcontract where sDate >= ? and sDate <= ? and iFirmId = ? and iSeller = ?");
                      $stmt->bind_param('ssii', $_POST['fromdate'],$_POST['todate'],$_SESSION['userid'],$_POST['account']);
                      
                    }

                    
                $stmt->execute();
                $result = $stmt->get_result();
               
                if(!isset($result)){
                  echo "No Data";
                }
                else{
                  $count =0;
                      while ($row = $result->fetch_assoc()){ 
                        if(fnGetLoaidngAmount($row['iId'],$link) <= fnGetPaymentAmount($row['iId'],$link)){
                          continue;
                        }
                  ?>
                <tr>
                  <td><?php echo htmlentities($row['iContractId'], ENT_QUOTES) ?></td>
                  <td><?php echo htmlentities(date('d-M-Y', strtotime($row['sDate'])), ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities(fnGetProductName($row['iProductId'],$link), ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities(fnGetAccount($row['iSeller'],$link), ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities(fnGetAccount($row['iBuyer'],$link), ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities($row['sRate'], ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities(fnGetLoaidngAmount($row['iId'],$link), ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities(number_format((float)fnGetLoaidngAmount($row['iId'],$link) - (float) fnGetPaymentAmount($row['iId'],$link), 2, '.', ''), ENT_QUOTES); ?></td>
                  <td>
                    <form action="list-loading.php" method="post">
                      <input type="hidden" name="contractno" value="<?php echo $row['iId'] ?>">
                      <center><input type="submit" name="btnsubmit" class="btn btn-success" value="View"></center>
                    </form>
                  </td>
                 
                </tr>
                <?php }
                  }
                 
                  }
                  ?>
                  
                </tbody>
               <!--  <tfoot>
                <tr>
                  <th>Total</th>
                  <th></th>
                  <th></th>
                  <th><?php echo $totalAmount ?></th>
                  <th><?php echo $totalInterest ?></th>
                  <th><?php echo $totalPaid ?></th>
                  <th><?php echo $totalIntPaid ?></th>
                  <th><?php echo $totalBalDue ?></th>
                </tr>
                </tfoot> -->
                
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


  <?php 
  include "footer.php";
  ?>


  <script type="text/javascript">

  	 

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

  $(function () {
    $('#example1').DataTable()
  })

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!

var yyyy = today.getFullYear();
if(dd<10){
    dd='0'+dd;
} 
if(mm<10){
    mm='0'+mm;
} 
var today = dd+'/'+mm+'/'+yyyy;

document.getElementById("datepicker1").value = today;

var today = new Date();
var dd = today.getDate() + 1;
var mm = today.getMonth(); //January is 0!

var yyyy = today.getFullYear();
if(dd<10){
    dd='0'+dd;
} 
if(mm<10){
    mm='0'+mm;
} 
var today = dd+'/'+mm+'/'+yyyy;
document.getElementById("datepicker").value = today;
  </script>
  
  <?php
if(isset($_POST['export'])){

  
  if($_POST['type'] == 'General'){
    $stmt = $link->prepare("Select * from tblcontract where sDate >= ? and sDate <= ? and iFirmId = ?");
    $stmt->bind_param('ssi', $_POST['fromdate'],$_POST['todate'],$_SESSION['userid']);

  }else if($_POST['type'] == 'Productwise'){
   $stmt = $link->prepare("Select * from tblcontract where sDate >= ? and sDate <= ? and iFirmId = ? and iProductId = ?");
    $stmt->bind_param('ssii', $_POST['fromdate'],$_POST['todate'],$_SESSION['userid'],$_POST['product']);

  }elseif ($_POST['type'] == 'Buyerwise') {
    $stmt = $link->prepare("Select * from tblcontract where sDate >= ? and sDate <= ? and iFirmId = ? and iBuyer = ?");
    $stmt->bind_param('ssii', $_POST['fromdate'],$_POST['todate'],$_SESSION['userid'],$_POST['account']);
    
  }elseif ($_POST['type'] == 'Sellerwise') {
    $stmt = $link->prepare("Select * from tblcontract where sDate >= ? and sDate <= ? and iFirmId = ? and iSeller = ?");
    $stmt->bind_param('ssii', $_POST['fromdate'],$_POST['todate'],$_SESSION['userid'],$_POST['account']);
    
  }

  $stmt->execute();
  $result = $stmt->get_result();
               

  $objPHPExcel = new PHPExcel(); 
// Set the active Excel worksheet to sheet 0
  $objPHPExcel->setActiveSheetIndex(0); 
  // Initialise the Excel row number
  $rowCount = 2; 

  $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'BC No'); 
  $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'BC Date'); 
  $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Product'); 
  $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Seller'); 
  $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Buyer'); 
  $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Contract Rate'); 
  $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Loading Bill'); 
  $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Balance Bill'); 
  


  // Iterate through each result from the SQL query in turn
  // We fetch each database result row into $row in turn
  while($row = $result->fetch_assoc()){ 
      if(fnGetLoaidngAmount($row['iId'],$link) <= fnGetPaymentAmount($row['iId'],$link)){
        continue;
      }
      $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount,htmlentities($row['iContractId'], ENT_QUOTES)); 
      $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, htmlentities(date('d-M-Y', strtotime($row['sDate'])), ENT_QUOTES)); 
      $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount,htmlentities(fnGetProductName($row['iProductId'],$link), ENT_QUOTES)); 
      $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount,htmlentities(fnGetAccount($row['iSeller'],$link), ENT_QUOTES)); 
      $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount,htmlentities(fnGetAccount($row['iBuyer'],$link), ENT_QUOTES)); 
      $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount,htmlentities($row['sRate'], ENT_QUOTES)); 
      $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount,htmlentities(fnGetLoaidngAmount($row['iId'],$link), ENT_QUOTES)); 
      $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount,htmlentities(number_format((float)fnGetLoaidngAmount($row['iId'],$link) - (float) fnGetPaymentAmount($row['iId'],$link), 2, '.', ''), ENT_QUOTES)); 
      $rowCount++; 
  } 

  $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
  $objWriter->save('excel/pendingcontracts.xlsx'); 
  echo "<script>window.location = 'excel/pendingbills.xlsx'</script>";
  
}

   ?>