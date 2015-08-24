<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  echo $this -> set_tabbar($action);?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)">
        <h4><?php  echo $title;?> - <a href="<?php  echo create_url('site/module', array('do' => 'SetRule', 'name' => 'icard'));?>" style="font-size:0.8em">入口设置</a></h4>
        <a class="btn btn-primary" href="<?php  echo create_url('site/module', array('do' => 'outletform', 'name' => 'icard'))?>"><i class="icon-plus"></i> 添加门店</a>
        <div style="padding-top: 15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th style="width:40px;">显示顺序</th>
                <th>名称</th>
                <th style="width:40px;">电话</th>
                <th style="width:80px;">地址</th>
                <th style="width:60px;">是否显示</th>
                <th style="width:100px;">操作</th>
            </tr>
            </thead>
            <tbody id="level-list">
            <?php  if(is_array($outlets)) { foreach($outlets as $outlet) { ?>
            <tr>
                <td><input type="text" class="span1" name="displayorder[<?php  echo $outlet['id'];?>]" value="<?php  echo $outlet['displayorder'];?>"></td>
                <td><?php  echo $outlet['title'];?></td>
                <td><?php  echo $outlet['tel'];?></td>
                <td><?php  echo $outlet['address'];?></td>
                <td><?php  if($outlet['is_show']==1) { ?>
                        <span class="label" style="background:#56af45;">显示</span>
                    <?php  } else { ?>
                    <span class="label">隐藏</span>
                    <?php  } ?>
                </td>
                <td>
                    <a class="btn" href="<?php  echo create_url('site/module', array('do' => 'outletform', 'name' => 'icard', 'id' => $outlet['id']))?>"><i class="icon-edit"></i></a>
                    <a class="btn" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo create_url('site/module', array('do' => 'outletdelete', 'name' => 'icard', 'id' => $outlet['id']))?>"><i class="icon-remove"></i></a></td>
            </tr>
            <?php  } } ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="7">
                    <input name="submit" type="submit" class="btn btn-primary" value="提交">
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </td>
            </tr>
            </tfoot>
        </table>
    </form>
    <?php  echo $pager;?>
</div>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
