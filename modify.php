<?php
/**
 * Created by PhpStorm.
 * User: gaoyile
 * Date: 2017/7/5
 * Time: 下午4:45
 */
$contact = json_decode(file_get_contents('contactsBook.json'),true);
echo $_GET['id'];

?>
<html>
    <body>
        <h1>修改通讯录</h1>
        <p><span class="error">* 必需的字段</span></p>
        <!--<form method="post" action="--><?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?><!--">-->
        <form method="post" action="index.php">
        姓名：<input type="text" name="name" value="<?php $_GET['id']?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        邮箱：<input type="text" name="email">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        电话：<input type="text" name="tel" >
        <span class="error">* <?php echo $telErr;?></span>
        <br><br>
        性别：
        <input type="radio" name="gender" value="female">女性
        <input type="radio" name="gender" value="male">男性
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="提交">
        </form>
    </body>
</html>
<?php

//$contact = json_decode(file_get_contents('contactsBook.json'),true);
//$new_contact["email"] = test_input($_POST["email"]);
//$new_contact["tel"] = test_input($_POST["tel"]);
//$new_contact["gender"] = test_input($_POST["gender"]);
//$contact[test_input($_POST["name"])] = $new_contact;
//file_put_contents("contactsBook.json",json_encode($contact));