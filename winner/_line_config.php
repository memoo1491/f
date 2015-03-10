<?php
require_once("_config.php");

$Param["unit"] = sql_injection_anti($_GET["unit"]);

//預設
if (empty($Param["unit"])) {
    $Param["unit"] = '20150216';
}

// INIT
$unit1 = 'egg'; //'aranzi';
$unit2 = $Param["unit"];
$vars['user_id'] = sql_injection_anti($_GET["user_id"]);
$vars['unit'] = $Param["unit"];
$vars['setting']['action_start_enable'] = '0';
$vars['setting']['action_lottery_enable'] = '0';
$vars['setting']['sign_up_enable'] = '0';
$vars['setting']['api_maintain'] = time() > strtotime("2014-09-16 00:00:00") && time() < strtotime("2014-09-16 08:00:00");

// MODULES
$target_id = (empty($Param["unit"]))?$_GET["letter"]:$Param["unit"];
switch ($target_id) {
    case 'baseball':
        $LINE_ACTION_START_DATE = '2013-03-15 00:00:00';
        $LINE_ACTION_END_DATE = '2013-03-24 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2013-04-01 00:00:00";
        $TEMPLATE_FORDER = "baseball";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '1';  //自訂義 line活動檔期一
        break;
    case 'travel':
        $LINE_ACTION_START_DATE = '2013-03-15 00:00:00';
        $LINE_ACTION_END_DATE = '2013-03-31 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2013-04-01 00:00:00";
        $TEMPLATE_FORDER = "travel";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '2';  //自訂義 line活動檔期二
        break;
    case 'sister':
        $LINE_ACTION_START_DATE = '2013-04-12 00:00:00';
        $LINE_ACTION_END_DATE = '2013-04-21 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2013-04-24 00:00:00";
        $TEMPLATE_FORDER = "sister";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '3';  //自訂義 line活動檔期三
        break;
    case 'god':
        $LINE_ACTION_START_DATE = '2013-05-24 00:00:00';
        $LINE_ACTION_END_DATE = '2013-06-02 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2013-06-05 00:00:00";
        $TEMPLATE_FORDER = "line_god";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '4';  //自訂義 line活動檔期四
        break;
    case 'vacation':
        $LINE_ACTION_START_DATE = '2013-07-01 00:00:00';
        $LINE_ACTION_END_DATE = '2013-07-14 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2013-07-16 00:00:00";
        $TEMPLATE_FORDER = "line_vacation";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '5';  //自訂義 line活動檔期五
        break;
    case 'doll':
        $LINE_ACTION_START_DATE = '2013-08-05 00:00:00';
        $LINE_ACTION_END_DATE = '2013-08-31 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2013-08-20 00:00:00"; //8/21號 怕誤上直接改成30
        $TEMPLATE_FORDER = "line_doll";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '6';  //自訂義
        break;
    case 'autumn':
        $LINE_ACTION_START_DATE = '2013-08-30 00:00:00';
        $LINE_ACTION_END_DATE = '2013-09-15 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2013-09-18 00:00:00"; //9/18號 怕誤上直接改成30
        $TEMPLATE_FORDER = "line_autumn";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '7';  //自訂義
        break;
    case 'halloween':
        $LINE_ACTION_START_DATE = '2013-10-17 00:00:00';
        $LINE_ACTION_END_DATE = '2013-11-03 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2013-11-06 00:00:00"; //9/18號 怕誤上直接改成30
        $TEMPLATE_FORDER = "line_halloween";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '8';  //自訂義
        break;
    case 'celebration':
        $LINE_ACTION_START_DATE = '2013-11-11 00:00:00'; // 11/11
        $LINE_ACTION_END_DATE = '2013-12-02 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2013-12-03 00:00:00"; //12/04號 怕誤上直接改成30
        $TEMPLATE_FORDER = "line_celebration";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '9';  //自訂義
        break;
    case 'xmas':
        $LINE_ACTION_START_DATE = '2013-12-06 00:00:00'; // 12/11
        $LINE_ACTION_END_DATE = '2013-12-24 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2013-12-26 00:00:00"; //12/27號 怕誤上直接改成30
        $TEMPLATE_FORDER = "line_xmas";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '10';  //自訂義
        break;
    case 'rody':
        $LINE_ACTION_START_DATE = '2014-01-14 00:00:00'; // 01/20
        $LINE_ACTION_END_DATE = '2014-02-04 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2014-02-07 00:00:00"; //02/07號 怕誤上直接改成30
        $TEMPLATE_FORDER = "line_rody";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '11';  //自訂義
        break;
    case 'spring':
        $LINE_ACTION_START_DATE = '2014-03-19 00:00:00';
        $LINE_ACTION_END_DATE = '2014-04-15 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2014-04-22 00:00:00"; //04/22號 怕誤上直接改成30
        $TEMPLATE_FORDER = "line_spring";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '12';  //自訂義
        break;
    case 'hero':
        $LINE_ACTION_START_DATE = '2014-04-17 00:00:00'; // 04/21
        $LINE_ACTION_END_DATE = '2014-05-13 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2014-05-19 00:00:00"; //05/19號 怕誤上直接改成30
        $TEMPLATE_FORDER = "line_hero";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '13';  //自訂義
        break;
    case 'crystal':
        $LINE_ACTION_START_DATE = '2014-06-25 00:00:00'; // 04/21
        $LINE_ACTION_END_DATE = '2014-07-20 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2014-07-25 00:00:00"; //07/25號 怕誤上直接改成30
        $TEMPLATE_FORDER = "line_crystal";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '14';  //自訂義
        break;
    case 'funhand':
        $LINE_ACTION_START_DATE = '2014-08-12 00:00:00'; // 08/13
        $LINE_ACTION_END_DATE = '2014-09-16 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2014-09-23 00:00:00"; //09/23號 怕誤上直接改成30
        $TEMPLATE_FORDER = "line_funhand";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '15';  //自訂義
        break;
    case 'aranzi':
        $LINE_ACTION_START_DATE = '2014-09-17 00:00:00'; // 08/13
        $LINE_ACTION_END_DATE = '2014-11-11 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2014-11-20 00:00:00"; //11/20號 怕誤上直接改成30
        $LINE_ACTION_LOTTERY_ENABLE = "1";
        $TEMPLATE_FORDER = "line_aranzi";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '16';  //自訂義
        $vars['unopen']['fill'] = '0';
        $vars['unopen']['action_end'] = '1';
        $vars['setting']['sign_up_enable'] = '0';
        $vars['setting']['action_start_enable'] = '0';
        $vars['setting']['action_lottery_enable'] = '1';
        $vars['web']['title'] = '阿朗基筆可愛';  
        $vars['web']['images_path_start'] = "../images/line/{$vars['unit']}/";  
        $vars['web']['images_path_winner'] = "../images/line/{$vars['unit']}/winner/";   
        $vars['web']['css_start'] = "../css/{$TEMPLATE_FORDER}.css";  
        $vars['web']['css_winner'] = "../css/{$TEMPLATE_FORDER}2.css";  
        $vars['download']['filename'] = "中獎通知書-{$vars['web']['title']}.doc";  
        $vars['download']['myFile'] = "winner_letter/winner_letter_{$vars['unit']}.doc";  

        break;
    case 'alian':
        $PREV_LINE_ACTION_START_DATE = '2014-09-17 00:00:00'; // 08/13
        $PREV_LINE_ACTION_END_DATE = '2014-11-11 23:59:59';
        $PREV_LINE_ACTION_LOTTERY_DATE = "2014-11-20 00:00:00"; 

        $LINE_ACTION_START_DATE   = '2014-11-19 00:00:00'; // 08/13
        $LINE_ACTION_END_DATE     = '2014-12-25 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2015-01-09 00:00:00";

        $LINE_ACTION_LOTTERY_ENABLE = "1";
        $TEMPLATE_FORDER = "line_{$vars['unit']}";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '17';  //自訂義
        $vars['unopen']['fill'] = '0';
        $vars['unopen']['action_end'] = '1';
        $vars['setting']['sign_up_enable'] = '1';
        //時間
        $vars['time']['prev_action']['start'] = $PREV_LINE_ACTION_START_DATE;
        $vars['time']['prev_action']['end'] = $PREV_LINE_ACTION_END_DATE;
        $vars['time']['prev_action']['lottery'] = $PREV_LINE_ACTION_LOTTERY_DATE;
        $vars['time']['curr_action']['start'] = $LINE_ACTION_START_DATE;
        $vars['time']['curr_action']['end'] = $LINE_ACTION_END_DATE;
        $vars['time']['curr_action']['lottery'] = $LINE_ACTION_LOTTERY_DATE;

        //是否啟用活動
        $vars['setting']['action_start_enable'] = '1';
        //是否開獎
        $vars['setting']['action_lottery_enable'] = '1'; 
        $vars['setting']['action_lottery_force_open'] = '1'; 
        //預覽開獎
        $vars['setting']['review_winner'] = '1'; 
        $vars['web']['title'] = '宇宙人繽紛SHOW';  
        $vars['web']['images_path_start'] = "../templateiPhone/${TEMPLATE_FORDER}/css/start/images/";  
        $vars['web']['images_path_winner'] = "../templateiPhone/{$TEMPLATE_FORDER}/css/winner1/images/";  
        $vars['web']['btn_winner_submit'] = $vars['web']['images_path_winner']."BtnSubmit.png";  
        $vars['web']['btn_winner_submit'] = $vars['web']['images_path_winner']."download.png";  
        $vars['web']['css_start'] = "../templateiPhone/{$TEMPLATE_FORDER}/css/start/css.css";  
        $vars['web']['css_winner'] = "../templateiPhone/{$TEMPLATE_FORDER}/css/winner1/css.css";  
        $vars['web']['link_to_winner'] = "http://www.family.com.tw/marketing/PublicDetail.aspx?ID=1023";  
        $vars['download']['filename'] = "中獎通知書-{$vars['web']['title']}.doc";  
        $vars['download']['myFile'] = "winner_letter/winner_letter_{$vars['unit']}.doc";  

        //WINNER TABLE
        $vars['web']['table_to_winner'] = <<<EOD

<table border="0" cellpadding="0" cellspacing="0">
<tr class="titlebg">
<td colspan="2" class="titletext">宇宙人隨身袋+證件帶一套10名</td></tr>
<tr>
<td align="center">夏O瑄</td>
<td align="left">t*****y88toto@yahoo.com.tw</td>
</tr>
<tr>
<td align="center">&nbsp;</td>
<td align="left">s*****12@gmail.com</td>
</tr>
<tr>
<td align="center">郭O伶</td>
<td align="left">i*****5913@yahoo.com.tw</td>
</tr>
<tr>
<td align="center">陳O嘉</td>
<td align="left">r*****02@yahoo.com.tw</td>
</tr>
<tr>
<td align="center">WOOg COOg COOn</td>
<td align="left">m*****638@yahoo.com.tw</td>
</tr>
<tr>
<td align="center">蔡O萍</td>
<td align="left">g*****1315@gmail.com</td>
</tr>
<tr>
<td align="center">蔣O道</td>
<td align="left">D*****lchung@gmail.com</td>
</tr>
<tr>
<td align="center">張O怡</td>
<td align="left">m*****2@yahoo.com.tw</td>
</tr>
<tr>
<td align="center">&nbsp;</td>
<td align="left">c*****08kimo@yahoo.com.tw</td>
</tr>
<tr>
<td align="center">李O凭</td>
<td align="left">w*****5338@gmail.com</td>
</tr>
<tr class="noon"><td colspan="2" class="noon">&nbsp;</td></tr>
</table>

EOD;

        break;
    case 'egg':
        $PREV_LINE_ACTION_START_DATE = '2014-11-19 00:00:00'; 
        $PREV_LINE_ACTION_END_DATE = '2014-12-25 23:59:59';
        $PREV_LINE_ACTION_LOTTERY_DATE = "2015-01-09 00:00:00";

        $LINE_ACTION_START_DATE   = '2015-01-13 00:00:00'; 
        $LINE_ACTION_END_DATE     = '2015-02-06 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2015-02-11 00:00:00";

        $LINE_ACTION_LOTTERY_ENABLE = "1";
        $TEMPLATE_FORDER = "line_{$vars['unit']}";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '18';  //自訂義
        $vars['unopen']['fill'] = '0';
        $vars['unopen']['action_end'] = '0';
        $vars['setting']['sign_up_enable'] = '1';
        //時間
        $vars['time']['prev_action']['start'] = $PREV_LINE_ACTION_START_DATE;
        $vars['time']['prev_action']['end'] = $PREV_LINE_ACTION_END_DATE;
        $vars['time']['prev_action']['lottery'] = $PREV_LINE_ACTION_LOTTERY_DATE;
        $vars['time']['curr_action']['start'] = $LINE_ACTION_START_DATE;
        $vars['time']['curr_action']['end'] = $LINE_ACTION_END_DATE;
        $vars['time']['curr_action']['lottery'] = $LINE_ACTION_LOTTERY_DATE;

        //是否啟用活動
        $vars['setting']['action_start_enable'] = '1';
        //是否開獎
        $vars['setting']['action_lottery_enable'] = '1'; 
        $vars['setting']['action_lottery_force_open'] = '1'; 
        //預覽活動開始 / 報名 sign_up
        $vars['setting']['review_sign_up'] = '1'; 
        //預覽開獎
        $vars['setting']['review_winner'] = '1'; 
        $vars['web']['title'] = '蛋黃哥生活保鮮學';  
        $vars['web']['images_path_start'] = "../templateiPhone/${TEMPLATE_FORDER}/css/start/images/";  
        $vars['web']['images_path_winner'] = "../templateiPhone/{$TEMPLATE_FORDER}/css/winner/images/";  
        $vars['web']['btn_winner_submit'] = $vars['web']['images_path_winner']."BtnSubmit.png";  
        // $vars['web']['btn_winner_submit'] = $vars['web']['images_path_winner']."download.png";  
        $vars['web']['css_start'] = "../templateiPhone/{$TEMPLATE_FORDER}/css/start/css.css";  
        $vars['web']['css_winner'] = "../templateiPhone/{$TEMPLATE_FORDER}/css/winner/css.css";  
        $vars['web']['link_to_winner'] = "http://www.family.com.tw/marketing/PublicDetail.aspx?ID=1037";  
        $vars['download']['filename'] = "中獎通知書-{$vars['web']['title']}.doc";  
        $vars['download']['myFile'] = "winner_letter/winner_letter_{$vars['unit']}.doc";  

        //WINNER TABLE
        $vars['web']['table_to_winner'] = <<<EOD
        
<table border="0" cellpadding="0" cellspacing="0">
<tr class="titlebg">
<td colspan="2" class="titletext">蛋黃哥生活保鮮學<br>
『Enjoy碗+Relax盤』乙組 共10名</td></tr>
<tr>
<td align="left">ac1017006@yahoo.com.tw</td>
</tr>
<tr>
<td align="left">a4522183@yahoo.com.tw</td>
</tr>
<tr>
<td align="left">kone55664516@yahoo.com.tw</td>
</tr>
<tr>
<td align="left">purkey5858@Yahoo.com</td>
</tr>
<tr>
<td align="left">easylife57@yahoo.com.tw</td>
</tr>
<tr>
<td align="left">bayzeni@gmail.com</td>
</tr>
<tr>
<td align="left">hank19990930@yahoo.com.tw</td>
</tr>
<tr>
<td align="left">Jim200102@gmail.com</td>
</tr>
<tr>
<td align="left">vivin109@yahoo.com.tw</td>
</tr>
<tr>
<td align="left">wuyilu89@gmail.com</td>
</tr>
<tr class="noon"><td colspan="2" class="noon">&nbsp;</td></tr>
</table>

EOD;

        break;

    case '20150216':
        $PREV_LINE_ACTION_START_DATE   = '2015-01-13 00:00:00'; 
        $PREV_LINE_ACTION_END_DATE     = '2015-02-06 23:59:59';
        $PREV_LINE_ACTION_LOTTERY_DATE = "2015-02-11 00:00:00";

        $LINE_ACTION_START_DATE = '2015-02-17 00:00:00'; 
        $LINE_ACTION_END_DATE = '2015-03-03 23:59:59';
        $LINE_ACTION_LOTTERY_DATE = "2015-03-10 00:00:00";

        $LINE_ACTION_LOTTERY_ENABLE = "1";
        $TEMPLATE_FORDER = "line_{$vars['unit']}";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = '20150216';  //自訂義
        $vars['unopen']['fill'] = '0';
        $vars['unopen']['action_end'] = '0';
        $vars['setting']['sign_up_enable'] = '1';
        //時間
        $vars['time']['prev_action']['start'] = $PREV_LINE_ACTION_START_DATE;
        $vars['time']['prev_action']['end'] = $PREV_LINE_ACTION_END_DATE;
        $vars['time']['prev_action']['lottery'] = $PREV_LINE_ACTION_LOTTERY_DATE;
        $vars['time']['curr_action']['start'] = $LINE_ACTION_START_DATE;
        $vars['time']['curr_action']['end'] = $LINE_ACTION_END_DATE;
        $vars['time']['curr_action']['lottery'] = $LINE_ACTION_LOTTERY_DATE;

        //是否啟用活動
        $vars['setting']['action_start_enable'] = '1';
        //是否開獎
        $vars['setting']['action_lottery_enable'] = '1'; 
        $vars['setting']['action_lottery_force_open'] = '1'; 
        //預覽活動開始 / 報名 sign_up
        $vars['setting']['review_sign_up'] = '1'; 
        //預覽開獎
        $vars['setting']['review_winner'] = '1'; 
        $vars['web']['title'] = '金好神';  
        $vars['web']['images_path_start'] = "../templateiPhone/${TEMPLATE_FORDER}/css/start/images/";  
        $vars['web']['css_start'] = "../templateiPhone/{$TEMPLATE_FORDER}/css/start/css.css";  
        $vars['web']['btn_winner_submit'] = $vars['web']['images_path_winner']."BtnSubmit.png";  

        ////------------------ WINNER
        $vars['web']['images_path_winner'] = "../templateiPhone/{$TEMPLATE_FORDER}/css/winner/images/";  
        $vars['web']['css_winner'] = "../templateiPhone/{$TEMPLATE_FORDER}/css/winner/css.css"; 
        $vars['web']['btn_winner_submit'] = $vars['web']['images_path_winner']."download.png";  
        $vars['web']['link_to_winner'] = "http://www.family.com.tw/marketing/PublicDetail.aspx?ID=1045";  
        $vars['download']['filename'] = "中獎通知書-{$vars['web']['title']}.doc";  
        $vars['download']['myFile'] = "winner_letter/winner_letter_{$vars['unit']}.doc";  

        //WINNER TABLE
        $vars['web']['table_to_winner'] = <<<EOD
        
    <table border="0" cellpadding="0" cellspacing="0">
  <tr class="titlebg">
    <td colspan="3" class="titletext">新春迎好運<br>
      純金999『金好神』乙尊  共3名</td></tr>
  <tr>
  <td align="left">王*榕</td>
  <td align="left">vivi***868@yahoo.com.tw</td>
  </tr>
  <tr>
  <td align="left">陽*川</td>
  <td align="left">nguy***68962@yahoo.com.tw</td>
  </tr>
  <tr>
  <td align="left">許*豪</td>
  <td align="left">annh***ong@gmail.com</td>
  </tr>
 </table>


EOD;

        break;


    default:

        break;
}

// FOR DOWNLOAD
$filename = $vars['download']['filename'];
$myFile = $vars['download']['myFile'];

// TODO
// go,no,...
function  getHomeButton($unit, $datetime='')
{
    switch($unit){
        case '20150216':
            $button = 'no';
            break;
        case 'egg':
            $button = 'no';
            break;
        case 'alian':
            $button = 'no';
            break;
        case 'aranzi':
            $button = 'no';
            break;
        case 'funhand':
        default:
            $button = 'no';
            break;
    }

    if(!(empty($datetime))){
        $time = strtotime($datetime);
        $today = time();
        if($today > $time ){
            $button = 'no';
        }
    }

    return $button;
}


function  isOutOfDate($endDate)
{
    if (time() > strtotime($endDate)) {
        return true;
    } else {
        return false;
    }
}

function isBeforeDate($startDate) {
    if (time() < strtotime($startDate)) {
        return true;
    } else {
        return false;
    }
}

?>
