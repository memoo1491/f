<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <meta content="yes" name="apple-mobile-web-app-capable" />
  <meta content="black" name="apple-mobile-web-app-status-bar-style" />
  <meta content="telephone=no" name="format-detection" />
  <title><?=$vars['web']['title']?></title>
  <link href="<?=$vars['web']['css_winner']?>" rel="stylesheet" type="text/css">
  <script src="../js/HiiirTrack.js" type="text/javascript"></script>
  <script type="text/javascript">HiiirTrack('3132355f33333836cea34869696972547261636b');</script>
  <style type="text/css">
    #web-link {
      float:right;
      font-weight: bold;
      padding: 1px 14px 1px 14px;
      background-color:#148AC4;
      color:white;
      border-radius:14px;
      font-family: Georgia,"微軟正黑體",Times,serif;
      font-size: 14px;
      margin-top: 2px
    }

</style>
</head>
<body id="Winner">
    <div class="Wrapper">
        <ul class="menu">
          <li class="n1"><span><a href="../fami_line_select.php?user_id=<?php echo $Param['user_id'] ?>" class="Active"><span>首頁</span></a></span></li>
          <li class="n2"><span><a href="fami_line_info.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>"><span>注意事項</span></a></span></li>
          <li class="n3"><span><a href="fami_line_winner.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>" class="Active"><span>中獎名單</span></a></span></li>
        </ul>
        <ul class="winner">
          <li>
          <div class="down"><a href="fami_line_winner_letter_download.php?letter=<?php echo $Param['unit'] ?>"><img src="<?php echo $vars['web']['btn_winner_submit']?>" width="266" height="40"></a></div>
          </li>
          <li>
          <div class="fami"><a href="<?php echo $vars['web']['link_to_winner']?>"><img src="<?php echo $vars['web']['images_path_winner']?>fami.png" width="92" height="20"></a></div>
          </li>
          <?php /*
          <li>
          <div class="BorderTop"><img src="<?php echo $vars['web']['images_path_winner']?>BorderTop.png" width="290" height="16"></div>
          </li>
          */?>
          <!-- DATA -->
    <?php echo $vars['web']['table_to_winner'];?>
          <!--/ DATA -->
        </ul>
    </div>
</body>
</html>