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
        Analysis
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Analysis</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Analysis</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="analysis.php" method="post">
                <!-- text input -->
                  
                  
                  <div class="row" id="type">
                	
		                <div class="col-md-6 form-group">
		                  <label>Type</label>
		                  <select name="type" class="form-control"  id="types" onchange="fnShowSymptom1()">
                              <option value="0">Select</option>
                              <option value="1">Teeth</option>
                              <option value="2">Stomach</option>
                              <option value="3">Extremities</option>
                              <option value="4">Fever</option>
                              
                            </select>
		                </div>
                        
                        
                	</div>
                  
                  <div class="row" id="symptom1" style="display:none" onchange="fnShowSymptom2()">
                	
		                <div class="col-md-6 form-group">
		                  <label>Symptom 1</label>
		                  <select name="symptom1"   class="form-control" id="symptom1s">
                              <option value="0">Select</option>
                              <option value="1">Pain</option>
                              <option value="2">Vomitting</option>
                              <option value="3">Paralysis</option>
                              <option value="4">In Morning</option>
                            </select>
		                </div>
                        
                        
                	</div>
                  
                  
                  <div class="row" id="symptom2" style="display:none" onchange="fnShowSymptom3()">
                	
		                <div class="col-md-6 form-group">
		                  <label>Symptom 2</label>
		                  <select name="symptom2"  class="form-control" id="symptom2s">
                              <option value="0">Select</option>
                              <option value="1">Cold Water</option>
                              <option value="2">Acidity</option>
                              <option value="3">Fingers</option>
                              <option value="4">Body Ache</option>
                            </select>
		                </div>
                        
                        
                	</div>
                  
                  
                  


		             <div class="row" id="sufferingfrom" style="display:none" onchange="fnShowSuffering()">
                		<div class="col-md-6 form-group">
		                  <label>May be Suffering From</label> 
                            <textarea class="form-control" placeholder="Suffering From" name="sufferingfrom"  id="sufferingfroms" disabled></textarea>
		                  
		                </div>
		                
		                
		             
		            </div>

		               <div class="row" id="remedies" style="display:none">
                		<div class="col-md-6 form-group">
		                  <label>Remedies</label>
                            <textarea class="form-control" placeholder="Remedies From" name="remedies"  id="remediess" disabled><?php if(isset($obj['sSymptons'])) echo $obj['sSymptons']; ?></textarea>
		                  
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
                      
                      function fnShowSymptom1(){
                       
                        
                        document.getElementById('symptom1').style.display = "block";
                        document.getElementById('symptom2').style.display = "none";
                        document.getElementById('sufferingfrom').style.display = "none";
                        document.getElementById('remedies').style.display = "none";
                        
                      }
                   
                   
                   function fnShowSymptom2(){
                       
                        
                        document.getElementById('symptom1').style.display = "block";
                        document.getElementById('symptom2').style.display = "block";
                        document.getElementById('sufferingfrom').style.display = "none";
                        document.getElementById('remedies').style.display = "none";
                        
                      }
                   
                   function fnShowSymptom3(){
                       
                        
                        document.getElementById('symptom1').style.display = "block";
                        document.getElementById('symptom2').style.display = "block";
                        document.getElementById('sufferingfrom').style.display = "block";
                        document.getElementById('remedies').style.display = "block";
                       
                       
                       var type = document.getElementById("types");
                        var valtype = type.options[type.selectedIndex].value;
                       
                       var s1 = document.getElementById("symptom1s");
                        var vals1 = s1.options[s1.selectedIndex].value;
                       
                       var s2 = document.getElementById("symptom2s");
                        var vals2 = s2.options[s2.selectedIndex].value;
                       
                       var suffering = document.getElementById("sufferingfroms");
                       
                       if(valtype == '1' && vals1 == '1' & vals2 == '1')
                       {
                           suffering.value = 'coofeia';
                       }
                       else if(valtype == '2' && vals1 == '2' & vals2 == '2')
                       {
                           suffering.value = 'theridian';
                       }
                       else if(valtype == '3' && vals1 == '3' & vals2 == '3')
                       {
                           suffering.value = 'cars-sulph';
                       }
                       else if(valtype == '4' && vals1 == '4' & vals2 == '4')
                       {
                           suffering.value = 'sabadilla';
                       }
                       else
                           {
                               suffering.value = 'No Resultes Found';
                           }
                           
                       
                       var remedies = document.getElementById("remediess");
                       
                       if(valtype == '1' && vals1 == '1' & vals2 == '1')
                       {
                           remedies.value = '5 Remedies';
                       }
                        else if(valtype == '2' && vals1 == '2' & vals2 == '2')
                       {
                           remedies.value = '1 Remedies';
                       }
                       else if(valtype == '3' && vals1 == '3' & vals2 == '3')
                       {
                           remedies.value = '1 Remedy';
                       }
                       else if(valtype == '4' && vals1 == '4' & vals2 == '4')
                       {
                           remedies.value = '3 Remedies';
                       }
                       else
                           {
                               remedies.value = 'No Remedies Found';
                           }
                        
                      }
                   
                   
                   function fnShowSuffering(){
                       
                        
                        document.getElementById('symptom1').style.display = "block";
                        document.getElementById('symptom2').style.display = "block";
                        document.getElementById('sufferingfrom').style.display = "block";
                        document.getElementById('remedies').style.display = "none";
                        
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