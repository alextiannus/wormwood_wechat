<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?php  if(empty($_W['setting']['copyright']['sitename'])) { ?>WORMWOOD - 微信公众平台自助引擎<?php  } else { ?><?php  echo $_W['setting']['copyright']['sitename'];?><?php  } ?></title>
<meta name="keywords" content="<?php  if(empty($_W['setting']['copyright']['keywords'])) { ?>WORMWOOD,微信,微信公众平台<?php  } else { ?><?php  echo $_W['setting']['copyright']['keywords'];?><?php  } ?>" />
<meta name="description" content="<?php  if(empty($_W['setting']['copyright']['description'])) { ?>微信公众平台自助引擎，简称WORMWOOD，WORMWOOD是一款免费开源的微信公众平台管理系统。<?php  } else { ?><?php  echo $_W['setting']['copyright']['description'];?><?php  } ?>" />
<!--新增-->
<link type="text/css" rel="stylesheet" href="./resource/style/bootstrap.css" />
<link type="text/css" rel="stylesheet" href="./resource/style/font-awesome.css" />
<link type="text/css" rel="stylesheet" href="./resource/wdl07/style/frame_v3.css">
<!--WORMWOOD自带--> 
<script type="text/javascript" src="./resource/script/bootstrap.js"></script>
<script type="text/javascript" src="./resource/wdl071/style/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="./resource/wdl07/style/jquery.tipsy.js"></script> 
<script type="text/javascript" src="./resource/script/common.js"></script>
<script type="text/javascript" src="./resource/script/emotions.js"></script>
<?php  if($initNG) { ?><script type="text/javascript" src="./resource/script/angular.min.js"></script> <?php  } ?>
<script type="text/javascript" src="./resource/script/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
cookie.prefix = '<?php  echo $_W['config']['cookie']['pre'];?>';
</script>

<!--框架页样式--> 
<!--[if IE 7]>
<link rel="stylesheet" href="./resource/style/font-awesome-ie7.min.css">
<![endif]-->
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="./resource/style/bootstrap-ie6.min.css">
<link rel="stylesheet" type="text/css" href="./resource/style/ie.css">
<![endif]-->
</head>
<body <?php  if($action == 'frame') { ?> style="height:100%; overflow:hidden;" <?php  } ?> class="showmenu">

<?php  
if($do == 'global') {

		if (!empty($_W['isfounder'])) {
			$menuss[] = array(
		'title' => '用户续费',
		'items' => array(
				array('财务明细', create_url('finance/log')),
				array('用户充值', create_url('finance/userpay')),
				array('用户编制', create_url('finance/useredit')),
				array('用户明细', create_url('finance/userlist')),
				array('到期用户', create_url('finance/status')),
				array('用户组价格', create_url('finance/group')),

		)
	);


	}

	$mset[] = array(
		'title' => '网站管理',
		'menus' => $menuss
	);
}
?>
<script type="text/javascript">
jQuery.cookie=function(e,b,a){if(arguments.length>1&&String(b)!=="[object Object]"){a=jQuery.extend({},a);if(b===null||b===void 0)a.expires=-1;if(typeof a.expires==="number"){var d=a.expires,c=a.expires=new Date;c.setDate(c.getDate()+d);}b=String(b);
return document.cookie=[encodeURIComponent(e),"=",a.raw?b:encodeURIComponent(b),a.expires?"; expires="+a.expires.toUTCString():"",a.path?"; path="+a.path:"",a.domain?"; domain="+a.domain:"",a.secure?"; secure":""].join("")}a=b||{};c=a.raw?function(a){return a}:decodeURIComponent;return(d=RegExp("(?:^|; )"+encodeURIComponent(e)+"=([^;]*)").exec(document.cookie))?c(d[1]):null};

</script>

<div class="showmenu">
	<img class="bg" src="./resource/wdl07/image/bg.jpg">
<!-- 弹出框 却换公众号 -->
<link rel="stylesheet" href="./resource/wdl071/style/bootstrap.min.css" />
<script type="text/javascript" src="./resource/wdl071/style/bootstrap.min.js"></script> 
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>WORMWOOD欢迎您！！请切换你要管理的微信公众号！</h3>
    </div>
    <div class="modal-body">
    	<div class="main-menu-group group-yj">
	<div class="menu-cont fn-clear">
	 <?php  if(is_array($wechats)) { foreach($wechats as $account) { ?>
   <a  href="<?php  echo create_url('account/switch', array('id' => $account['weid']))?>"  target="main" onClick="return ajaxopen(this.href, function(s) {switchHandler(s)})">
							<div class="menu2 menu2-xsrw" title="切换公共号<?php  echo $account['name'];?>" data-mname="beginnertask">
							<img class="bimg" src="./resource/wdl071/img/wdl.png"/>
								<div style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" class="name"><?php  echo $account['name'];?></div>
							</div>  </a>
			<?php  } } ?>				
																			
					</div>
                </div>
                   
    </div>

