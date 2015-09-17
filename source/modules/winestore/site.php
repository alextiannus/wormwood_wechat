<?php
/**
 * wine store
 *
 * @author gs
 * @url 
 */
defined('IN_IA') or exit('Access Denied');

class WinestoreModuleSite extends WeModuleSite
{

    public $getUserInfoUrl = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=%s&openid=%s&lang=zh_CN';

    private function getUserInfo($o)
    {
        global $_W, $_GPC;
        checkaccount();
        if (empty($o)) {
            message('重要参数丢失..', '', 'error');
            exit();
        }
        if (empty($_W['account']['key']) || empty($_W['account']['secret'])) {
            $user = pdo_fetch('SELECT from_user,weid,nickname,avatar FROM' . tablename('fans') . "WHERE weid = :weid AND from_user = :from_user", array(
                ':from_user' => $o,
                ':weid' => $_W['weid']
            ));
            if (empty($user)) {
                $user = array(
                    'weid' => $_W['weid'],
                    'from_user' => $o,
                    'createtime' => TIMESTAMP
                );
                /* pdo_insert('fans',$user); */
            }
            if (empty($user['nickname'])) {
                $user['nickname'] = 'Anonymous-' . substr($o, - 4);
            }
            if (empty($user['avatar'])) {
                $user['avatar'] = './source/modules/winestore/template/style/null_header.png';
            }
            return $user;
        } else {
            $access_token = account_weixin_token($_W['account']);
            $content = ihttp_get(sprintf($this->getUserInfoUrl, $access_token, $o));
            if ($content['errcode'] != 0) {
                message(account_weixin_code($content['errcode']), '', 'error');
            }
            $record = @json_decode($content['content'], true);
            if ($record['subscribe'] == '1') {
                $user = array(
                    'weid' => $_W['weid'],
                    'from_user' => $record['openid'],
                    'nickname' => $record['nickname'],
                    'gender' => $record['sex'],
                    'residecity' => $record['city'],
                    'resideprovince' => $record['province'],
                    'nationality' => $record['country'],
                    'avatar' => $record['headimgurl'],
                    'createtime' => $record['subscribe_time']
                );
                
                if (pdo_fetch("SELECT * FROM " . tablename('fans') . " WHERE `from_user` = '{$record['openid']}'")) {
                    pdo_update('fans', $user, array(
                        'from_user' => $record['openid']
                    ));
                } else {
                    pdo_insert('fans', $user);
                }
            }
            if (empty($user['nickname'])) {
                $user['nickname'] = 'Anonymous_' . substr($o, - 4);
            }
            if (empty($user['avatar'])) {
                $user['avatar'] = './source/modules/winestore/template/style/null_header.png';
            }
            return $user;
        }
    }

    public function doMobileEntrance()
    {
        global $_W, $_GPC;
        
        // $user_agent = $_SERVER ['HTTP_USER_AGENT'];
        // if (strpos ( $user_agent, 'MicroMessenger' ) === false) {
        // echo "本页面仅支持微信访问!非微信浏览器禁止浏览!";
        // exit ();
        // }
        
        $fansid = $_W['fans']['from_user'];
        $status = pdo_fetch("select fansid from " . tablename('wine_store') . "where 1=1 and fansid = '{$fansid}'");
        
        if (! empty($status)) {
            $result = pdo_fetch("select snid,FROM_UNIXTIME(creattime)creattime,(CASE  status when 0 then 'No stock ' else 'Finish' end)status from" . tablename('wine_store') . "where 1=1 and fansid='{$fansid}'");
            
            include $this->template('winetrue');
        } else {
            include $this->template('wine');
        }
    }

