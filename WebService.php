<?php 

include "config.php";
include "Classes/PHPExcel.php";

function getIndianCurrency($number)
{
	
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return 'Rupees '.($Rupees ? $Rupees . '' : '') . $paise;
}

function fnGetFirm($id,$link){
  $stmt = $link->prepare('Select * from tblfirm where iFirmId = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return $row['sFirmName'];
  }
  return "N/A";
}

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

function fnGetAccountId($id,$link){
  $stmt = $link->prepare('Select * from tblaccount where sAccountName = ?');
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return $row['iAccountId'];
  }
  return "N/A";
}


function fnGetAccountAddress1($id,$link){
  $stmt = $link->prepare('Select * from tblaccount where iAccountId = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return $row['sAddress'].", ";
  }
  return "N/A";
}

function fnGetAccountAddress2($id,$link){
  $stmt = $link->prepare('Select a.*,s.* from tblaccount a, tblstatecode s where iAccountId = ? and a.sState = s.sState');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return $row['sCity']." - ".$row['sPincode'].", ".$row['sState']."(".$row['sStateCode']."), ".$row['sCounrty'];
  }
  return "N/A";
}


function fnGetAccountGST($id,$link){
  $stmt = $link->prepare('Select * from tblaccount where iAccountId = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return $row['sGSTNo'];
  }
  return "N/A";
}

