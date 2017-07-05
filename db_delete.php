<?php
require_once "utilities.php";

$contactId = $_GET["contactId"];
$contactName = $_GET["contactName"];

$unseq_name = str_replace("_"," ",$contactName);

$sql = "DELETE FROM `addressBook`.`contacts` WHERE `ID`= '$contactId';";

require('db_conn.php');
if($result)  
{  
	showmsg("Entry ".$unseq_name. " deleted!", "./index.php");
}

