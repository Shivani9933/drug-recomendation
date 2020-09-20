<?php
session_start();
include "header.php";
include "sidenav.php";
?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Symptoms/Prescriptions
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List Symptoms/Prescriptions</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Symptoms/Prescriptions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Symptoms</th>
                  <th>Prescription</th>
                  
                </tr>
                </thead>
                <tbody>
                	<?php 
					      $stmt = $link->prepare('Select * from tblappointment order by iId DESC');
				        // $stmt->bind_param('i', $id);
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
                  <td><?php echo $count ?></td>
                  <td><?php echo htmlentities($row['sSymptons'], ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities($row['sPrescription'], ENT_QUOTES); ?></td>
                  
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