<?php

/**
 * Singer Management模块微站定义
 *
 * @author GS
 * @url http://bbs.wormwood.sg
 */
defined('IN_IA') or exit('Access Denied');

class SongsmgmtModuleSite extends WeModuleSite
{

    public function doWebSongsList()
    {
        global $_W, $_GPC;
        $op = ! empty($_GPC['op']) ? $_GPC['op'] : 'display'; // 操作
        if ('post' == $op) { // 添加/更新歌曲
            $id = intval($_GPC['id']); // 获得歌曲id
            $condition = '';
            $singerList = pdo_fetchall("SELECT * FROM " . tablename('singer') . " WHERE weid = '{$_W['weid']}' $condition ORDER BY id");
            if (! empty($id)) { // 更新歌手
                                // 查找是否存在
                $item = pdo_fetch("SELECT * FROM " . tablename('singer_songs') . " WHERE id = :id", array(
                    ':id' => $id
                ));
                if (empty($item)) {
                    message('亲,数据不存在！', '', 'error');
                }
            }
            if (checksubmit('submit')) { // 检测是否post
                                         // 验证
                if (empty($_GPC['title'])) {
                    message('亲,姓名不能为空');
                }
                if (empty($_GPC['singerid'])) {
                    message('请选择歌手');
                }
                if (empty($_GPC['price'])) {
                    message('价格不能为空');
                }
                if (empty($_GPC['memberprice'])) {
                    message('会员价格不能为空');
                }
                $singerid = intval($_GPC['singerid']); // 姓名
                $title = $_GPC['title']; // 地址
                $displayorder = intval($_GPC['displayorder']); // 年龄
                $price = $_GPC['price']; // 联系方式
                $memberprice = $_GPC['memberprice']; // 头像
                $createtime = time(); // 创建时间
                $data = array(
                    'singerid' => $singerid,
                    'title' => $title,
                    'status' => 1,
                    'displayorder' => $displayorder,
                    'price' => $price,
                    'memberprice' => $memberprice,
                    'createtime' => $createtime
                );
                if (empty($id)) {
                    pdo_insert('singer_songs', $data); // 添加数据
                    message('歌曲添加成功！', $this->createWebUrl('songslist', array(
                        'op' => 'display'
                    )), 'success');
                } else {
                    unset($data['createtime']);
                    pdo_update('singer_songs', $data, array(
                        'id' => $id
                    ));
                    message('歌曲更新成功！', $this->createWebUrl('songslist', array(
                        'op' => 'display'
                    )), 'success');
                }
            } else {
                include $this->template('songslist');
            }
        } else 
            if ('del' == $op) { // 删除数据
                $id = intval($_GPC['id']);
                $row = pdo_fetch("SELECT id FROM " . tablename('singer_songs') . " WHERE id = :id", array(
                    ':id' => $id
                ));
                if (empty($row)) {
                    message('歌曲' . $id . '不存在,不要乱动哦！');
                }
                pdo_delete('singer_songs', array(
                    'id' => $id
                ));
                message('删除成功！', referer(), 'success');
            } else 
                if ('display' == $op) {
                    $pindex = max(1, intval($_GPC['page']));
                    $psize = 20; // 每页显示
                    
                    $condition = '';
                    $list = pdo_fetchall("SELECT a.*,b.name FROM " . tablename('singer_songs') . "a left join" . tablename('singer') . "b on a.singerid = b.id   ORDER BY displayorder DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize); // 分页
                    $total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('singer_songs'));
                    $pager = pagination($total, $pindex, $psize);
                    include $this->template('songslist');
                }
    }

