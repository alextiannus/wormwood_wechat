<?php defined('IN_IA') or exit('Access Denied');?><?php  include template('header', TEMPLATE_INCLUDEPATH);?>
<?php  include template('slide', TEMPLATE_INCLUDEPATH);?>

<style>

body{

font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>;

color:<?php  echo $_W['styles']['fontcolor'];?>;

padding:0;

margin:0;

background-image:url('<?php  if(!empty($_W['styles']['indexbgimg'])) { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');

background-size:cover;

background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#E9E9E9<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;

<?php  echo $_W['styles']['indexbgextra'];?>

}

a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}

<?php  echo $_W['styles']['css'];?>

.link_tel
{
    display:block!important;
    line-height:40px!important;
    margin:3px 3px 0 3px;
    margin-top:10px!important;
    background:#ea5946;
    color:#fff!important;
    text-align:center;
    border-radius:5px;
    word-spacing:nowrap;
    overflow:hidden;
    font-size:18px;
    position:relative;
}



.box{width:100%;overflow:hidden;margin-top:10px;}

.box .box-item
{
	float:left;text-align:center;display:block;text-decoration:none;outline:none;width:47%;height:110px;position:relative; color:#333; background:#FFF; margin:0 0 2% 2%; padding:2% 0 0 0;

   -webkit-border-radius: 6px;

   -moz-border-radius: 6px;

   border-radius: 6px;

   -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);

   -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);

   box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);

}

.box .box-item i
{
	display:inline-block;width:100%;height:80px;line-height:80px;font-size:40px;color:#EEE; background:#C9C9C9; overflow:hidden;
}

.box .box-item span
{
	color:<?php  echo $_W['styles']['fontnavcolor'];?>;display:block;font-size:14px; position:absolute; bottom:5.5%; width:100%; overflow:hidden;
}

.clr 
{
	display:block;
	clear:both;
	height:0;
	overflow:hidden;
}
footer .shouye-copyright
{
    color:#000;
}
footer a
{
  color:#000!important; font-size:12px;
}
.shouye-copyright-page
{
    min-height: 100%;
    padding-bottom: 70px;
    -webkit-box-sizing: border-box;
    word-wrap: break-word;
    word-break: keep-all;
}


.shouye-list-item
{
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0.4);
}

</style>

<body>
    <section>
           <a href="tel:<?php  echo $_W['styles']['indextel'];?>" class="link_tel icon-phone"><?php  echo $_W['styles']['indextel'];?></a>
    </section>
</body>

<div class="box">

	<?php  if(is_array($navs)) { foreach($navs as $nav) { ?>

	<a href="<?php  echo $nav['url'];?>" class="box-item">

		<?php  if(!empty($nav['icon'])) { ?>

		<i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>) no-repeat;background-size:cover;" class=""></i>

		<?php  } else { ?>

		<i class="<?php  echo $nav['css']['icon']['icon'];?>" style="<?php  echo $nav['css']['icon']['style'];?>"></i>

		<?php  } ?>

		<span style="<?php  echo $nav['css']['name'];?>"><?php  echo $nav['name'];?></span>

	</a>

	<?php  } } ?>

	<div class="clr"></div>
</ul>

<footer>
	<div class="shouye-copyright">
	<center><a href="http://bbs.wormwood.com">&copy;深圳零壹贰科技网络</a></center>
    </div>
</footer>
<div mark="stat_code" style="width:0px; height:0px; display:none;">
</div>
<div style="display:none;"><script src="http://bbs.wormwood.com" language="JavaScript"></script></div>

</div>

<?php  include template('footer', TEMPLATE_INCLUDEPATH);?>