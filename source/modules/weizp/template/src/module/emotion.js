define('module/emotion',['lib/scroll'],function(require,exports,module){"require:nomunge,exports:nomunge,module:nomunge";var libScroll=require('lib/scroll');var smiley={};smiley.s1={'title':'默认','icon':{'微笑':'','撇嘴':'','色':'','发呆':'','得意':'','流泪':'','害羞':'','闭嘴':'','睡':'','大哭':'','尴尬':'','发怒':'','调皮':'','呲牙':'','惊讶':'','难过':'','酷':'','冷汗':'','抓狂':'','吐':'','偷笑':'','可爱':'','白眼':'','傲慢':'','饥饿':'','困':'','惊恐':'','流汗':'','憨笑':'','大兵':'','奋斗':'','咒骂':'','疑问':'','嘘..':'','晕':'','折磨':'','衰':'','骷髅':'','敲打':'','再见':'','擦汗':'','抠鼻':'','鼓掌':'','溴大了':'','坏笑':'','左哼哼':'','右哼哼':'','哈欠':'','鄙视':'','委屈':'','快哭了':'','阴险':'','亲亲':'','吓':'','可怜':'','菜刀':'','西瓜':'','啤酒':'','篮球':'','乒乓':'','咖啡':'','饭':'','猪头':'','玫瑰':'','凋谢':'','示爱':'','爱心':'','心碎':'','蛋糕':'','闪电':'','炸弹':'','刀':'','足球':'','瓢虫':'','便便':'','月亮':'','太阳':'','礼物':'','拥抱':'','强':'','弱':'','握手':'','胜利':'','抱拳':'','勾引':'','拳头':'','差劲':'','爱你':'','NO':'','OK':'','爱情':'','飞吻':'','跳跳':'','发抖':'','怄火':'','转圈':'','磕头':'','回头':'','跳绳':'','挥手':''},'ulClass':'expreConNew','liClass':'bg','perPage':20,'delBtn':true,'minPx':'36','minYPx':'32'};smiley.s2={'title':'范冰冰','icon':{'冰冰调皮':'','冰冰脸红':'','冰冰疑问':'','冰冰说NO':'','冰冰干杯':'','冰冰好样的':'','冰冰加油':'','冰冰赞美':'','冰冰委屈':'','冰冰飞吻':'','冰冰好喜欢':'','冰冰搞怪':'','冰冰小恶魔':'','冰冰花痴':'','冰冰流泪':'','冰冰害羞':'','冰冰流汗':'','冰冰无语':'','冰冰卖萌':'','冰冰唱K':'','冰冰思考':'','冰冰献吻':'','冰冰撒娇':'','冰冰可爱':'','冰冰悠闲':'','冰冰好心情':'','冰冰晚安':''},'ulClass':'fanE','liClass':'fan','perPage':10,'minPx':'51','minYPx':'51'};module.exports={init:function(reInit){if(!reInit&&window.expreInit==true){return;}
window.expreInit=true;window.expreConTab=0;var enabledSmiley=window.enabledSmiley||'';var siteSmiley=enabledSmiley.split('|');var smileyLen=siteSmiley.length;if(enabledSmiley===''||smileyLen<1){siteSmiley=[1];}
var cate=[],emo=[],minPx=[],minYPx=[];for(var i=0;i<siteSmiley.length;++i){var key='s'+siteSmiley[i];if(typeof smiley[key]=='undefined'){continue;}
minPx.push(smiley[key]['minPx']);minYPx.push(smiley[key]['minYPx']);cate.push(smiley[key]['title']);emo.push(smiley[key]);}
var html=template.render('tmpl_expreBox',{'cate':cate,'emo':emo});if(jq(".tipLayer").size()>0){jq(".tipLayer").append(html);jq('.expreCon li').css('background-position','center center');}else if(jq("#replyForm").size()>0){html="<div class=\"tipLayer mt10\" style=\"display:none\">"+html+"</div>";jq("#replyForm").append(html);jq('.expreCon li').css('background-size','256px auto');var minPxLen=minPx.length;for(var i=0;i<minPxLen;++i){jq('#exp_emo'+i+' li a').css({'margin':'0',width:minPx[i]+'px',height:minYPx[i]+'px'});}
jq('.expreCon li').height('97');jq('.expreCon li').width('256');jq('.expreBox').width('256');jq('.expreCon li').css('background-position','center center');}else{return;}
jq('.expreList .expressionTab a').on('click',function(){var obj=jq(this);jq('.expreList .expressionTab a').removeClass('on');obj.addClass('on');jq('.expreList .expreBox ul').hide();jq('#exp_'+this.id).show();jq('.pNumCon').hide();jq('#exp_'+this.id+'_page').show();});if(!module.exports.isInit){libScroll.initScroll({ulSelector:'.expreBox ul',isFlip:true,cSelector:'body',pageOnClass:'pNumOn'});module.exports.isInit=true;}
libScroll.tabIndex=0;var expreBox=jq(".expreList .expreBox ul");expreBox.on('click',function(e){return false;});jq.DIC.touchState('.expreList .expreCon li a','on');jq(".expreList .expreCon li a").each(function(i){jq(this).on("click",function(){var title=jq(this).attr("title");if(jq("#content")){var content=jq("#content").val();if(!title){if(content&&content.lastIndexOf(']')==content.length-1){var LeftIndex=content.lastIndexOf('[');content=content.substring(0,LeftIndex);}else{content=content.substring(0,content.length-1);}}else{content=content+"["+title+"]";}
jq("#content").val(content);}});});},show:function(){jq('.expreSelect').addClass('epOn');jq('.photoSelect').removeClass('epOn');jq('.photoList').hide();jq('.expreList').show();jq('.tagBox').hide();jq('.locationCon').hide();if(jq('#replyForm').size()>0){jq('.tipLayer').show();}},hide:function(){if(jq('#replyForm').size()>0){jq('.tipLayer').hide();}
jq('.expreSelect').removeClass('epOn');jq('.photoSelect').addClass('epOn');jq('.expreList').hide();jq('.photoList').show();jq('.tagBox').show();jq('.locationCon').show();},toggle:function(){if(jq('.expreList').css('display')=='none'){module.exports.show();}else{module.exports.hide();}},isInit:false}});