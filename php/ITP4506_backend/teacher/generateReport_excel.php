<?php
require_once('../conn.php');

$sql = "SELECT * FROM attendance ORDER BY studentID, date ASC";
$rs = mysqli_query($conn, $sql);
$myArr = array();
$columnHeader = '';  
$columnHeader = "id" . "\t" . "class ID" . "\t" . "student ID" . "\t" . "date" . "\t". "time" . "\t" . "status" . "\t";  
$setData = '';  
while ($rec = mysqli_fetch_row($rs)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Report.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
?>