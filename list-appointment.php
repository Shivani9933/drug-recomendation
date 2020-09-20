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
        Appointments
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List Appointments</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Appointment List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Patient</th>
                  <th class="">View</th>
                </tr>
                </thead>
                <tbody>
                	<?php 
                if(isset($_SESSION['user'])){
  					      $stmt = $link->prepare('Select * from tblappointment order by iId DESC');
                }else{
                  $stmt = $link->prepare('Select * from tblappointment order by iId DESC');
                  
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
                  <td><?php echo htmlentities(date('H:i', strtotime( $row['sTime'] )), ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities(fnGetAccount($row['iPatient'],$link), ENT_QUOTES); ?></td>
                  
                  <td><CENTER>
                    <form action="view-appointment.php" method="post">
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
            <!-- /.box-body -->
          </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
  include "footer.php";
  ?>
  <script>
  $(function () {
    $('#example1').DataTable()
  })
</script>