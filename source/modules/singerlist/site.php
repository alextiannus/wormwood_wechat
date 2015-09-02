<?php

/**
 * Singer Management模块微站定义
 *
 * @author GS
 * @url http://bbs.wormwood.sg
 */
defined('IN_IA') or exit ('Access Denied');

class SingerlistModuleSite extends WeModuleSite {

	public function doWebMmphoto() {
		global $_W, $_GPC;
		$op = !empty ($_GPC['op']) ? $_GPC['op'] : 'display'; //操作
		if ('post' == $op) { //添加/更新照片
			$id = intval($_GPC['id']); //获得歌手id
			if (!empty ($id)) { //更新歌手
				//查找是否存在
				$item = pdo_fetch("SELECT * FROM " . tablename('singer') . " WHERE id = :id", array (
					':id' => $id
				));
				if (empty ($item)) {
					message('亲,数据不存在！', '', 'error');
				}
			}
			if (checksubmit('submit')) { //检测是否post
				//验证
				if (empty ($_GPC['singerName'])) {
					message('亲,姓名不能为空');
				}
				if (empty ($_GPC['img'])) {
					message('亲,记得上图哦');
				}
				if (empty ($_GPC['tou'])) {
					message('亲,传头像');
				}
				$weid = $_W['weid'];
				$singerName = $_GPC['singerName']; //姓名
				$address = $_GPC['address']; //地址
				$age = $_GPC['age']; //年龄
				$phone = $_GPC['phone']; //联系方式
				$tou = $_GPC['tou']; //头像
				$img = $_GPC['img']; //图片地址
				$txt = $_GPC['txt']; //附加文本信息
				$createtime = time(); //创建时间
				$data = array (
					'weid' => $weid,
					'name' => $singerName,
					'address' => $address,
					'age' => $age,
					'phone' => $phone,
					'tou' => $tou,
					'img' => $img,
					'txt' => $txt,
					'createtime' => $createtime,

					
				);
				if (empty ($id)) {
					pdo_insert('singer', $data); //添加数据
					message('歌手添加成功！', $this->createWebUrl('mmphoto', array (
						'op' => 'display'
					)), 'success');
				} else {
					unset ($data['createtime']);
					pdo_update('singer', $data, array (
						'id' => $id
					));
					message('歌手更新成功！', $this->createWebUrl('mmphoto', array (
						'op' => 'display'
					)), 'success');
				}

			} else {
				include $this->template('mmphoto');
			}
		} else
			if ('del' == $op) { //删除数据
				$id = intval($_GPC['id']);
				$row = pdo_fetch("SELECT id FROM " . tablename('singer') . " WHERE id = :id", array (
					':id' => $id
				));
				if (empty ($row)) {
					message('亲,你的照片' . $id . '不存在,不要乱动哦！');
				}
				pdo_delete('singer', array (
					'id' => $id
				));
				message('删除成功！', referer(), 'success');
			} else
				if ('display' == $op) {
					$pindex = max(1, intval($_GPC['page']));
					$psize = 20; //每页显示

					$condition = '';
					$list = pdo_fetchall("SELECT * FROM " . tablename('singer') . " WHERE weid = '{$_W['weid']}' $condition ORDER BY id DESC LIMIT " . ($pindex -1) * $psize . ',' . $psize); //分页
					$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('singer') . " WHERE weid = '{$_W['weid']}'");
					$pager = pagination($total, $pindex, $psize);
					include $this->template('mmphoto');
				}

	}
	
	public function doWebBuyflower() {
		global $_W, $_GPC;
		$op = !empty ($_GPC['op']) ? $_GPC['op'] : 'display'; //操作
		if ('update' == $op) { 
			$id = intval($_GPC['id']); //获得id
			if (!empty ($id)) { //更新歌手
				//查找是否存在
				$item = pdo_fetch("SELECT * FROM " . tablename('singer_flower') . " WHERE id = :id", array (
					':id' => $id
				));
				if (empty ($item)) {
					message('亲,数据不存在！', '', 'error');
				}
			}
			
			$data = array (		
				'status' => 'D',
			);
		
			pdo_update('singer_flower', $data, array (
				'id' => $id
			));
			message('发放成功！', $this->createWebUrl('buyflower', array (
				'op' => 'display'
			)), 'success');
		
			
		
		} else
			if ('del' == $op) { //删除数据
				$id = intval($_GPC['id']);
				$row = pdo_fetch("SELECT id FROM " . tablename('singer_flower') . " WHERE id = :id", array (
					':id' => $id
				));
				if (empty ($row)) {
					message('' . $id . '不存在,不要乱动哦！');
				}
				pdo_delete('singer_flower', array (
					'id' => $id
				));
				message('删除成功！', referer(), 'success');
			} else
				if ('display' == $op) {
					$pindex = max(1, intval($_GPC['page']));
					$psize = 20; //每页显示

					$condition = '';
					$list = pdo_fetchall("SELECT * FROM " . tablename('singer_flower') . " ORDER BY createtime DESC LIMIT " . ($pindex -1) * $psize . ',' . $psize); //分页
					$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('singer_flower') . " ");
					$pager = pagination($total, $pindex, $psize);
					include $this->template('buyflower');
				} else 
					if ( 'top' == $op ) {
					$starttime = empty($_GPC['start']) ? strtotime('-1 month') : strtotime($_GPC['start']);
					$endtime = empty($_GPC['end']) ? TIMESTAMP : strtotime($_GPC['end']) + 86399;
						
					$list = pdo_fetchall("select singer_id, singer_name,sum(send_amount) as send_total_amount from" .tablename('singer_flower').  " where status='D' AND `createtime` > {$starttime} AND `createtime` < {$endtime}  group by singer_id order by send_total_amount desc"); 
					include $this->template('buyflower');
					}

	}
	
	
	public function doMobileDetail() { //手机显示图片详细信息
		global $_GPC, $_W;
		$id = intval($_GPC['id']);
		$sql = "SELECT * FROM " . tablename('singer') . " WHERE `id`=:id";
		$detail = pdo_fetch($sql, array (
			':id' => $id
		));
		$detail = istripslashes($detail);
		$detail['thumb'] = $_W['attachurl'] . trim($detail['thumb'], '/');
		$title = $detail['title'];
		$detail['txt'] = html_entity_decode($detail['txt']);
		include $this->template('detail');
	}

	public function doMobileZan() { //点赞功能
		global $_GPC, $_W;
		$id = intval($_GPC['id']);
		if ($_W['isajax']) {
			$data = array (
				'zan' => intval($_GPC['zan']) + 1
			);
			pdo_update('singer', $data, array (
				'id' => $id
			)); //更新点赞		
			$detail = pdo_fetch("select zan from " . tablename('singer') . "  where id=" . $id);
			echo json_encode(array (
				'info' => '0',
				'zan' => $detail['zan']
			));
		}
	}
	public function doMobileTopn() { //排行榜功能
		global $_GPC, $_W;
		$pindex = max(1, intval($_GPC['page']));
		$psize = 5; //每页显示
		$condition = '';
		$list = pdo_fetchall("SELECT id,tou,name,address,zan FROM " . tablename('singer') . " WHERE weid = '{$_W['weid']}' $condition ORDER BY zan DESC LIMIT " . ($pindex -1) * $psize . ',' . $psize); //分页
		$detail['thumb'] = $_W['attachurl'] . trim($detail['thumb'], '/');
		$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('singer') . " WHERE weid = '{$_W['weid']}'");
		$pager = pagination($total, $pindex, $psize);
		include $this->template('topn');
	}

	public function doMobileSingerList() { //排行榜功能
		global $_GPC, $_W;
		$condition = '';
		$list = pdo_fetchall("SELECT * FROM " . tablename('singer') . " WHERE weid = '{$_W['weid']}' $condition ORDER BY id"); //分页

		include $this->template('singerList');
	}

	public function doMobileCharge() { //送花功能
		global $_GPC, $_W;
		checkauth();
		$jifen = intval($_W['fans']['credit1']);
		$yuer = intval($_W['fans']['credit2']);
		$mobile = $_W['fans']['mobile'];
		$amount = intval($_GPC['amount']);
		$id = intval($_GPC['id']);
		//get current user info	
		$session = json_decode(base64_decode($_GPC['__msess']), true);
		$row1 = pdo_fetch("SELECT * FROM ".tablename('fans')." WHERE from_user = :from_user AND weid = :weid", array(':from_user' => $session['openid'], ':weid' => $_W['weid']));
		$mobile = $row1['mobile'];
		if ($_W['isajax']) {
			
			if($yuer-$amount<0){
				
				$result = $jifen-($amount-$yuer)*10;   //积分按 1：10 换算
				
				if($result<0){
					
					echo json_encode(array ('info' => '余额不足，请联系商家充值后操作...'));
						
				}else{
					//先扣余额，再扣积分
					
					$data = array (
						'credit2' => 0,
						'credit1' => $result
					);
					//更新余额	
					pdo_update('card_members', $data,  array('weid' => $_W['weid'], 'from_user' => $_W['fans']['from_user'])); 	
					
					// 插入数据到Singer_flow
					$detail = pdo_fetch("select * from " . tablename('singer') . "  where id=" . $id);
					
					$data = array (
						'singer_id' =>$id,
						'singer_name' => $detail['name'],
						'send_amount' => $amount,
						'send_by' => $mobile,
						'createtime' => time(),
						'status' => 'P',  //P-PDEING,D-DONE
					);
					
					pdo_insert('singer_flower', $data); 
					
					echo json_encode(array ('info' => 'sucess....'));
					
				}
			}else{
				$data = array (
				'credit2' => $yuer-$amount
				);
				$reu = pdo_update('card_members', $data,  array('weid' => $_W['weid'], 'from_user' => $_W['fans']['from_user'])); //更新余额		
				
				//插入数据到Singer_flow
				$detail = pdo_fetch("select * from " . tablename('singer') . "  where id=" . $id);
				
				$data2 = array (
					'singer_id' => $id,
					'singer_name' => $detail['name'],
					'send_amount' => $amount,
					'send_by' => $mobile,
					'createtime' => time(),
					'status' => 'P',  //P-PDEING,D-DONE
				);
				
				pdo_insert('singer_flower', $data2); 
				
				echo json_encode(array ('info' => 'sucess....'));
				
			}
			
		}
	}
	
		public function doMobileTest() { 
			
			$this->wechatText('Hi', 'oCL42v-fWhgjbgaXRJEOjOnkxB0Q');
		}

	private function wechatText($msg,$o) {
		global $_GPC, $_W;
		$token = account_weixin_token($_W['account']);
	
		if(empty($token)){
			$token = account_weixin_token($_W['account']);
		}
		if(empty($msg)){
			message('诶呦,厉害啦..消息还能为空了?');
		}
		if(empty($o)){
			message('诶呦,厉害啦..发送对象还能为空了?');
		}
		$sendurl = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=%s";
		$url =  sprintf($sendurl,$token);
		$dat = urldecode(json_encode(array('touser'=>$o, 'msgtype'=>'text','text'=>array('content'=>urlencode($msg)))));
		$data=ihttp_post($url,$dat);
		if($data['code']!=200){
			message('网络不畅..请稍后再尝试...');
		}
		$content = json_decode($data['content'],true);
		if($content['errcode']!=0){
				message(account_weixin_code($content['errcode']));
				exit();
		}else{
				return 'ok';
		}
	}

}