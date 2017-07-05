<?php
/**
 * User: xukaiwen@baixing.com
 */

$id = $_GET['id'];
$sql = "SELECT * FROM `contacts` WHERE `id`=$id;";
require('connectDatabase.php');

$stmt = $db->query($sql);
$row = $stmt->fetch_row();
?>

<!DOCTYPE html>
<html>
<head>
    <title>详情</title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
<h1>
    详情
</h1>
<ul>
    <li>
        姓名：
        <span><?php echo $row[1]; ?></span>
    </li>
    <li>
        邮件：
        <span><?php echo $row[2]; ?></span>
    </li>
    <li>
        电话：
        <span><?php echo $row[3]; ?></span>
    </li>
    <li>
        生日：
        <span><?php echo $row[4]; ?></span>
    </li>
</ul>
<div id="deleteDiv">
    <form action="deleteContacts.php" method="post">
        <input name="id" id="userId" value="<?php echo $id ?>" />
        <input type="button" value="返回" onclick="window.location.href='index.php'" />
        <input type="submit" value="删除" />
    </form>
</body>
</html>
