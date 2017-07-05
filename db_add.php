<?php  
require_once "utilities.php";

$name = $_POST['name'];  
$sex = $_POST['sex'];  
$mobile = $_POST['mobile'];  

$sql = "SELECT * FROM `addressBook`.`contacts` 
WHERE `Name`='$name';";
require('db_conn.php');
$row = MySQL_fetch_row($result);
if($row[0]){
  showmsg("Name ".$name." already exists!", "./index.php");
}
else{
	$sql = "INSERT INTO `addressBook`.`contacts` (  
	`Name` , `Sex` , `Mobile`)  
	VALUES (  
	'$name', '$sex', '$mobile');";  
	require('db_conn.php');
	
	if($result)  
	{  
	  showmsg("Entry ".$name." added!", "./index.php");
	}  
}
?>  