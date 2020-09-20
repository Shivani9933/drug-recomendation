<?php
session_start();
include "header.php";
include "sidenav.php";
?>
  <?php 
  if(isset($_POST['submit'])){
    if(isset($_POST['name'])){
      $name = $_POST['name'];
    }else{
      $name = "";
    }

    if(isset($_POST['ownername'])){
      $ownername = $_POST['ownername'];
    }else{
      $ownername = "";
    }

    if(isset($_POST['address'])){
      $address = $_POST['address'];
    }else{
      $address = "";
    }

    if(isset($_POST['city'])){
      $city = $_POST['city'];
    }else{
      $city = "";
    }

    if(isset($_POST['state'])){
      $state = $_POST['state'];
    }else{
      $state = "";
    }

    if(isset($_POST['pincode'])){
      $pincode = $_POST['pincode'];
    }else{
      $pincode = "";
    }

    if(isset($_POST['phone'])){
      $phone = $_POST['phone'];
    }else{
      $phone = "";
    }

    if(isset($_POST['oaddress'])){
      $oaddress = $_POST['oaddress'];
    }else{
      $oaddress = "";
    }

    if(isset($_POST['ocity'])){
      $ocity = $_POST['ocity'];
    }else{
      $ocity = "";
    }

    if(isset($_POST['ostate'])){
      $ostate = $_POST['ostate'];
    }else{
      $ostate = "";
    }

    if(isset($_POST['opincode'])){
      $opincode = $_POST['opincode'];
    }else{
      $opincode = "";
    }

    if(isset($_POST['ophone'])){
      $ophone = $_POST['ophone'];
    }else{
      $ophone = "";
    }

    if(isset($_POST['email'])){
      $email = $_POST['email'];
    }else{
      $email = "";
    }

    if(isset($_POST['panno'])){
      $panno = $_POST['panno'];
    }else{
      $panno = "";
    }

    if(isset($_POST['gstno'])){
      $gstno = $_POST['gstno'];
    }else{
      $gstno = "";
    }

    if(isset($_POST['bank'])){
      $bank = $_POST['bank'];
    }else{
      $bank = "";
    }

    if(isset($_POST['ifsc'])){
      $ifsc = $_POST['ifsc'];
    }else{
      $ifsc = "";
    }

    if(isset($_POST['account'])){
      $account = $_POST['account'];
    }else{
      $account = "";
    }

    if(isset($_POST['ocountry'])){
      $ocountry = $_POST['ocountry'];
    }else{
      $ocountry = "";
    }

    if(isset($_POST['country'])){
      $country = $_POST['country'];
    }else{
      $country = "";
    }

    if(isset($_POST['statecode'])){
      $statecode = $_POST['statecode'];
    }else{
      $statecode = "";
    }

    if(isset($_POST['ostatecode'])){
      $ostatecode = $_POST['ostatecode'];
    }else{
      $ostatecode = "";
    }

    if(isset($_POST['iec'])){
      $iec = $_POST['iec'];
    }else{
      $iec = "";
    }

    if(isset($_POST['brokeragetype'])){
      $brokeragetype = $_POST['brokeragetype'];
    }else{
      $brokeragetype = "";
    }

    if(isset($_POST['brokerageamount'])){
      $brokerageamount = $_POST['brokerageamount'];
    }else{
      $brokerageamount = "";
    }
    
     if(isset($_FILES['gstfile']) && $_FILES["gstfile"]["size"] > 0){
     $target_dir = "gstfiles/";
    $target_file = $target_dir . basename($_FILES["gstfile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     if (move_uploaded_file($_FILES["gstfile"]["tmp_name"], $target_file)) {
      $reportfile = $target_file;
       $query = "INSERT INTO tblaccount (sAccountName,sOwnerName,sAddress,sCity,sState,sPincode,sPhone,sEmail,sPANNo,sGSTNo,sBankName,sAccountNo,sIFSCCode,sOfficeAddress,sOfficeCity,sOfficeState,sOfficePincode,sOfficePhone,sCounrty,sOfficeCountry,sGstFile,sStateCode,sOfficeStateCode,sIEC,sBrokerageType,sBrokerageAmount) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"ssssssssssssssssssssssssss",$name,$ownername,$address,$city,$state,$pincode,$phone,$email,$panno,$gstno,$bank,$account,$ifsc,$oaddress,$ocity,$ostate,$opincode,$ophone,$country,$ocountry,$reportfile,$statecode,$ostatecode,$iec,$brokeragetype,$brokerageamount);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           echo '<script> alert("Data Not Saved. Try Again.") </script>';
          }else{
             echo  '<script>alert("Data Saved.")</script>';
          }
     }else{
      echo '<script> alert("Data Not Saved. Try Again.") </script>';
     }
  }else{
    $query = "INSERT INTO tblaccount (sAccountName,sOwnerName,sAddress,sCity,sState,sPincode,sPhone,sEmail,sPANNo,sGSTNo,sBankName,sAccountNo,sIFSCCode,sOfficeAddress,sOfficeCity,sOfficeState,sOfficePincode,sOfficePhone,sCounrty,sOfficeCountry,sStateCode,sOfficeStateCode,sIEC,sBrokerageType,sBrokerageAmount) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"sssssssssssssssssssssssss",$name,$ownername,$address,$city,$state,$pincode,$phone,$email,$panno,$gstno,$bank,$account,$ifsc,$oaddress,$ocity,$ostate,$opincode,$ophone,$country,$ocountry,$statecode,$ostatecode,$iec,$brokeragetype,$brokerageamount);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           echo '<script> alert("Data Not Saved. Try Again.") </script>';
          }else{
             echo  '<script>alert("Data Saved.")</script>';
          }
    }
  }
  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Patient
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Patient</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Patient Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <form role="form" action="add-patient.php" method="post" enctype="multipart/form-data"> 
                <!-- text input -->
                <div class="col-md-12 form-group">
                  <label>Patient Name</label>
                  <input type="text" class="form-control" placeholder="Name" name="name" >
                </div>


                <!-- textarea -->
                <div class="col-md-12 form-group">
                  <label>Address</label>
                  <textarea class="form-control" rows="1" placeholder="Address" name="address" ></textarea>
                </div>

                <div class="col-md-12 form-group">
                  <label>City</label>
                  <input type="text" class="form-control" placeholder="City" name="city" >
                </div>
              <!--   <div class="col-md-6 form-group">
                  <label>State Code</label>
                  <input type="text" class="form-control" placeholder="State Code" name="statecode" >
                </div> -->
                <div class="col-md-12 form-group">
                  <label>State</label>
                   <select class="form-control select2" style="width: 100%;" name="state">
                        <?php 
                    $stmt = $link->prepare('Select * from tblstatecode order by sState');
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if(!isset($result)){
                      echo "No Data";
                    }
                    else{
                          while ($row = $result->fetch_assoc()){ 
                      ?>
                      <option value="<?php echo $row['sState']?>"><?php echo $row['sState']?></option>
                       <?php }
                        }
                       ?>
                    </select>
                </div>
                

                <div class="col-md-12 form-group">
                  <label>Contact No</label>
                  <input type="number" class="form-control" placeholder="Number" name="phone" >
                </div>

                

                 <div class="col-md-12 form-group">
                  <label>Email Id</label>
                  <input type="email" class="form-control" placeholder="Email Id" name="email" >
                </div>
                

                 <div class="col-md-12 form-group">
                  <label>File</label>
                  <input type="file" class="form-control" placeholder="" id="gstfile" name="gstfile" >
                </div>

                <center>
                	<a href="index.php" class="btn btn-warning">Cancel</a>
                	<input type="submit" name="submit" class="btn btn-primary" value="Save" id="btnSave">
				</center>
              </form>
                </div>
              
            </div>
            <!-- /.box-body -->
          </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    function chkPassword(){
      if(document.getElementById('password').value !== document.getElementById('cpassword').value){
        alert('Passwords do not match.');
        document.getElementById('btnSave').disabled = true;
      }else{
        document.getElementById('btnSave').disabled = false;
      }
    }

    
  </script>
  <?php 
  include "footer.php";
  ?>