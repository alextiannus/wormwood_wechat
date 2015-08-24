<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  echo $this -> set_tabbar($action);?>
<div class="main">
    <div class="tb-list" style="display: block;padding: 10px 15px 0px 15px;">
        <div class="alert" style="margin-bottom: 0px;">
            <p>
            <span class="bold">
                1.进行中或已经结束的特权不可以修改！<br/>
                2.您最多可以创建8条特权!
            </span>
            </p>
        </div>
    </div>
    <form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)">
        <h4><?php  echo $title;?> - <a href="<?php  echo create_url('site/module', array('do' => 'SetRule', 'name' => 'icard'));?>" style="font-size:0.8em">入口设置</a></h4>
        <a class="btn btn-primary" href="<?php  echo create_url('site/module', array('do' => 'privilegeform', 'name' => 'icard'))?>"><i class="icon-plus"></i> 添加特权</a>
        <div style="padding-top: 15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th style="width:40px;">显示顺序</th>
                <th style="width:80px;">特权时间</th>
                <th>标题</th>
                <th style="width:100px;">所属人群</th>
                <th style="width:80px;">使用次数</th>
                <th style="width:40px;">状态</th>
                <th style="width:100px;">操作</th>
            </tr>
            </thead>
            <tbody id="level-list">
            <?php  if(is_array($gifts)) { foreach($gifts as $gift) { ?>
            <tr>
                <td><input type="text" class="span1" name="displayorder[<?php  echo $gift['id'];?>]" value="<?php  echo $gift['displayorder'];?>"></td>
                <td>
                    <?php  echo date('Y-m-d H:i:s', $gift['starttime']);?><br/>
                    <?php  echo date('Y-m-d H:i:s', $gift['endtime']);?>
                </td>
                <td><?php  echo $gift['title'];?></td>
                <td>
                    <?php  $levellist = explode(',', $gift['levelids']);?>
                    <?php  if(in_array(0, $levellist)) { ?>
                        <span class="label" style="background:#4169e1;">所有会员</span>
                    <?php  } else { ?>
                        <?php  if(is_array($levellist)) { foreach($levellist as $item) { ?>
                            <span class="label" style="background:#4169e1;"><?php  echo $levelarr[$item];?></span>
                        <?php  } } ?>
                    <?php  } ?>
                </td>
                <td>
                    <?php  if($gift['count']==0) { ?>不限<?php  } else { ?><?php  echo $gift['count'];?><?php  } ?>
                </td>
                <td>
                    <?php  if(TIMESTAMP<$gift['starttime']) { ?><span class="label" style="background:#56af45;">未开始</span>
                    <?php  } else if(TIMESTAMP>$gift['starttime'] && TIMESTAMP<$gift['endtime']) { ?><span class="label" style="background:#e63a3a;">进行中</span>
                    <?php  } else { ?><span class="label">已结束</span><?php  } ?>
                </td>

                <td>
                    <a class="btn" href="<?php  echo create_url('site/module', array('do' => 'sncodelist', 'name' => 'icard', 'type' => 3, 'pid' => $gift['id']))?>"><i class="icon-bar-chart"></i></a>
                    <?php  if(TIMESTAMP<$gift['starttime']) { ?>
                    <a class="btn" href="<?php  echo create_url('site/module', array('do' => 'privilegeform', 'name' => 'icard', 'id' => $gift['id']))?>"><i class="icon-edit"></i></a>
                    <?php  } ?>
                    <a class="btn" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo create_url('site/module', array('do' => 'privilegedelete', 'name' => 'icard', 'id' => $gift['id']))?>"><i class="icon-remove"></i></a></td>
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
        </div>
    </form>
    <?php  echo $pager;?>
</div>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>