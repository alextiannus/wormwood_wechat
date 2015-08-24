<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<ul class="nav nav-tabs">
    <li class="active"><a>门店管理</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form">
        <h4><?php  echo $title;?> - <a href="<?php  echo create_url('site/module', array('do' => 'SetRule', 'name' => 'idish'));?>" style="font-size:0.8em">入口设置</a></h4>
        <a class="btn" href="<?php  echo create_url('site/module', array('do' => 'storesform', 'name' => 'idish'))?>"><i class="icon-plus"></i>添加门店</a>
        <a class="btn" href="javascript:location.reload()"><i class="icon-refresh"></i>刷新</a>
        <table class="table table-hover" style="margin-top:15px;">
            <thead class="navbar-inner">
            <tr>
                <th style="width:40px;">显示顺序</th>
                <th>名称</th>
                <th style="width:60px;">电话</th>
                <th style="width:100px;">地址</th>
                <th style="width:100px;">提供服务</th>
                <th style="width:60px;">是否显示</th>
                <th style="width:100px;">操作</th>
            </tr>
            </thead>
            <tbody id="level-list">
            <?php  if(is_array($storeslist)) { foreach($storeslist as $item) { ?>
            <tr>
                <td><input type="text" class="span1" name="displayorder[<?php  echo $item['id'];?>]" value="<?php  echo $item['displayorder'];?>"></td>
                <td><a href="<?php  echo create_url('site/module', array('do' => 'category', 'name' => 'idish', 'storeid' => $item['id']))?>" title="管理"><?php  echo $item['title'];?></a></td>
                <td><?php  echo $item['tel'];?></td>
                <td><?php  echo $item['address'];?></td>
                <td>
                    <?php  if(!empty($item['enable_wifi'])) { ?><span class="label" style="background:#4169e1;">wifi</span><?php  } ?>
                    <?php  if(!empty($item['enable_card'])) { ?><span class="label" style="background:#4169e1;">刷卡</span><?php  } ?>
                    <?php  if(!empty($item['enable_room'])) { ?><span class="label" style="background:#4169e1;">包厢</span><?php  } ?>
                    <?php  if(!empty($item['enable_park'])) { ?><span class="label" style="background:#4169e1;">停车</span><?php  } ?>
                </td>
                <td><?php  if($item['is_show']==1) { ?>
                        <span class="label" style="background:#56af45;">显示</span>
                    <?php  } else { ?>
                        <span class="label">隐藏</span>
                    <?php  } ?>
                </td>
                <td>
                    <a class="btn" href="<?php  echo create_url('site/module', array('do' => 'category', 'name' => 'idish', 'id' => $item['id'], 'storeid' => $item['id']))?>" title="管理"><i class="icon-cog"></i></a>
                    <a class="btn" href="<?php  echo create_url('site/module', array('do' => 'storesform', 'name' => 'idish', 'id' => $item['id'], 'storeid' => $item['id']))?>" title="编辑"><i class="icon-edit"></i></a>
                    <a class="btn" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo create_url('site/module', array('do' => 'storesdelete', 'name' => 'idish', 'id' => $item['id'], 'storeid' => $item['id']))?>" title="删除"><i class="icon-remove"></i></a>
                </td>
            </tr>
            <?php  } } ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="7">
                    <a href="<?php  echo create_url('site/module', array('do' => 'storesform', 'name' => 'idish'))?>" id="add-level"><i class="icon-plus-sign-alt"></i> 添加</a>
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
    <?php  echo $pager;?>
</div>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