    public function doMobileStore()
    {
        global $_W, $_GPC;
        
        $weid = $_GPC['weid'];
        // $weid=5;
        
        $time = date('Y-m-d H:i:s', time());
        $time1 = time();
        $fansid = $_W['fans']['from_user'];
        // $fansid='dddaaaa11';
        
        $name = $this->getUserInfo($fansid);
        $username = $name['nickname'];
        // $username='test12345';
        
        $status = pdo_fetch("select fansid from " . tablename('wine_store') . " where 1=1 and fansid = :fansid and weid = :weid", array(
            ':fansid' => $fansid,
            ':weid' => $_W['weid']
        ));
        if (! empty($status)) {
            $jd['IsSuccess'] = false;
            echo json_encode($jd);
            exit();
        }
        while (true) {
            $rand = rand(100001, 999998);
            $isok = pdo_fetch('SELECT COUNT(*) AS num from' . tablename('wine_store') . " WHERE snid = :snid", array(
                ':snid' => $rand
            ));
            if ($isok['num'] == 0) {
                break;
            }
        }
        
        $status = pdo_query("insert into " . tablename('wine_store') . "(snid,fansid,creattime,name,weid) values('{$rand}','{$fansid}',{$time1},'{$username}','{$weid}')");
        
        if ($status == FALSE) {
            $jd['IsSuccess'] = false;
            echo json_encode($jd);
        } else {
            
            $jd['div'] = "
            </br></br><div id='deposit-card'>
            <ul>
                    <li>
                        <p>Request No. ：</p>
                        <p>{$rand}</p>
                    </li>
                    <li>
                        <p>Directions：</p>
                        <p>Please go to the front desk, submit the request number for storing wine </p>
                    </li>
                    <li>
                        <p>Status：</p>
                        <p><span style='color:blue;'>Waiting for the stock</span></p>
                    </li>
                    <li>
                        <p>Submit Time：</p>
                        <p>{$time}</p>
                    </li>                         
				</ul>
			</div>";
            $jd['IsSuccess'] = true;
            $jd['code'] = $rand;
            echo json_encode($jd);
        }
    }

    public function doMobileWineList()
    {
        global $_W, $_GPC;
        $fansid = $_W['fans']['from_user'];
        
        $snid = $_GPC['snid'];
        
        $result = pdo_fetchall("select id,snid,cardnumber,amount,winename,winenumber,winenum,FROM_UNIXTIME(creattime)creattime,FROM_UNIXTIME(endtime)endtime,collectedby,remark from ims_wine_store_list where 1=1 and status=0 and snid={$snid}");
        
        include $this->template('wineList');
    }

    public function doMobileCollectWineList()
    {
        global $_W, $_GPC;
        $fansid = $_W['fans']['from_user'];
        
        $ids = $_GPC['ids'];
        
        include $this->template('submitWine');
    }

    public function doMobileSubmitWine()
    {
        global $_W, $_GPC;
        
        $ids = $_GPC['ids'];
        
        $list_ids = explode(",", $ids);
        
        $tablenumber = $_GPC['tablenumber'];
        
        $collectedby = $_GPC['collectedby'];
        
        $time = date('Y-m-d H:i:s', time());
        $time1 = time();
        
        foreach ($list_ids as $item_id) {
            
                $result = pdo_fetch("select * from" . tablename('wine_store_list') . "where 1=1 and status=0 and id='{$item_id}'");
                
                if(empty($result)){
                    echo json_encode(array(
                        'info' => 'You Have Already Submitted.'
                    ));
                    exit();
                }
                $updatestatus = pdo_query("update ims_wine_store_list set status=2 where 1=1 and id={$item_id}");
                
                $data = array(
                    'cardnumber' => $result['cardnumber'],
                    'winename' => $result['winename'],
                    'collectedby' => $collectedby,
                    'tablenumber' => $tablenumber,
                    'creattime' => $time1
                );
                
                $status = pdo_insert('wine_retrieve_list', $data);
                
                if ($status == FALSE) {
                    echo json_encode(array(
                        'info' => 'System Error.'
                    ));
                    exit();
                }
        }
        
        echo json_encode(array(
            'info' => 'Your Information has been submitted succesffully.'
        ));
    }
}