    public function doWebSelectedSongs()
    {
        global $_W, $_GPC;
        $op = ! empty($_GPC['op']) ? $_GPC['op'] : 'display'; // 操作
        if ('updateF' == $op) {
            $id = intval($_GPC['id']); // 获得id
            if (! empty($id)) {
                // 查找是否存在
                $item = pdo_fetch("SELECT * FROM " . tablename('singer_selected_songs') . " WHERE id = :id", array(
                    ':id' => $id
                ));
                if (empty($item)) {
                    message('亲,数据不存在！', '', 'error');
                }
            }
            
            $data = array(
                'status' => 4
            );
            
            pdo_update('singer_selected_songs', $data, array(
                'id' => $id
            ));
            
            message('更新状态成功', $this->createWebUrl('selectedSongs', array(
                'op' => 'display'
            )), 'success');
        } else 
            if ('updateP' == $op) {
                $id = intval($_GPC['id']); // 获得id
                if (! empty($id)) {
                    // 查找是否存在
                    $item = pdo_fetch("SELECT * FROM " . tablename('singer_selected_songs') . " WHERE id = :id", array(
                        ':id' => $id
                    ));
                    if (empty($item)) {
                        message('亲,数据不存在！', '', 'error');
                    }
                }
                
                $data = array(
                    'status' => 3
                );
                
                pdo_update('singer_selected_songs', $data, array(
                    'id' => $id
                ));
                
                message('更新状态成功', $this->createWebUrl('selectedSongs', array(
                    'op' => 'display'
                )), 'success');
            } 

            else 
                if ('del' == $op) { // 删除数据
                    $id = intval($_GPC['id']);
                    $row = pdo_fetch("SELECT id FROM " . tablename('singer_selected_songs') . " WHERE id = :id", array(
                        ':id' => $id
                    ));
                    if (empty($row)) {
                        message('歌曲' . $id . '不存在,不要乱动哦！');
                    }
                    pdo_delete('singer_selected_songs', array(
                        'id' => $id
                    ));
                    message('删除成功！', referer(), 'success');
                } else 
                    if ('display' == $op) {
                        $pindex = max(1, intval($_GPC['page']));
                        $psize = 20; // 每页显示
                        
                        $condition = '';
                        $list = pdo_fetchall("SELECT * FROM " . tablename('singer_selected_songs') . "ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize); // 分页
                        $total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('singer_selected_songs'));
                        $pager = pagination($total, $pindex, $psize);
                        include $this->template('selectedSongs');
                    }
    }

