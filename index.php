<div align="right">
    [<a href="input.php" mce_href="input.php">添加</a>]
</div>
<?php
/**
 * Created by PhpStorm.
 * User: Lin Shunda
 * Date: 2017/7/5
 * Time: 13:45
 * Email: linshunda@baixing.com
 */
$sql = "SELECT * FROM Users";       //查询数据库
require('conn.php');               //调用conn.php文件，执行数据库操作
?>
<!----创建一个表格---->
<table width = "100%" border="1">
    <tr>
		<th bgcolor = "#CCCCCC" scope = "col">编号</th>
        <th bgcolor = "#CCCCCC" scope = "col">姓名</th>
        <th bgcolor = "#CCCCCC" scope = "col">性别</th>
        <th bgcolor = "#CCCCCC" scope = "col">邮箱</th>
        <th bgcolor = "#CCCCCC" scope = "col">电话</th>
        <th bgcolor = "#CCCCCC" scope = "col">生日</th>
    </tr>
    <?php
        while ($row = mysqli_fetch_row($result)) {      //循环读取查询结果
            if($row[2] == 0) {
                $sex = "男";
            } else {
                $sex = "女";
            }
            ?>
        <!---被循环的HTML表格中带有PHP代码--->
        <tr>
            <td><?php echo $row[0];?></td>> <!--编号-->
            <td><?php echo $row[1];?></td>  <!--姓名-->
            <td><?php echo $sex;?></td>     <!--性别-->
            <td><?php echo $row[3];?></td>  <!--邮箱-->
            <td><?php echo $row[4];?></td>  <!--电话-->
            <td><?php echo $row[5];?></td>  <!--生日-->
        </tr>
        <?php
        }
    ?>
</table>