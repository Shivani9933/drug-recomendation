<?php
   $dbhost = 'localhost';
   $dbuser = 'kaverytr_dbuser';
   $dbpass = 'kavery@123';
    $dbname='kaverytr_dbkavery';

//EXPORT_DATABASE("localhost", "kaverytr_dbuser", "kavery@123", "kaverytr_dbkavery" );

 //connect & select the database
    $db = new mysqli($dbhost, $dbuser, $dbpass, $dbname); 
    $tables = '*';

    //get all of the tables
    if($tables == '*'){
        $tables = array();
        $result = $db->query("SHOW TABLES");
        while($row = $result->fetch_row()){
            $tables[] = $row[0];
        }
    }else{
        $tables = is_array($tables)?$tables:explode(',',$tables);
    }

$return = "";
    //loop through the tables
    foreach($tables as $table){
        $result = $db->query("SELECT * FROM $table");
        $numColumns = $result->field_count;

        $return .= "DROP TABLE $table;";

        $result2 = $db->query("SHOW CREATE TABLE $table");
        $row2 = $result2->fetch_row();

        $return .= "\n\n".$row2[1].";\n\n";

        for($i = 0; $i < $numColumns; $i++){
            while($row = $result->fetch_row()){
                $return .= "INSERT INTO $table VALUES(";
                for($j=0; $j < $numColumns; $j++){
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = ereg_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return .= '"'.$row[$j].'"' ; } else { $return .= '""'; }
                    if ($j < ($numColumns-1)) { $return.= ','; }
                }
                $return .= ");\n";
            }
        }

        $return .= "\n\n\n";
    }

    //save file
$filename = 'db-backup-'.time().'.sql';
    $handle = fopen($filename,'w+');
    fwrite($handle,$return);
    fclose($handle);

header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filename).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);


//   
//   $backup_file = $dbname . date("Y-m-d-H-i-s") . '.gz';
//   $command = "mysqldump --opt -h $dbhost -u $dbuser -p $dbpass ". "test_db | gzip > $backup_file";
//
//
//$filename='database_backup_'.date('G_a_m_d_y').'.sql';
//
//$result=exec('mysqldump kaverytr_dbkavery --user=root --single-transaction >D:/'.$filename,$output);
//
//
//   echo $command;
//   system($command);
?>