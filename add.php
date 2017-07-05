<?php
/**
 * Created by PhpStorm.
 * User: gaoyile
 * Date: 2017/7/5
 * Time: 下午5:17
 */
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

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$url = "index.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";