</div>
 <!-- 弹出框 却换公众号end -->
	<div class="left1">
		<a href="javascript:;" id="site-logo" class="backtomenu"></a>
    <br>
		<div class="site-welcome backtomenu">
			<p class="huanying">欢迎来到</p>
			<h3>WORMWOOD自助式后台</h3>
		   <div class="intro"><p style="margin-left:-20px;color:#FFFFFF;">简洁!方便!<br/><br/></p>
           <p><img class="qrcode" src="./resource/wormwood/images/ewm.jpg" width="166"/><br>
             功能大多不会用？如何打造属于自己的华丽公众号呢？扫描二维码，关注我们!</p>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                </div>
		</div>
		<div class="menu">
			<div class="menu-title backtomenu">回到首页</div>
			<ul></ul>
		</div>
		<div class="bt-toolbar hnav">
			<a href="<?php  echo create_url('index')?>" class="backtomenu" style="background-image: -webkit-linear-gradient(#4794c7,#1e6696);background-image: linear-gradient(#4794c7,#1e6696);" original-title="首页">
				<img src="./resource/wdl07/image/home.png">
			</a>
			
			<a   href="<?php  echo create_url('index/welcome/' .'profile')?>" target="main" class="account" original-title="我的账户">
				<img src="./resource/wdl07/image/user.png">
			</a>
			
			<a  href="<?php  echo create_url('index/welcome/' . 'global')?>"" target="main" class="setting"  original-title="全局概况">
				<img src="./resource/wdl07/image/chart.png">
				
			</a>
			<a target="main" href="setting.php?act=profile&" class="setting" original-title="设置">
				<img src="./resource/wdl07/image/setting.png">
			</a>
			<a href="#" onClick="logout()" class="logout" style="width:20%;margin-right:0;" original-title="退出">
				<img src="./resource/wdl07/image/logout.png"></a>
			
		</div>

	</div>
	<div class="spliter" title="隐藏左侧面板">
		<div style="position: relative;height: 100%;width: 100%;">
			<div class="icon">
			</div>
		</div>
	</div>
