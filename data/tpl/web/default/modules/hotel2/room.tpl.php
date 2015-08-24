<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  include $this->template('common', TEMPLATE_INCLUDEPATH);?>
<div class="main">
    <ul class="nav nav-tabs">		
        <li><a href="<?php  echo $this->createWebUrl('hotel');?>">酒店管理</a></li>	
        <li><a href="<?php  echo $this->createWebUrl('hotel', array('op'=>'edit','id' => $hotelid));?>">酒店编辑</a></li>	
        <li><a href="<?php  echo $this->createWebUrl('room', array('op'=>'edit','hotelid' => $hotelid));?>">添加房型</a></li>	
        <li class="active"><a href="<?php  echo $this->createWebUrl('room', array('hotelid' => $rid));?>">房型管理</a></li>	
    </ul>
    <div class="search">
        <form action="site.php" method="get">
            <input type="hidden" name="act" value="module" />
            <input type="hidden" name="do" value="room" />
            <input type="hidden" name="name" value="hotel2" />				
            <input type="hidden" name="hotelid" value="<?php  if(!empty($hotel)) { ?><?php  echo $hotel['title'];?><?php  } ?>" />	
            <table class="table table-bordered tb">
                <tbody>
                    <tr>
                        <th>酒店</th>
                        <td>
                            <input class="span6" name="hoteltitle"  type="text" value="<?php  if(!empty($hotel)) { ?><?php  echo $hotel['title'];?><?php  } else { ?><?php  echo $_GPC['hoteltitle'];?><?php  } ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>房型</th>
                        <td>
                            <input class="span6" name="title" id="" type="text" value="<?php  echo $_GPC['title'];?>">
                        </td>
                    </tr>
                    <tr class="search-submit">
                        <td colspan="2">
                            <button class="btn pull-left btn-primary span2" style='margin-left:95px;'><i class="icon-search icon-large"></i> 搜索</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div style="padding:15px;">
        <!--<button class="btn pull-left btn-primary span2" id="room_status" onClick="location.href='<?php  echo $this->createWebUrl('room_status')?>'">批量修改房态</button>-->
        <!--<button class="btn pull-left btn-primary span2" id="room_price" onClick="location.href='<?php  echo $this->createWebUrl('room_price')?>'">批量修改房价</button>-->
        <!--<br/><br/>-->

        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr><tr><th class='with-checkbox'>
                    <input type="checkbox" class="check_all" /></th>
                    <th>酒店</th>
                    <th>房型</th>
                    <th>前台价（原价)</th>
                    <th>优惠价（现价)</th>
                    <th>会员价</th>
                    <th>订房积分</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>  <td class="with-checkbox">
                                                    <input type="checkbox" name="check" value="<?php  echo $item['id'];?>"></td>	
                    <td><?php  echo $item['hoteltitle'];?></td>
                    <td><?php  echo $item['title'];?></td>
                    <td><?php  echo $item['oprice'];?></td>
                    <td><?php  echo $item['cprice'];?></td>
                    <td><?php  echo $item['mprice'];?></td>
                    <td><?php  echo $item['score'];?></td>
                    <td><?php  if($item['status']==1) { ?>
                        <span class='label label-success'>显示</span>
                    <?php  } else { ?>
                    <span class='label label-error'>隐藏</span>
                    <?php  } ?>
                    </td>
                    <td>
                        <a href="<?php  echo $this->createWebUrl('copyroom',array('hotelid'=>$item['hotelid'],'roomid'=>$item['id']))?>" class="btn" rel="tooltip" title="复制房型"><i class="list-alt"></i>复制房型</a>
                        <a href="<?php  echo $this->createWebUrl('order',array('hotelid'=>$item['hotelid'],'roomid'=>$item['id']))?>" class="btn" rel="tooltip" title="订单查看"><i class="list-alt"></i>订单查看</a>
                        <a class="btn" rel="tooltip" href="<?php  echo $this->createWebUrl('room',array('op'=>'edit','hotelid'=>$item['hotelid'],'id'=>$item['id']))?>" title="编辑"><i class="icon-edit"></i></a>
                        <?php  if($item['status']==0) { ?>
                        <a class="btn" title="显示" href="#" onclick="drop_confirm('您确定要显示此房型吗?', '<?php  echo $this->createWebUrl('room',array('op'=>'status','status'=>1, 'id'=>$item['id']))?>');"><i class="icon-play"></i></a>                                       
                        <?php  } else if($item['status']==1) { ?>
                        <a class="btn" title="隐藏" href="#" onclick="drop_confirm('您确定要隐藏此房型吗?', '<?php  echo $this->createWebUrl('room',array('op'=>'status','status'=>0, 'id'=>$item['id']))?>');"><i class="icon-stop"></i></a>                                       														
                        <?php  } ?>
                        <a class="btn" rel="tooltip" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('room',array('op'=>'delete', 'id'=>$item['id']))?>');" title="删除"><i class="icon-remove"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                <tr>
				<td colspan="9">
				
					<input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />
                    <input type="button" class="btn btn-primary edit_all" name="showall" value="批量显示" />
                    <input type="button" class="btn btn-primary edit_all" name="hideall" value="批量隐藏" />
				</td>
			</tr>
            </tbody>
            <input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
        </table>
        <?php  echo $pager;?>
    </div>
</div>

<script>
$(function(){

    $(".check_all").click(function(){
       var checked = $(this).get(0).checked;
       $("input[type=checkbox]").attr("checked",checked);
    });

	$("input[name=deleteall]").click(function(){
 
		var check = $("input:checked");
		if(check.length<1){
			err('请选择要删除的记录!');
			return false;
		}
        if( confirm("确认要删除选择的记录?")){
		var id = new Array();
		check.each(function(i){
			id[i] = $(this).val();
		});
		$.post("<?php  echo create_url('site/module', array('do' => 'room','op'=>'deleteall', 'name' => 'hotel2'))?>", {idArr:id},function(data){
			if (data.errno ==0)
			{
				location.reload();
			} else {
				alert(data.error);
			}


		},'json');
		}

	});

    $(".edit_all").click(function(){
        var name = $(this).attr('name');
        var check = $("input:checked");
        if(check.length<1){
            err('请选择要操作的记录!');
            return false;
        }

        var id = new Array();
        check.each(function(i){
            id[i] = $(this).val();
        });
        $.post("<?php  echo create_url('site/module', array('do' => 'room','op'=>'showall', 'name' => 'hotel2'))?>", {idArr:id,show_name:name},function(data){
            if (data.errno ==0)
            {
                location.reload();
            } else {
                alert(data.error);
            }
        },'json');
    });
});
</script>
<script>
function drop_confirm(msg, url){
    if(confirm(msg)){
        window.location = url;
    }
}
</script>

<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
