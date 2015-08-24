<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  echo $this -> set_tabbar($action);?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)">
        <h4><?php  echo $title;?> - <a href="<?php  echo create_url('site/module', array('do' => 'SetRule', 'name' => 'icard'));?>" style="font-size:0.8em">入口设置</a></h4>
        <a class="btn btn-primary" href="<?php  echo create_url('site/module', array('do' => 'giftform', 'name' => 'icard'))?>"><i class="icon-plus"></i> 添加礼品券</a>
        <div style="padding-top: 15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th style="width:40px;">显示顺序</th>
                <th>标题</th>
                <th style="width:40px;">所需积分</th>
                <th style="width:80px;">使用次数</th>
                <th style="width:40px;">状态</th>
                <th style="width:80px;">时间</th>
                <th style="width:100px;">操作</th>
            </tr>
            </thead>
            <tbody id="level-list">
            <?php  if(is_array($gifts)) { foreach($gifts as $gift) { ?>
            <tr>
                <td><input type="text" class="span1" name="displayorder[<?php  echo $gift['id'];?>]" value="<?php  echo $gift['displayorder'];?>"></td>
                <td><img src="<?php  echo $_W['attachurl'];?><?php  echo $gift['picture'];?>" width="50" /><br/><?php  echo $gift['title'];?></td>
                <td><?php  echo $gift['needscore'];?></td>
                <td>
                    <?php  if($gift['count']==0) { ?>不限<?php  } else { ?><?php  echo $gift['count'];?><?php  } ?>
                </td>
                <td>
                    <?php  if(TIMESTAMP<$gift['starttime']) { ?><span class="label" style="background:#56af45;">未开始</span>
                    <?php  } else if(TIMESTAMP>$gift['starttime'] && TIMESTAMP<$gift['endtime']) { ?><span class="label" style="background:#e63a3a;">进行中</span>
                    <?php  } else { ?><span class="label">已结束</span><?php  } ?>
                </td>
                <td>
                    生效时间：<?php  echo date('Y-m-d H:i:s', $gift['starttime']);?><br/>
                    过期时间：<?php  echo date('Y-m-d H:i:s', $gift['endtime']);?>
                </td>
                <td>
                    <a class="btn" href="<?php  echo create_url('site/module', array('do' => 'sncodelist', 'name' => 'icard', 'type' => 4, 'pid' => $gift['id']))?>"><i class="icon-bar-chart"></i></a>
                    <a class="btn" href="<?php  echo create_url('site/module', array('do' => 'giftform', 'name' => 'icard', 'id' => $gift['id']))?>"><i class="icon-edit"></i></a>
                    <a class="btn" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo create_url('site/module', array('do' => 'giftdelete', 'name' => 'icard', 'id' => $gift['id']))?>"><i class="icon-remove"></i></a></td>
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
