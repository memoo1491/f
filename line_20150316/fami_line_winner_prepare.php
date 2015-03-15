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
  <script type="text/javascript">
      HiiirTrack('3132355f33333836cea34869696972547261636b');
  </script>
</head>
<body id="Winner">
  <div class="Wrapper">
    <ul class="menu">
      <li class="n1"><span><a href="../fami_line_select.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>" ><span>首頁</span></a></span></li>
      <li class="n2"><span><a href="fami_line_info.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>"><span>注意事項</span></a></span></li>
      <li class="n3"><span><a href="fami_line_winner.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>" class="Active"><span>中獎名單</span></a></span></li>
    </ul>

    <ul class="winner">
      <li class="winnertime"></li>
    </ul>
  </div>
</body>
</html>
