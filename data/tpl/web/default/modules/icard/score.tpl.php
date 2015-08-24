<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  echo $this -> set_tabbar($action);?>
<!--地图begin-->
<script src="http://api.map.baidu.com/api?key=24ffad3855e675265336a4cfb46d32b4&v=1.1&services=true" type="text/javascript"></script>
<script src="http://api.map.baidu.com/getscript?v=1.1&ak=&services=true&t=<?php echo TIMESTAP;?>" type="text/javascript" ></script>
<link href="http://api.map.baidu.com/res/11/bmap.css" rel="stylesheet" type="text/css">
<!--地图end-->
<div class="main">
        <form action="" method="post" onsubmit="return check();" class="form-horizontal form" enctype="multipart/form-data">
        <h4><?php  echo $title;?> - <a href="<?php  echo create_url('site/module', array('do' => 'SetRule', 'name' => 'icard'));?>" style="font-size:0.8em">入口设置</a></h4>
        <table class="tb">
            <tr>
                <th><label for="">会员卡使用说明</label></th>
                <td>
                    <textarea style="height:200px; width:400px;" class="span7 richtext-clone" name="card_info" cols="70" id="card_info"><?php  echo $reply['card_info'];?></textarea>
                </td>
            </tr>
            <tr>
                <th><label for="">积分规则说明</label></th>
                <td>
                    <textarea style="height:200px; width:400px;" class="span7 richtext-clone" name="score_info" cols="70" id="score_info"><?php  echo $reply['score_info'];?></textarea>
                </td>
            </tr>
        </table>
		<table class="tb">
            <thead>
                <tr>
                    <th>策略名称</th>
                    <td>奖励积分(必须为整数)  <font color="red">注意:设置为0的时候表示不启用</font></td>
                </tr>
            </thead>
            <tbody>
		        <tr>
		        	<th><label for="">每天签到奖励</label></th>
		        	<td>
                        <input type="text" name="day_score" id="day_score" value="<?php  if(empty($reply)) { ?>1<?php  } else { ?><?php  echo $reply['day_score'];?><?php  } ?>" class="px" style="width:50px;">
		        	</td>
		        </tr>
                <tr>
                    <th><label for="">连续6天签到奖励</label></th>
                    <td>
                        <input type="text" name="dayx_score" id="dayx_score" value="<?php  if(empty($reply)) { ?>0<?php  } else { ?><?php  echo $reply['dayx_score'];?><?php  } ?>" class="px" style="width:50px;">
                    </td>
                </tr>
                <tr>
                    <th><label for="">消费1元奖励</label></th>
                    <td>
                        <input type="text" name="payx_score" id="payx_score" value="<?php  if(empty($reply)) { ?>0<?php  } else { ?><?php  echo $reply['payx_score'];?><?php  } ?>" class="px" style="width:50px;">
                    </td>
                </tr>
		        <tr>
		        	<th></th>
		        	<td>
		        		<input name="submit" type="submit" value="提交" class="btn btn-primary span3">
		        		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		        	</td>
		        </tr>
            </tbody>
		</table>
	</form>
</div>
<script type="text/javascript">
    function check() {
        if($.trim($('#day_score').val()) == '') {
            message('没有输入图片标题.', '', 'error');
            return false;
        }
        var day_score = $.trim($('#day_score').val());
        if(isNaN(day_score)){
            message('每天签到奖励必须为数字.', '', 'error');
            return false;
        }
        var dayx_score = $.trim($('#dayx_score').val());
        if(isNaN(dayx_score)){
            message('连续6天签到奖励必须为数字.', '', 'error');
            return false;
        }
        var payx_score = $.trim($('#payx_score').val());
        if(isNaN(payx_score)){
            message('消费1元奖励必须为数字.', '', 'error');
            return false;
        }

        day_score = parseInt(day_score);
        dayx_score = parseInt(dayx_score);
        payx_score = parseInt(payx_score);
        if(day_score < 0 || dayx_score < 0 || payx_score < 0){
            message('积分请不要输入负数.', '', 'error');
            return false;
        }
        if(day_score > 100000 || dayx_score > 100000 || payx_score > 100000){
            message('积分请不要输入大于10万.', '', 'error');
            return false;
        }
        return true;
    }
</script>
<script type="text/javascript">
    kindeditor($('.richtext-clone'));
</script>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
