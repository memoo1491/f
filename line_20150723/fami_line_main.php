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
<script type="text/javascript">
    HiiirTrack('3132355f33333834cea34869696972547261636b');
</script>
<script type="text/javascript">
    <?php
    if (isOutOfDate($LINE_ACTION_END_DATE) && empty($_GET['test'])) {
        echo 'alert("本活動已結束,可進入查詢得獎名單");';
    }
    ?>

</script>
</head>
<body id="Home">


    <div class="Wrapper">
        <ul class="menu">
        <li class="n1"><span><a href="../fami_line_select.php?user_id=<?php echo $Param['user_id'] ?>" class="Active"><span>首頁</span></a></span></li>
        <li class="n2"><span><a href="fami_line_info.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>"><span>注意事項</span></a></span></li>
        <li class="n3"><span><a href="fami_line_winner.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>"><span>中獎名單</span></a></span></li>
        </ul>

        <ul class="indexbg">
            <li><a id="signup-link" href="fami_line_signup.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>"><img src="<?php echo $vars['web']['images_path_start']?>btn.png" width="268"></a></li>
        </ul>

    </div><!--wrapper end-->

    <script type="text/javascript">
        <?php if ($apiMaintain) { ?>
            alert(
                "【系統維護公告】\n" +
                "全家便利商店為提升網路服務品質及效能\n" +
                "於103/09/16 00：00至08：00，進行系統維護作業，\n" +
                "維護期間無法執行全家會員相關作業，\n" +
                "造成您不便之處，敬請見諒。\n" +
                "客服專線：0800-221-363");



            document.getElementById("signup-link").onclick = function() {
                alert(
                    "【系統維護公告】\n" +
                    "全家便利商店為提升網路服務品質及效能\n" +
                    "於103/09/16 00：00至08：00，進行系統維護作業，\n" +
                    "維護期間無法執行全家會員相關作業，\n" +
                    "造成您不便之處，敬請見諒。\n" +
                    "客服專線：0800-221-363");
                return false;
            };
        <?php } ?>
    </script>

</body>
</html>
