<?php
require_once("_config.php");



class Service_Line_Activity{


    public function isStart($activity_id)
    {
        $dataActivity = $this->loadActivity($activity_id);
        $datetime_today = date('YmdHis');
        $datetime_start = date('YmdHis', strtotime($dataActivity['start_at']));
        $is = ($datetime_today > $datetime_start);
        return $is;
    }

    public function isEnd($activity_id)
    {
        $dataActivity = $this->loadActivity($activity_id);
        $datetime_today = date('YmdHis');
        $datetime_end = date('YmdHis', strtotime($dataActivity['end_at']));
        $is = ($datetime_today > $datetime_end);
        return $is;
    }

    public function isLottery($activity_id)
    {
        $dataActivity = $this->loadActivity($activity_id);
        $datetime_today = date('YmdHis');
        $datetime_lottery = date('YmdHis', strtotime($dataActivity['lottery_at']));
        $is = ($datetime_today > $datetime_lottery);
        return $is;
    }

    public function filter(&$row){
        $row["topic"] = iconv('utf-8','latin1',$row["topic"]);
        $row["table_to_winner"] = iconv('utf-8','latin1',$row["table_to_winner"]);
        return $row;
    }
    public function getCurrectActivity()
    {   
        try{
            $db = DBConnect("Master");
            if(!$db){$Json["error"] = "資料庫連線錯誤"; json_encode($Json); exit();}
            $today = date('Y-m-d H:i:s');
            $sql = "
                SELECT * FROM line_activity 
                WHERE start_at <= '{$today}' 
                AND end_at >= '{$today}' 
                LIMIT 1
            ";
            $rs = $db->query($sql);
            $rs = $rs->fetchAll();
            if(!(empty($rs))){
                $rs = $rs[0];
            }
            $rs = $this->filter($rs);
            return $rs;

        }catch(PDOException $e){
            echo $e->getMessage();
            exit;
            return false;            
        }
    }
    public function getPrevActivity()
    {
        $dataActivity = $this->getCurrectActivity();
        if((empty($dataActivity))){ return false; }
        $dataPrevActivity = $this->getPrevActivityByCurrectActivity($dataActivity);
        return $dataPrevActivity;
    }
    public function getPrevActivityByCurrectActivity($dataActivity)
    {
        $activity_id = $dataActivity['ref_prev_activity_id'];
        if((empty($activity_id))){ return false; }

        $db = DBConnect("Master");
        if(!$db){$Json["error"] = "資料庫連線錯誤"; json_encode($Json); exit();}
        $today = date('Y-m-d H:i:s');
        $sql = "
            SELECT * FROM line_activity 
            WHERE activity_id = '{$activity_id}' 
            LIMIT 1
        ";
        $rs = $db->query($sql);
        $rs = $rs->fetchAll();

        if(!(empty($rs))){
            $rs = $rs[0];
        }
        $rs = $this->filter($rs);
        return $rs;
    }
    public function loadActivity($activity_id)
    {
        $db = DBConnect("Master");
        if(!$db){$Json["error"] = "資料庫連線錯誤"; json_encode($Json); exit();}
        $today = date('Y-m-d H:i:s');
        $sql = "
            SELECT * FROM line_activity 
            WHERE activity_id = '{$activity_id}' 
            LIMIT 1
        ";
        $rs = $db->query($sql);
        $rs = $rs->fetchAll();
        if(!(empty($rs))){
            $rs = $rs[0];
        }
        $rs = $this->filter($rs);
        return $rs;
    }
}

$Service_Line_Activity = new Service_Line_Activity();


/*


*/
$_temp_unit = sql_injection_anti($_GET['unit']);
$_temp_letter = sql_injection_anti($_GET['letter']);
$activity_id = (empty($_temp_unit))?$_temp_letter:$_temp_unit;
$Param["unit"] = sql_injection_anti($activity_id);

//預設
if (empty($Param["unit"])) {
    $dataActivity = $Service_Line_Activity->getCurrectActivity();
    $dataPrevActivity = $Service_Line_Activity->getPrevActivityByCurrectActivity($dataActivity);
}else{
    $dataActivity = $Service_Line_Activity->loadActivity($Param["unit"]);
    $dataPrevActivity = $Service_Line_Activity->getPrevActivityByCurrectActivity($dataActivity);
}
// var_dump($dataActivity);
// var_dump($dataPrevActivity);
    
// INIT
$unit1 = $dataPrevActivity['activity_id'];
$unit2 = $dataActivity['activity_id'];
$Param["unit"] = $dataActivity['activity_id'];

$vars['user_id'] = sql_injection_anti($_GET["user_id"]);
$vars['unit'] = $Param["unit"];
$vars['setting']['action_start_enable'] = '0';
$vars['setting']['action_lottery_enable'] = '0';
$vars['setting']['sign_up_enable'] = '0';
$vars['setting']['api_maintain'] = time() > strtotime("2014-09-16 00:00:00") && time() < strtotime("2014-09-16 08:00:00");

// MODULES
// $target_id = (empty($Param["unit"]))?$_GET["letter"]:$Param["unit"];
        $PREV_LINE_ACTION_START_DATE = $dataActivity['start_at']; 
        $PREV_LINE_ACTION_END_DATE = $dataActivity['end_at']; 
        $PREV_LINE_ACTION_LOTTERY_DATE = $dataActivity['lottery_at']; 

        $LINE_ACTION_START_DATE = $dataActivity['start_at']; 
        $LINE_ACTION_END_DATE = $dataActivity['end_at']; 
        $LINE_ACTION_LOTTERY_DATE = $dataActivity['lottery_at']; 

        $LINE_ACTION_LOTTERY_ENABLE = "1";
        $TEMPLATE_FORDER = "line_{$vars['unit']}";
        $ACTIVITY_TYPE = 'line';
        $ACTIVITY_ID = $dataActivity['activity_id']; 
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
        $vars['web']['title'] = $dataActivity['topic']; 
        $vars['web']['images_path_start'] = "../templateiPhone/${TEMPLATE_FORDER}/css/start/images/";  
        $vars['web']['css_start'] = "../templateiPhone/{$TEMPLATE_FORDER}/css/start/css.css";  
        $vars['web']['btn_winner_submit'] = $vars['web']['images_path_winner']."BtnSubmit.png";  
        $vars['web']['images_path_winner'] = "../templateiPhone/{$TEMPLATE_FORDER}/css/winner/images/";  
        $vars['web']['css_winner'] = "../templateiPhone/{$TEMPLATE_FORDER}/css/winner/css.css"; 

        ////------------------ WINNER
        $isLottery = $Service_Line_Activity->isLottery($activity_id);
        if($isLottery){
            $vars['web']['btn_winner_submit'] = $vars['web']['images_path_winner']."download.png";  
            $vars['web']['link_to_winner'] =  $dataActivity['link_to_winner'];
            $vars['download']['filename'] = "中獎通知書-{$vars['web']['title']}.doc";  
            $vars['download']['myFile'] = "winner_letter/winner_letter_{$vars['unit']}.doc";  
        }

        //WINNER TABLE
        $vars['web']['table_to_winner'] = $dataActivity['table_to_winner'];


// FOR DOWNLOAD
$filename = $vars['download']['filename'];
$myFile = $vars['download']['myFile'];

// TODO
// go,no,...
function  getHomeButton($unit, $datetime='')
{
    $Service_Line_Activity = new Service_Line_Activity();
    $isStart = $Service_Line_Activity->isStart($unit);
    $isEnd = $Service_Line_Activity->isEnd($unit);
    if($isStart && $isEnd){
        $button = 'no';
    }else{
        $button = 'go';
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
