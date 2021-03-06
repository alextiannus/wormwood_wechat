<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<div class="main">
<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data">
	<h4>商户基本信息</h4>
	<table class="tb">
		<tr>
			<th>名称</th>
			<td><input type="text" name="title" value="<?php  echo $setting['title'];?>" class="span5"></td>
		</tr>
		<tr>
			<th><label for="">宣传图</label></th>
			<td>
				<?php  echo tpl_form_field_image('thumb', $setting['thumb']);?>
				<span class="help-block"></span>
			</td>
		</tr>
		<tr>
			<th><label for="">行业</label></th>
			<td>
				<select name="industry_1" id="industry_1" value="<?php  echo $setting['industry1'];?>"></select>
				<select name="industry_2" id="industry_2" value="<?php  echo $setting['industry2'];?>"></select>
			</td>
		</tr>
		<tr>
			<th>简介</th>
			<td>
				<textarea style="height:100px;" class="span7 richtext-clone" name="content" cols="70" id="reply-add-text"><?php  echo $setting['content'];?></textarea>
			</td>
		</tr>
		<tr>
			<th><label for="">手机</label></th>
			<td><input type="text" id="" name="phone" value="<?php  echo $setting['phone'];?>"  class="span5" /></td>
		</tr>
		<tr>
			<th><label for="">QQ</label></th>
			<td><input type="text" id="" name="qq" value="<?php  echo $setting['qq'];?>"  class="span5" /></td>
		</tr>
		<tr>
			<th><label for="">地区</label></th>
			<td>
				<select name="resideprovince" id="sel-provance" onChange="selectCity();bmap.searchMapByPCD();" style="width:100px;">
					<option value="" selected="true">省/直辖市</option>
				</select>
				<select name="residecity" id="sel-city" onChange="selectcounty();bmap.searchMapByPCD();" style="width:100px;">
					<option value="" selected="true">请选择</option>
				</select>
				<select name="residedist" id="sel-area" onchange="bmap.searchMapByPCD();" style="width:100px;">
					<option value="" selected="true">请选择</option>
				</select>
				<span class="help-block">先选择地区，可以快速的定位地图位置。</span>
			</td>
		</tr>
		<tr>
			<th><label for="">详细地址</label></th>
			<td><div class="input-append"><input type="text" id="address" name="address" value="<?php  echo $setting['address'];?>"  class="span5" /><button type="button" class="btn" name="submit" value="搜索" onclick="bmap.searchMapByAddress($('#address').val())">搜索</button></div><span class="help-block">可以通过查询地址，快速定位地图位置。</span></td>
		</tr>
		<tr>
			<th><label for="">坐标：</label></th>
			<td><input type="text" name="lng" id="lng" value="<?php  echo $setting['lng'];?>"  class="span3" /> - <input type="text" id="lat" name="lat" value="<?php  echo $setting['lat'];?>"  class="span3" /></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<button type="submit" class="btn btn-primary span3" name="submit" value="提交">提交</button>
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</td>
		</tr>
		<tr>
			<th></th>
			<td><div id="baidumap" style="width:600px; height:500px;"></div></td>
		</tr>
	</table>
</form>
<script type="text/javascript" src="./resource/script/cascade.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
<script type="text/javascript" src="./source/modules/member/images/industry.js"></script>
<script type="text/javascript">
cascdeInit('<?php  echo $setting['province'];?>','<?php  echo $setting['city'];?>','<?php  echo $setting['dist'];?>'); //开启地区三级联动
var bmap = {
	'option' : {
		'lock' : false,
		'container' : 'baidumap',
		'infoWindow' : {'width' : 250, 'height' : 100, 'title' : ''},
		'point' : {'lng' : 116.403851, 'lat' : 39.915177}
	},
	'init' : function(option) {
		var $this = this;
		$this.option = $.extend({},$this.option,option);

		$this.option.defaultPoint = new BMap.Point($this.option.point.lng, $this.option.point.lat);
		$this.bgeo = new BMap.Geocoder();
		$this.bmap = new BMap.Map($this.option.container);
		$this.bmap.centerAndZoom($this.option.defaultPoint, 15);
		$this.bmap.enableScrollWheelZoom();
		$this.bmap.enableDragging();
		$this.bmap.enableContinuousZoom();
		$this.bmap.addControl(new BMap.NavigationControl());
		$this.bmap.addControl(new BMap.OverviewMapControl());
		//添加标注
		$this.marker = new BMap.Marker($this.option.defaultPoint);
		$this.marker.setLabel(new BMap.Label('请您移动此标记，选择您的坐标！', {'offset':new BMap.Size(10,-20)}));
		$this.marker.enableDragging();
		$this.bmap.addOverlay($this.marker);
		//$this.marker.setAnimation(BMAP_ANIMATION_BOUNCE);
		$this.showPointValue($this.marker.getPosition());
		//拖动地图事件
		$this.bmap.addEventListener("dragging", function() {
			$this.setMarkerCenter();
			$this.option.lock = false;
		});
		//缩入地图事件
		$this.bmap.addEventListener("zoomend", function() {
			$this.setMarkerCenter();
			$this.option.lock = false;
		});
		//拖动标记事件
		$this.marker.addEventListener("dragend", function (e) {
			$this.showPointValue();
			$this.showAddress();
			$this.bmap.panTo(new BMap.Point(e.point.lng, e.point.lat));
			$this.option.lock = false;
			$this.marker.setAnimation(null);
		});
	},
	'searchMapByAddress' : function(address) {
		var $this = this;
		 $this.bgeo.getPoint(address, function (point) {
			if (point) {
				$this.showPointValue();
				$this.showAddress();
				$this.bmap.panTo(point);
				$this.setMarkerCenter();
			}
		});
	},
	'searchMapByPCD' : function(address) {
		var $this = this;
		$this.option.lock = true;
		$this.searchMapByAddress($('#sel-provance').val()+$('#sel-city').val()+$('#sel-area').val());
	},
	'setMarkerCenter' : function() {
		var $this = this;
		var center = $this.bmap.getCenter();
		$this.marker.setPosition(new BMap.Point(center.lng, center.lat));
		$this.showPointValue();
		$this.showAddress();
	},
	'showPointValue' : function() {
		var $this = this;
		var point = $this.marker.getPosition();
		$('#lng').val(point.lng);
		$('#lat').val(point.lat);
	},
	'showAddress' : function() {
		var $this = this;
		var point = $this.marker.getPosition();
		$this.bgeo.getLocation(point, function (s) {
			if (s) {
				$('#address').val(s.address);
				if (!$this.option.lock) {
					cascdeInit(s.addressComponents.province,s.addressComponents.city,s.addressComponents.district);
				}
			}
		});
	}
};
$(function(){
	var option = {};
	<?php  if(!empty($setting['lng']) && !empty($setting['lat'])) { ?>
	option = {'point' : {'lng' : '<?php  echo $setting['lng'];?>', 'lat' : '<?php  echo $setting['lat'];?>'}}
	<?php  } ?>
	bmap.init(option);
});
</script>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>