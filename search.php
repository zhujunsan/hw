
<?php
require_once "utilities.php";

$name = $_POST['name'];  


$sql = "SELECT * FROM `addressBook`.`contacts` 
WHERE `Name`='$name';";

require('db_conn.php');

?>
<form id="form1" name="form1" method="post" action="search.php">  
  <table width="500" height="100" align="left" >  
    <tr>  
      <td width="300">Search result: </td>  
     </tr>  
  </table>  
</form>

<?php

if($result)  
{  

?>  
<table width="100%" border="1">  
    <tr>  
        <th bgcolor="#CCCCCC" scope="col">Name</th>  
        <th bgcolor="#CCCCCC" scope="col">Sex</th>  
        <th bgcolor="#CCCCCC" scope="col">Mobile</th>  
        <th bgcolor="#CCCCCC" scope="col">Operations</th>  
    </tr>

<?php  
	$row = MySQL_fetch_row($result);
	if($row[2]==0)  
    {  
        $sex = 'Male';  
    }  
    else  
    {  
        $sex = 'Female';  
    }  

       $seq_name = str_replace(" ","_",$row[1]);

    $deleteRef="db_delete.php?contactId=".$row[0]
    	."&contactName=".$seq_name;
    $editRef="edit.php?contactId=".$row[0]
    	."&contactName=".$seq_name
    	."&contactSex=".$row[2]
    	."&contactMobile=".$row[3];
?>  
      <tr>  
        <td><?php echo $row[1];?></td> 
        <td><?php echo $sex;?></td> 
        <td><?php echo $row[3];?></td>  
        <td>
        	[<a href= <?php echo $deleteRef ?>>Delete</a>]
        	[<a href= <?php echo $editRef ?>>Edit</a>]
        </td>
      </tr>  
<?php
}
?>
</table>  
<div align="right">  
    [<a href="index.php" mce_href="index.php">Return</a>]  
</div>  