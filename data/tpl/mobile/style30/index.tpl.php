<?php defined('IN_IA') or exit('Access Denied');?><?php  include template('header', TEMPLATE_INCLUDEPATH);?>
<?php  include template('slide', TEMPLATE_INCLUDEPATH);?>
<body id="rain1" screen_capture_injected="true" style="">
<div class="catemenu">
<ul>
<?php  if(is_array($navs)) { foreach($navs as $nav) { ?>     
<li><a href="<?php  echo $nav['url'];?>"><?php  echo $nav['name'];?></a></li>
<?php  } } ?> 
<div class="clr"></div>
</ul>
</div>
<script>
var count = document.getElementById("thelist").getElementsByTagName("img").length;	
var count2 = document.getElementsByClassName("menuimg").length;
for(i=0;i<count;i++){
 document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";

}
document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";

 setInterval(function(){
myScroll.scrollToPage('next', 0,400,count);
},3500 );
window.onresize = function(){ 
for(i=0;i<count;i++){
document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";

}
 document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";
} 
</script>
<div id="insert2"></div>
<?php  include template('footer', TEMPLATE_INCLUDEPATH);?>