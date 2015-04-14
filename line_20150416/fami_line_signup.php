<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<title><?=$vars['web']['title']?></title>
<link href="<?=$vars['web']['css_start']?>" rel="stylesheet" type="text/css">

<script src="../js/HiiirTrack.js" type="text/javascript"></script>
<!-- 讀取js lib以前判斷 -->
<script type="text/javascript">
	HiiirTrack('3132355f33333837cea34869696972547261636b');



	<?php if (isOutOfDate($LINE_ACTION_END_DATE) && empty($_GET['test'])) { ?>
	    	alert("本活動已結束,可進入查詢得獎名單");
	    	window.location.replace('fami_line_main.php?unit=<?php echo $Param["unit"] ?>&user_id=<?php echo $Param["user_id"] ?>');
	<?php } ?>

	var msg = '<?=$auto_login['message'];?>';
	var action = '<?=$auto_login['action'];?>';

	if(action == 'auto_login') {
		if(msg == "OK") {
			//alert("自動登入成功");
			window.location.replace("fami_line_mail.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>&stat=ok");
		} else if(msg == "no_account") {
			alert("帳號不存在");
		} else if(msg == "wrong_password") {
			alert("密碼錯誤");
		} else if(msg == "already") {
			//alert("您已經參加本活動!");
			window.location.replace("fami_line_mail.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>&stat=already");
		} else {
			alert(msg);
			alert('很抱歉，目前資料傳遞數據錯誤!!請您重新輸入');
		}
	}
</script>
<!-- <script src="../js/jquery-1.4.2.min.js" type="text/javascript"></script> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="../js/jquery.validate.pack.js" type="text/javascript"></script>
<script src="../js/jquery.blockUI.js" type="text/javascript"></script>
<script type="text/javascript">


// var msg = '<?=$auto_login['message'];?>';
// var action = '<?=$auto_login['action'];?>';

// if(action == 'auto_login') {
// 	if(msg == "OK") {
// 		//alert("自動登入成功");
// 		window.location.replace("fami_line_mail.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>&stat=ok");
// 	} else if(msg == "no_account") {
// 		alert("帳號不存在");
// 	} else if(msg == "wrong_password") {
// 		alert("密碼錯誤");
// 	} else if(msg == "already") {
// 		//alert("您已經參加本活動!");
// 		window.location.replace("fami_line_mail.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>&stat=already");
// 	} else {
// 		alert(msg);
// 		alert('很抱歉，目前資料傳遞數據錯誤!!請您重新輸入');
// 	}
// }

$(document).ready(function(){

	var platform = "<?=$Param['platform'];?>";
	var activity_type = '<?= $ACTIVITY_TYPE ?>';

	//HiiirTrack('3132355f33333837cea34869696972547261636b');

	//驗證ticket_form
	$("#login_form").validate({

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

				username:
				{
					required: true,
					email: true
				},
				password:
				{
					required: true
				},
				agree:
				{
					required: true
				}
			},

			messages: {

				username:
				{
					required: '帳號為必填欄位',
					email: '帳號格式為Email'
				},
				password:
				{
					required: '密碼為必填欄位'
				},
				agree:
				{
					required: '必須請您提供資料作為抽獎 活動中獎聯絡使用'
				}
			}
	});

});
var unclick = true;
function save() {
	if($('#login_form').valid() == true) {
		if (unclick) {
			$.post(
				$('#login_form').attr('action'),
				$('#login_form').serialize(),
				function(Data){
					unclick = true;
					if(Data.message == "OK") {
						window.location.href= 'fami_line_mail.php?unit=<?php echo $Param["unit"] ?>&user_id=<?php echo $Param["user_id"] ?>';
					} else if(Data.message == "no_account"){
						alert("帳號不存在");
					} else if(Data.message == "wrong_password"){
						alert("密碼錯誤");
					} else{
						alert('很抱歉，目前資料傳遞數據錯誤!!請您重新輸入');
					}

				}
			,'json'
			).error(function(){
				unclick = true;
	            alert("很抱歉，目前資料傳遞數據錯誤!!請您重新輸入");
	        });
		}
	}
	return false;
}
</script>
</head>

<body id="Winner">
	<div class="Wrapper">
    	<ul class="menu">
    	<li class="n1"><span><a href="../fami_line_select.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>" class="Active"><span>首頁</span></a></span></li>
    	<li class="n2"><span><a href="fami_line_info.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>"><span>注意事項</span></a></span></li>
    	<li class="n3"><span><a href="fami_line_winner.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>"><span>中獎名單</span></a></span></li>
    	</ul>
        <form id="login_form" action="fami_line_login_ajax.php">
            <input name="user_id" type="hidden" value="<?=$Param['user_id'];?>"/>
            <input name="platform" type="hidden" value="<?=$Param['platform'];?>"/>
            <input name="activity_type" type="hidden" value="<?=$ACTIVITY_TYPE ?>"/>
            <input name="activity_id" type="hidden" value="<?= $ACTIVITY_ID ?>"/>

            <ul class="signupbox">
            <li class="linebtn"><a href="http://log.hiiir.com/TrackDirect.php?Val=3132355f33333838cea34869696972547261636b"><img src="<?php echo $vars['web']['images_path_start']?>LinkLine.png"/></a></li>
            <li class="linetitle"><img src="<?php echo $vars['web']['images_path_start']?>TitleJoin.png"/></li>
            <li class="memberbox">
            	<p class="key1"><input name="username" type="email" class="key" id="textfield"></p>
            	<p class="key2"><input name="password" type="password" class="key" id="textfield"></p>
            </li>
            <li class="att">
				<label for="agree">
            		<input name="agree" type="checkbox" value="" id="agree">您同意以上資料僅供全家便利商店手機抽獎 活動中獎聯絡使用，將不另提供其他用途。
            	</label>
        	</li>

            <li class="acbtn">
            	<ul class="acbtn">
            	<li><a href="fami_line_register.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>"><img src="<?php echo $vars['web']['images_path_start']?>BtnSignup.png"/></a></li>
            	<li><a href="#" onclick="javascript:save(); return false;"><img src="<?php echo $vars['web']['images_path_start']?>BtnLogin.png"/></a></li>
            	</ul>
            </li>

            </ul>
        </form>


    </div><!--wrapper end-->

</body>
</html>
