<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <title>我的联系人</title>
</head>
<body>
<h1>我的联系人</h1>
<i class="fa fa-plus-circle" aria-hidden="true" id="add" ></i>
<?php
//读取文件
$handle = @fopen("testfile.txt", "r");
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle, 4096);
        $oldContact=explode("^",$buffer);
        //最后一行为空行
        if(count($oldContact)>1) {
            echo "<div class='contact'><input type='text' class='name' value='". $oldContact[0] ."'/> <br/>
               邮件：<input type='text' class='email' value='". $oldContact[1] ."'/> <br/>
               电话：<input type='text' class='tel' value='". $oldContact[2] ."'/> <br/>
               生日：<input type='text' class='birthday' value='". $oldContact[3] ."'/><br/>
               <i class=\"fa fa-trash trash\" aria-hidden=\"true\" ></i></div>";
        }
    }
    fclose($handle);
}
?>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script>
    //增加点击+跳转事件
    $("#add").click(function() {
        window.location.href="add.php";
    });

</script>
</body>
</html>
