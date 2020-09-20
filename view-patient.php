<?php
session_start();
include "header.php";
include "sidenav.php";

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
    
    $id = $_POST['id'];
    if(isset($_FILES['gstfile']) && $_FILES["gstfile"]["size"] > 0){
     $target_dir = "gstfiles/";
    $target_file = $target_dir . basename($_FILES["gstfile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     if (move_uploaded_file($_FILES["gstfile"]["tmp_name"], $target_file)) {
      $reportfile = $target_file;
       $query = "Update tblaccount set sAccountName = ?,sOwnerName = ?,sAddress = ?,sCity = ?,sState = ?,sPincode = ?,sPhone = ?,sEmail =?, sPANNo = ?, sGSTNo = ?,sBankName= ?,sAccountNo= ?,sIFSCCode= ?,sOfficeAddress=?,sOfficeCity = ?,sOfficeState = ?,sOfficePincode = ?,sOfficePhone = ?,sCounrty = ?, sOfficeCountry = ?, sGstFile = ?,sStateCode = ?,sOfficeStateCode = ?, sIEC = ?,sBrokerageType = ?,sBrokerageAmount = ? where iAccountId= ?";
        
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"ssssssssssssssssssssssssssi",$name,$ownername,$address,$city,$state,$pincode,$phone,$email,$panno,$gstno,$bank,$account,$ifsc,$oaddress,$ocity,$ostate,$opincode,$ophone,$country,$ocountry,$reportfile,$statecode,$ostatecode,$iec,$brokeragetype,$brokerageamount,$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           echo '<script> alert("Data Not Saved. Try Again.") </script>';
          }else{
              $stmt = $link->prepare('Select * from tblaccount where iAccountId = ?');
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
             echo  '<script>alert("Data Saved.")</script>';
          }


     }else{
      echo '<script> alert("Data Not Saved. Try Again.") </script>';
     }
  }else{

        $query = "Update tblaccount set sAccountName = ?,sOwnerName = ?,sAddress = ?,sCity = ?,sState = ?,sPincode = ?,sPhone = ?,sEmail =?, sPANNo = ?, sGSTNo = ?,sBankName= ?,sAccountNo= ?,sIFSCCode= ?,sOfficeAddress=?,sOfficeCity = ?,sOfficeState = ?,sOfficePincode = ?,sOfficePhone = ?,sCounrty = ?, sOfficeCountry = ?,sStateCode =?, sOfficeStateCode = ?,sIEC = ?,sBrokerageType = ?,sBrokerageAmount = ? where iAccountId= ?";
        
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"sssssssssssssssssssssssssi",$name,$ownername,$address,$city,$state,$pincode,$phone,$email,$panno,$gstno,$bank,$account,$ifsc,$oaddress,$ocity,$ostate,$opincode,$ophone,$country,$ocountry,$statecode,$ostatecode,$iec,$brokeragetype,$brokerageamount,$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           echo '<script> alert("Data Not Saved. Try Again.") </script>';
          }else{
             echo  '<script>alert("Data Saved.")</script>';
          }
          $stmt = $link->prepare('Select * from tblaccount where iAccountId = ?');
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
  }else if(isset($_POST['delete'])){
        $id = $_POST['id'];
    // echo '<script> alert("I m here.") </script>';
     $query = "delete from tblaccount where iAccountId = ?";
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

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $link->prepare('Select * from tblaccount where iAccountId = ?');
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
        View Patient
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Patient</li>
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
                <form role="form" action="view-patient.php" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="col-md-12 form-group">
                  <label>Account Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php if(isset($obj['sAccountName'])) echo $obj['sAccountName']?>" disabled>
                </div>
                
               

                <!-- textarea -->
                <div class="col-md-12 form-group">
                  <label>Address</label>
                  <textarea class="form-control" rows="1" id="address" placeholder="Address" name="address" disabled ><?php if(isset($obj['sAddress'])) echo $obj['sAddress']?></textarea>
                </div>

                 <div class="col-md-12 form-group">
                  <label>City</label>
                  <input type="text" class="form-control" id="city" placeholder="City" name="city" value="<?php if(isset($obj['sCity'])) echo $obj['sCity']?>" disabled >
                </div>
                 

                <div class="col-md-12 form-group">
                  <label>State</label>
                  <select class="form-control select2" style="width: 100%;" name="state" disabled id="state">
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
                      <option value="<?php echo $row['sState']?>" <?php if($row['sState'] == $obj['sState']) echo "selected"; ?>><?php echo $row['sState']?></option>
                       <?php }
                        }
                       ?>
                    </select>
                <!--   <input type="text" class="form-control" id="state" placeholder="State" name="state" value="<?php if(isset($obj['sState'])) echo $obj['sState']?>" disabled> -->
                </div>

              
               

                <div class="col-md-12 form-group">
                  <label>Contact No</label>
                  <input type="number" class="form-control" id="phone" placeholder="Number" name="phone" value="<?php if(isset($obj['sPhone'])) echo $obj['sPhone']?>" disabled >
                </div>

             
                

                 <div class="col-md-12 form-group">
                  <label>Email Id</label>
                  <input type="text" class="form-control" id="email" placeholder="Email Id" name="email" value="<?php if(isset($obj['sEmail'])) echo $obj['sEmail']?>" disabled >
                </div>
                

         

                <div class="col-md-12 form-group">
                  <label>File</label>
                  <?php if(isset($obj['sGstFile']) && $obj['sGstFile'] != "") { ?>
                    <div id="viewgstfile"><a href="<?php echo $obj['sGstFile']?>" target="_blank" >View File</a></div><?php } else {  echo $obj['sGstFile'];} ?>
                  <input type="file" class="form-control" placeholder="" id="gstfile" name="gstfile" style="display: none;">
                </div>

                <input type="hidden" name="id" value="<?php if(isset($obj['iAccountId'])) echo $obj['iAccountId'] ?>">
                <?php if(isset($obj['iAccountId'])) { ?>
                        <div class="form-group m-b-5">
                          <div class="col-lg-12">
                            <center>
                            <a href="print-account.php?id=<?php echo $obj['iAccountId'] ?>" target="_blank" class="btn btn-success" id="btnPrint">Print</a>
                            <input type="button" name="edit" value="Edit" class="btn btn-warning" id="btnEdit" onclick="showEdit();">
                             
                             <input type="submit" name="delete" value="Delete" class="btn btn-danger" id="btnDelete" onclick="return confirm('Are you sure you want to Delete this Patient Account?');" style="margin-right: 2%"> 
                            <input type="submit" name="submit" value="Update" class="btn btn-success" id="btnSubmit" style="display: none" onclick="return confirm('Are you sure you want to Update this Patient Account?');">
                          </center>
                          </div>
                        </div>
<!--                      </div>-->
                <?php } ?>
              </form>
          </div>
              
               <script type="text/javascript">
                      
                      function showEdit(){
                        document.getElementById('name').disabled = false;
                        document.getElementById('address').disabled = false;
                        document.getElementById('phone').disabled = false;
                        document.getElementById('email').disabled = false;
                        document.getElementById('city').disabled = false;
                        document.getElementById('state').disabled = false;
                        document.getElementById('gstfile').style.display = "block";
                        document.getElementById('btnSubmit').style.display = "block";
                        document.getElementById('btnEdit').style.display = "none";
                        document.getElementById('btnPrint').style.display = "none";
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