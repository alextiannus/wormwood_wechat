<?php

/**
 * Fees Management
 *
 * @author GS
 * @url http://bbs.wormwood.sg
 */
defined('IN_IA') or exit('Access Denied');

class FeesmgmtModuleSite extends WeModuleSite
{

    /** 
     * submit new income function
     * */
    public function doWebNewIncome()
    {
        global $_W, $_GPC;
        $singerList = pdo_fetchall("SELECT * FROM " . tablename('singer') . " WHERE weid = '{$_W['weid']}' $condition ORDER BY id");
        
        if (checksubmit('submit')) { // 检测是否post
            
            if (empty($_GPC['singer_name'])) {
                message('Please select singer');
            }
            if (empty($_GPC['income'])) {
                message('Income cannot be blank.');
            }
            if (! is_numeric($_GPC['income'])) {
                message('Income must be digtal.');
            }
            
            $income = intval($_GPC['income']);
            $singer_name = $_GPC['singer_name'];
            $submittime = strtotime($_GPC['submittime']);
            
            $data = array(
                'singer_name' => $singer_name,
                'income' => $income,
                'income_type' => '2',
                'submittime' => $submittime
            );
            
            $re = pdo_insert('club_income_log', $data); // 记录到income log table
            
            if ($re) {
                
                // 记录到歌手 总收入小费
                $singerIncome = pdo_fetch("SELECT * FROM " . tablename('club_singer_totalincome') . " WHERE incometime = :incometime and singer_name= :singer_name", array(
                    ':incometime' => $submittime,':singer_name'=>$singer_name
                ));
                if (empty($singerIncome)) {
                    $sgData = array(
                        'singer_name' =>$singer_name,
                        'total_income' => $income,
                        'incometime' => $submittime
                    );
                   pdo_insert('club_singer_totalincome', $sgData);
                } else {
                    $sgData = array(
                        'total_income' => $singerIncome['total_income'] + $income,
                        'updatetime' => time()
                    );
                    pdo_update('club_singer_totalincome', $sgData, array(
                        'singer_name' =>$singer_name,'incometime' => $submittime
                    ));
                }          
                // 记录到歌手 总收入小费 end
                
                // 记录到club 总收入
                $club = pdo_fetch("SELECT * FROM " . tablename('club_total_income') . " WHERE createtime = :createtime", array(
                    ':createtime' => $submittime
                ));
                if (empty($club)) {
                    $clubData = array(
                        'total_income' => $income,
                        'createtime' => $submittime
                    );
                    $re = pdo_insert('club_total_income', $clubData);
                } else {
                    $clubData = array(
                        'total_income' => $club['total_income'] + $income,
                        'updatetime' => time()
                    );
                    pdo_update('club_total_income', $clubData, array(
                        'createtime' => $submittime
                    ));
                }
                
                // 记录到club 总收入 end
            }
            message('Add Income Sucessfully！', $this->createWebUrl('newIncome'), 'success');
        } else {
            include $this->template('newIncome');
        }
    }
    
    /**
     * singer income ranking function
     * */
    public function doWebRanking(){
        global $_W, $_GPC;
       
        if (checksubmit('submit')) {
            $time = $_GPC['incometime'];
            $searchTime =strtotime($time);
            $result = pdo_fetchall("SELECT * FROM " . tablename('club_singer_totalincome') . " WHERE incometime = {$searchTime} order by total_income desc ");
        }else{
           $incometime = strtotime(date("Y-m-d"));
           $result = pdo_fetchall("SELECT * FROM " . tablename('club_singer_totalincome') . " WHERE incometime = {$incometime} order by total_income desc ");
        }
   
      
        
        include $this->template('ranking');
        
    }
    
    /**
     * singer total income function
     * */
    public function doWebSingerDetail(){
        global $_W, $_GPC;
        $singerList = pdo_fetchall("SELECT * FROM " . tablename('singer') . " WHERE weid = '{$_W['weid']}' $condition ORDER BY id");
        $starttime = empty($_GPC['start']) ? strtotime('-1 month') : strtotime($_GPC['start']);
        $endtime = empty($_GPC['end']) ? TIMESTAMP : strtotime($_GPC['end']);
        $data = array();
        if (checksubmit('submit')) {
            
            if (empty($_GPC['singer_name'])) {
                message('Please select singer');
            }
            
            $singer_name =$_GPC['singer_name'];
            
           $result = pdo_fetchall("SELECT * FROM " . tablename('club_singer_totalincome') . " WHERE incometime >= {$starttime} and incometime <={$endtime} and singer_name ='{$singer_name}' ");
           $totalIncome = pdo_fetch("SELECT sum(total_income) as income FROM " . tablename('club_singer_totalincome') . " WHERE incometime >= {$starttime} and incometime <={$endtime} and singer_name ='{$singer_name}'");
           
           foreach ($result as  $index=>$item){
               $data[$index] =array(
                   'period' =>date('Y-m-d', $item['incometime']),
                   'value' =>$item['total_income']
                   
               );
           }
        }
    
        include $this->template('singerDetail');
    
    }
    
