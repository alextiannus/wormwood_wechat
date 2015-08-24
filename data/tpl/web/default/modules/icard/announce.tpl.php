<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  echo $this -> set_tabbar($action);?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)">
        <h4><?php  echo $title;?> - <a href="<?php  echo create_url('site/module', array('do' => 'SetRule', 'name' => 'icard'));?>" style="font-size:0.8em">入口设置</a></h4>
        <a class="btn btn-primary" href="<?php  echo create_url('site/module', array('do' => 'announceform', 'name' => 'icard'))?>"><i class="icon-plus"></i> 添加新通知</a>
        <div style="padding-top: 15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <!--<th style="width:40px;">显示顺序</th>-->
                <th style="width:100px;">标题</th>
                <th>内容</th>
                <th style="width:80px;">所属人群</th>
                <th style="width:80px;">创建时间</th>
                <th style="width:80px;">操作</th>
            </tr>
            </thead>
            <tbody id="level-list">
            <?php  if(is_array($announces)) { foreach($announces as $announce) { ?>
            <tr>
                <!--<td><input type="text" class="span1" name="displayorder[<?php  echo $announce['id'];?>]" value="<?php  echo $announce['displayorder'];?>"></td>-->
                <td><?php  echo $announce['title'];?></td>
                <td><?php  echo htmlspecialchars_decode($announce['content']);?></td>
                <td><font color="red"><?php  echo $levels[$announce['levelid']];?></font></td>
                <td>
                    <?php  echo date('Y-m-d H:i:s', $announce['dateline']);?>
                </td>
                <td><a class="btn" href="<?php  echo create_url('site/module', array('do' => 'announceform', 'name' => 'icard', 'id' => $announce['id']))?>"><i class="icon-edit"></i></a>  <a class="btn" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo create_url('site/module', array('do' => 'announcedelete', 'name' => 'icard', 'id' => $announce['id']))?>"><i class="icon-remove"></i></a></td>
            </tr>
            <?php  } } ?>
            </tbody>
            <!--<tfoot>-->
            <!--<tr>-->
                <!--<td colspan="7">-->
                    <!--<input name="submit" type="submit" class="btn btn-primary" value="提交">-->
                    <!--<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />-->
                <!--</td>-->
            <!--</tr>-->
            <!--</tfoot>-->
        </table>
    </form>
    <?php  echo $pager;?>
</div>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
