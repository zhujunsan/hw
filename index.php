<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <title>新增联系人</title>
</head>
<body>
<h1>我的联系人</h1>
<?php
$handle = @fopen("testfile.txt", "r");
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle, 4096);
        $oldContact=explode("^",$buffer);
        if(count($oldContact)>1) {
            echo "<div class='contact'><p class='name'>姓名:" . $oldContact[0] . "</p>
                <p class='email'>邮件:" . $oldContact[1] . "</p>
                <p class='tel'>电话号码:" . $oldContact[2] . "</p>
                <p class='birthday'>生日:" . $oldContact[3] . "</p> </div>";
        }
    }
    fclose($handle);
}
?>
</body>
</html>
