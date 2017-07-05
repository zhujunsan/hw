<!--/**-->
<!--* Created by PhpStorm.-->
<!--* User: gaoyile-->
<!--* Date: 2017/7/5-->
<!--* Time: 下午1:15-->
<!--*/-->
<?php
$nameErr = $emailErr = $genderErr = $telErr = "";
$name = $email = $gender = $tel = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = false;
    if (empty($_POST["name"])) {
        $nameErr = "姓名是必填的";
    } elseif (!preg_match("~[\x{4e00}-\x{9fa5}]+~u",$_POST["name"])) {
        // 检查中文名是否符合规范
        $nameErr = "请输入真实姓名";
    } elseif (empty($_POST["email"])) {
        $emailErr = "电邮是必填的";
    } elseif (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",test_input($_POST["email"]))) {
        // 检查电子邮件地址语法是否有效
        $emailErr = "无效的 email 格式";
    } elseif (empty($_POST["tel"])) {
        $telErr = "电话是必填的";
    } elseif (!preg_match("/^[1-9]+\d*$/",test_input($_POST["tel"]))) {
        // 检查 URL 地址语法是否有效（正则表达式也允许 URL 中的斜杠
        $websiteErr = "无效的tel";
    } elseif (empty($_POST["gender"])) {
        $genderErr = "性别是必选的";
    } else {
        $isValid = true;
    }

//
//    if (!file_exists("contactsBook.json")) {
//        file_put_contents("contactsBook.json", '');
//    }
    if ($isValid) {
        $contact = json_decode(file_get_contents('contactsBook.json'),true);
        $new_contact["email"] = test_input($_POST["email"]);
        $new_contact["tel"] = test_input($_POST["tel"]);
        $new_contact["gender"] = test_input($_POST["gender"]);
        $contact[test_input($_POST["name"])] = $new_contact;
        file_put_contents("contactsBook.json",json_encode($contact));
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['id']) {
    $contact = json_decode(file_get_contents('contactsBook.json'),true);
    $id = $_GET['id'];
    echo $contact;
    echo $id;
    unset($contact[$id]);
    file_put_contents("contactsBook.json",json_encode($contact));
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>我的php通讯录</title>
    <link href="main.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="main.js"></script>
</head>

<h1>通讯录</h1>

<p><span class="error">* 必需的字段</span></p>
<!--<form method="post" action="--><?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?><!--">-->
<form method="post" action="index.php">
    姓名：<input type="text" name="name">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    邮箱：<input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    电话：<input type="text" name="tel">
    <span class="error">* <?php echo $telErr;?></span>
    <br><br>
    性别：
    <input type="radio" name="gender" value="female">女性
    <input type="radio" name="gender" value="male">男性
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="提交">
</form>

<?php
echo "<h2>通讯录：</h2>";
echo "<hr>";
$contacts = json_decode(file_get_contents('contactsBook.json'),true);
foreach ($contacts as $name => $contact) {
    echo "name:     " . $name;
    echo "<br>";
    echo "email:        " . $contact['email'];
    echo "<br>";
    echo "tel:      " . $contact['tel'];
    echo "<br>";
    echo "gender:       " . $contact['gender'];
    echo "<br>";
    echo "<button value='" . $name . "' onclick=\"modify_contact(this.value)\">修改</button>";
    echo "<button value='" . $name . "' onclick=\"delete_contact(this.value)\">删除</button>";
    echo "<hr>";
}
?>

</body>
</html>