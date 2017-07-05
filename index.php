<?php
/**
* User: xukaiwen@baixing.com
*/

$sql = 'SELECT `id`, `name` FROM `contacts`';
require('./connectDatabase.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>通讯录</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <table width="100%">
        <caption>
            通讯录
            <span><button onclick="window.location.href='add.php'">新增</button></span>
        </caption>
        <tbody>
            <?php
            $stmt = $db->query($sql);
            while($row = $stmt->fetch_row()) {
                echo "<tr><td><a href='detail.php?id=".$row[0]."'>".$row['1']."</a></td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
