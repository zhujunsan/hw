<?php
require ("./Contact.php");
?>
<html>
<head>
    <title>Form</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<body>
<form method="get" name="form1">
    姓名<span style="color: red">*</span>:<input type="text" name="name" id="name"/><br/>
    邮箱<span style="color: red">*</span>:<input type="text" name="email" id="email"/><br/>
    电话<span style="color: red">*</span>:<input type="text" name="tel" id="tel"/><br/>
    生日<span style="color: red">*</span>:<input type="text" name="birthday" placeholder="YYYY-MM-DD" id="birthday"/><br/>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
</form>
</body>
</html>
<?php
if ( !empty($_GET['name']) && !empty($_GET['email']) &&  !empty($_GET['tel']) &&  !empty($_GET['birthday']) ) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $tel = $_GET['tel'];
    $birthday = $_GET['birthday'];

    $newContact = new Contact();
    $newContact->setName($name);
    $newContact->setEmail($email);
    $newContact->setBirthday($birthday);
    $newContact->setTel($tel);

    //写入文件
    $myFile = fopen("testfile.txt", "a") or die("Unable to open file!");
    echo $name;
    fwrite($myFile,$name."^".$email."^".$tel."^".$birthday."\n");
    fclose($myFile);

    header("Location:index.php");
} else {
    echo "请填写完整信息～";
}




//检查日期合法性
function checkDateIsValid($date, $formats = array("Y-m-d", "Y/m/d")) {
    $unixTime = strtotime($date);
    if (!$unixTime) {
        return false;
    }
    foreach ($formats as $format) {
        if (date($format, $unixTime) == $date) {
            return true;
        }
    }

    return false;
}
//检查email合法性
function checkEmail($email)
{
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
        echo "邮箱格式错误";
    }
}

//检查tel合法性
function checkTel($str)//电话号码正则表达试
{
    if (is_numeric($str)) {
       return true;
    } else {
        return false;
    }
}
?>

