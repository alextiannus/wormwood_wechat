<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  include $this->template('common', TEMPLATE_INCLUDEPATH);?>
<div class="main">
    <ul class="nav nav-tabs">		
        <li class="active"><a href="<?php  echo $this->createWebUrl('business',array('op'=>'list'));?>">商圈管理</a></li>    
        <li><a href="<?php  echo $this->createWebUrl('business',array('op'=>'edit'));?>">添加商圈</a></li>	
    </ul>
    <div class="search">
        <form action="site.php" method="get">
            <input type="hidden" name="act" value="module" />
            <input type="hidden" name="do" value="business" />
            <input type="hidden" name="name" value="hotel2" />				
            <table class="table table-bordered tb">
                <tbody>
                    <tr>
                        <th>名称</th>
                        <td>
                            <input class="span6" name="title" type="text" value="<?php  echo $_GPC['title'];?>">
                        </td>
                    </tr>
                    <tr class="search-submit">
                        <td colspan="2"><button class="btn pull-left btn-primary span2" style='margin-left:95px;'><i class="icon-search icon-large"></i> 搜索</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr><tr><th class='with-checkbox'>
                    <input type="checkbox" class="check_all" /></th>
                    <th>城市区域</th>
                    <th>名称</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>  <td class="with-checkbox">
                <input type="checkbox" name="check" value="<?php  echo $item['id'];?>"></td>	
                    <td><?php  echo $item['location_p'];?><?php  echo $item['location_c'];?><?php  echo $item['location_a'];?></td>
                    <td><?php  echo $item['title'];?></td>
                      <td>
                         <?php  if($item['status']==1) { ?>
                        <span class='label label-success'>显示</span>
                        <?php  } else { ?>
                        <span class='label label-error'>隐藏</span>
                        <?php  } ?>
                    </td>
                    <td> 
                        <a class="btn" rel="tooltip" href="<?php  echo $this->createWebUrl('business',array('op'=>'edit','id'=>$item['id']))?>" title="编辑"><i class="icon-edit"></i></a>
                        
                        
                        <?php  if($item['status']==0) { ?>
                        <a class="btn" title="显示" href="#" onclick="drop_confirm('您确定要显示此商圈吗?', '<?php  echo $this->createWebUrl('business',array('op'=>'status','status'=>1, 'id'=>$item['id']))?>');"><i class="icon-play"></i></a>                                       
                        <?php  } else if($item['status']==1) { ?>
                        <a class="btn" title="隐藏" href="#" onclick="drop_confirm('您确定要隐藏此商圈吗?', '<?php  echo $this->createWebUrl('business',array('op'=>'status','status'=>0, 'id'=>$item['id']))?>');"><i class="icon-stop"></i></a>                                       														
                        <?php  } ?>
                        
                        <a class="btn" rel="tooltip" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('business',array('op'=>'delete', 'id'=>$item['id']))?>');" title="删除"><i class="icon-remove"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                <tr>
				<td colspan="5">
				
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
        $.post("<?php  echo create_url('site/module', array('do' => 'business','op'=>'showall', 'name' => 'hotel2'))?>", {idArr:id,show_name:name},function(data){
            if (data.errno ==0)
            {
                location.reload();
            } else {
                alert(data.error);
            }
        },'json');
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
		$.post("<?php  echo create_url('site/module', array('do' => 'business','op'=>'deleteall', 'name' => 'hotel2'))?>", {idArr:id},function(data){
			if (data.errno ==0)
			{
				location.reload();
			} else {
				alert(data.error);
			}


		},'json');
		}

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
