<?php  
require_once "utilities.php";

$id = $_POST['id'];
$name = $_POST['name'];  
$sex = $_POST['sex'];  
$mobile = $_POST['mobile'];  

$sql = "UPDATE `addressBook`.`contacts` 
SET `Name`='$name', `Sex`='$sex', `Mobile`='$mobile' 
WHERE `ID`='$id';";  

require('db_conn.php');

if($result)  
{  
  showmsg("Entry ".$name." updated!", "./index.php");
}  
?>  