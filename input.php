<!---新增联系人---->
<!---姓名name--->
<!---性别sex---->
<!---邮箱email--->
<!---电话phone---->
<!---生日birthday--->
<form id="form1" name="form1" method="post" action="Post.php">
    <table width = "300" border = "1" align = "center" bordercolor = "#DDDDDD">
        <tr>
            <td width="64">姓名</td>
            <td width="307">
                <label>
                    <input name="name" type="text" id="name" />
                </label>
            </td>
        </tr>
        <tr>
            <td>性别</td>
            <td>
                <label>
                    <input name="sex" type="radio" value="0" checked="checked"/> 男
                    <input type="radio" name="sex" value="1"/> 女
                </label>
            </td>
        </tr>
        <tr>
            <td>邮箱</td>
            <td>
                <label>
                    <input name="email" type="text" id="email"/>
                </label>
            </td>
        </tr>
        <tr>
            <td>电话</td>
            <td>
                <label>
                    <input name="phone" type="text" id="phone"/>
                </label>
            </td>
        </tr>
        <tr>
            <td>生日</td>>
            <td>
                <label>
                    <input name="birthday" type="text" id="birthday"/>
                </label>
            </td>>
        </tr>
        <tr>
            <td colspan="2">
                <label>
                    <div align="right">
                        <input type="submit" name="Submit" value="提交"/>
                    </div>
                </label>
            </td>
        </tr>
    </table>
</form>