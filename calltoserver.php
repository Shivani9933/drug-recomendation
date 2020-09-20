<?php
header("Access-Control-Allow-Origin: http://www.kaverytradelink.com");
include "config.php";

if(isset($_GET['contractid'])){
	$id = $_GET['contractid'];

        $stmt = $link->prepare('Select * from tblcontract where iId = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if(!isset($result)){
          $message = "No Data.";
        }
        else{
              while ($row = $result->fetch_assoc()){
                     $stmt1 = $link->prepare('Select * from tblaccount where iAccountId = ?');
                      $stmt1->bind_param('i', $row['iSeller'] );
                      $stmt1->execute();
                      $result1 = $stmt1->get_result();
                      while ($row1 = $result1->fetch_assoc()){
                        $row['seller'] = $row1['sAccountName'];
                      }
                 
                     $stmt1 = $link->prepare('Select * from tblaccount where iAccountId = ?');
                      $stmt1->bind_param('i', $row['iBuyer'] );
                      $stmt1->execute();
                      $result1 = $stmt1->get_result();
                      while ($row1 = $result1->fetch_assoc()){
                        $row['buyer'] = $row1['sAccountName'];
                      }
                
                 
                     $stmt1 = $link->prepare('Select * from tblproduct where iProductId = ?');
                      $stmt1->bind_param('i', $row['iProductId'] );
                      $stmt1->execute();
                      $result1 = $stmt1->get_result();
                      while ($row1 = $result1->fetch_assoc()){
                        $row['product'] =  $row1['sProductName'];
                      }
                 
                 
                     $stmt1 = $link->prepare('Select sum(sLoadingQty) as num from tblloadingunloading where sContractNo = ?');
                      $stmt1->bind_param('s', $row['iId'] );
                      $stmt1->execute();
                      $result1 = $stmt1->get_result();
                      while ($row1 = $result1->fetch_assoc()){
                        $row['balqty'] =  $row['dQuantityTo'] - $row1['num'];
                      }
                         
                  echo  json_encode($row);
                  return ;
              }
          
        }
        
}else if(isset($_GET['accountid'])){
  $id = $_GET['accountid'];
    $stmt = $link->prepare('Select sBrokerageType,sBrokerageAmount from tblaccount where iAccountId = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!isset($result)){
      $message = "No Data.";
    }else{
      while ($row = $result->fetch_assoc()){
        echo json_encode($row);
        return ;
      }
    }
}

?>