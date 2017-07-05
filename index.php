<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Address List</title>
		<link rel="stylesheet" href="css/index.css">
		
		
	</head>

	<body>
		<input type="radio" class="operate" name="operate" id="select" value="select" checked="checked">查
		<input type="radio" class="operate" name="operate" id="insert" value="insert">增
		<!--
		<input type="radio" class="operate" name="operate" id="delete" value="delete">删
		<input type="radio" class="operate" name="operate" id="update" value="update">改
		-->
		<div class="info">
			<div class="hint" >姓名:</div>
			<input class="message" type="text" id="messageName">
		</div>
		<div class="info">
			<div class="hint" >邮箱:</div>
			<input class="message" type="text" id="messageMail">
		</div>
		<div class="info">
			<div class="hint" >电话:</div>
			<input class="message" type="text" id="messagePhone">
			</div>
		<div class="info">
			<div class="hint" >生日:</div>
			<input class="message" type="text" id="messageBirth">
		</div>
		<button id="btnSubmit">确认</button>

		<div id = "showResult"></div>

		<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
		<script type="text/javascript" src="js/index.js"></script>

	</body>


</html>
