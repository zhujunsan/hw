<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

<?php
include("./MysqlConnection.php");
include("./User.php");
include("./UserController.php");

$controller = new UserController();

if (isset($_SERVER['QUERY_STRING'])){
	try{
	$action = explode('=', $_SERVER['QUERY_STRING'])[1];
	$controller->route($action, $_POST);
	} catch (Exception $e) {
	    echo($e->getTraceAsString());
	}
	$_POST = array(); 
}
?>

<form action="index.php?action=newUser" method="post">
<p>姓名:<input type="text" name="newName"/></p>
<p>手机:<input type="text" name="newNumber"/></p>
<p>邮箱:<input type="email" name="newEmail"/></p>
<p>生日:<input type="date" name="newBirthday"/>
<input type="submit" value="提交"/>
</p>

<div class="user-list">
<?php

$userList = $controller->getAllUser();
foreach($userList as $user){
?>
<form class="user-item" method="post">
<input type="hidden" name="id" value="<?php echo $user->id ?>"/>
<p>
姓名: <input type="text" value="<?php echo $user->name ?>" name="userName"/>
手机: <input type="text" value="<?php echo $user->tel ?>" name="phoneNumber"/>
邮箱: <input type="text" value="<?php echo $user->email ?>" name="email"/>
生日: <input type="date" value="<?php echo $user->birthday ?>" name="birthday"/>

<input type="submit" value="删除" formaction="index.php?action=deleteUser"/>
<input type="submit" value="修改" formaction="index.php?action=updateUser"/>
</p>
</form>
<?php
}
?>
</div>

</body>
</html>
