<?php
require_once "utilities.php";

$contactId = $_GET["contactId"];
$contactName = $_GET["contactName"];
$contactSex = $_GET["contactSex"];
$contactMobile = $_GET["contactMobile"];

$unseq_name = str_replace("_"," ",$contactName);

?>
<form id="form1" name="form1" method="post" action="db_edit.php">  
  <table width="381" border="1" align="center" bordercolor="#DDDDDD">  
    <tr>  
      <td width="64">Name</td>  
      <td width="307"><label>  
      	<input type="hidden" name="id" id="id" value="<?php echo $contactId ?>"/>
        <input name="name" type="text" id="name" value="<?php echo $unseq_name ?>"/>  
      </label></td>  
    </tr>  
    <tr>  
      <td>Sex</td>  
      <td><label>  
        <input name="sex" type="radio" value="0" checked="checked" />  
      Male   
      <input type="radio" name="sex" value="1" />  
      Female</label></td>  
    </tr>  
    <tr>  
      <td>Mobile</td>  
      <td><label>  
        <input name="mobile" type="text" id="mobile" value="<?php echo $contactMobile ?>"/>  
      </label></td>  
    </tr>  
    <tr>  
      <td colspan="2"><label>  
        <div align="right">  
          <input type="submit" name="Submit3" value="Submit" />  
          <input type="reset" name="Submit2" value="Reset" />  
      </div>        </label></td>  
    </tr>  
  </table>  
</form>
