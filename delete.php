<form id="form3" name="form3" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    请输入要删除的联系人：
    <input name="number" type="text" id="number"/>
    <input name="delete" type="submit" value="提交"/>
</form>

<?php
    /**
     * Created by PhpStorm.
     * User: hasee
     * Date: 2017/7/5
     * Time: 16:35
     */

    //获取当前联系人数目
    $sql = "SELECT COUNT(*) FROM Users";
    require("conn.php");

    //删除指定id联系人
    if (count($_POST)!=0) {
        $id = $_POST["number"];
        $sql = "DELETE FROM Users where id='$id';";
        if ($conn->query($sql) == true) {
            echo "删除成功";
        } else {
            echo mysqli_error($conn);
            echo "删除失败";
        };
    }
?>

[<a href="index.php" mce_href="index.php">返回</a>]
