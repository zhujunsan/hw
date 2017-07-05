<?php
/**
 * User: xukaiwen@baixing.com
 */

$name = $email = $mobile = $birthday = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $birthday = $_POST['birthday'];
    } catch (Exception $e) {
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>新增</title>
    <link rel="stylesheet" href="css/add.css">
</head>
<body>
<h1>
    详情
</h1>
<form action="addContacts.php" method="post">
    <ul>
        <li>
            姓名：
            <input type="text" name="name" value="<?php echo $name; ?>">
        </li>
        <li>
            邮件：
            <input type="text" name="email" value="<?php echo $email; ?>">
        </li>
        <li>
            电话：
            <input type="text" name="mobile" value="<?php echo $mobile; ?>">
        </li>
        <li>
            生日：
            <input type="text" name="birthday" value="<?php echo $birthday; ?>" placeholder="格式为XXXX-YY-MM">
        </li>
    </ul>
    <div id="submitDiv">
        <input type="button" value="返回" onclick="window.location.href='index.php'" />
        <input type="submit" value="提交" />
    </div>
</form>
</html>