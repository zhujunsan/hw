# hw
2017 Summer Camp HW3 Backend
做了基本功能:
增删改查

由index.php渲染页面。
通过UserController.php进行路由以及逻辑处理，数据验证放在这里，包括判空，email以及时间由html5控件判断，手机号由于PHP正则不太会所以没有做。
User.php进行model的声明。
MysqlConnection进行数据连接，在UserController构造时连接，析构时断连。
没有时间做数据库注入验证。
远程数据库连接，具体见代码内容。