    public function doMobilesubmitSongs()
    {
        global $_GPC, $_W;
        
        $ids = $_GPC['ids'];
        if (empty($ids)) {
            die("Please select Songs");
        }
        $item_ids = explode(",", $ids);
        
        $totalMemberprice = 0;
        $totalprice = 0;
        
        foreach ($item_ids as $item_id) {
            $row1 = pdo_fetch("SELECT price,memberprice FROM " . tablename('singer_songs') . " WHERE id = {$item_id} ");
            $totalMemberprice += $row1['memberprice'];
            $totalprice += $row1['price'];
        }
        
        // get current user info
        $jifen = intval($_W['fans']['credit1']);
        $yuer = intval($_W['fans']['credit2']);
        
        $session = json_decode(base64_decode($_GPC['__msess']), true);
        $row1 = pdo_fetch("SELECT * FROM " . tablename('fans') . " WHERE from_user = :from_user AND weid = :weid", array(
            ':from_user' => $session['openid'],
            ':weid' => $_W['weid']
        ));
        $mobile = $row1['mobile'];
        
        if ($jifen == 0 && $yuer == 0) {
            
            foreach ($item_ids as $item_id) {
                $row1 = pdo_fetch("SELECT title ,price,memberprice,singerid FROM " . tablename('singer_songs') . " WHERE id = {$item_id} ");
                $row2 = pdo_fetch("SELECT name FROM " . tablename('singer') . " WHERE id = {$row1['singerid']} ");
                $data = array(
                    'songsid' => $item_id,
                    'name' => $row2['name'],
                    'title' => $row1['title'],
                    'tables' => '',
                    'remark' => '',
                    'selectedby' => $mobile,
                    'payamount' => $row1['price'],
                    'status' => 1,
                    'createtime' => time()
                )
                ;
                
                pdo_insert('singer_selected_songs', $data);
            }
            
            echo json_encode(array(
                'info' => 'Your Account Balance is 0 or not A Member,Please Contact us And Pay ' . $totalprice . ' SGD To Continue.'
            ));
            exit();
        }
        
        if ($yuer - $totalMemberprice < 0) {
            
            $result = $jifen - ($totalMemberprice - $yuer) * 10; // 积分按 1：10 换算
            
            if ($result < 0) {
                
                foreach ($item_ids as $item_id) {
                    $row1 = pdo_fetch("SELECT title ,price,memberprice,singerid FROM " . tablename('singer_songs') . " WHERE id = {$item_id} ");
                    $row2 = pdo_fetch("SELECT name FROM " . tablename('singer') . " WHERE id = {$row1['singerid']} ");
                    $data = array(
                        'songsid' => $item_id,
                        'name' => $row2['name'],
                        'title' => $row1['title'],
                        'tables' => '',
                        'remark' => '',
                        'selectedby' => $mobile,
                        'payamount' => $row1['memberprice'],
                        'status' => 2,
                        'createtime' => time()
                    )
                    ;
                    
                    pdo_insert('singer_selected_songs', $data);
                }
                
                echo json_encode(array(
                    'info' => 'Your Account Balance is 0, Please Contact us And Pay ' . $totalMemberprice . ' SGD To Continue.'
                ));
            } else {
                // 先扣余额，再扣积分
                
                $data = array(
                    'credit2' => 0,
                    'credit1' => $result
                );
                // 更新余额
                pdo_update('card_members', $data, array(
                    'weid' => $_W['weid'],
                    'from_user' => $_W['fans']['from_user']
                ));
                
                foreach ($item_ids as $item_id) {
                    $row1 = pdo_fetch("SELECT title ,price,memberprice,singerid FROM " . tablename('singer_songs') . " WHERE id = {$item_id} ");
                    $row2 = pdo_fetch("SELECT name FROM " . tablename('singer') . " WHERE id = {$row1['singerid']} ");
                    $data = array(
                        'songsid' => $item_id,
                        'name' => $row2['name'],
                        'title' => $row1['title'],
                        'tables' => '',
                        'remark' => '',
                        'selectedby' => $mobile,
                        'payamount' => $row1['memberprice'],
                        'status' => 3,
                        'createtime' => time()
                    )
                    ;
                    
                    pdo_insert('singer_selected_songs', $data);
                }
                
                echo json_encode(array(
                    'info' => 'Your order has been placed succesffully. Our Singer will present the song for you shortly.'
                ));
            }
        } else {
            $data = array(
                'credit2' => $yuer - $totalMemberprice
            );
            $reu = pdo_update('card_members', $data, array(
                'weid' => $_W['weid'],
                'from_user' => $_W['fans']['from_user']
            )); // 更新余额
            
            foreach ($item_ids as $item_id) {
                $row1 = pdo_fetch("SELECT title ,price,memberprice,singerid FROM " . tablename('singer_songs') . " WHERE id = {$item_id} ");
                $row2 = pdo_fetch("SELECT name FROM " . tablename('singer') . " WHERE id = {$row1['singerid']} ");
                $data = array(
                    'songsid' => $item_id,
                    'name' => $row2['name'],
                    'title' => $row1['title'],
                    'tables' => '',
                    'remark' => '',
                    'selectedby' => $mobile,
                    'payamount' => $row1['memberprice'],
                    'status' => 3,
                    'createtime' => time()
                )
                ;
                
                pdo_insert('singer_selected_songs', $data);
            }
            
            echo json_encode(array(
                'info' => 'Your order has been placed succesffully. Our Singer will present the song for you shortly.'
            ));
        }
    }
    
    public function doMobiletest1()
    {
        echo json_encode(array(
            'info' => '11Your order has been placed succesffully. Our Singer will present the song for you shortly.'
        ));
    }

    public function doMobileselectSongs()
    {
        global $_GPC, $_W;
        $id = intval($_GPC['id']);
        $condition = '';
        $list = pdo_fetchall("SELECT * FROM " . tablename('singer_songs') . " WHERE singerid = '{$id}' ORDER BY id");
        
        include $this->template('selectSongs');
    }

    public function doMobileEntrance()
    {
        global $_GPC, $_W;
        checkauth();
        $condition = '';
        $list = pdo_fetchall("SELECT * FROM " . tablename('singer') . " WHERE weid = '{$_W['weid']}' $condition ORDER BY id");
        
        include $this->template('singerList');
    }
}