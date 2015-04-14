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
        HiiirTrack('3132355f33333835cea34869696972547261636b');
    </script>
</head>
<body id="Winner">

    <div class="Wrapper">
        <ul class="menu">
        <li class="n1"><span><a href="../fami_line_select.php?user_id=<?php echo $Param['user_id'] ?>" class="Active"><span>首頁</span></a></span></li>
        <li class="n2"><span><a href="fami_line_info.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>"><span>注意事項</span></a></span></li>
        <li class="n3"><span><a href="fami_line_winner.php?unit=<?php echo $Param['unit'] ?>&user_id=<?php echo $Param['user_id'] ?>"><span>中獎名單</span></a></span></li>
        </ul>


        <!-- /* <li class="box"></li>
        <li class="keybtn"><a href="#"><img src="<?php echo $vars['web']['images_path_start']?>BorderTop.png" width="262px"></a></li>*/-->
        <section>
        <div class="Box">
          <div class="BorderTop"><img src="<?php echo $vars['web']['images_path_start']?>BorderTop.png" width="291" height="16"></div>
          <div class="BoxMid">
            <ul>
              <li>參加者於參加活動同時，即同意本活動注意事項之規範。所有參加者需先加入全家便利商店網站會員，並且登入會員後才能擁有抽獎資格。</li>
              <li>同一帳號僅限乙次中獎機會，請填寫正確資料確保中獎資格。不得重覆登錄或冒用他人姓名。</li>
              <li>本活動限居住於台澎金馬地區本國國人參加。</li>
              <li>抽獎活動在全家進行抽獎(會同律師進行抽獎見證及錄影存證，但不對外開放)。</li>
              <li>得獎名單公告後，全家謹將公告中奨名單於活動網頁與全家官網，不另主動進行以電子郵件和中奨者聯繫確認，逾期未依中奨說明及活動辦法回覆或寄回回函者，則視為放棄得獎權益，亦不再進行得獎名額遞補</li>
              <li>中獎人同意中獎相關個人資訊由本公司於活動範圍進行蒐集、電腦處理及利用，中獎人並授權本公司公開公佈姓名，並不做其他用途。</li>
              <li>贈品規格外觀以實物為準，不得折換現金。如遇產品缺貨或不可抗力之事由導致獎品內容變更，主辦單位保留更換等值贈品的權力。</li>
              <li>如有任何因電腦、網路、電話、技術或不可歸責於主辦與活動單位之事由，而使系統誤送活動訊息或中獎通知，或使參加人所寄出或登錄之資料有遲延、遺失、錯誤、 無法辨識或毀損之情況，主辦與活動單位不負任何法律責任，參加者亦不得因此異議。</li>
              <li>本活動如有未盡事宜，全家便利商店擁有保留、修改、暫停及解釋活動內容之權利，修改訊息將於本網站上公佈，不另行通知。詳情請洽全家官網：<br style="margin:10px 0 0 0;"><a href="http://www.family.com.tw/marketing/publicList.aspx" title="全家官網">www.family.com.tw</a></li>
            </ul>
          </div>
          <div class="BorderBot"><img src="<?php echo $vars['web']['images_path_start']?>BorderBot.png" width="291" height="15"></div>
        </div>
      </section>
    </div><!--wrapper end-->
</body>
</html>
