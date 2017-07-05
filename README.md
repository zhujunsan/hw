# hw
2017 Summer Camp HW3 Backend

##通讯录记录网站

###完成功能

-实现查看、新增、删除联系人的功能

-使用MySQL进行数据持久化

MySQL的表结构如下：
 
CREATE TABLE Users
(
	id int,
	name varchar(255),
	sex varchar(255),
	email varchar(255),
	phone varchar(255),
	birthday varchar(255)
)