<!--右边-->
	<div class="right1">
		<div class="main">
			<div class="header fn-clear">
				
				
				<div class="header-right">
			
					<div class="top-toolbar fn-clear">
						<a title="回到首页" href="javascript:;" class="backtomenu"></a>
						<div  style="width:146px; overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="切换公众号" class="gongzhonghao menu">
							
						<a href="#myModal" role="button"  data-toggle="modal" ><span id="current-account"><?php  if($_W['account']) { ?><?php  echo $_W['account']['name'];?><?php  } else { ?>选择公众号<?php  } ?></span></a>
							<ul>
							 <?php  if(is_array($wechats)) { foreach($wechats as $account) { ?>
							 <li><a href="<?php  echo create_url('index/welcome/' .'profile');?>" target="main"></a>
							<li><a  href="<?php  echo create_url('account/switch', array('id' => $account['weid']))?>" onClick="return ajaxopen(this.href, function(s) {switchHandler(s)})" target="main" ><span class="menu-arrow">&gt;</span><?php  echo $account['name'];?></a></li>
						<?php  } } ?>
							</ul>
						</div>
						
                        	<div title="公众平台" class="tuiguang menu">
							<a href="https://mp.weixin.qq.com/" target="_blank" ><img class="icon" src="./resource/wdl07/image/lightstore.png">公众平台</a>
						</div>
					  <div title="常用" class="menu upgrade">
						<img class="icon" src="./resource/wdl07/image/lightstore.png">
						常用
							<ul>
							<?php  if($_W['isfounder']) { ?>
							  
							  <?php  } ?>
							  <li><a target="main" href="test.php"><span class="menu-arrow">&gt;</span>调试工具</a></li>
						       <li><a target="main" href="<?php  echo create_url('setting/updatecache')?>"><span class="menu-arrow">&gt;</span>更新缓存</a></li>
							</ul>
							</div>
							
						<div title="全局管理" class="tuiguang menu <?php  if($do == 'global') { ?>active<?php  } ?>">
							<a href="./index.php?do=global" ><img class="icon" src="./resource/wdl07/image/buy.png">系统设置</a>
						</div>
                        
						<div title="管理首页" class="menu upgrade <?php  if($do == 'profile') { ?>active<?php  } ?>">
						<a href="./index.php?do=home" ><img class="icon" src="./resource/wdl07/image/lightstore.png">功能设置</a>
							
						</div>
					</div>
					<div class="user-level"><?php  echo $_W['username'];?>, 
					WORMWOOD欢迎您&nbsp;&nbsp;
										</div>
				</div>
			</div>
			<?php  if(is_array($mset)) { foreach($mset as $g) { ?>
			<?php  if($g['menus']) { ?>
			<div class="main-menu-list">
				<div class="main-menu-group group-jcfw">
					<div class="title">
						<div class="icon"></div>
						<?php  echo $g['title'];?>
					</div>
					<div class="menu-cont fn-clear">
						 <?php  if(is_array($g['menus'])) { foreach($g['menus'] as $menu) { ?>
						 
						 
						 <?php 
						switch ($menu['title']) {
							case '基础功能':
							  $snav_icon = 'jqgn';
							  break;
							case '微站功能':
							  $snav_icon = 'weizhan';
							  break;
							case '微文章(CMS)':
							  $snav_icon = 'weicms';
							  break;
							case '微相册':
							  $snav_icon = 'weixiangce';
							  break;
							case '微餐饮':
							  $snav_icon = 'weicanyin';
							  break;
							  case '微汽车':
							  $snav_icon = 'car';
							  break;
							case '微团购':
							  $snav_icon = 'weituangou';
							  break;
							case '新微餐饮':
							  $snav_icon = 'xinweicy';
							  break;
							case '微酒店':
							  $snav_icon = 'weijiudian';
							  break;
							case '微商城':
							  $snav_icon = 'weishop';
							  break;
							case '微房产':
							  $snav_icon = 'fancan';
							  break;
							case '粉丝管理':
							  $snav_icon = 'fensi';
							  break;
							case '微会员':
							  $snav_icon = 'weihuiyuan';
							  break;
							case '留言墙':
							  $snav_icon = 'liuyanqiang';
							  break;
							case '微信会员卡':
							  $snav_icon = 'huiyuanka';
							  break;
							  case '预约与调查':
							  $snav_icon = 'yuyue';
							  break;
							case '翻牌抽奖':
							  $snav_icon = 'fanpai';
							  break;
							case '打气球':
							  $snav_icon = 'daqiqiu';
							  break;
							case '贺卡':
							  $snav_icon = 'heka';
							  break;
							case '微喜帖':
							  $snav_icon = 'xitie';
							  break;
							  	case '大转盘':
							  $snav_icon = 'dazhuanpan';
							  break;
							case '微酒店':
							  $snav_icon = 'weijiudian';
							  break;
							case '一战到底':
							  $snav_icon = 'yizhandaodi';
							  break;
							case '刮刮卡':
							  $snav_icon = 'guaguaka';
							  break;
							case '摇一摇中奖':
							  $snav_icon = 'yaoyiyao';
							  break;
							case '分享达人':
							  $snav_icon = 'fenxiang';
							  break;
							case '砸金蛋':
							  $snav_icon = 'zajiandan';
							  break;
							case '签到':
							  $snav_icon = 'qiandao';
							  break;
							  case '微名片':
							  $snav_icon = 'weimingpian';
							  break;
							case '微信墙':
							  $snav_icon = 'weixinqian';
							  break;
							case '二维码推广':
							  $snav_icon = 'erweima';
							  break;
							case '360全景':
							  $snav_icon = '360';
							  break;
							case '楼盘户型管理':
							  $snav_icon = 'loupan';
							  break;
							  case '商家管理':
							  $snav_icon = 'shanjia';
							  break;
							  	case '微站快捷菜单':
							  $snav_icon = 'kuaijie';
							  break;
							case '小黄鸡':
							  $snav_icon = 'xiaohuanji';
							  break;
							case '数据统计':
							  $snav_icon = 'shuju';
							  break;
							case '跳蚤市场':
							  $snav_icon = 'tiaoshao';
							  break;
							case '漂流瓶':
							  $snav_icon = 'piaoliupin';
							  break;
							case '通用表单':
							  $snav_icon = 'tongyong';
							  break;
							
							case 'yunfuwu':
							  $snav_icon = 'weixinqian';
							  break;
							case '小黄鸡自动陪聊': 
							  $snav_icon = 'huanji';
							  break;
						    case '周边商户':
							  $snav_icon = 'shanghu';
							  break;
						    case '大转盘抽奖':
							  $snav_icon = 'da';
							  break;
							case '刮刮卡简版':
							  $snav_icon = 'ggkjb';
							  break;
							case '微短信'  :
							  $snav_icon = 'duanxin';
							  break;
							case '微路由' : 
							  $snav_icon = 'luyou';
							  break; 
							 case '微健身'  :
							  $snav_icon = 'wjs';
							  break;
							case '微信客服' : 
							  $snav_icon = 'wkefu';
							  break;  
						    case '防伪查询' : 
							  $snav_icon = 'fwma';
							  break;  
                            case '我的服务' : 
							  $snav_icon = 'wdfw';
							  break; 
						    case '杀价商城' : 
							  $snav_icon = 'red';
							  break; 
							case '新微小区' : 
							  $snav_icon = 'red';
							  break; 
							case '微夜店' : 
							  $snav_icon = 'red';
							  break; 
							case '场景魔方' : 
							  $snav_icon = 'red';
							  break; 
							case '攒红包' : 
							  $snav_icon = 'red';
							  break; 
							default:
							  $snav_icon = 'jqgn';
						}
						?>
	<?php  if($g['title'] == '基本设置') { ?>
  <div class="menu menuid"  data-mname="hello2biz"  original-title="" style="background:#E16B11"> 
    <?php  } else if($g['title'] == '我的服务') { ?>
    <div class="menu menuid"  data-mname="hello2biz"  original-title="" style="background:#E16B11">
     <?php  } else if($g['title'] == '行业应用') { ?>
    <div class="menu menuid"  data-mname="hello2biz"  original-title="" style="background:#19a858">
     <?php  } else if($g['title'] == '展示应用') { ?>
    <div class="menu menuid"  data-mname="hello2biz"  original-title="" style="background:#fb9a01">
     <?php  } else if($g['title'] == '客户关系') { ?>
      <div class="menu menuid"  data-mname="hello2biz"  original-title="" style="background:#3b4f46"> 
      <?php  } else if($g['title'] == '营销活动') { ?>
        <div class="menu menuid"  data-mname="hello2biz"  original-title="" style="background:#574052"> 
        <?php  } else if($g['title'] == '游戏应用') { ?>
    <div class="menu menuid"  data-mname="hello2biz"  original-title="" style="background:#fb9a01">
        <?php  } else if($g['title'] == '常用工具') { ?>
          <div class="menu menuid"  data-mname="hello2biz"  original-title="" style="background:#19a858"> 
          <?php  } else { ?>
            <div class="menu menuid"  data-mname="hello2biz"  original-title=""  style="background:#fb9a01"> <?php  } ?> 
					
							<img class="bimg" src="./resource/wdl07/image/<?php  echo $snav_icon;?>.png">
							 <?php  if(is_array($menu['title'])) { ?>
							   <div class="name" ><?php  echo $menu['title']['0'];?></div>
							   <?php  } else { ?>
							     <div class="name" ><?php  echo $menu['title'];?></div>
							   <?php  } ?>
							    
							<ul>
							   <?php  if(!empty($menu['items'])) { ?>
							    <?php  if(is_array($menu['items'])) { foreach($menu['items'] as $item) { ?>
							       <li>
								   <a href="<?php  echo $item['1'];?>" target="main"><span class="menu-arrow">&gt;</span><?php  echo $item['0'];?></a>
								   </li>
								<?php  } } ?>
							    <?php  } else { ?>
								 <li><a href="<?php  echo $menu['title']['1'];?>"></a></li>
								<?php  } ?>
							</ul>	
						</div>
						<?php  } } ?>	
					</div>
					 	
				</div>
               		
            </div>		
            <?php  } ?>
			<?php  } } ?>	
            <!-- 右侧管理菜单上下控制按钮 -->
					<div class="scroll-button">
						<span class="scroll-button-up"><i class="icon-caret-up"></i></span>
						<span class="scroll-button-down"><i class="icon-caret-down"></i></span>
					</div>			
			             <div class="frame-wrapper">
				         <iframe frameborder="0" id="main" name="main" src="" style="height: 740px; "></iframe>
			             </div>
	  </div>
	</div>					
