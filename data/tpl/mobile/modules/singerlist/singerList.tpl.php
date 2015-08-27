<?php defined('IN_IA') or exit('Access Denied');?><?php  $bootstrap_type == 3;?>
<?php  include $this->template('header', TEMPLATE_INCLUDEPATH);?>


<style >


a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}

<?php  echo $_W['styles']['css'];?>;


.mainmenu {
	display: block;
    margin:3px auto 4px;
    width: 100%;
}
.mainmenu li {
	width:50%;
	float:left;
	display: block;
	-moz-user-select:none;
	-webkit-user-select:none;
	-ms-user-select:none;
}
.menubtn {
	display: block;
	text-decoration:none;
	color:#000;
	background-color: #ffffff;
	padding:8px 10px;
	box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.15);
	-moz-box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.15);
	-webkit-box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.15);
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
}
.mainmenu li:nth-child(odd) .menubtn{
	margin: 2px 2px 1px 5px;
}
.mainmenu li:nth-child(even) .menubtn{
	margin: 2px 5px 1px 2px;
}
.menubtn .menumesg {
	padding:0px;
}
.menubtn .menuimg {
	margin:0 auto;
	height:100px;
	padding: 6px;
    width: 100px;
	display:block;
	overflow:hidden;
	-webkit-border-radius:100px;
	-moz-border-radius:100px;
	border-radius:100px;
	box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.11) inset;
	-moz-box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.11) inset;
	-webkit-box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.11) inset;
	
}
.menubtn .menuimg2 {
	height:100px;
	width:100px;
	display:block;
	overflow:hidden;
	-webkit-border-radius:100px;
	-moz-border-radius:100px;
	border-radius:100px;
}

.mainmenu li div img {
	border:0;
	height:100px;
	width:100px;
}
.mainmenu li .menutitle {
	padding:6px 0 3px;
	text-decoration: none;
	color:#000;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
	text-align:center;
}
.clr {
	display:block;
	clear:both;
	height:0;
	overflow:hidden;
}

</style>
<div style="text-align:center"><h3>Singer List</h3></div>
<ul class="mainmenu">

<?php  if(is_array($list)) { foreach($list as $item) { ?>    
<li>
<a href="<?php  echo $this->createMobileUrl('detail', array('id' => $item['id']))?>">
<div class="menubtn">
<div class="menumesg">
<div class="menuimg"><div class="menuimg2"><img src="<?php  echo $_W['attachurl'];?><?php  echo $item['tou'];?>"></div></div>
<div class="menutitle"><?php  echo $item['name'];?></div>
</div>
</div>
</a>
</li>
<?php  } } ?>
<div class="clr"></div>
</ul>
<?php  include $this->template('footer', TEMPLATE_INCLUDEPATH);?>