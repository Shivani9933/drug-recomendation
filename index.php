<?php
session_start();
if(!isset($_SESSION['userid']) || $_SESSION['userid'] == 0){
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
  

  
  <div class="content-wrapper">
  
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  
    <section class="content">
  
      
           
        <div class="content">
            
             <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title" style="width:100%;text-align:center"> Today's Appointments [<?php echo date("d-M-Y"); ?>]</h3>
            </div>
     
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Patient Name</th>
                  <th class="">View</th>
                </tr>
                </thead>
                <tbody>
                	<?php 
                if(isset($_SESSION['user'])){
  					      $stmt = $link->prepare('Select * from tblappointment order by iId');
                }else{
                  $stmt = $link->prepare('Select * from tblappointment WHERE sDate = CURDATE() order by iId');
                  
                }
				        $stmt->execute();
				        $result = $stmt->get_result();
					      if(!isset($result)){
					        echo "No Data";
					      }
					      else{
					      	$count =0;
					            while ($row = $result->fetch_assoc()){ 
					            	$count++;            		
                	?>
                <tr>
               
                  <td><?php echo htmlentities(date('d-m-Y', strtotime( $row['sDate'] )), ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities(date('H:s', strtotime( $row['sTime'] )), ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities(fnGetAccount($row['iPatient'],$link), ENT_QUOTES); ?></td>
                  
                  <td><CENTER>
                    <form action="view-contract.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $row['iId']; ?>">
                      <CENTER><input type="submit" name="submit" value="View" class="btn btn-success" /></CENTER>
                    </form>
                  </CENTER></td>
                </tr>
                <?php }
                	}
                 ?>
              </table>
                 </div>
            </div>
            
        </div>
    </section>
    
  </div>
  
  <?php 
  include "footer.php";
  ?>