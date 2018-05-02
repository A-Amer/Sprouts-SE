
<?php

 include 'conn.php';
    $instance = conn::getInstance();
    $con = $instance->getConnection();

$sql = "SELECT donorName,address,telephone,collectionDate FROM donations order by date DESC ;";
$result = mysqli_query($con,$sql);
$columnHeader ='';
$columnHeader = "Full Name"."\t"."Address"."\t"."Telephone"."\t"."Collection Date"."\t";
$setData='';

while($rec = $result->fetch_assoc()) {

     $rowData = '';
     foreach($rec as $value)
    {
      $value = '"' . $value . '"' . "\t";
      $rowData .= $value;
    }
    $setData .= trim($rowData)."\n";
} 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Donationsheet.xls");
header("Pragma: no-cache");
header("Expires: 0");
 
echo ucwords($columnHeader)."\n".$setData."\n";

$con->close();
?>
