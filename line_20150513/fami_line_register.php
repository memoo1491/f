<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="MobileOptimized" content="0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>全家便利商店</title>


<link href="../css/familogin.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="../js/jquery.validate.pack.js" type="text/javascript"></script>
<script src="../js/HiiirTrack.js" type="text/javascript"></script>
<title>登入頁面</title>


<style>
.JoinForm .ButtonBar a{
	background-image:url(../images/familogin/BtnWriteM.png);
	background-repeat:no-repeat;
	border: 0 none;
	cursor: pointer;
	text-indent:-99999px;
	display:block;
	width: 146px;
	height:57px;
	vertical-align:middle;
	margin:auto;
}

</style>


<script  type="text/javascript">
$(document).ready(function(){

	HiiirTrack('3132355f33333839cea34869696972547261636b');


	$('#username').focus(
			function(){
				if($('#username').val() == '請輸入Email')
					$('#username').val('');
	});

});





function save(){

	if($('#register_form').valid() == true){

		var platform = '<?=$Param['platform'];?>';

		if($('#password').val() != $('#password_repeat').val()){
			alert("兩次輸入密碼不符合");
		}
		else{

			$.post(
					$('#register_form').attr('action'),
					$('#register_form').serialize(),
					function(Data){
						if(Data.message == "OK") {
							//window.location.href= 'fami_line_signup.php?user_id='+Data.user_id;
							window.location.href= 'fami_line_signup.php?unit=<?php echo $Param["unit"] ?>&user_id=<?php echo $Param["user_id"] ?>';
						} else if (Data.message == "registered") {
							alert("上該帳號已經被註冊過了喔!!");
						} else {
							alert("註冊失敗!!");
						}
					}
				,'json');
		}
	}
}


function set_date_invoice(){
	for(var i = 1930; i <= 2010; ++i)
		$('#register_form select[name=birth_year]').append('<option value="'+i+'">'+i+'</option>');

	for(var i = 1; i <= 12; ++i)
		$('#register_form select[name=birth_month]').append('<option value="'+i+'">'+i+'</option>');

	for(var i = 1; i <= 31; ++i)
		$('#register_form select[name=birth_day]').append('<option value="'+i+'">'+i+'</option>');

}



function cal_leap_invoice() //計算是否為閏年
{
	var month = $('#register_form select[name=birth_month]').val();
	$('#register_form select[name=birth_day]').empty();

	switch(month)
	{
		case '1':
		case '3':
		case '5':
		case '7':
		case '8':
		case '10':
		case '12':
			for(var i = 1; i <= 31; ++i)
				$('#register_form select[name=birth_day]').append('<option value="'+i+'">'+i+'</option>');
		break;

		case '4':
		case '6':
		case '9':
		case '11':
			for(var i = 1; i <= 30; ++i)
				$('#register_form select[name=birth_day]').append('<option value="'+i+'">'+i+'</option>');
		break;

		case '2':
			var year = $('#register_form select[name=birth_year]').val();
			if (year%4==0 && (year%100!=0 || year%400==0))
			{
				for(var i = 1; i <= 29; ++i)
					$('#register_form select[name=birth_day]').append('<option value="'+i+'">'+i+'</option>');
			}
			else
			{
				for(var i = 1; i <= 28; ++i)
					$('#register_form select[name=birth_day]').append('<option value="'+i+'">'+i+'</option>');
			}
		break;
	}
}




$(document).ready(function()
{
	set_date_invoice();


	//驗證ticket_form
	$("#register_form").validate({
		  invalidHandler: function(form, validator) {
		      var errors = validator.numberOfInvalids();
		      if (errors) {
		        var message = errors == 1
		          ? '請處理下列錯誤:\n'
		          : '請處理下列 ' + errors + ' 項錯誤.\n';
		        var errors = "";
		        if (validator.errorList.length > 0) {
		            for (x=0;x<validator.errorList.length;x++) {
		                errors += "\n\u25CF " + validator.errorList[x].message;
		            }
		        }

		        var platform = '<?=$Param['platform'];?>';
				alert(message+errors);
		      }
		      validator.focusInvalid();
		},
		errorPlacement: function(error, element) {
	        $(element).attr({"title": error.text()});
	    },
	    highlight: function(element){
	        $(element).addClass("error");
	    },
	    unhighlight: function(element){
	        $(element).removeClass("error");
	    },


		success:'valid',
			rules: {
				name:
				{
					required: true
				},
				phone:
				{
					required: true,
					digits: true,
					maxlength: 15
				},
				username:
				{
					required: true,
					email: true
				},
				password:
				{
					required: true
				},
				password_repeat:
				{
					required: true
				},
				agree:
				{
					required: true
				}
			},

			messages: {
				name:
				{
					required: '姓名為必填欄位'
				},
				phone:
				{
					required: '電話號碼為必填欄位',
					digits: '電話號碼請輸入整數',
					maxlength: '電話號碼超過15位數'

				},
				username:
				{
					required: '帳號為必填欄位',
					email: ' 帳號格式需為Email'
				},
				password:
				{
					required: '密碼為必填欄位'
				},
				password_repeat:
				{
					required: '確認密碼為必填欄位'
				},
				agree:
				{
					required: '請您同意提供資訊註冊'
				}
			}
	});

});

</script>

</head>

<body id="Scan">

<div class="Content">
	<div class="JoinForm">
		<div class="JoinNote"></div>
		<form id="register_form" name="register_form" action="fami_line_register.php" method="post" class="InBox">

			<input name="user_id" type="hidden" value="<?=$Param['user_id'];?>"/>
		  	<input name="platform" type="hidden" value="<?=$Param['platform'];?>"/>

			<ul class="Join">
				<li class="Name">
					<label>姓名</label>
					<input type="text" value="" name="name" id="name" class="Text">
				</li>
				<li class="Birthday">
					<label>生日</label>
					<select name="birth_year" onchange="cal_leap_invoice()"></select>年
					<select name="birth_month" onchange="cal_leap_invoice()"></select>月
					<select name="birth_day"></select>日
				</li>
				<li class="Mobile">
					<label>手機</label>
					<input type="text" value="" name="phone" id="phone" class="Text">
				</li>
				<li class="Account">
					<label>帳號</label>
					<input type="email" value="請輸入Email" name="username" id="username" class="Text">
				</li>
					<li class="Pw">
					<label>密碼</label>
					<input type="password" value="" name="password" id="password" class="Text" autocomplete="off">
				</li>
					<li class="RePw">
					<label>確認密碼</label>
					<input type="password" value="" name="password_repeat" id="password_repeat" class="Text Text02" autocomplete="off">
				</li>
				<li class="Remember">
					<input type="checkbox" name="user_fami_login" value="1" checked="yes"/>
					是否記住帳號保持連線
				</li>
				<li class="Remember">
					<input type="checkbox" name="agree" value="" />
					<div class="Jog" style="display:inline">
						<label for="agree">您同意以上資料僅供全家便利商店手機抽獎活動中獎聯絡使用將不另提供其他用途</label>
					</div>
				</li>
			</ul>

			<div class="ButtonBar">
				<a title="註冊" class="BtnSignup"  href="javascript:save()">註冊</a>
			</div>
		</form>
	</div>
</div>
</body>























<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-4527769-48']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</body>
</html>