</div>

<script type="text/javascript">
	function getUrlParam(name) {
		var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
		var r = window.location.search.substr(1).match(reg);  //匹配目标参数
		if (r!=null) return unescape(r[2]); return null; //返回参数值
	}
	$(function(){
		if ($.browser.msie && ($.browser.version == "6.0")) { 
			alert("您当前的IE浏览器版本过低，请升级后重新登录使用。（建议使用谷歌浏览器）");
			return;
		} 
		$(".spliter").click(function(){
			if($("body").hasClass("guide-step")) return;
			var $body = $("body");
			if($body.hasClass("hidemenu")){
				$body.removeClass("hidemenu");
				$body.addClass("showmenu");
				$(this).attr("title","隐藏左侧面板");
			} else{
				$body.removeClass("showmenu");
				$body.addClass("hidemenu");
				$(this).attr("title","展开左侧面板");
			}
		});
		//var itemWidth = ($(".main-menu-list").width() - 4*20)/4;
		//$(".main-menu").width(itemWidth);
		$(".right1 .menu").click(function(){
			if($("body").hasClass("guide-step")) return;
			var $menu = $(this);
			$(".left1 .menu ul").html($menu.find("ul").html());
			var $firstMenu = $(".left1 .menu ul li").eq(0);
			if($firstMenu.find("a").attr("onclick")){
				$firstMenu.find("a").click();
			} else{
				$firstMenu.addClass("selected");
				$(".right1 .main").addClass("showpage");
				$(".right1 iframe").attr("src",$firstMenu.find("a").attr("href"));
			}
			$(".intro").hide();
			$(".left1 .menu").show();
		});
				$(".left1 .menu").delegate("li","click",function(){
			if($("body").hasClass("guide-step")) return;
			$(".left1 .menu ul li.selected").removeClass("selected");
			$(this).addClass("selected");
		});
		$(".backtomenu").click(function(){
			
			window.location.href="<?php  echo create_url('index')?>";
			
		})
		 $("a[target='main']").live("click",function(){
			if($("body").hasClass("guide-step")) return;
			$(".right1 .main").attr("class","main showpage");
			if(!$(this).parent().is("li")){
				//隐藏菜单
				$(".left1 .menu").hide();
				$(".intro").show();
			}
		}); 
		// 模块tooltip提示
		$(".main-menu-list .menu,.bt-toolbar a").tipsy({delayIn: 300, delayOut: 300, gravity: "s"});
		var ts = "20130910111622";
		// 给每个连接后面添加时间戳，防止浏览器下iframe缓存不刷新的问题
		$("a[target='main']").each(function(index,a){
			$a = $(a);
			if($a.attr("href").indexOf("?") != -1){
				$a.attr("href",$a.attr("href") + "&ts=" + ts);
			} else{
				$a.attr("href",$a.attr("href") + "?ts=" + ts);
			}
		});
		// 处理url中的target参数
		var targetParam = getUrlParam("target");
		var $href = $(".main-menu-list ul>li>a[href*='"+ targetParam + "']");
		if ($href.length > 0) {
			$href = $($href.eq(0));
			$(".right1 .main").addClass("showpage");
			$(".left1 .menu").show();
			$(".left1 .menu ul").html($href.closest("ul").html());
			$(".left1 .menu ul li:eq(" + $href.closest("li").index() + ")").addClass("selected");
			$(".right1 iframe").attr("src",$href.attr("href"));
			$(".intro").hide();
		}
		$href = $(".header-right ul>li>a[href*='"+ targetParam + "']");
		if($href.length > 0){
			if($("body").hasClass("guide-step")) return;
			var $menu = $href.closest(".menu");
			$(".left1 .menu").show();
			$(".left1 .menu ul").html($menu.find("ul").html());
			var $targetMenu = $(".left1 ul>li>a[href*='"+ targetParam + "']").closest("li");
			if($targetMenu.find("a").attr("onclick")){
				$targetMenu.find("a").click();
			} else{
				$targetMenu.addClass("selected");
				$(".right1 .main").addClass("showpage");
				$(".right1 iframe").attr("src",$targetMenu.find("a").attr("href"));
			}
			$(".intro").hide();	
		}
		// 动态计算iframe高度
		$(".main iframe").height($(".right1").height() - 95);
		
		//微信公众号绑定未验证提示
		if ('' == 0) {
			$(".bind-tip").show();
		}
		
	});
	function showHelpList(){
		$(".right1 .main").attr("class","main showhelp");
	}
	function showQandaList(){
		$(".right1 .main").attr("class","main showqanda");
	}
	function hideTelTip(){
		$(".check-tel-tip").hide();
	}
