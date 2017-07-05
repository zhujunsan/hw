<?php

require_once('helper.php');
//require_once('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact Form </title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1>Contact Form</h1>
<div class="table-responsive">
<table class=table width=\"100%\" border=\"1\">
    <tr>
        <th bgcolor=\"#CCCCCC\" scope=\"col\">序号</th>
        <th bgcolor=\"#CCCCCC\" scope=\"col\">姓名</th>
        <th bgcolor=\"#CCCCCC\" scope=\"col\">性别</th>
        <th bgcolor=\"#CCCCCC\" scope=\"col\">生日</th>
        <th bgcolor=\"#CCCCCC\" scope=\"col\">手机</th>
        <th bgcolor=\"#CCCCCC\" scope=\"col\">邮箱</th>
    </tr>
<?php

$lines = readAllInfo();
foreach ($lines as $rows)
{
    $row = unserialize($rows);
    if($row[0] =='') continue;

    if($row[2]==0)
    {
        $sex = '男';
    }
    else if ($row[2] == 1)
    {
        $sex = '女';
    }

    ?>
    <tr>
        <th><?php echo $row[0];?></th>
        <th><?php echo $row[1];?></th>
        <th><?php echo $sex;?></th>
        <th><?php echo $row[3];?></th>
        <th><?php echo $row[4];?></th>
        <th><?php echo $row[5];?></th>
    </tr>

<?php
}
?>
</table>
</div>
<?php
print"
<form class=\"form-inline\" method='post' action='index.php'>
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"id-label\">ID</label>
    <input type=\"text\" class=\"form-control\" name=\"id\" placeholder=\"ID\">
  </div>
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"name-label\">Name</label>
    <input type=\"text\" class=\"form-control\" name=\"name\" placeholder=\"Name\">
  </div>
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"gender-label\">Gender</label>
    <input type=\"text\" class=\"form-control\" name=\"gender\" placeholder=\"男/女\">
  </div>
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"birth-label\">Birth</label>
    <input type=\"text\" class=\"form-control\" name=\"birth\" placeholder=\"xxxx-xx-xx\">
  </div>
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"phone-label\">Phone</label>
    <input type=\"text\" class=\"form-control\" name=\"phone\" placeholder=\"11位数字\">
  </div>
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"mail-label\">Name</label>
    <input type=\"email\" class=\"form-control\" name=\"mail\" placeholder=\"xxx@xxx.com\">
  </div>
  
  <input type=\"submit\" class=\"btn btn-default\" value=\"添加\" name=\"addBtn\">
  <input type=\"submit\" class=\"btn btn-default\" value=\"删除\" name=\"delBtn\">
</form>

";

$tpid = $_POST['id'];
$tpname = $_POST['name'];
$tpgender = $_POST['gender'];
$tpbirth = $_POST['birth'];
$tpphone = $_POST['phone'];
$tpmail = $_POST['mail'];
if($_REQUEST['addBtn']) {
    if (!empty($tpid) && !empty($tpname) && !empty($tpgender) &&
        !empty($tpbirth) && !empty($tpphone) && !empty($tpmail)
    ) {
        $overallError = '';
        if ($tpgender == "男") $tpgender = 0;
        elseif ($tpgender == "女") $tpgender = 1;
        else {
            $tpgender = 2;
            $overallError .= '性别不正确 ';
        }

        if (!validEmail($tpmail)) {
            $overallError .= "邮箱格式不正确 ";
        }

        if (!validPhone($tpphone)) {
            $overallError .= "手机格式不正确 ";
        }

        if ($overallError != '')
            print "<p> Error: " . $overallError . ".</p>";
        else
            insertSingleInfo($tpid, $tpname, $tpgender, $tpbirth, $tpphone, $tpmail);

    }
}
else if($_REQUEST['delBtn']) {
    if(!empty($tpid)) {

    }
}

?>


</body>
</html>
