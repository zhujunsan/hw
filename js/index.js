init();

function init(){
	$.ajax({
		type: "GET",
		url: "php/init.php",
		//async: false,  
		cache: false,
        success: function(data){  
			// console.log(data);
		},
		error: function(xhr){
			console.log("error!——————",xhr);
		} 
	 })
}

$("input:radio[name='operate']").on("click", function() {
	// console.log($('input:radio[name="operate"]:checked').val());
});

$(document).on('click', '#btnSubmit', function(e){
	var messageName  = $("#messageName").val();
	var messageMail  = $("#messageMail").val();
	var messagePhone = $("#messagePhone").val();
	var messageBirth = $("#messageBirth").val();


	var operate = ($('input:radio[name="operate"]:checked').val());
    if(operate == "insert"){
    	if(messageName == ""){
    		alert("名字姓名尚未填写！");
    		return;
    	}
    }
	var url="php/proc.php";
	url = url + "?operate=" + operate;
	url = url + "&name=" + messageName;
	url = url + "&mail=" + messageMail;
	url = url + "&phone=" + messagePhone;
	url = url + "&birth=" + messageBirth;
	// console.log(url);
	$.ajax({
		type: "GET",
		url: url, 
		//async: false,  
		cache: false,
		dataType:'json',
		beforeSend: function(){   

        },
        success: function(data){  
			if(operate == "select"){
				showResult(data);
			}else if(operate == "insert"){
				var res = "似乎出了点问题";
				if(data == 0){
					res = "成功添加！";
				}
				$("#showResult").html(res);
			}
		},
		error: function(xhr){
			console.log("error!——————",xhr);
		} 
	 })
 });


$(document).on('click', '.btnDelete', function(e){
	var thisID = $(e.target).attr("id");
	var numID = thisID.substr(thisID.length - 1, 1);
	var url="php/proc.php";
	url = url + "?operate=delete";
	url = url + "&id=" + numID;
	$.ajax({
		type: "GET",
		url: url, 
		cache: false,
		dataType:'json',
        success: function(data){  
			var res = "似乎出了点问题";
			if(data == 0){
				res = "成功删除！";
			}
			$("#showResult").html(res);
		},
		error: function(xhr){
			console.log("error!——————",xhr);
		} 
	 })
})

function showResult(data){
	var num = data.length;
	if(num == 0){
		$("#showResult").html("没有符合条件的结果");
	}else{
		var res = '<table>';
		res += '<tr>';
		res += '<th>编号</th>';
		res += '<th>姓名</th>';
		res += '<th>邮箱</th>';
		res += '<th>电话</th>';
		res += '<th>生日</th>';
		res += '<th>修改</th>';
		res += '<th>删除</th>';
		res += '</tr>';
		data.forEach(function(message, index) {
			res = res + '<tr>';
			res = res + '<td>' + message['id'] + '</td>';
			res = res + '<td class="tdName" id="tdName' + message['id'] +'">' + message['name'] + '</td>';
			res = res + '<td class="tdMail" id="tdMail' + message['id'] +'">' + message['mail'] + '</td>';
			res = res + '<td class="tdPhone" id="tdPhone' + message['id'] +'">' + message['phone'] + '</td>';
			res = res + '<td class="tdBirth" id="tdBirth' + message['id'] +'">' + message['birth'] + '</td>';
			res = res + '<td>' + '<button id="btnUpdate'+ message['id'] + '" class="btnUpdate">修改</button>' + '</td>';
			res = res + '<td>' + '<button id="btnDelete'+ message['id'] + '" class="btnDelete">删除</button>' + '</td>';
			res = res + '</tr>';
		});
		res += '</table>';
		$("#showResult").html(res);
	}
}

$(document).on('dblclick', 'td', function(e){
	var $thisTd = $(e.target);
	var thisClass = $thisTd.attr("class");
	if(thisClass == "tdName" || thisClass == "tdMail" || thisClass == "tdPhone" || thisClass == "tdBirth"){
		var listIndex = $thisTd.parent().index();
		var content = $thisTd.html();
		$thisTd.html('<input id="content-tmp" type="text">');

		var $content = $("#content-tmp")
		$content.focus();
		$content.val(content);
		$content.blur(function(){
			content = $content.val();
			$content.parent().html(content);
		});	
	}
})

$(document).on('click', '.btnUpdate', function(e){
	var thisID = $(e.target).attr("id");
	var numID = thisID.substr(thisID.length - 1, 1);
	var url="php/proc.php";
	url = url + "?operate=update";
	url = url + "&name=" + $("#tdName" + numID).html();
	url = url + "&mail=" + $("#tdMail" + numID).html();
	url = url + "&phone=" + $("#tdPhone" + numID).html();
	url = url + "&birth=" + $("#tdBirth" + numID).html();
	url = url + "&id=" + numID;
	$.ajax({
		type: "GET",
		url: url, 
		cache: false,
		dataType:'json',
        success: function(data){  
			var res = "似乎出了点问题";
			if(data == 0){
				res = "成功修改！";
			}
			$("#showResult").html(res);
		},
		error: function(xhr){
			console.log("error!——————",xhr);
		} 
	 })
})