</script>
<script>
$(function(){
	//公告代码
	var timer = setInterval(function(){
		var $cont = $(".notice .content"),
			count = $cont.find("li").length,
			cur = $cont.attr("data-cur"),
			dist = "-=" + $cont.find("li").eq(cur-1).outerHeight();
			dir = $cont.attr("data-dir");
		if(count <= 1){//公告少于2条时清除定时器
			clearInterval(timer);
			return ;
		}
		if(dir == 1){//正方向 
			if(cur == count){//反方向处理
				cur--;
				dist = "+=" + $cont.find("li").eq(cur-1).outerHeight();
				dir = 0;
			}else{
				cur++;
			}
			$cont.attr("data-cur" , cur);
		}else{//负方向
			if(cur == 1){//反方向处理
				cur++;
				dir = 1;
			}else{
				cur--;
				dist = "+=" + $cont.find("li").eq(cur-1).outerHeight();
			}
		}
		$cont.attr("data-cur" , cur);
		$cont.attr("data-dir" , dir);
		$cont.animate({"margin-top":dist},1000);
	} , 8000);
});
</script>
<script>
/*-----------------全局图文选择模块开始-------------------*/
//type==null只可以选择单图文，type="all"可以选择单图文和多图文
function showArticleChoice(type){
	type = type || "";
	$("#article_choice_dialog").modal("show");	
	$("#article_frame").attr("src" , "/index/index.php/article/index_select?action=popup_list&type="+type);
}
function showAddArticle(){
	$("#article_choice_dialog").modal("toggle");	
	$("iframe[name=main]").attr("src","/index/index.php/article/article_detail");
}
function showAddMulArticle(){
	$("#article_choice_dialog").modal("toggle");	
	$("iframe[name=main]").attr("src","/index/index.php/article/article_mul_detail");
}

//处理图文选择
$(function(){	
	$("#article_choice_dialog #select").click(function(){
		var resId = window.frames["article_frame"].getSelected();
		if(resId == null){
			alert("请至少选择一个图文");
		}else{
			$("#article_choice_dialog").modal("toggle");
			if(window.frames["main"]["wsite_setting_frame"]){
				window.frames["main"]["wsite_setting_frame"].setSelectedArticle(resId);
			} else{
				window.frames["main"].setSelectedArticle(resId);
			}
		}
	});
	
	$("#article_choice_dialog #cancel").click(function(){
		$("#article_choice_dialog").modal("toggle");		
	});
});
</script>
<script>
$(function(){
	showNoticeTip();
	function showNoticeTip(){
		$.post("/index/index.php/main/notice",{}, function(result){
			if(result.success && result.data){
				var data = result.data;
				$.messagetip.show({
					header:data.send_time,
			        title : data.title,
			        content : data.content
			    });
			}
		} , "json");
	}
	setInterval(showNoticeTip,1000*60*10);//十分钟触发一次
});
</script>
<script>

//退出
function logout(){
	if (confirm("确认要退出系统？")) {
	     $.post("<?php  echo create_url('member/logout')?>",{"out":true},function(data){
		    	window.location.reload();
		    	//window.location.href = "<?php  echo create_url('home/frame')?>";
		},"json");
		
	}
}

/*-----------------自定义菜单预览模块开始-------------------*/
function showMenuMonitor(wuid){
	var $box = $("#preview_box");
	$(".pre_nav_name",$box).html("&nbsp;");
	$("#preview_screen1",$box).empty();
	$box.show();
	$.post("/index/index.php/wxmenu/getTreeData",{wuid:wuid},
		function(result){
			if(result.success){
				
				$(".pre_nav_name",$box).text(result.wx_user_name);
				var data = result.data;
				//遍历一级菜单
				for(var i=0; i<data.length; i++){
					var menu = data[i];
					var menu_cont = [];
					menu_cont.push('<li id="preview_'+i+'"  class="previewlevel1 pre_nav ">');
					menu_cont.push('<a href="javascript:;" class="pre_nav_btn">'+menu.text+'</a>');
					var children = menu.children;
					if(children && children.length>0){
						menu_cont.push('<ul class="pre_sub_nav_list" style="display:none">');
						menu_cont.push('<span class="pre_sub_nav_arrow"></span>');
						for(var j=0; j<children.length; j++){
							menu_cont.push('<li  class="previewlevel2 pre_sub_nav">');
							menu_cont.push('<a href="javascript:;" class="pre_sub_nav_btn">'+children[j].text+'</a>');
							menu_cont.push('</li>');
						}

						menu_cont.push('</ul>');
					}
					menu_cont.push('</li>');
					$("#preview_screen1").append(menu_cont.join(''));
				}
			}
	},"json");
}
$(function(){
	$("#preview_screen1").delegate(".pre_nav_btn","click",function(){
		$(".pre_sub_nav_list").hide();
		$(this).next(".pre_sub_nav_list").show();
	});
	$("#pre_close").click(function(){
		$("#preview_box").hide();
	});
});
/*-----------------自定义菜单预览模块结束-------------------*/
</script>
<script>
function showCoupon(){
	$.get("/admin/account/charge/coupon?action=show",
		function(data){
			if(data.success && data.show){
				$dlg = $("#coupon_dialog");
				$dlg.css("left1" , ($(window).width()-$dlg.width())/2).modal("show");
			}	
		},"json");
}
$(function(){
	$("#coupon_dialog .action a").click(function(){
		$.get("/admin/account/charge/coupon?action=getCoupon",
			function(data){
				if(data.success && data.ret==0){
					window.top.location.href = '/admin/main.jsp?target=/admin/account/charge/coupon?action=list';
				}
		},"json");
	});
	
	$(".main-menu-list div.menu[data-mname]").click(function() {
		var moduleName = $(this).attr("data-mname");
		$.get("statistics/modulestat?mname=" + moduleName + "&t=" + (new Date()).getTime());
	});
});
</script>
<script>
/*---------页面跳转--------*/
function jumpAccount(){
	$("#jump_account").click();
}

