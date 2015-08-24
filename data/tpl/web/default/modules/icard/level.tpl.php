<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  echo $this -> set_tabbar($action);?>
<script type="text/html" id="level-form-html">
    <?php  include $this->template('icard/_level_item');?>
</script>
<script>
$(function(){
    $('#add-level').click(function(){
        $('#level-list').append($('#level-form-html').html());
    });
})
</script>
<div class="main">
    <div class="tb-list" style="display: block;padding: 10px 15px 0px 15px;">
        <div class="alert" style="margin-bottom: 0px;">
            <p>
            <span class="bold">
                1.等级名称请不要重复。
                <br/>2.积分范围请填写正确。
            </span>
            </p>
        </div>
    </div>
    <form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)">
        <h4><?php  echo $title;?> - <a href="<?php  echo create_url('site/module', array('do' => 'SetRule', 'name' => 'icard'));?>" style="font-size:0.8em">入口设置</a></h4>
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th style="width:100px;">会员等级</th>
                <th>积分设置(必须为整数)</th>
                <th style="width:80px;">操作</th>
            </tr>
            </thead>
            <tbody id="level-list">
            <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
            <tr>
                <td><input type="text" class="span2" name="levelname[<?php  echo $level['id'];?>]" value="<?php  echo $level['levelname'];?>"></td>
                <td><input type="text" class="span2" name="min[<?php  echo $level['id'];?>]" value="<?php  echo $level['min'];?>"> -
                    <input type="text" class="span2" name="max[<?php  echo $level['id'];?>]" value="<?php  echo $level['max'];?>">
                </td>
                <td><a class="btn" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo create_url('site/module', array('do' => 'leveldelete', 'name' => 'icard', 'id' => $level['id']))?>"><i class="icon-remove"></i></a>
                </td>
            </tr>
            <?php  } } ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="7">
                    <a href="javascript:;" id="add-level"><i class="icon-plus-sign-alt"></i> 添加等级</a>
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <input name="submit" type="submit" class="btn btn-primary" value="提交">
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </td>
            </tr>
            </tfoot>
        </table>
    </form>
</div>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
