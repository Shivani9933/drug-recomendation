<?php
session_start();
include "header.php";
include "sidenav.php";
?>
  <?php 


if(isset($_POST['submit'])){
    $voucherno = $_POST['voucherno'];  
    $contractno = $_POST['contractno'];
    $settlementrate = $_POST['settlementrate'];
    $settlementqty = $_POST['settlementqty'];
    $voucherdate = $_POST['voucherdate'];
    $sbbno = $_POST['sbbno'];
    $bbbno = $_POST['bbbno'];
    $sbbamt = $_POST['sbbamt'];
    $bbbamt = $_POST['bbbamt'];
    $comment = $_POST['comment'];
    
    $query = "INSERT INTO tbladjusment (iVoucherNo,sVoucherDate,iContractId,sSettlementRate,sSettlementQty,sSellerBrokerageBillNo,sBuyerBrokerageBillNo,sSellerBrokerageAmount,sBuyerBrokerageAmount,sComment) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"isisssssss",$voucherno,$voucherdate,$contractno,$settlementrate,$settlementqty,$sbbno,$bbbno,$sbbamt,$bbbamt,$comment);
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
        Add Adjustment
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Adjustment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Adjustment Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="add-adjustment.php" method="post">
                <!-- text input -->
                <div class="col-md-12 form-group">
                  <label>Voucher No</label>
                  <?php 
                     $stmt = $link->prepare('Select max(iVoucherNo) as num from tbladjusment where iContractId IN (select iId from tblcontract where iFirmId = ?)');
                    $stmt->bind_param('i', $_SESSION['userid']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                  ?>
                  <input type="text" class="form-control" placeholder="Number" name="voucherno" required value="<?php echo $row['num']+1; ?>" readonly="">
                </div>

                   <div class="col-md-6 form-group">
                  <label>Voucher Date</label>
                  <input type="date" class="form-control" placeholder="Voucher Date" name="voucherdate" required>
                </div>
                

                 <div class="col-md-6 form-group">
                  <label>Contract Code</label>

                   <select class="form-control select2" style="width: 100%;" name="contractno" required="" onchange="populateData();" id="contractno" onblur="populateData();">
                    <option value="">Select</option>
                        <?php 
                    $stmt = $link->prepare('Select * from tblcontract where iFirmId = ?');
                    $stmt->bind_param('i', $_SESSION['userid']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if(!isset($result)){
                      echo "No Data";
                    }
                    else{
                          while ($row = $result->fetch_assoc()){ 
                      ?>
                      <option value="<?php echo $row['iId']?>"><?php echo $row['iContractId']?></option>
                       <?php }
                        }
                       ?>
                    </select>
                  <!-- <input type="text" class="form-control" placeholder="Contract No" name="contractno" required> -->
                </div>

              

                <div class="col-md-3 form-group">
                  <label>Contract Qty</label>
                  <input type="number" class="form-control" placeholder="Contract Quantity" name="contractqty" required step="0.00001" id="contractqty" readonly="">
                </div>

                <div class="col-md-3 form-group">
                  <label>Bal Qty</label>
                  <input type="number" class="form-control" placeholder="Balance Quntity" name="balqty" required step="0.00001" id="balquantity" readonly="">
                </div>

                 <div class="col-md-3 form-group">
                    <label>Product</label>
                    <input type="text" class="form-control" placeholder="Product" name="product" required id="product" readonly="">
                    
                  </div>

                <div class="col-md-3 form-group">
                  <label>Contract Rate</label>
                  <input type="text" class="form-control" placeholder="Rate" name="contractrate" required step="0.00001" id="contractrate" readonly="">
                </div>

                <div class="col-md-6 form-group">
                  <label>Settlement Rate</label>
                  <input type="number" class="form-control" placeholder="Rate" name="settlementrate" required step="0.00001" id="settlementrate">
                </div>


                <div class="col-md-6 form-group">
                  <label>Settlement Qty</label>
                  <input type="number" class="form-control" placeholder="Quantity" name="settlementqty" required step="0.00001" id="settlementqty" >
                </div>

                 <div class="col-md-3 form-group">
                  <label>Seller Brokerage Bill No</label>
                  <input type="text" class="form-control" placeholder="Bill Number" name="sbbno" id="sbbno" required>
                </div>

                <div class="col-md-3 form-group">
                  <label>Buyer Brokerage Bill No</label>
                  <input type="text" class="form-control" placeholder="Bill Number" name="bbbno" id="bbbno" required>
                </div>

                <div class="col-md-3 form-group">
                  <label>Seller Brokerage Amount</label>
                  <input type="number" class="form-control" placeholder="Bill Amount" name="sbbamt" id="sbbamt" required step="0.01">
                </div>

                <div class="col-md-3 form-group">
                  <label>Buyer Brokerage Amount</label>
                  <input type="number" class="form-control" placeholder="Bill Amount" name="bbbamt" id="bbbamt" required step="0.01">
                </div>

                  
                     <div class="col-md-12 form-group">
                      <label>Comment</label>
                      <input type="text" class="form-control" placeholder="Comment" name="comment" required>
                    </div>
                 
                
                <center>
                  <a href="index.php" class="btn btn-warning">Cancel</a>
                  <input type="submit" name="submit" class="btn btn-primary" value="Save" id="btnSave">
                </center>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <script type="text/javascript">
    function populateData(){
      var id = document.getElementById('contractno').value;

      var xmlhttp = new XMLHttpRequest();
      // var url = "http://localhost/oil/calltoserver.php?contractid="+id;
      var url = "http://kaverytradelink.com/calltoserver.php?contractid="+id;
console.log(url);
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              var myArr = JSON.parse(this.responseText);
              console.log(this.responseText);
              document.getElementById('contractrate').value = myArr.sRate;
              document.getElementById('contractqty').value =  myArr.dQuantityTo;
              document.getElementById('balquantity').value =  myArr.balqty;
              document.getElementById('product').value =  myArr.product;
          }
      };
      xmlhttp.open("GET", url, false);
      xmlhttp.send();
      
    }

    function calculate(){

        var rate = parseFloat(document.getElementById('billrate').value);
        var qty = parseFloat(document.getElementById('loadingqty').value);
        var igst = parseFloat(document.getElementById('igst').value);
        var sgst = parseFloat(document.getElementById('sgst').value);
        var cgst = parseFloat(document.getElementById('cgst').value);
        var othertax = parseFloat(document.getElementById('othertax').value);
        var advance = parseFloat(document.getElementById('advance').value);
        var total = othertax + igst + cgst + sgst + advance + (rate * qty);
        if(!isNaN(total)){
          document.getElementById('total').value = total.toFixed(2);
        }
    }
  </script>
  <?php 
  include "footer.php";
  ?>