</script>
<script type="text/javascript">
		$(function(){
			var show = getUrlParam("show");
			if(show == null || show!="false"){
				$.get("/index/index.php/main/counter?action=showWsiteTip",{},
					function(result){
					if(result.success && result.show){
						$dlg = $("#wsite_tip_dialog");
						$dlg.css("left1" , ($(window).width()-$dlg.width())/2).modal("show");
						$dlg.find(".close").click(function(){
							$dlg.modal("hide");
							document.cookie="showWsite=1"; 
						});
						$dlg.find(".join").click(function(){
							$dlg.modal("hide");
							document.cookie="showWsite=1"; 
							  var $menu = $('.wsite1');
								$(".left .menu ul").html($menu.find("ul").html());
								var $firstMenu = $(".left .menu ul li").eq(0);
								if($firstMenu.find("a").attr("onclick")){
									$firstMenu.find("a").click();
								} else{
									$firstMenu.addClass("selected");
									$(".right1 .main").addClass("showpage");
									$(".right1 iframe").attr("src",$firstMenu.find("a").attr("href"));
								}
								$(".intro").hide();
								$(".left1 .menu").show();
						});
						
					}
				},"json");
			}
		});
	</script>

<script type="text/javascript">
$(document).ready(function(){
   
	 $("div.red:first").css("background-color:#e16b11");
});