    /**
     * Club Total Income function
     * */
    public function doWebIncomeDetail(){
        global $_W, $_GPC;
        $starttime = empty($_GPC['start']) ? strtotime('-1 month') : strtotime($_GPC['start']);
        $endtime = empty($_GPC['end']) ? TIMESTAMP : strtotime($_GPC['end']);
        $data = array();
        if (checksubmit('submit')) {
    
    
            $result = pdo_fetchall("SELECT * FROM " . tablename('club_total_income') . " WHERE createtime >= {$starttime} and createtime <={$endtime}  ");
            $totalIncome = pdo_fetch("SELECT sum(total_income) as income FROM " . tablename('club_total_income') . " WHERE createtime >= {$starttime} and createtime <={$endtime} ");
             
            foreach ($result as  $index=>$item){
                $data[$index] =array(
                    'period' =>date('Y-m-d', $item['createtime']),
                    'value' =>$item['total_income']
                     
                );
            }
        }
    
        include $this->template('clubDetails');
    
    }
    
    /**
     * singer income log function
     * */
    public function doWebLog(){
        global $_W, $_GPC;
        $singerList = pdo_fetchall("SELECT * FROM " . tablename('singer') . " WHERE weid = '{$_W['weid']}' $condition ORDER BY id");
        $starttime = empty($_GPC['start']) ? strtotime('-1 month') : strtotime($_GPC['start']);
        $endtime = empty($_GPC['end']) ? TIMESTAMP : strtotime($_GPC['end']);
        include $this->template('log');
   
    }
    
    public function doWebLogAjax(){
        global $_W, $_GPC;
        $starttime = strtotime($_GPC['start']);
        $endtime = strtotime($_GPC['end']);
        $singer_name =$_GPC['singer_name'];
        $iDisplayStart=$_GPC['iDisplayStart'];
        $iDisplayLength=$_GPC['iDisplayLength'];
        $displayEnd = $iDisplayStart+$iDisplayLength;
        
         $totalRecords =  pdo_fetch("SELECT count(*) as total FROM " . tablename('club_income_log') . " WHERE submittime >= {$starttime} and submittime <={$endtime} and singer_name ='{$singer_name}' ");           
         $result = pdo_fetchall("SELECT singer_name,income ,(CASE income_type when '1' then 'Online' else 'Offline' end) as income_type,FROM_UNIXTIME(submittime,'%Y-%m-%d') as submittime  FROM " . tablename('club_income_log') . " WHERE submittime >= {$starttime} and submittime <={$endtime} and singer_name ='{$singer_name}' limit {$iDisplayStart} ,{$displayEnd} ");           
      
        echo json_encode(array(
            'iTotalRecords' =>$totalRecords['total'],
            'iTotalDisplayRecords' =>$totalRecords['total'],
            'aaData'=>$result
        ));
        
    }
    
    
    //mobile enrance, view fees ranking.
    public function doMobileEntrance()
    {
        //排行榜功能
         global $_GPC, $_W;
         $weid = intval($_GET['weid']);
         $from_user = authcode(base64_decode($_GPC['from_user']), 'DECODE');
         if(empty($from_user)){
             $from_user = $_W['fans']['from_user'];
         }
         
         $card = pdo_fetch("SELECT * FROM ".tablename('card_members')." WHERE weid = :weid and from_user=:from_user ", array(':weid' => $weid, ':from_user' => $from_user));
         $cardsn = $card['cardsn'];
         if(empty($card)){
             include $this->template('ranking');  // 没找到用户注册信息
             exit();
         }
         
         $singer =pdo_fetch("SELECT * FROM ".tablename('singer')." WHERE weid = :weid and cardsn=:cardsn ", array(':weid' => $weid, ':cardsn' => $cardsn));
         if(empty($singer)){
             include $this->template('ranking');  // 没找到对应歌手
             exit();
         }
         $incometime2 = strtotime(date("Y-m-d")); // 获取今天收益排行
         $list = pdo_fetchall("SELECT * FROM " . tablename('club_singer_totalincome') . " WHERE incometime = {$incometime2} order by total_income desc ");
         include $this->template('ranking');
    
    
    }
 
}