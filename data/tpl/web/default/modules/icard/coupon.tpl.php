<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  echo $this -> set_tabbar($action);?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)">
        <h4><?php  echo $title;?> - <a href="<?php  echo create_url('site/module', array('do' => 'SetRule', 'name' => 'icard'));?>" style="font-size:0.8em">入口设置</a></h4>
        <a class="btn btn-primary" href="<?php  echo create_url('site/module', array('do' => 'couponform', 'name' => 'icard'))?>"><i class="icon-plus"></i> 添加优惠券</a>
        <div style="padding-top: 15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th style="width:40px;">显示顺序</th>
                <th>标题</th>
                <th style="width:100px;">适用人群</th>
                <th style="width:40px;">状态</th>
                <th style="width:150px;">时间</th>
                <th style="width:100px;">操作</th>
            </tr>
            </thead>
            <tbody id="level-list">
            <?php  if(is_array($coupons)) { foreach($coupons as $coupon) { ?>
            <tr>
                <td><input type="text" class="span1" name="displayorder[<?php  echo $coupon['id'];?>]" value="<?php  echo $coupon['displayorder'];?>"></td>
                <td><?php  echo $coupon['title'];?></td>
                <td><font color="red">
                    <?php  if($coupon['levelid']==-4) { ?>
                        单次消费满<?php  echo $coupon['permoney'];?>元的会员
                    <?php  } else if($coupon['levelid']==-5) { ?>
                        累计消费满<?php  echo $coupon['allmoney'];?>元的会员
                    <?php  } else { ?>
                        <?php  echo $levels[$coupon['levelid']];?>
                    <?php  } ?>
                </font></td>
                <td>
                    <?php  if(TIMESTAMP<$coupon['starttime']) { ?><font color="red">未开始</font>
                    <?php  } else if(TIMESTAMP>$coupon['starttime'] && TIMESTAMP<$coupon['endtime']) { ?><font color="green">进行中</font>
                    <?php  } else { ?><font color="red">已结束</font><?php  } ?>
                </td>
                <td>
                    生效时间：<?php  echo date('Y-m-d H:i:s', $coupon['starttime']);?><br/>
                    过期时间：<?php  echo date('Y-m-d H:i:s', $coupon['endtime']);?>
                </td>
                <td>
                    <a class="btn" href="<?php  echo create_url('site/module', array('do' => 'sncodelist', 'name' => 'icard', 'type' => 2, 'pid' => $coupon['id']))?>"><i class="icon-bar-chart"></i></a>
                    <a class="btn" href="<?php  echo create_url('site/module', array('do' => 'couponform', 'name' => 'icard', 'id' => $coupon['id']))?>"><i class="icon-edit"></i></a>
                    <a class="btn" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo create_url('site/module', array('do' => 'coupondelete', 'name' => 'icard', 'id' => $coupon['id']))?>"><i class="icon-remove"></i></a>
                </td>
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