$(window).resize(function(){
	//调整框架宽高 兼容ie8
	$(".content-main, .content-main table td").height($(window).height()-40);
	$("#main").width($(window).width()-200);
</script>	
<style>
#article_choice_dialog{
	width: 800px;
	margin-left: -380px;
}
</style>
/*---------测试--------*/
<script type="text/javascript">
/*! Copyright (c) 2013 Brandon Aaron (http://brandon.aaron.sh)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Version: 3.1.9
 *
 * Requires: jQuery 1.2.2+
 */

(function (factory) {
    if ( typeof define === 'function' && define.amd ) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // Node/CommonJS style for Browserify
        module.exports = factory;
    } else {
        // Browser globals
        factory(jQuery);
    }
}(function ($) {

    var toFix  = ['wheel', 'mousewheel', 'DOMMouseScroll', 'MozMousePixelScroll'],
        toBind = ( 'onwheel' in document || document.documentMode >= 9 ) ?
                    ['wheel'] : ['mousewheel', 'DomMouseScroll', 'MozMousePixelScroll'],
        slice  = Array.prototype.slice,
        nullLowestDeltaTimeout, lowestDelta;

    if ( $.event.fixHooks ) {
        for ( var i = toFix.length; i; ) {
            $.event.fixHooks[ toFix[--i] ] = $.event.mouseHooks;
        }
    }

    var special = $.event.special.mousewheel = {
        version: '3.1.9',

        setup: function() {
            if ( this.addEventListener ) {
                for ( var i = toBind.length; i; ) {
                    this.addEventListener( toBind[--i], handler, false );
                }
            } else {
                this.onmousewheel = handler;
            }
            // Store the line height and page height for this particular element
            $.data(this, 'mousewheel-line-height', special.getLineHeight(this));
            $.data(this, 'mousewheel-page-height', special.getPageHeight(this));
        },

        teardown: function() {

            if ( this.removeEventListener ) {
                for ( var i = toBind.length; i; ) {
                    this.removeEventListener( toBind[--i], handler, false );
                }
            } else {
                this.onmousewheel = null;
            }
        },

        getLineHeight: function(elem) {
            return parseInt($(elem)['offsetParent' in $.fn ? 'offsetParent' : 'parent']().css('fontSize'), 10);
        },

        getPageHeight: function(elem) {
            return $(elem).height();
        },

        settings: {
            adjustOldDeltas: true
        }
    };

    $.fn.extend({
        mousewheel: function(fn) {
            return fn ? this.bind('mousewheel', fn) : this.trigger('mousewheel');
        },

        unmousewheel: function(fn) {
            return this.unbind('mousewheel', fn);
        }
    });


    function handler(event) {
        var orgEvent   = event || window.event,
            args       = slice.call(arguments, 1),
            delta      = 0,
            deltaX     = 0,
            deltaY     = 0,
            absDelta   = 0;
        event = $.event.fix(orgEvent);
        event.type = 'mousewheel';

        // Old school scrollwheel delta
        if ( 'detail'      in orgEvent ) { deltaY = orgEvent.detail * -1;      }
        if ( 'wheelDelta'  in orgEvent ) { deltaY = orgEvent.wheelDelta;       }
        if ( 'wheelDeltaY' in orgEvent ) { deltaY = orgEvent.wheelDeltaY;      }
        if ( 'wheelDeltaX' in orgEvent ) { deltaX = orgEvent.wheelDeltaX * -1; }

        // Firefox < 17 horizontal scrolling related to DOMMouseScroll event
        if ( 'axis' in orgEvent && orgEvent.axis === orgEvent.HORIZONTAL_AXIS ) {
            deltaX = deltaY * -1;
            deltaY = 0;
        }

        // Set delta to be deltaY or deltaX if deltaY is 0 for backwards compatabilitiy
        delta = deltaY === 0 ? deltaX : deltaY;

        // New school wheel delta (wheel event)
        if ( 'deltaY' in orgEvent ) {
            deltaY = orgEvent.deltaY * -1;
            delta  = deltaY;
        }
        if ( 'deltaX' in orgEvent ) {
            deltaX = orgEvent.deltaX;
            if ( deltaY === 0 ) { delta  = deltaX * -1; }
        }

        // No change actually happened, no reason to go any further
        if ( deltaY === 0 && deltaX === 0 ) { return; }

        // Need to convert lines and pages to pixels if we aren't already in pixels
        // There are three delta modes:
        //   * deltaMode 0 is by pixels, nothing to do
        //   * deltaMode 1 is by lines
        //   * deltaMode 2 is by pages
        if ( orgEvent.deltaMode === 1 ) {
            var lineHeight = $.data(this, 'mousewheel-line-height');
            delta  *= lineHeight;
            deltaY *= lineHeight;
            deltaX *= lineHeight;
        } else if ( orgEvent.deltaMode === 2 ) {
            var pageHeight = $.data(this, 'mousewheel-page-height');
            delta  *= pageHeight;
            deltaY *= pageHeight;
            deltaX *= pageHeight;
        }

        // Store lowest absolute delta to normalize the delta values
        absDelta = Math.max( Math.abs(deltaY), Math.abs(deltaX) );

        if ( !lowestDelta || absDelta < lowestDelta ) {
            lowestDelta = absDelta;

            // Adjust older deltas if necessary
            if ( shouldAdjustOldDeltas(orgEvent, absDelta) ) {
                lowestDelta /= 40;
            }
        }

        // Adjust older deltas if necessary
        if ( shouldAdjustOldDeltas(orgEvent, absDelta) ) {
            // Divide all the things by 40!
            delta  /= 40;
            deltaX /= 40;
            deltaY /= 40;
        }

        // Get a whole, normalized value for the deltas
        delta  = Math[ delta  >= 1 ? 'floor' : 'ceil' ](delta  / lowestDelta);
        deltaX = Math[ deltaX >= 1 ? 'floor' : 'ceil' ](deltaX / lowestDelta);
        deltaY = Math[ deltaY >= 1 ? 'floor' : 'ceil' ](deltaY / lowestDelta);

        // Add information to the event object
        event.deltaX = deltaX;
        event.deltaY = deltaY;
        event.deltaFactor = lowestDelta;
        // Go ahead and set deltaMode to 0 since we converted to pixels
        // Although this is a little odd since we overwrite the deltaX/Y
        // properties with normalized deltas.
        event.deltaMode = 0;

        // Add event and delta to the front of the arguments
        args.unshift(event, delta, deltaX, deltaY);

        // Clearout lowestDelta after sometime to better
        // handle multiple device types that give different
        // a different lowestDelta
        // Ex: trackpad = 3 and mouse wheel = 120
        if (nullLowestDeltaTimeout) { clearTimeout(nullLowestDeltaTimeout); }
        nullLowestDeltaTimeout = setTimeout(nullLowestDelta, 200);

        return ($.event.dispatch || $.event.handle).apply(this, args);
    }

    function nullLowestDelta() {
        lowestDelta = null;
    }

    function shouldAdjustOldDeltas(orgEvent, absDelta) {
        // If this is an older event and the delta is divisable by 120,
        // then we are assuming that the browser is treating this as an
        // older mouse wheel event and that we should divide the deltas
        // by 40 to try and get a more usable deltaFactor.
        // Side note, this actually impacts the reported scroll distance
        // in older browsers and can cause scrolling to be slower than native.
        // Turn this off by setting $.event.special.mousewheel.settings.adjustOldDeltas to false.
        return special.settings.adjustOldDeltas && orgEvent.type === 'mousewheel' && absDelta % 120 === 0;
    }

}));
</script>
<script type="text/javascript">
function max(a) {
	var b = a[0];
	for(var i=1;i<a.length;i++){ if(b<a[i])b=a[i]; }
	return b;
}
function currentMenuItem(a) {
	window.frames['main'].location.href= a;
}
function scrollButton() {
	if($(".sidebar-nav").height() > $(".content-main").height()) {
		$(".scroll-button").show();
	} else {
		if($(".sidebar-nav").position().top == 0) $(".scroll-button").hide();
	}
}
function switchHandler(s) {
	var mainurl = window.frames['main'].location;
	//window.top.location.reload();
	window.frames['main'].location = mainurl;
	$('#current-account').html(s);
}
function strlen(str) {
		var n = 0;
		for(i=0;i<str.length;i++){
			var leg=str.charCodeAt(i);
			n+=1;
		}
		return n;
}
$(document).ready(function() {
	//顶部子导航
	$(".hnav").delegate(".hnav-parent", "mouseover", function(){
		var $this = this;
		if ($(this).attr('id') == 'wechatpanel') {
			if ($(this).attr('loading') == '1'){
				return false;
			}
			position();
			if (cookie.get('wechatloaded') == '1') {
				return true;
			}
			$($this).find(".hnav-child").html('<li><a>加载中</a></li>');
			$(this).attr('loading', '1');
			ajaxopen('<?php  echo create_url('member/wechat')?>', function(s){
				var obj = $($this).find(".hnav-child");
				var html = '';
				for (i in s) {
					html += '<li><a href="account.php?act=switch&id='+s[i]['weid']+'" onclick="return ajaxopen(this.href, function(s) {main.document.location.reload();$(\'#current-account\').html(s)})">'+s[i]['name']+'</a></li>';
				}
				obj.html(html);
				$('#wechatpanel').attr('loading', '0');
			});
		} else {
			position();
		}
		function position() {
			var tmp = new Array();
			$($this).find(".hnav-child").show();
			$($this).find(".hnav-child li").each(function(i) {
				tmp[i] = strlen($(this).find("a").html());
			});
			$($this).find(".hnav-child li a").css("width", max(tmp)*18);
			$($this).find(".hnav-child").css("left", $($this).offset().left);
		}
		return false;
	});
	$(".hnav").delegate(".hnav-parent", "mouseout", function(){
		$(".hnav-child").hide();
	});
	//左侧导航
	$(".sidebar-nav").delegate(".snav-header", "click", function(){
		var a = $(this).hasClass("open");
		$(".sidebar-nav .snav-header").removeClass("open");
		$(".sidebar-nav .snav-list").hide();
		if(a) {
			$(this).removeClass("open");
			$(this).parent().find(".snav-list").each(function(i) {
				$(this).hide();
			});
		} else {
			$(this).addClass("open");
			$(this).parent().find(".snav-list").each(function(i) {
				$(this).show();
			});
		}
		scrollButton();
		return false;
	});
	$(".sidebar-nav .snav").each(function() {
		if($(this).find(".snav-header").hasClass("open")) {
			$(this).find(".snav-list").each(function() {
				$(this).toggle();
			});
		}
		$(this).find(".snav-list").each(function() {
			if($(this).hasClass("current")) {
				$(this).parent().find(".snav-header").toggleClass("open");
				$(this).parent().find(".snav-list").each(function() {
					$(this).toggle();
				});
			}
		});
		$(this).find(".snav-list a,.snav-header-list a").click(function() {
			$(".snav-list,.snav-header-list").removeClass("current");
			$(this).parent().addClass("current");
			currentMenuItem($(this).attr("href"));
			return false;
		});
	});
});

