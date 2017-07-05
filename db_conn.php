<?php 
	$db_host = 'localhost';  
	$db_user = 'root';  
	$db_passw = '123456';  
	$db_name = 'addressBook';  
	$conn = mysql_connect($db_host,$db_user,$db_passw) or die ('DB connection error');   
	
	MySQL_query("set names 'utf8'");  
	MySQL_select_db($db_name,$conn) or die('DB select error');   
	$result = MySQL_query($sql) or die('DB query error'); 
?>  