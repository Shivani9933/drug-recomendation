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
        Patients
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List Patients</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">List Patients</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Name</th>
                  <th>Phone No</th>
                  <th>Email</th>
                  <th class="">View</th>
                </tr>
                </thead>
                <tbody>
                	<?php 
					      $stmt = $link->prepare('Select * from tblaccount order by iAccountId');
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
                  <td><?php echo htmlentities($row['sAccountName'], ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities($row['sPhone'], ENT_QUOTES); ?></td>
                  <td><?php echo htmlentities($row['sEmail'], ENT_QUOTES); ?></td>
                  <td><CENTER><a href="view-patient.php?id=<?php echo $row['iAccountId']; ?>" class="btn btn-success">View</a></CENTER></td>
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