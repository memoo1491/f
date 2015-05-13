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
<!-- <script src="../js/jquery-1.4.2.min.js" type="text/javascript"></script> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="../js/jquery.validate.pack.js" type="text/javascript"></script>
<script type="text/javascript">
<?php if (isOutOfDate($LINE_ACTION_END_DATE) && empty($_GET['test'])) { ?>
        alert("本活動已結束,可進入查詢得獎名單");
        window.location.href= 'fami_line_main.php?unit=<?php echo $Param["unit"] ?>&user_id=<?php echo $Param["user_id"] ?>';
<?php } ?>

<?php

if ($Param["stat"] == 'ok') {
    echo "alert('自動登入成功');";
} elseif ($Param["stat"] == 'already') {
    echo "alert('您已經參加本活動!');";
}
?>

$(document).ready(function(){


    //驗證ticket_form
    $("#mail_form").validate({

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

                mail:
                {
                    required: true,
                    email: true
                }
            },

            messages: {

                username:
                {
                    required: '請填寫Email',
                    email: '格式為Email'
                }
            }
    });

    if ($("#user_mail").val() == "") {
        alert("資料登入失敗");
        window.location.replace('fami_line_signup.php?unit=<?php echo $Param["unit"] ?>&user_id=<?php echo $Param["user_id"] ?>');
    }

});
var unclick = true;
function save(){
    if (unclick) {
        unclick = false;
        if( $('#mail_form').valid() == true) {
            $.post(
                $('#mail_form').attr('action'),
                $('#mail_form').serialize(),
                function(Data) {
                    if (Data.message == "ok") {
                        alert("抽獎資料已送出，謝謝您的參加!!");
                        window.location.href= 'fami_line_main.php?unit=<?php echo $Param["unit"] ?>&user_id=<?php echo $Param["user_id"] ?>';
                    } else {
                        alert("修改失敗，請稍後重試");
                    }
                    unclick = true;
                }
            ,'json');
        } else {
            unclick = true;
        }
    }

}
</script>
<script src="../js/HiiirTrack.js" type="text/javascript"></script>
<script type="text/javascript">
    HiiirTrack('3132355f33333930cea34869696972547261636b');
</script>
</head>

<body id="Winner">

    <div class="Wrapper">
        <ul class="menu">
        <li class="n1"><span><a href="../fami_line_select.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>" class="Active"><span>首頁</span></a></span></li>
        <li class="n2"><span><a href="fami_line_info.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>"><span>注意事項</span></a></span></li>
        <li class="n3"><span><a href="fami_line_winner.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>"><span>中獎名單</span></a></span></li>
        </ul>

        <form id="mail_form" method="POST" action="fami_line_mail_fix.php">
            <ul class="emailbg">
            <li class="keybox">
                <input name="mail" type="text" class="Text" value="<?= $mail ?>" id="user_mail">
                <input name="user_id" type="hidden" class="Text" value="<?= $Param["user_id"] ?>" id="user_id">
            </li>
            <li class="keybtn"><a href="#" onclick="save(); return false"><img src="<?php echo $vars['web']['images_path_start']?>BtnSubmit.png" width="262px"></a></li>
            </ul>
        </form>

    </div><!--wrapper end-->

</body>
</html>
