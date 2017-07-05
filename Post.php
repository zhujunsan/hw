<?php
    /**
     * Created by PhpStorm.
     * User: hasee
     * Date: 2017/7/5
     * Time: 15:43
     */

    $name     = $_POST["name"];
    $sex      = $_POST["sex"];
    $email    = $_POST["email"];
    $phone    = $_POST["phone"];
    $birthday = $_POST["birthday"];

    //获取最大编号
    $sql = "SELECT MAX(id) FROM Users";
    require("conn.php");
    $id = mysqli_fetch_row($result)[0]+1;

    //插入
    $sql = "INSERT INTO Users VALUES ('$id', '$name', '$sex', '$email', '$phone', '$birthday');";
    if ($conn->query($sql) == true) {
        echo "添加成功";
    } else {
        echo mysqli_error($conn);
        echo "添加失败";
    };
?>

[<a href="index.php" mce_href="index.php">返回</a>]

