<?php
error_reporting(0);
include("../include/globalIncWeb.php");
$setCounter = 0;
$setExcelName = "data";
$id = trim(base64_decode($_GET['id']));
$setSql = "SELECT * FROM tbl_user_data where id='".$id."'";
if($cn == false)
connect3db();
$setRec = mysql_query($setSql);
$setCounter = mysql_num_fields($setRec);
for ($i = 0; $i < $setCounter; $i++) {
    $setMainHeader .= mysql_field_name($setRec, $i)."\t";
}
while($rec = mysql_fetch_row($setRec))  {
  $rowLine = '';
  foreach($rec as $value)       {
    if(!isset($value) || $value == "")  {
      $value = "\t";
    }   else  {
//It escape all the special charactor, quotes from the data.
      $value = strip_tags(str_replace('"', '""', $value));
      $value = '"' . $value . '"' . "\t";
    }
    $rowLine .= $value;
  }
  $setData .= trim($rowLine)."\n";
}
  $setData = str_replace("\r", "", $setData);

if ($setData == "") {
  $setData = "\nno matching records found\n";
}
$setCounter = mysql_num_fields($setRec);
//This Header is used to make data download instead of display the data
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$setExcelName."_Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
//It will print all the Table row as Excel file row with selected column name as header.
echo ucwords($setMainHeader)."\n".strip_tags(html_entity_decode(htmlspecialchars_decode($setData)))."\n";
?>