<?php defined('IN_IA') or exit('Access Denied');?><?php  $bootstrap_type == 3;?>
<?php  include $this->template('header', TEMPLATE_INCLUDEPATH);?>
<div id="activity-detail">
<style type="text/css">
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td{margin:0;padding:0;}body{font-family:Microsoft YaHei,Helvitica,Verdana,Tohoma,Arial,san-serif;}.page-url{margin-top:10px;border-top:1px solid #E5E5E5;text-align:center;}.page-url-link{font-size:14px;line-height:2.5;text-decoration:none;text-shadow:0 1px white;-webkit-text-shadow:0 1px #fff;-moz-text-shadow:0 1px #fff;color:#CACACA;}.fn-clear:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0;}.fn-clear{zoom:1;}.share{margin:15px 0;font-size:14px;word-wrap:break-word;color:#727272;margin:15px 0;display:block;}.share .share-1{float:left;width:49%;display:block;}.share .share-2{float:right;width:49%;display:block;}.share button{font-size:16px;padding:8px 0;border:1px solid #adadab;color:#000;background-color:#e8e8e8;background-image:linear-gradient(to top,#dbdbdb,#f4f4f4);box-shadow:0 1px 1px rgba(0,0,0,0.45),inset 0 1px 1px #efefef;text-shadow:.5px .5px 1px #fff;text-align:center;border-radius:3px;width:100%;}.share img{width:22px!important;height:22px!important;vertical-align:top;border:0;}
html,body{height:100%}
.page{
	width: 100%;
	position: relative;
	margin: 0 auto;
	max-width: 500px;
	min-height:100%;
	font-size: 12px;
}
.player .header{
	position: relative;
}
.player .header .h-c{
	width: 100%;
	overflow: hidden;
}
.player .header .headshot{
	display: block;
	max-width: 100%;
	margin: 3px auto 0px;
}
.player .header .username{
	font-size: 14px;
	font-weight: bold;
	line-height: 30px;
}
.player .header .number{
	line-height: 25px;
}
.love{
	position: absolute;
	bottom: -20px;
	left: 50%;
	width: 40px;
	margin-left: -20px;
}
.detail{
	margin: 35px auto 0px;
}
.detail p{
	color:#9e9fa1;
	line-height: 30px;
	text-align: center;
}
.detail p.title{
	font-size: 14px;
	margin-bottom: 15px;
	font-weight: bold;
}
.footer{
	text-align: center;
	color: #eb4e63;
	margin: 30px auto 0px;
}
</style>
<div class="page">
		<div class="player">
			<div class="header">
				<div class="h-c"><!--sae   a href="javascript:;"><img class="headshot" src="<?php  echo $detail['img'];?>" /></a-->
					<a href="javascript:;"><img class="headshot" src="<?php  echo $detail['thumb'];?><?php  echo $detail['img'];?>" /></a>
					<img class="love" src="./source/modules/mm/images/xin.png" />
				</div>
			</div>
			<div class="detail">
				<p class="title">Personal Profile</p>
				<p>Name：<?php  echo $detail['name'];?></p>
				<p>Address：<?php  echo $detail['address'];?></p>
				<p>Age：<?php  if(empty($detail['age'])) { ?><?php  echo '保密'?><?php  } else { ?><?php  echo $detail['age'];?><?php  } ?></p>
				<p>Phone：<?php  echo $detail['phone'];?></p>
				<p>More：<?php  echo $detail['txt'];?></p>
				
			</div>
			<p class="footer"><a class='btn btn-warning' id='zan' href="javascript:void(0)">LIKE(<span id="zz"><?php  echo $detail['zan'];?></span>)</a>    <a href='<?php  echo $this->createMobileUrl('topn')?>' class='btn btn-green' >Ranking List</a></p>
			<p class="footer">
		
			<select id="songV" name="songV" style="width:150px" >
			<option value="10">10 SGD</option>
			<option value="20">20 SGD</option>
			<option value="50">50 SGD</option>
			<option value="100">100 SGD</option>
			</select>
		
			<a class='btn btn-warning' id='songhua' href="javascript:void(0)">送花</a>
			</p>
			<div class="footer">
			(点击送花后，将从你的账户余额/积分中自动扣除)
			</div>
			
			
		</div>
	</div>
</div>
<script>
$(function(){
	$("#zan").on('click',function(){
	var httpurl ="<?php  echo $this->createMobileUrl('zan', array('zan' =>$detail['zan'],'id' => $detail['id']))?>";
						$.getJSON(httpurl,function(data){
						if(data.info==0){
						alert('Thank you for your vote!');
						}
							$("#zz").html(data.zan);
						})
					});
	
	
	
	$("#songhua").on('click',function(){
		var amount = $("#songV").val();
		var httpurl ="<?php  echo $this->createMobileUrl('charge',array('id' => $detail['id']))?>"+"&amount="+amount;
		
		$.getJSON(httpurl,function(data){
			
				alert(data.info);
		
				
			})
	
	});

});
</script>
</div>
<?php  include $this->template('footer', TEMPLATE_INCLUDEPATH);?>