</script>

 
<script type="text/javascript">
/**判断改变中间块的颜色与title值**/
$(document).ready(function() {
 $(".menuid:first").css("background-color","#E16B11");//第一个背景设为红色
 $(".name:first").css("color","#FFFFFF");//第一个字体设为红色
 $(".bimg::first").attr("src","./resource/wdl07/image/3.png");//设定第一个栏目的图片（全局管理与基本设置同）

 $(":contains('自动回复')").attr("original-title","包括文字回复、图片回复、音乐回复、自定义接口回复、自定义菜单、特殊回复。");
 $(":contains('用户中心')").attr("original-title","在这里可以查看平台会员的VIP等级，会员到期时间，会员充值记录等...");
 $(":contains('独立商城')").attr("original-title","在这里可以设置独立的商城，多用户独立商城，同步账号，可以实现支付宝支付，不受微信影响...");
 //为设定弹出标题的文字介绍，
 $(":contains('基础功能')").attr("original-title","包括二维码推广、模块设置、当前公众号设置、支付参数设置。");
 $(":contains('微站功能')").attr("original-title","包括微网站风格设置、微站导航图标设置、微站访问入口。");
 $(":contains('参数设置&其他')").attr("original-title","这里可以查看当前公众号信息，设置当前公众号的支付参数...");
 $(":contains('签到')").attr("original-title","签到记录、签到关键字触发、参数设置。");
 $(":contains('微CMS')").attr("original-title","包括微站导航设置、文章管理、文章分类管理。");
 $(":contains('跳蚤市场')").attr("original-title","增强了的留言墙，可以用于物品交换等的跳蚤市场，也可以用作留言墙，留言板。");
});
</script>




<script>
function ajaxopen(url, callback) {
	$.getJSON(url+'&time='+new Date().getTime(), function(data){
		if (data.type == 'error') {
			message(data.message, data.redirect, data.type);
		} else {
			if (typeof callback == 'function') {
				callback(data.message, data.redirect, data.type);
			} else if(data.redirect) {
				location.href = data.redirect;	
			}
		}
	});	
	return false;
}
function ajaxuqur() {
		$("#myModal").modal('hide');
}
function ajaxapiopen(url,rid) {
	$.getJSON(url+'&time='+new Date().getTime(), function(data){
		if (data.type == 'error') {
alert("服务器繁忙，请稍后重试");
		} else {
	alert(data.message.message);
	if (data.message.type==1){
    $("#menu_"+rid).attr("class", "menud");
}else{
    $("#menu_"+rid).attr("class", "");

}
		}
	});	
	return false;
}
function switchHandler(s) {
	if (window.top.frames['main'].location.href.indexOf('global') > -1) {
		window.top.location.href = 'index.php?do=profile';
	}
	window.top.location.href = 'index.php?do=profile';
}
</script>