<?php
/**
 * Created by PhpStorm.
 * User: Lin Shunda
 * Date: 2017/7/5
 * Time: 13:45
 * Email: linshunda@baixing.com
 */

//数据库信息
$db_host  = "localhost";
$db_user  = "root";
$db_passw = "l18205423";
$db_name = "test";

/*
//连接数据库
$conn = mysqli_connect($db_host.$db_user, $db_passw) or die("数据库连接失败！");
//设置字符集为UTF-8
mysqli_query("set names 'utf8'");
//选定数据库
mysqli_selct_db($db_name, $conn) or die("数据库选定失败");
//查询
$result = mysqli_query($sql) or die("数据库查询失败！<br/>可能数据库中没有记录");
*/

$conn = new mysqli($db_host, $db_user, $db_passw, $db_name);
mysqli_query("set names 'utf8'");
if(mysqli_connect_errno())
{
    echo mysqli_connect_error();
}
$result = mysqli_query($conn, $sql) or die("数据库查询失败！<br/>可能数据库中没有记录");
?>