function fnGetAccountPAN($id,$link){
  $stmt = $link->prepare('Select * from tblaccount where iAccountId = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return $row['sPANNo'];
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

function fnGetProductId($id,$link){
  $stmt = $link->prepare('Select * from tblproduct where sProductName = ?');
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return $row['iProductId'];
  }
  return "N/A";
}

function fnGetAccountIEC($id,$link){
  $stmt = $link->prepare('Select * from tblaccount where iAccountId = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return $row['sIEC'];
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

function fnGetContractId($id,$link){
  $stmt = $link->prepare('Select iContractId from tblcontract where iId = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){     
    return $row['iContractId'];
  }
  return 0;
}

function fnGetContractNo($id,$link){
  $stmt = $link->prepare('Select iId from tblcontract where iContractId = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){     
    return $row['iId'];
  }
  return 0;
}

function fnGetContractDate($id,$link){
  $stmt = $link->prepare('Select sDate from tblcontract where iId = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){     
    return $row['sDate'];
  }
  return 0;
}

function fnGetFirmName($id,$link){
  $stmt = $link->prepare('Select sFirmName from tblfirm where iFirmId = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){     
    return $row['sFirmName'];
  }
  return "N/A";
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

function fnGetProductNameFromContract($id,$link){
  $stmt = $link->prepare('Select * from tblproduct where iProductId in (Select iProductId from tblcontract where iId = ?)');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return $row['sProductName'];
  }
  return "N/A";
}

function fnGetCode($id,$link){
  $stmt = $link->prepare('Select * from tblcontract where iId = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return $row['iContractId'];
  }
  return "N/A";
}

function fnGetProductDate($id,$link){
  $stmt = $link->prepare('Select * from tblcontract where iId = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){ 
    return date('d-M-Y', strtotime($row['sDate']));
  }
  return "N/A";
}

function cmp($a, $b)
{
    return strcmp($b->sortingdate, $a->sortingdate);
}

if(isset($_POST['action'])){
    if($_POST['action'] == 'getContractAddingDetails'){
        $stmt = $link->prepare('Select * from tblaccount order by sAccountName');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $account_arr[] = $row;
        }
        if(!isset($account_arr)){
            $account_arr[] = array('err'=>'No Data');
        }
        
        $stmt = $link->prepare('Select * from tblproduct order by sProductName');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $product_arr[] = $row;
        }
        if(!isset($product_arr)){
            $product_arr[] = array('err'=>'No Data');
        }
        
        $stmt = $link->prepare('Select * from tbltaxmaster order by sTax');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $tax_arr[] = $row;
        }
        if(!isset($tax_arr)){
            $tax_arr[] = array('err'=>'No Data');
        }
        
        $stmt = $link->prepare('Select * from tblfinalweight order by sFinalText');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $finalweight_arr[] = $row;
        }
        if(!isset($finalweight_arr)){
            $finalweight_arr[] = array('err'=>'No Data');
        }
        
        $stmt = $link->prepare('Select * from tblpaymentmaster order by sPaymentText');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $payment_arr[] = $row;
        }
        if(!isset($payment_arr)){
            $payment_arr[] = array('err'=>'No Data');
        }
        
        $output = array('account'=>$account_arr,'product'=>$product_arr,'tax'=>$tax_arr,'finalweight'=>$finalweight_arr,'payment'=>$payment_arr);
        echo json_encode($output);
        return;
    }elseif($_POST['action'] == 'addContract'){
        $contractno =$_POST['contractno'];
		$contratcdate = $_POST['contractdate'];
		$buyer = fnGetAccountId($_POST['buyer'],$link);
		$seller = fnGetAccountId($_POST['seller'],$link);
		$qtyfrom = $_POST['qtyfrom'];
		$qtyto = $_POST['qtyto'];
		$product =fnGetProductId($_POST['product'],$link);

		$weight = $_POST['weight'];
		$payment = $_POST['payment'];
		$bseller = $_POST['bseller'];
		$sseller = $_POST['sseller'];
		$rate = $_POST['rate'];
		$datefrom = "";

		$dateto = "";
		$destnation = $_POST['destnation'];
		$dcondition = $_POST['dcondition'];
		$remark = $_POST['remark'];
		$quality = $_POST['quality'];
		$tax = $_POST['tax'];
		$daddress =fnGetAccountId($_POST['daddress'],$link);
		$firmid = $_POST['firmid'];
        
        $query = "INSERT INTO tblcontract (iContractId,sDate,iSeller,iBuyer,dQuantityFrom,dQuantityTo,iProductId,sWeight,sPaymentCondition,sBrokerageSeller,sBrokerageBuyer,sRate,sDeliveryFrom,sDeliveryTo,sDestination,sDeliveryCondition,sRemark,iFirmId,sQuality,sTax,sDeliveryAddress) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"ssiiddissssssssssisss",$contractno,$contratcdate,$seller,$buyer,$qtyfrom,$qtyto,$product,$weight,$payment,$sseller,$bseller,$rate,$datefrom,$dateto,$destnation,$dcondition,$remark,$firmid,$quality,$tax,$daddress);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
            $output = array('err'=>'Data Not Saved.');
            echo json_encode($output);
            return;
        }else{
            if($firmid == 2){
	            $fn = 'excel/kz39.xls';   
	            $fiename  = str_replace("/", "-",$contractno);

	 			$newfn = 'excel/'.$fiename.'.xls'; 
	 			$newpfn = 'pdf/'.$fiename.'.pdf'; 
	            copy($fn,$newfn);
				 
				$objPHPExcel = new PHPExcel;
				$inputFileName = $newfn;
                $inputPDFName = $newpfn;
			 	$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
			    $objPHPExcel = $objReader->load($inputFileName);

				$sheet = $objPHPExcel->getSheet(0); 

				  $sheet
                  ->setCellValue('A11', 'Conf. No '.$contractno)
                  ->setCellValue('B11', 'Date : '.date('d-M-Y', strtotime($contratcdate)))
                  ->setCellValue('B14', fnGetAccount($seller,$link))
                  ->setCellValue('B15', fnGetAccountAddress1($seller,$link))
                  ->setCellValue('B16', fnGetAccountAddress2($seller,$link))
                  // ->setCellValue('B20', fnGetStateCode($buyer,$link))
                  ->setCellValue('B18', fnGetAccount($buyer,$link))
                  ->setCellValue('B19', fnGetAccountAddress1($buyer,$link))
                  ->setCellValue('B20', fnGetAccountAddress2($buyer,$link))
                  // ->setCellValue('B24', fnGetStateCode($buyer,$link))
                  ->setCellValue('B21', fnGetAccountGST($buyer,$link))
                  ->setCellValue('B22', fnGetAccountPAN($buyer,$link))
                  ->setCellValue('B24', fnGetAccount($daddress,$link))
                  ->setCellValue('B25', fnGetAccountAddress1($daddress,$link).", ".fnGetAccountAddress2($daddress,$link))
                  ->setCellValue('B26', fnGetAccountGST($daddress,$link))
                  ->setCellValue('B28', fnGetProductName($product,$link))
                  ->setCellValue('B30', $qtyfrom." to ".$qtyto)
                  ->setCellValue('B32', "Rs. ".$rate." PMT (".trim(getIndianCurrency(floatval($rate)))." Only)")
                  ->setCellValue('B33', $tax)
                  ->setCellValue('B35', $weight)
                  ->setCellValue('B37', $dcondition)
                  ->setCellValue('B39', $destnation)
                  ->setCellValue('B41', $quality)
                  ->setCellValue('B43', $payment)
                  ->setCellValue('B45', $remark)
                  ->setCellValue('B47', $bseller)
                  ->setCellValue('B51', "For KAVERY TRADE LINK");

			    $newobjWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); // same story, excel 2007 instead of 2003
				$newobjWriter->save($inputFileName); 

				$flag = 0;
			}else if($firmid == 5){
                $fn = 'excel/KTI-01.xls';    
              $fiename  = str_replace("/", "-",$contractno);

              $newfn = 'excel/'.$fiename.'.xls'; 
              $newpfn = 'pdf/'.$fiename.'.pdf'; 
                
               copy($fn,$newfn);
                 // echo 'The file was copied successfully';
                 // else
                 // echo 'An error occurred during copying the file';

                $objPHPExcel = new PHPExcel;
                $inputFileName = $newfn;
                $inputPDFName = $newpfn;
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                  $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                  $objPHPExcel = $objReader->load($inputFileName);

                $sheet = $objPHPExcel->getSheet(0); 

                $sheet
                  ->setCellValue('A11', 'Conf. No '.$contractno)
                  ->setCellValue('B11', 'Date : '.date('d-M-Y', strtotime($contratcdate)))
                  ->setCellValue('B14', fnGetAccount($seller,$link))
                  ->setCellValue('B15', fnGetAccountAddress1($seller,$link))
                  ->setCellValue('B16', str_replace("()","",fnGetAccountAddress2($seller,$link)))
                  // ->setCellValue('B20', fnGetStateCode($buyer,$link))
                  ->setCellValue('B18', fnGetAccount($buyer,$link))
                  ->setCellValue('B19', fnGetAccountAddress1($buyer,$link))
                  ->setCellValue('B20', str_replace("()","",fnGetAccountAddress2($buyer,$link)))
                  // ->setCellValue('B24', fnGetStateCode($buyer,$link))
                  ->setCellValue('B21', fnGetAccountGST($buyer,$link))
                  ->setCellValue('B22', fnGetAccountPAN($buyer,$link))
                  ->setCellValue('B23', fnGetAccountIEC($buyer,$link))
                  ->setCellValue('B25', fnGetAccount($daddress,$link))
                  ->setCellValue('B26', fnGetAccountAddress1($daddress,$link).", ".str_replace("()","",fnGetAccountAddress2($daddress,$link)))
                  ->setCellValue('B27', fnGetAccountGST($daddress,$link))
                  ->setCellValue('B29', fnGetProductName($product,$link))
                  ->setCellValue('B31', $qtyfrom." to ".$qtyto)
                  ->setCellValue('B33', "$".$rate." PMT (".trim(str_replace("Rupees", "USD",getIndianCurrency(floatval($rate))))." Only)")
                  ->setCellValue('B34', $tax)
                  ->setCellValue('B36', $weight)
                  ->setCellValue('B38', $dcondition)
                  ->setCellValue('B40', $destnation)
                  ->setCellValue('B42', $quality)
                  ->setCellValue('B44', $payment)
                  ->setCellValue('B46', $remark)
                  ->setCellValue('B48', $bseller)
                  ->setCellValue('B52', "For KAVERY TRADE INTERNATIONAL");

                  $newobjWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); // same story, excel 2007 instead of 2003
                $newobjWriter->save($inputFileName); 
              }else if($firmid == 6){
               $fn = 'excel/AE01.xls';    
              $fiename  = str_replace("/", "-",$contractno);

              $newfn = 'excel/'.$fiename.'.xls'; 
              $newpfn = 'pdf/'.$fiename.'.pdf'; 
               copy($fn,$newfn);
                 // echo 'The file was copied successfully';
                 // else
                 // echo 'An error occurred during copying the file';

                $objPHPExcel = new PHPExcel;
                $inputFileName = $newfn;
                $inputPDFName = $newpfn;
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                  $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                  $objPHPExcel = $objReader->load($inputFileName);

                $sheet = $objPHPExcel->getSheet(0); 

                $sheet
                  ->setCellValue('A11', 'Conf. No '.$contractno)
                  ->setCellValue('B11', 'Date : '.date('d-M-Y', strtotime($contratcdate )))
                  ->setCellValue('B14', fnGetAccount($seller,$link))
                  ->setCellValue('B15', fnGetAccountAddress1($seller,$link))
                  ->setCellValue('B16', fnGetAccountAddress2($seller,$link))
                  // ->setCellValue('B20', fnGetStateCode($buyer,$link))
                  ->setCellValue('B18', fnGetAccount($buyer,$link))
                  ->setCellValue('B19', fnGetAccountAddress1($buyer,$link))
                  ->setCellValue('B20', fnGetAccountAddress2($buyer,$link))
                  // ->setCellValue('B24', fnGetStateCode($buyer,$link))
                  ->setCellValue('B21', fnGetAccountGST($buyer,$link))
                  ->setCellValue('B22', fnGetAccountPAN($buyer,$link))
                  ->setCellValue('B24', fnGetAccount($daddress,$link))
                  ->setCellValue('B25', fnGetAccountAddress1($daddress,$link).", ".fnGetAccountAddress2($daddress,$link))
                  ->setCellValue('B26', fnGetAccountGST($daddress,$link))
                  ->setCellValue('B28', fnGetProductName($product,$link))
                  ->setCellValue('B30', $qtyfrom." to ".$qtyto)
                  ->setCellValue('B32', "Rs. ".$rate." PMT (".trim(getIndianCurrency(floatval($rate)))." Only)")
                  ->setCellValue('B33', $tax)
                  ->setCellValue('B35', $weight)
                  ->setCellValue('B37', $dcondition)
                  ->setCellValue('B39', $destnation)
                  ->setCellValue('B41', $quality)
                  ->setCellValue('B43', $payment)
                  ->setCellValue('B45', $remark)
                  ->setCellValue('B47', $bseller)
                  ->setCellValue('B51', "For ANAND ENTERPRISES");

                  $newobjWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); // same story, excel 2007 instead of 2003
                $newobjWriter->save($inputFileName); 
              }
            
            
            $stmt = $link->prepare('Select MAX(iId) as id from tblcontract where iFirmId = ? order by iId');
            $stmt->bind_param('i', $firmid);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()){ 
                $id = $row['id'];
                $contractid = $contractno;
                $pdfconurl = "pdf-contract.php";
                //echo $pdfconurl;

                //echo exec($_SERVER['DOCUMENT_ROOT'] ."/admin/demo/pdf-contract.php?id=".$row['iId']);

                include $pdfconurl;
            }
            
            
                $output = array("msg" => 'Contract Saved', "fileurl" => 'http://www.kaverytradelink.com/'.$inputFileName,"pdfurl" => 'http://www.kaverytradelink.com/'.$inputPDFName);
                echo json_encode($output);
                return;
        }
    }elseif($_POST['action'] == 'getContracts'){
        $firmid = $_POST['firmid'];
        $stmt = $link->prepare('Select * from tblcontract where iFirmId = ? order by iId DESC');
        $stmt->bind_param('i', $firmid);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $row['sDate'] = date('d-m-Y', strtotime( $row['sDate']));
            $row['sContractId'] = $row['iContractId'];
            $row['sId'] = $row['iId'];
            $row['sSeller'] = fnGetAccount($row['iSeller'],$link);
            $row['sBuyer'] = fnGetAccount($row['iBuyer'],$link);
            $row['sProduct'] = fnGetProductName($row['iProductId'],$link);
            //$row['sFirm'] = fnGetFirmName($row['iFirmId'],$link);
            $row['fBalQty'] = number_format((float)$row['dQuantityTo'], 5, '.', '') - fnGetLoaidngQty($row['iId'],$link);
            $output[] = $row;
        }
        if(!isset($output)){
         $output = array('err'=>'No Data.');
        }
        echo json_encode($output);
        return;
    }elseif($_POST['action'] == 'getContractFromContractNo'){
        $firmid = $_POST['firmid'];
        $contno = $_POST['contno'];
        $stmt = $link->prepare('Select * from tblcontract where iFirmId = ? AND iContractId=? order by iId');
        $stmt->bind_param('is', $firmid,$contno);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $row['sDate'] = date('d-m-Y', strtotime( $row['sDate']));
            $row['sContractId'] = $row['iContractId'];
            $row['sId'] = $row['iId'];
            $row['sSeller'] = fnGetAccount($row['iSeller'],$link);
            $row['sBuyer'] = fnGetAccount($row['iBuyer'],$link);
            $row['sProduct'] = fnGetProductName($row['iProductId'],$link);
            //$row['sFirm'] = fnGetFirmName($row['iFirmId'],$link);
            $row['fBalQty'] = number_format((float)$row['dQuantityTo'], 5, '.', '') - fnGetLoaidngQty($row['iId'],$link);
            $output[] = $row;
        }
        if(!isset($output)){
         $output = array('err'=>'No Data.');
        }
        echo json_encode($output);
        return;
    }elseif($_POST['action'] == 'getSingleContract'){
        $firmid = $_POST['firmid'];
        $conid = $_POST['id'];
        $stmt = $link->prepare('Select * from tblcontract where iFirmId = ? and iId= ? order by iId');
        $stmt->bind_param('ii', $firmid,$conid);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $row['sDate'] = date('d-m-Y', strtotime( $row['sDate']));
            $row['sSeller'] = fnGetAccount($row['iSeller'],$link);
            $row['sBuyer'] = fnGetAccount($row['iBuyer'],$link);
            $row['sProduct'] = fnGetProductName($row['iProductId'],$link);
            $row['sDeliveryAdd'] = fnGetAccount($row['sDeliveryAddress'],$link);
            
            
            
            if($firmid == 3){
	            
	            $fiename  = str_replace("/", "-",$row['iContractId']);

	 			$newfn = 'excel/'.$fiename.'.xls'; 
                $newpfn = 'pdf/'.$fiename.'.pdf'; 
	            $inputFileName = $newfn;
	            $inputPDFName = $newpfn;
			 	
				$flag = 0;
			}else if($firmid == 5){
                //$fn = 'excel/KTI-01.xls';    
               $fiename  = str_replace("/", "-",$row['iContractId']);

	 			$newfn = 'excel/'.$fiename.'.xls'; 
                $newpfn = 'pdf/'.$fiename.'.pdf'; 
	            $inputFileName = $newfn;
	            $inputPDFName = $newpfn;
               
              }else if($firmid == 6){
               //$fn = 'excel/AE01.xls';    
               $fiename  = str_replace("/", "-",$row['iContractId']);

	 			$newfn = 'excel/'.$fiename.'.xls'; 
                $newpfn = 'pdf/'.$fiename.'.pdf'; 
	            $inputFileName = $newfn;
	            $inputPDFName = $newpfn;
              
              }
       
              $row['fileurl'] = 'http://www.kaverytradelink.com/admin/'.$inputFileName;
            $row['pdfurl'] = 'http://www.kaverytradelink.com/admin/'.$inputPDFName;
            
            $id = $row['iId'];
            $contractid = $row['iContractId'];
            $pdfconurl = "pdf-contract.php";
            //echo $pdfconurl;
            
            //echo exec($_SERVER['DOCUMENT_ROOT'] ."/admin/demo/pdf-contract.php?id=".$row['iId']);
            
            include $pdfconurl;
            
            
//            $ch = curl_init();
//echo "pdf-contract.php?id=".$row['iId'];
//// set URL and other appropriate options
//curl_setopt($ch, CURLOPT_URL, "pdf-contract.php?id=".$row['iId']);
//curl_setopt($ch, CURLOPT_HEADER, 0);
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"GET");
//// grab URL and pass it to the browser
//curl_exec($ch);
//
//// close cURL resource, and free up system resources
//curl_close($ch);
            
          
            
                //$output = array("msg" => 'Contract Saved', "fileurl" => 'http://www.kaverytradelink.com/'.$inputFileName);
            
            //$row['sFirm'] = fnGetFirmName($row['iFirmId'],$link);
            //$row['fBalQty'] = number_format((float)$row['dQuantityTo'], 5, '.', '') - fnGetLoaidngQty($row['iId'],$link);
            $output[] = $row;
        }
        if(!isset($output)){
         $output = array('err'=>'No Data.');
        }
        echo json_encode($output);
        return;
    }elseif($_POST['action'] == 'updateContract'){
        $contractno = $_POST['contractno'];
		$contratcdate = $_POST['contractdate'];
		$buyer = fnGetAccountId($_POST['buyer'],$link);
		$seller = fnGetAccountId($_POST['seller'],$link);
		$qtyfrom = $_POST['qtyfrom'];
		$qtyto = $_POST['qtyto'];
		$product =fnGetProductId($_POST['product'],$link);

		$weight = $_POST['weight'];
		$payment = $_POST['payment'];
		$bseller = $_POST['bseller'];
		$sseller = $_POST['sseller'];
		$rate = $_POST['rate'];
		$datefrom = "";

		$dateto = "";
		$destnation = $_POST['destnation'];
		$dcondition = $_POST['dcondition'];
		$remark = $_POST['remark'];
		$quality = $_POST['quality'];
		$tax = $_POST['tax'];
		$daddress =fnGetAccountId($_POST['daddress'],$link);
		$firmid = $_POST['firmid'];
        $id = $_POST['id'];


        $query = "Update tblcontract set sDate = ?,iSeller = ?,iBuyer = ?,dQuantityFrom = ?,dQuantityTo = ?,iProductId = ?,sWeight=?,sPaymentCondition = ?,sBrokerageSeller = ?,sBrokerageBuyer = ?,sRate = ?,sDeliveryFrom= ?, sDeliveryTo = ?,sDestination = ?, sDeliveryCondition= ?,sRemark = ?,sQuality = ?,sDeliveryAddress = ? where iId = ?";
        
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"siiddissssssssssssi",$contratcdate,$seller,$buyer,$qtyfrom,$qtyto,$product,$weight,$payment,$sseller,$bseller,$rate,$datefrom,$dateto,$destnation,$dcondition,$remark,$quality,$daddress,$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           $output = array('err'=>'Data Not Saved.');
            echo json_encode($output);
            return;
          }else{
//             echo  '<script>alert("Data Saved.")</script>';
             if($_SESSION['userid'] == 3){
               $fn = 'excel/kz39.xls';    
              $fiename  = str_replace("/", "-",$contractno);

              $newfn = 'excel/'.$fiename.'.xls'; 
              $newpfn = 'pdf/'.$fiename.'.pdf'; 
               copy($fn,$newfn);
                 // echo 'The file was copied successfully';
                 // else
                 // echo 'An error occurred during copying the file';

                $objPHPExcel = new PHPExcel;
                $inputFileName = $newfn;
                $inputPDFName = $newpfn;
                 
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                  $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                  $objPHPExcel = $objReader->load($inputFileName);

                $sheet = $objPHPExcel->getSheet(0); 

                $sheet
                  ->setCellValue('A11', 'Conf. No '.$contractno)
                  ->setCellValue('B11', 'Date : '.date('d-M-Y', strtotime($contratcdate )))
                  ->setCellValue('B14', fnGetAccount($seller,$link))
                  ->setCellValue('B15', fnGetAccountAddress1($seller,$link))
                  ->setCellValue('B16', fnGetAccountAddress2($seller,$link))
                  // ->setCellValue('B20', fnGetStateCode($buyer,$link))
                  ->setCellValue('B18', fnGetAccount($buyer,$link))
                  ->setCellValue('B19', fnGetAccountAddress1($buyer,$link))
                  ->setCellValue('B20', fnGetAccountAddress2($buyer,$link))
                  // ->setCellValue('B24', fnGetStateCode($buyer,$link))
                  ->setCellValue('B21', fnGetAccountGST($buyer,$link))
                  ->setCellValue('B22', fnGetAccountPAN($buyer,$link))
                  ->setCellValue('B24', fnGetAccount($daddress,$link))
                  ->setCellValue('B25', fnGetAccountAddress1($daddress,$link).", ".fnGetAccountAddress2($daddress,$link))
                  ->setCellValue('B26', fnGetAccountGST($daddress,$link))
                  ->setCellValue('B28', fnGetProductName($product,$link))
                  ->setCellValue('B30', $qtyfrom." to ".$qtyto)
                  ->setCellValue('B32', "Rs. ".$rate." PMT (".trim(getIndianCurrency(floatval($rate)))." Only)")
                  ->setCellValue('B33', $tax)
                  ->setCellValue('B35', $weight)
                  ->setCellValue('B37', $dcondition)
                  ->setCellValue('B39', $destnation)
                  ->setCellValue('B41', $quality)
                  ->setCellValue('B43', $payment)
                  ->setCellValue('B45', $remark)
                  ->setCellValue('B47', $bseller)
                  ->setCellValue('B51', "For KAVERY TRADE LINK");

                  $newobjWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); // same story, excel 2007 instead of 2003
                $newobjWriter->save($inputFileName); 
              }else if($_SESSION['userid'] == 5){
                $fn = 'excel/KTI-01.xls';    
              $fiename  = str_replace("/", "-",$contractno);

              $newfn = 'excel/'.$fiename.'.xls'; 
              $newpfn = 'pdf/'.$fiename.'.pdf'; 
               copy($fn,$newfn);
                 // echo 'The file was copied successfully';
                 // else
                 // echo 'An error occurred during copying the file';

                $objPHPExcel = new PHPExcel;
                $inputFileName = $newfn;
                $inputPDFName = $newpfn;
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                  $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                  $objPHPExcel = $objReader->load($inputFileName);

                $sheet = $objPHPExcel->getSheet(0); 

                $sheet
                  ->setCellValue('A11', 'Conf. No '.$contractno)
                  ->setCellValue('B11', 'Date : '.date('d-M-Y', strtotime($contratcdate)))
                  ->setCellValue('B14', fnGetAccount($seller,$link))
                  ->setCellValue('B15', fnGetAccountAddress1($seller,$link))
                  ->setCellValue('B16', str_replace("()","",fnGetAccountAddress2($seller,$link)))
                  // ->setCellValue('B20', fnGetStateCode($buyer,$link))
                  ->setCellValue('B18', fnGetAccount($buyer,$link))
                  ->setCellValue('B19', fnGetAccountAddress1($buyer,$link))
                  ->setCellValue('B20', str_replace("()","",fnGetAccountAddress2($buyer,$link)))
                  // ->setCellValue('B24', fnGetStateCode($buyer,$link))
                  ->setCellValue('B21', fnGetAccountGST($buyer,$link))
                  ->setCellValue('B22', fnGetAccountPAN($buyer,$link))
                  ->setCellValue('B23', fnGetAccountIEC($buyer,$link))
                  ->setCellValue('B25', fnGetAccount($daddress,$link))
                  ->setCellValue('B26', fnGetAccountAddress1($daddress,$link).", ".str_replace("()","",fnGetAccountAddress2($daddress,$link)))
                  ->setCellValue('B27', fnGetAccountGST($daddress,$link))
                  ->setCellValue('B29', fnGetProductName($product,$link))
                  ->setCellValue('B31', $qtyfrom." to ".$qtyto)
                  ->setCellValue('B33', "$".$rate." PMT (".trim(str_replace("Rupees", "USD",getIndianCurrency(floatval($rate))))." Only)")
                  ->setCellValue('B34', $tax)
                  ->setCellValue('B36', $weight)
                  ->setCellValue('B38', $dcondition)
                  ->setCellValue('B40', $destnation)
                  ->setCellValue('B42', $quality)
                  ->setCellValue('B44', $payment)
                  ->setCellValue('B46', $remark)
                  ->setCellValue('B48', $bseller)
                  ->setCellValue('B52', "For KAVERY TRADE INTERNATIONAL");

                  $newobjWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); // same story, excel 2007 instead of 2003
                $newobjWriter->save($inputFileName); 
              }else if($_SESSION['userid'] == 6){
               $fn = 'excel/AE01.xls';    
              $fiename  = str_replace("/", "-",$contractno);

              $newfn = 'excel/'.$fiename.'.xls'; 
              $newpfn = 'pdf/'.$fiename.'.pdf'; 
               copy($fn,$newfn);
                 // echo 'The file was copied successfully';
                 // else
                 // echo 'An error occurred during copying the file';

                $objPHPExcel = new PHPExcel;
                $inputFileName = $newfn;
                $inputPDFName = $newpfn;
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                  $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                  $objPHPExcel = $objReader->load($inputFileName);

                $sheet = $objPHPExcel->getSheet(0); 

                $sheet
                  ->setCellValue('A11', 'Conf. No '.$contractno)
                  ->setCellValue('B11', 'Date : '.date('d-M-Y', strtotime($contratcdate )))
                  ->setCellValue('B14', fnGetAccount($seller,$link))
                  ->setCellValue('B15', fnGetAccountAddress1($seller,$link))
                  ->setCellValue('B16', fnGetAccountAddress2($seller,$link))
                  // ->setCellValue('B20', fnGetStateCode($buyer,$link))
                  ->setCellValue('B18', fnGetAccount($buyer,$link))
                  ->setCellValue('B19', fnGetAccountAddress1($buyer,$link))
                  ->setCellValue('B20', fnGetAccountAddress2($buyer,$link))
                  // ->setCellValue('B24', fnGetStateCode($buyer,$link))
                  ->setCellValue('B21', fnGetAccountGST($buyer,$link))
                  ->setCellValue('B22', fnGetAccountPAN($buyer,$link))
                  ->setCellValue('B24', fnGetAccount($daddress,$link))
                  ->setCellValue('B25', fnGetAccountAddress1($daddress,$link).", ".fnGetAccountAddress2($daddress,$link))
                  ->setCellValue('B26', fnGetAccountGST($daddress,$link))
                  ->setCellValue('B28', fnGetProductName($product,$link))
                  ->setCellValue('B30', $qtyfrom." to ".$qtyto)
                  ->setCellValue('B32', "Rs. ".$rate." PMT (".trim(getIndianCurrency(floatval($rate)))." Only)")
                  ->setCellValue('B33', $tax)
                  ->setCellValue('B35', $weight)
                  ->setCellValue('B37', $dcondition)
                  ->setCellValue('B39', $destnation)
                  ->setCellValue('B41', $quality)
                  ->setCellValue('B43', $payment)
                  ->setCellValue('B45', $remark)
                  ->setCellValue('B47', $bseller)
                  ->setCellValue('B51', "For ANAND ENTERPRISES");

                  $newobjWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); // same story, excel 2007 instead of 2003
                $newobjWriter->save($inputFileName); 
              }
            
                //$id = $row['id'];
                $contractid = $contractno;
                $pdfconurl = "pdf-contract.php";
                //echo $pdfconurl;

                //echo exec($_SERVER['DOCUMENT_ROOT'] ."/admin/demo/pdf-contract.php?id=".$row['iId']);

                include $pdfconurl;
            
                $output = array("msg" => 'Contract Saved', "fileurl" => 'http://www.kaverytradelink.com/'.$inputFileName,"pdfurl" => 'http://www.kaverytradelink.com/'.$inputPDFName);
                echo json_encode($output);
                return;
          }
    }else if($_POST['action'] == 'addLoading'){
        $voucherno = $_POST['voucherno'];
  
        $contractno = fnGetContractNo($_POST['contractno'],$link);
        $billrate = $_POST['billrate'];
        $loadingqty = $_POST['loadingqty'];
        $invoiceno = $_POST['invoiceno'];
        $invoicedate = $_POST['invoicedate'];
        $vehicleno = $_POST['vehicleno'];
        $lrno = $_POST['lrno'];
        $transporter = $_POST['transporter'];
        $balancefright = $_POST['balancefright'];
        $fomrno = $_POST['fomrno'];
        $selleramt = $_POST['selleramt'];
        $buyeramt = $_POST['buyeramt'];
        $total = $_POST['total'];
        $igst = $_POST['igst'];
        $sgst = $_POST['sgst'];
        $cgst = $_POST['cgst'];
        $othertax = $_POST['othertax']; 
        $buyer = $_POST['buyer']; 
        $seller = $_POST['seller']; 
        $insurance = $_POST['insurance']; 
        $hamali = $_POST['hamali']; 
        
        $query = "INSERT INTO tblloadingunloading (iVoucherNo,sContractNo,sBillRate,sLoadingQty,sInvoiceNo,sInvoiceDate,sVehicleNo,sLRNo,sTranspoter,sAdvanceFreight,sFormNo,sSellerBrokerageAmount,sBuyerBrokerageAmount,sTotal,sOtherTax,sSGST,sCGST,sIGST,iSeller,iBuyer,sInsurance,sHamali) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"isssssssssssssssssiiss",$voucherno,$contractno,$billrate,$loadingqty,$invoiceno,$invoicedate,$vehicleno,$lrno,$transporter,$balancefright,$fomrno,$selleramt,$buyeramt,$total,$othertax,$sgst,$cgst,$igst,fnGetAccountId($seller,$link),fnGetAccountId($buyer,$link),$insurance,$hamali);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
                $result_arr = array("err" => 'Loading Not Saved');
                echo json_encode($result_arr);
                return;
          }else{
                $result_arr = array("msg" => 'Loading Saved');
                echo json_encode($result_arr);
                return;
          }
    }else if($_POST['action'] == 'getLoading'){
        $firmid = $_POST['firmid'];
        $stmt = $link->prepare('Select * from tblloadingunloading where sContractNo in (Select iId from tblcontract where iFirmId = ?) order by iId DESC');
        $stmt->bind_param('i', $firmid);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $row['sInvoiceDate'] = date('d-m-Y', strtotime( $row['sInvoiceDate']));
            $row['sContractNo'] = fnGetContractId($row['sContractNo'],$link);
            $row['sBCDate'] = date('d-m-Y', strtotime(fnGetContractDate($row['sContractNo'],$link)));
            $row['sSeller'] = fnGetAccount($row['iSeller'],$link);
            $row['sBuyer'] = fnGetAccount($row['iBuyer'],$link);
            $output[] = $row;
        }
        if(!isset($output)){
         $output = array('err'=>'No Data.');
        }
        echo json_encode($output);
        return;
    }else if($_POST['action'] == 'getSingleLoading'){
        $firmid = $_POST['firmid'];
        $id = $_POST['id'];
        $stmt = $link->prepare('Select * from tblloadingunloading where sContractNo in (Select iId from tblcontract where iFirmId = ?) AND iId=? order by iId');
        $stmt->bind_param('ii', $firmid,$id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $row['sInvoiceDate'] = date('d-m-Y', strtotime( $row['sInvoiceDate']));
            $row['sContractNo'] = fnGetContractId($row['sContractNo'],$link);
            $row['sBCDate'] = date('d-m-Y', strtotime(fnGetContractDate($row['sContractNo'],$link)));
            $row['sSeller'] = fnGetAccount($row['iSeller'],$link);
            $row['sBuyer'] = fnGetAccount($row['iBuyer'],$link);
            $output[] = $row;
        }
        if(!isset($output)){
         $output = array('err'=>'No Data.');
        }
        echo json_encode($output);
        return;
    }else if($_POST['action'] == 'updateLoading'){
        $voucherno = $_POST['voucherno'];
  
        $contractno = $_POST['contractno'];
        $billrate = $_POST['billrate'];
        $loadingqty = $_POST['loadingqty'];
        $invoiceno = $_POST['invoiceno'];
        $invoicedate = $_POST['invoicedate'];
        $vehicleno = $_POST['vehicleno'];
        $lrno = $_POST['lrno'];
        $transporter = $_POST['transporter'];
        $balancefright = $_POST['balancefright'];
        $fomrno = $_POST['fomrno'];
        $selleramt = $_POST['selleramt'];
        $buyeramt = $_POST['buyeramt'];
        $total = $_POST['total'];
        $igst = $_POST['igst'];
        $sgst = $_POST['sgst'];
        $cgst = $_POST['cgst'];
        $othertax = $_POST['othertax']; 
        $buyer = $_POST['buyer']; 
        $seller = $_POST['seller']; 
        $insurance = $_POST['insurance']; 
        $hamali = $_POST['hamali']; 
        $id = $_POST['id'];


        $query = "Update tblloadingunloading set sContractNo = ?,iSeller = ?,iBuyer = ?,sBillRate = ?,sLoadingQty = ?,sOtherTax = ?,sSGST=?,sCGST = ?,sIGST = ?,sInvoiceNo = ?,sInvoiceDate = ?,sVehicleNo= ?, sLRNo = ?,sTranspoter = ?, sAdvanceFreight= ?,sFormNo = ?,sSellerBrokerageAmount = ?,sBuyerBrokerageAmount = ?,sTotal = ?,sInsurance = ?,sHamali = ? where iId = ?";
        
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"siissssssssssssssssssi",$contractno,fnGetAccountId($seller,$link),fnGetAccountId($buyer,$link),$billrate,$loadingqty,$othertax,$sgst,$cgst,$igst,$invoiceno,$invoicedate,$vehicleno,$lrno,$transporter,$balancefright,$fomrno,$selleramt,$buyeramt,$total,$insurance,$hamali,$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
         if(!$ret){
                $result_arr = array("err" => 'Loading Not Saved');
                echo json_encode($result_arr);
                return;
          }else{
                $result_arr = array("msg" => 'Loading Saved');
                echo json_encode($result_arr);
                return;
          }
    }else if($_POST['action'] == 'deleteLoading'){
        $id = $_POST['id'];
     $query = "delete from tblloadingunloading where iId= ?";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"i",$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
              $result_arr = array("err" => 'Loading Not Deleted');
                echo json_encode($result_arr);
                return;
          }else{
            $result_arr = array("msg" => 'Loading Deleted');
                echo json_encode($result_arr);
                return;
          }
    }elseif($_POST['action'] == 'getBrokerageBills'){
        $firmid = $_POST['firmid'];
          $stmt = $link->prepare('Select * from tblbrokeragebill where iFirmId=? order by iBillId DESC');
        $stmt->bind_param('i', $firmid);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $row['sDate'] = date('d-m-Y', strtotime( $row['sBillDate'] ));
            $row['sId'] = $row['iId'];
            $row['sAccount'] = fnGetAccount($row['iAccountId'],$link);
            $row['sPeriod'] = date('d-m-Y', strtotime( $row['sBillFromDate'] ))." - ".date('d-m-Y', strtotime( $row['sBillToDate'] ));
            
            $output[] = $row;
        }
        if(!isset($output)){
         $output = array('err'=>'No Data.');
        }
        echo json_encode($output);
        return;
    }else if($_POST['action'] == 'deleteContract'){
        $id = $_POST['id'];
        $query = "delete from tblcontract where iId= ?";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"i",$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
              $result_arr = array("err" => 'Contract Not Deleted');
                echo json_encode($result_arr);
                return;
          }else{
            $result_arr = array("msg" => 'Contract Deleted');
                echo json_encode($result_arr);
                return;
          }
    }elseif($_POST['action'] == 'getLoadingAddingDetails'){
        $firmid = $_POST['firmid'];
        $stmt = $link->prepare('Select * from tblaccount order by sAccountName');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $account_arr[] = $row;
        }
        if(!isset($account_arr)){
            $account_arr[] = array('err'=>'No Data');
        }
        
        
        $stmt = $link->prepare('Select max(iVoucherNo) as num from tblloadingunloading where sContractNo IN (select iId from tblcontract where iFirmId = ?)');
        $stmt->bind_param('i', $firmid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $voucher = $row['num']+1;
        
        $output = array('account'=>$account_arr,'voucher'=>$voucher);
        echo json_encode($output);
        return;
    }elseif($_POST['action'] == 'getPayment'){
        $id = $_POST['id'];
        $stmt = $link->prepare('Select * from tblpayemtloading where iLoadingId  = ? order by sDate');
        $stmt->bind_param('i', $id);
          $stmt->execute();
          $result = $stmt->get_result();
          while ($row = $result->fetch_assoc()){ 
              $account_arr[] = $row;
          }
         if(!isset($account_arr)){
            $account_arr[] = array('err'=>'No Data');
        }
        echo json_encode($account_arr);
        return;
    }else if($_POST['action'] == 'addPayment'){
        $id = $_POST['id'];
    $paymentdate = $_POST['paymentdate'];
    $paymentamount = $_POST['paymentamount'];
    $note = $_POST['note'];

    $query = "INSERT into tblpayemtloading (iLoadingId,dAmount,sRemark,sDate) values (?,?,?,?);";
    $stmt = mysqli_prepare($link,$query);
    mysqli_stmt_bind_param($stmt,"idss",$id,$paymentamount,$note,$paymentdate);
    $ret = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if(!$ret){
        $account_arr = array('err'=>'Payment Not Saved. Try Again.');
      }else{
        $account_arr = array('msg'=>'Payment Saved.');
      }
        echo json_encode($account_arr);
        return;
    }else if($_POST['action'] == 'deletePayment'){
        $deleteid = $_POST['deleteid'];
        $id = $_POST['loading'];

      $query = "delete from tblpayemtloading where iLoadingId = ? and iPaymentId = ?";
      $stmt = mysqli_prepare($link,$query);
      mysqli_stmt_bind_param($stmt,"ii",$id,$deleteid);
      $ret = mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
         if(!$ret){
        $account_arr = array('err'=>'Payment Not Deleted. Try Again.');
      }else{
        $account_arr = array('msg'=>'Payment Deleted.');
      }
        echo json_encode($account_arr);
        return;
    }else if($_POST['action'] == 'addAccount'){
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
                    $account_arr = array('err'=>'Account Not Saved. Try Again.');
                  }else{
                    $account_arr = array('msg'=>'Account Saved.');
                  }
                    echo json_encode($account_arr);
                    return;
             }else{
               $account_arr = array('err'=>'Account Not Saved. Try Again.');
                 echo json_encode($account_arr);
                    return;
             }
          }else{
            $query = "INSERT INTO tblaccount (sAccountName,sOwnerName,sAddress,sCity,sState,sPincode,sPhone,sEmail,sPANNo,sGSTNo,sBankName,sAccountNo,sIFSCCode,sOfficeAddress,sOfficeCity,sOfficeState,sOfficePincode,sOfficePhone,sCounrty,sOfficeCountry,sStateCode,sOfficeStateCode,sIEC,sBrokerageType,sBrokerageAmount) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = mysqli_prepare($link,$query);
                mysqli_stmt_bind_param($stmt,"sssssssssssssssssssssssss",$name,$ownername,$address,$city,$state,$pincode,$phone,$email,$panno,$gstno,$bank,$account,$ifsc,$oaddress,$ocity,$ostate,$opincode,$ophone,$country,$ocountry,$statecode,$ostatecode,$iec,$brokeragetype,$brokerageamount);
                $ret = mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                if(!$ret){
                    $account_arr = array('err'=>'Account Not Saved. Try Again.');
                  }else{
                    $account_arr = array('msg'=>'Account Saved.');
                  }
                    echo json_encode($account_arr);
                    return;
            }
    }else if($_POST['action'] == 'updateAccount'){
        if(isset($_POST['id'])){
              $id = $_POST['id'];
            }else{
              $id = "";
            }

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
               $query = "UPDATE tblaccount SET sAccountName=?,sOwnerName=?,sAddress=?,sCity=?,sState=?,sPincode=?,sPhone=?,sEmail=?,sPANNo=?,sGSTNo=?,sBankName=?,sAccountNo=?,sIFSCCode=?,sOfficeAddress=?,sOfficeCity=?,sOfficeState=?,sOfficePincode=?,sOfficePhone=?,sCounrty=?,sOfficeCountry=?,sGstFile=?,sStateCode=?,sOfficeStateCode=?,sIEC=?,sBrokerageType=?,sBrokerageAmount=? WHERE iAccountId=?";
                $stmt = mysqli_prepare($link,$query);
                mysqli_stmt_bind_param($stmt,"ssssssssssssssssssssssssssi",$name,$ownername,$address,$city,$state,$pincode,$phone,$email,$panno,$gstno,$bank,$account,$ifsc,$oaddress,$ocity,$ostate,$opincode,$ophone,$country,$ocountry,$reportfile,$statecode,$ostatecode,$iec,$brokeragetype,$brokerageamount,$id);
                $ret = mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                if(!$ret){
                    $account_arr = array('err'=>'Account Not Saved. Try Again.');
                  }else{
                    $account_arr = array('msg'=>'Account Updated.');
                  }
                    echo json_encode($account_arr);
                    return;
             }else{
               $account_arr = array('err'=>'Account Not Saved. Try Again.');
                 echo json_encode($account_arr);
                    return;
             }
          }else{
            $query = "UPDATE tblaccount SET sAccountName=?,sOwnerName=?,sAddress=?,sCity=?,sState=?,sPincode=?,sPhone=?,sEmail=?,sPANNo=?,sGSTNo=?,sBankName=?,sAccountNo=?,sIFSCCode=?,sOfficeAddress=?,sOfficeCity=?,sOfficeState=?,sOfficePincode=?,sOfficePhone=?,sCounrty=?,sOfficeCountry=?,sStateCode=?,sOfficeStateCode=?,sIEC=?,sBrokerageType=?,sBrokerageAmount=? WHERE iAccountId=?";
                $stmt = mysqli_prepare($link,$query);
                mysqli_stmt_bind_param($stmt,"sssssssssssssssssssssssssi",$name,$ownername,$address,$city,$state,$pincode,$phone,$email,$panno,$gstno,$bank,$account,$ifsc,$oaddress,$ocity,$ostate,$opincode,$ophone,$country,$ocountry,$statecode,$ostatecode,$iec,$brokeragetype,$brokerageamount,$id);
                $ret = mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                if(!$ret){
                    $account_arr = array('err'=>'Account Not Saved. Try Again.');
                  }else{
                    $account_arr = array('msg'=>'Account Updated.');
                  }
                    echo json_encode($account_arr);
                    return;
            }
    }else if($_POST['action'] == 'getAccounts'){
        $stmt = $link->prepare('Select * from tblaccount order by sAccountName');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $account_arr[] = $row;
        }
        if(!isset($account_arr)){
            $account_arr[] = array('err'=>'No Data');
        }
        echo json_encode($account_arr);
        return;
    }else if($_POST['action'] == 'getSingleAccount'){
        $id=$_POST['id'];
        $stmt = $link->prepare('Select * from tblaccount where iAccountId = ?');
        mysqli_stmt_bind_param($stmt,"i",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $account_arr[] = $row;
        }
        if(!isset($account_arr)){
            $account_arr[] = array('err'=>'No Data');
        }
        echo json_encode($account_arr);
        return;
    }else if($_POST['action'] == 'updateAccount'){
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
                    $account_arr = array('err'=>'Account Not Saved. Try Again.');
                  }else{
                    $account_arr = array('msg'=>'Account Saved.');
                  }
                    echo json_encode($account_arr);
                    return;

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
                    $account_arr = array('err'=>'Account Not Saved. Try Again.');
                  }else{
                    $account_arr = array('msg'=>'Account Saved.');
                  }
                    echo json_encode($account_arr);
                    return;
        }
    }else if($_POST['action'] == 'deleteAccount'){
        $id = $_POST['id'];
        $query = "delete from tblaccount where iAccountId = ?";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"i",$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           $account_arr = array('err'=>'Account Not Deleted. Try Again.');
          }else{
             $account_arr = array('msg'=>'Account Deleted.');
          }
        echo json_encode($account_arr);
        return;
    }else if($_POST['action'] == 'login'){
        $email = $_POST['email'];
          $password = $_POST['password'];
          $stmt = $link->prepare('Select * from tblfirm where sEmail = ? and sPassword = ?');
            $stmt->bind_param('ss', $email,$password);
            $stmt->execute();
            $result = $stmt->get_result();
            if(!isset($result)){
              $output = array("err"=>"Email/Password do not match.");
                echo json_encode($row);
                return;
            }
            else{
              while ($row = $result->fetch_assoc()){ 
                echo json_encode($row);
                  return;
              }
            }
        $output = array("err"=>"Email/Password do not match.");
        echo json_encode($row);
        return;
        
    }else if($_POST['action'] == 'getStates'){
         $stmt = $link->prepare('Select * from tblstatecode order by sState');
        $stmt->execute();
        $result = $stmt->get_result();
         while ($row = $result->fetch_assoc()){
                 $account_arr[] = $row;
        }
        if(!isset($account_arr)){
            $account_arr[] = array('err'=>'No Data');
        }
        echo json_encode($account_arr);
        return;
    }else if($_POST['action'] == 'getBrokerage'){
        $id = $_POST['accountid'];
        $stmt = $link->prepare('Select sBrokerageType,sBrokerageAmount from tblaccount where iAccountId = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if(!isset($result)){
          $output = array('err'=>'No data.');
        }else{
          while ($row = $result->fetch_assoc()){
            echo json_encode($row);
            return ;
          }
        }
    }elseif($_POST['action'] == 'addProduct'){
        $name = $_POST['name'];
        $remark = $_POST['remark'];

        $query = "INSERT INTO tblproduct (sProductName,sRemark) VALUES (?,?)";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"ss",$name,$remark);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           $account_arr = array('err'=>'Data Not Saved. Try Again.');
          }else{
             $account_arr = array('msg'=>'Data Saved.');
          }
        echo json_encode($account_arr);
        return ;
    }elseif($_POST['action'] == 'updateProduct'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $remark = $_POST['remark'];

        $query = "UPDATE tblproduct SET sProductName=?,sRemark=? WHERE iProductId=?";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"ssi",$name,$remark,$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           $account_arr = array('err'=>'Data Not Saved. Try Again.');
          }else{
             $account_arr = array('msg'=>'Data Saved.');
          }
        echo json_encode($account_arr);
        return ;
    }elseif($_POST['action'] == 'addTax'){
        $name = $_POST['name'];

        $query = "INSERT INTO tbltaxmaster (sTax) VALUES (?)";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"s",$name);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           $account_arr = array('err'=>'Data Not Saved. Try Again.');
          }else{
             $account_arr = array('msg'=>'Data Saved.');
          }
        echo json_encode($account_arr);
        return ;
    }elseif($_POST['action'] == 'updateTax'){
        $id = $_POST['id'];
        $name = $_POST['name'];

        $query = "UPDATE tbltaxmaster SET sTax=? WHERE iId=?";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"si",$name,$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           $account_arr = array('err'=>'Data Not Saved. Try Again.');
          }else{
             $account_arr = array('msg'=>'Data Saved.');
          }
        echo json_encode($account_arr);
        return ;
    }elseif($_POST['action'] == 'addPaymentMaster'){
        $name = $_POST['name'];

        $query = "INSERT INTO tblpaymentmaster (sPaymentText) VALUES (?)";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"s",$name);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           $account_arr = array('err'=>'Data Not Saved. Try Again.');
          }else{
             $account_arr = array('msg'=>'Data Saved.');
          }
        echo json_encode($account_arr);
        return ;
    }elseif($_POST['action'] == 'updatePaymentMaster'){
        $id = $_POST['id'];
        $name = $_POST['name'];

        $query = "UPDATE tblpaymentmaster SET sPaymentText=? WHERE iId = ?";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"si",$name,$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           $account_arr = array('err'=>'Data Not Saved. Try Again.');
          }else{
             $account_arr = array('msg'=>'Data Saved.');
          }
        echo json_encode($account_arr);
        return ;
    }elseif($_POST['action'] == 'addWeightMaster'){
        $name = $_POST['name'];

        $query = "INSERT INTO tblfinalweight (sFinalText) VALUES (?)";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"s",$name);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           $account_arr = array('err'=>'Data Not Saved. Try Again.');
          }else{
             $account_arr = array('msg'=>'Data Saved.');
          }
        echo json_encode($account_arr);
        return ;
    }elseif($_POST['action'] == 'updateWeightMaster'){
        $name = $_POST['name'];
        $id = $_POST['id'];

        $query = "UPDATE tblfinalweight SET sFinalText=? WHERE iId=?";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"si",$name,$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           $account_arr = array('err'=>'Data Not Saved. Try Again.');
          }else{
             $account_arr = array('msg'=>'Data Saved.');
          }
        echo json_encode($account_arr);
        return ;
    }elseif($_POST['action'] == 'getProducts'){
        $stmt = $link->prepare('select * from tblproduct');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $output[] = $row;
        }
        if(!isset($output)){
            $output[] = array('err'=>'No data.');
        }
        echo json_encode($output);
        return ;
    }elseif($_POST['action'] == 'getSingleProduct'){
        $id = $_POST['id'];
        $stmt = $link->prepare('select * from tblproduct WHERE iProductId = ?');
        mysqli_stmt_bind_param($stmt,"i",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $output[] = $row;
        }
        if(!isset($output)){
            $output[] = array('err'=>'No data.');
        }
        echo json_encode($output);
        return ;
    }elseif($_POST['action'] == 'getPayments'){
        $stmt = $link->prepare('select * from tblpaymentmaster order by sPaymentText');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $output[] = $row;
        }
        if(!isset($output)){
            $output[] = array('err'=>'No data.');
        }
        echo json_encode($output);
        return ;
    }elseif($_POST['action'] == 'getSinglePayment'){
        $id = $_POST['id'];
        $stmt = $link->prepare('select * from tblpaymentmaster where iId = ?');
        mysqli_stmt_bind_param($stmt,"i",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $output[] = $row;
        }
        if(!isset($output)){
            $output[] = array('err'=>'No data.');
        }
        echo json_encode($output);
        return ;
    }elseif($_POST['action'] == 'getFinalWeight'){
        $stmt = $link->prepare('select * from tblfinalweight order by sFinalText');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $output[] = $row;
        }
        if(!isset($output)){
            $output[] = array('err'=>'No data.');
        }
        echo json_encode($output);
        return ;
    }elseif($_POST['action'] == 'getSingleFinalWeight'){
        $id = $_POST['id'];
        $stmt = $link->prepare('select * from tblfinalweight WHERE iId=?');
        mysqli_stmt_bind_param($stmt,"i",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $output[] = $row;
        }
        if(!isset($output)){
            $output[] = array('err'=>'No data.');
        }
        echo json_encode($output);
        return ;
    }elseif($_POST['action'] == 'getTaxList'){
        $stmt = $link->prepare('select * from tbltaxmaster order by sTax');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $output[] = $row;
        }
        if(!isset($output)){
            $output[] = array('err'=>'No data.');
        }
        echo json_encode($output);
        return ;
    }elseif($_POST['action'] == 'getSingleTax'){
        $id = $_POST['id'];
        $stmt = $link->prepare('select * from tbltaxmaster WHERE iId = ?');
        mysqli_stmt_bind_param($stmt,"i",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $output[] = $row;
        }
        if(!isset($output)){
            $output[] = array('err'=>'No data.');
        }
        echo json_encode($output);
        return ;
    }elseif($_POST['action'] == 'updateProduct'){
        $name = $_POST['name'];
    	$remark = $_POST['remark'];
    	$id = $_POST['productid'];

    	$query = "update tblproduct set sProductName  =? ,sRemark = ? where iProductId = ?";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"ssi",$name,$remark,$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
           $account_arr = array('err'=>'Data Not Saved. Try Again.');
          }else{
             $account_arr = array('msg'=>'Data Saved.');
          }
        echo json_encode($account_arr);
        return ;
    }elseif($_POST['action'] == 'deleteProduct'){
        $id = $_POST['productid'];
        
		$query = "delete from tblproduct where iProductId = ?";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"i",$id);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);  
        if(!$ret){
           $account_arr = array('err'=>'Data Not Deleted. Try Again.');
          }else{
             $account_arr = array('msg'=>'Data Deleted.');
          }
        echo json_encode($account_arr);
        return ;
    }else if($_POST['action'] == 'getAdjustments'){
        $firmid = $_POST['firmid'];
        $stmt = $link->prepare('Select * from tbladjusment where iContractId in (Select iId from tblcontract where iFirmId = ?) order by iAdjustmentId');
        $stmt->bind_param('i', $firmid);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $row['sInvoiceDate'] = date('d-m-Y', strtotime( $row['sVoucherDate']));
            $row['sContractNo'] = fnGetContractId($row['iContractId'],$link);
            
            $output[] = $row;
        }
        if(!isset($output)){
         $output = array('err'=>'No Data.');
        }
        echo json_encode($output);
        return;
    }elseif($_POST['action'] == 'getAdjustmentAddingDetails'){
        $firmid = $_POST['firmid'];
        $stmt = $link->prepare('Select * from tblaccount order by sAccountName');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $account_arr[] = $row;
        }
        if(!isset($account_arr)){
            $account_arr[] = array('err'=>'No Data');
        }
        
        
        $stmt = $link->prepare('Select max(iVoucherNo) as num from tbladjusment where iContractId IN (select iId from tblcontract where iFirmId = ?)');
        $stmt->bind_param('i', $firmid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $voucher = $row['num']+1;
        
        $output = array('account'=>$account_arr,'voucher'=>$voucher);
        echo json_encode($output);
        return;
    }else if($_POST['action'] == 'addAdjustment'){
        $voucherno = $_POST['voucherno'];
        
  
        $contractno = fnGetContractNo($_POST['contractno'],$link);
        $settlementrate = $_POST['settlementrate'];
        $settlementqty = $_POST['settlementqty'];
        $invoicedate = $_POST['invoicedate'];
        $sbbno = $_POST['sbbillno'];
        $bbbno = $_POST['bbbillno'];
        $sbbamt = $_POST['sbamount'];
        $bbbamt = $_POST['bbamount'];
        $comment = $_POST['comment'];
        
        
         $query = "INSERT INTO tbladjusment (iVoucherNo,sVoucherDate,iContractId,sSettlementRate,sSettlementQty,sSellerBrokerageBillNo,sBuyerBrokerageBillNo,sSellerBrokerageAmount,sBuyerBrokerageAmount,sComment) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($link,$query);
        mysqli_stmt_bind_param($stmt,"isisssssss",$voucherno,$invoicedate,$contractno,$settlementrate,$settlementqty,$sbbno,$bbbno,$sbbamt,$bbbamt,$comment);
        $ret = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if(!$ret){
                $result_arr = array("err" => 'Loading Not Saved');
                echo json_encode($result_arr);
                return;
          }else{
                $result_arr = array("msg" => 'Loading Saved');
                echo json_encode($result_arr);
                return;
          }
    }else if($_POST['action'] == 'getSingleAdjustment'){
        $firmid = $_POST['firmid'];
        $id = $_POST['id'];
        $stmt = $link->prepare('Select * from tbladjusment where iContractId in (Select iId from tblcontract where iFirmId = ?) AND iAdjustmentId=? order by iAdjustmentId');
        $stmt->bind_param('ii', $firmid,$id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $row['sInvoiceDate'] = date('d-m-Y', strtotime( $row['sVoucherDate']));
            $row['sContractNo'] = fnGetContractId($row['iContractId'],$link);
            //$row['sBCDate'] = date('d-m-Y', strtotime(fnGetContractDate($row['sContractNo'],$link)));
            $output[] = $row;
        }
        if(!isset($output)){
         $output = array('err'=>'No Data.');
        }
        echo json_encode($output);
        return;
    }else if($_POST['action'] == 'getPendingContracts'){
        $firmid = $_POST['firmid'];
        
        
        $stmt = $link->prepare("Select * from tblcontract where iFirmId = ? and iId NOT IN (select iContractId from tbladjusment) ORDER BY iId DESC");
        $stmt->bind_param('i', $firmid);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            if($row['dQuantityTo'] <= fnGetLoaidngQty($row['iId'],$link)){
              continue;
            }
            
            $row['product'] = fnGetProductName($row['iProductId'],$link);
            $row['seller'] = fnGetAccount($row['iSeller'],$link);
            $row['buyer'] = fnGetAccount($row['iBuyer'],$link);
            $row['balance'] = (number_format((float)$row['dQuantityTo'], 5, '.', '') - (float) fnGetLoaidngQty($row['iId'],$link));
            $output[] = $row;

        }
        if(!isset($output)){
         $output = array('err'=>'No Data.');
        }
        echo json_encode($output);
        return;
    }else if($_POST['action'] == 'getPendingBills'){
        $firmid = $_POST['firmid'];
        
        
        $stmt = $link->prepare("Select * from tblcontract where iFirmId = ? ORDER BY iId DESC");
        $stmt->bind_param('i', $firmid);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            if(fnGetLoaidngAmount($row['iId'],$link) <= fnGetPaymentAmount($row['iId'],$link)){
              continue;
            }
            
            $row['product'] = fnGetProductName($row['iProductId'],$link);
            $row['seller'] = fnGetAccount($row['iSeller'],$link);
            $row['buyer'] = fnGetAccount($row['iBuyer'],$link);
            $row['loadingamt'] = fnGetLoaidngAmount($row['iId'],$link);
            $row['balanceamt'] = number_format((float)fnGetLoaidngAmount($row['iId'],$link) - (float) fnGetPaymentAmount($row['iId'],$link), 2, '.', '');
            $output[] = $row;

        }
        if(!isset($output)){
         $output = array('err'=>'No Data.');
        }
        echo json_encode($output);
        return;
    }else if($_POST['action'] == 'getBrokerageReport'){
        $firmid = $_POST['firmid'];
        
        
        $stmt = $link->prepare("Select * from tblloadingunloading where sContractNo IN (select iId from tblcontract where iFirmId = ?)");
        $stmt->bind_param('i', $firmid);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            if(fnGetLoaidngAmount($row['iId'],$link) <= fnGetPaymentAmount($row['iId'],$link)){
              continue;
            }
            
            $row['contractno'] = fnGetCode($row['sContractNo'],$link);
            $row['productdate'] = fnGetProductDate($row['sContractNo'],$link);
            $row['product'] = fnGetProductNameFromContract($row['sContractNo'],$link);
            $row['seller'] = fnGetAccount($row['iSeller'],$link);
            $row['buyer'] = fnGetAccount($row['iBuyer'],$link);
            $row['invoicedate'] = date('d-M-Y', strtotime( $row['sInvoiceDate']));
            $row['invoicevalue'] = number_format((float)$row['sTotal'], 2, '.', '');
            
            $output[] = $row;

        }
        if(!isset($output)){
         $output = array('err'=>'No Data.');
        }
        echo json_encode($output);
        return;
    }elseif($_POST['action'] == 'getLedger'){
        class ledger{
                  	public $bcno = "";
                  	public $bcdate = "";
                  	public $indate = "";
                  	public $paydate = "";
                  	public $camount = "";
                  	public $damount = "";
                  	public $type = "";
                  	public $loading = "";
                  	public $sortingdate = "";
                  }
        //echo "1";
        
        $firmid = $_POST['firmid'];
        $buyer = fnGetAccountId($_POST['buyer'],$link);
        $seller = fnGetAccountId($_POST['seller'],$link);
        
            //echo $buyer.",".$seller;
        
        $stmt = $link->prepare("Select * from tblloadingunloading where sInvoiceDate >= ? and sInvoiceDate <= ? and iSeller = ? and iBuyer = ? and sContractNo IN (select iId from tblcontract where iFirmId = ?)");
        $stmt->bind_param('ssiii', $_POST['fromdate'],$_POST['todate'],$seller,$buyer,$firmid);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){ 
            $obj = new ledger();
            $obj->bcdate = date('d-m-Y', strtotime(fnGetContractDate($row['sContractNo'],$link)));
            $obj->bcno = fnGetCode($row['sContractNo'],$link);
            $obj->damount = number_format((float)$row['sTotal'], 2, '.', '');
            $obj->indate = date('d-m-Y', strtotime($row['sInvoiceDate']));
            $obj->type = "bill";
            $obj->loading = $row['sInvoiceNo'];
            $obj->sortingdate = $row['sInvoiceDate'];
            $data[] = $obj;
        }
        
        $stmt = $link->prepare("Select p.*,l.* from tblpayemtloading p, tblloadingunloading l where p.sDate >= ? and p.sDate <= ? and p.iLoadingId IN (select iId from tblloadingunloading where iSeller = ? and iBuyer = ? and sContractNo IN (select iId from tblcontract where iFirmId = ?)) and p.iLoadingId = l.iId");
          $stmt->bind_param('ssiii', $_POST['fromdate'],$_POST['todate'],$seller,$buyer,$firmid);

            $stmt->execute();
            $result = $stmt->get_result();

          while ($row = $result->fetch_assoc()){ 
            $obj = new ledger();
            $obj->bcdate = date('d-m-Y', strtotime(fnGetContractDate($row['sContractNo'],$link)));
            $obj->bcno = fnGetCode($row['sContractNo'],$link);
            $obj->camount = number_format((float)$row['dAmount'], 2, '.', '');
            $obj->indate = date('d-m-Y', strtotime($row['sDate']));
            $obj->type = "payment";
            $obj->loading = $row['sInvoiceNo'];
            $obj->sortingdate = $row['sDate'];
            $data[] = $obj;
          }
          usort($data, "cmp");
        
        //echo count($data);
        
        for($i = 0; $i < count($data); $i++){    
             $output[] = $data[$i];
        }
        if(!isset($output)){
         $output = array('err'=>'No Data.');
        }
        echo json_encode($output);
        return;
    }
    
    
    
    
    
}

?>