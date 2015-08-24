<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<?php  echo $this -> set_tabbar($action);?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)">
        <h4>会员卡领取记录</h4>
        <input type="text" id="keyword" name="keyword" value="<?php  echo $keyword;?>" class="input-small-z" placeholder="请输入关键词" data-rule-required="true">
        <select name="type" class="input-small">
            <option <?php  if($type=='cardno' || empty($type)) { ?>selected="selected"<?php  } ?> value="cardno">会员卡号</option>
            <option <?php  if($type=='username') { ?>selected="selected"<?php  } ?> value="username">用户名</option>
            <option <?php  if($type=='tel') { ?>selected="selected"<?php  } ?> value="tel">手机号码</option>
        </select>
        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        <input name="submit" type="submit" class="btn btn-primary" value="查询">
        <a class="btn btn-primary" href="<?php  echo create_url('site/module', array('do' => 'CardExcel', 'name' => 'icard'))?>">导出会员</a>
        <a class="btn btn-primary" href="<?php  echo create_url('site/module', array('do' => 'AllRechargeLog', 'name' => 'icard'))?>">充值记录</a>
        <div style="padding-top: 15px;"></div>
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th>会员卡号</th>
                <th style="width:80px;">用户名</th>
                <th style="width:100px;">手机号码</th>
                <th style="width:100px;">领卡时间</th>
                <th style="width:40px;">余额</th>
                <th style="width:90px;">剩余积分</th>
                <th style="width:90px;">总积分</th>
                <th style="width:40px;">状态</th>
                <th style="width:110px;">日志</th>
                <th style="width:320px;">操作</th>
            </tr>
            </thead>
            <tbody id="level-list">
            <?php  if(is_array($list)) { foreach($list as $item) { ?>
            <tr>
                <td><?php  echo $item['cardpre'];?><?php  echo $item['cardno'];?></td>
                <td><?php  echo $users[$item['from_user']]['username'];?></td>
                <td><?php  echo $users[$item['from_user']]['tel'];?></td>
                <td><?php  echo date('Y-m-d H:i:s',$item['dateline']);?></td>
                <td><?php  echo $item['coin'];?></td>
                <td><?php  echo $item['balance_score'];?></td>
                <td><?php  echo $item['total_score'];?></td>
                <td><?php  if($item['state'] == 0) { ?><span class="label" style="background:#56af45;">正常</span><?php  } else { ?><span class="label">冻结</span><?php  } ?></td>
                <td>
                    <a class="btn" title="消费日志" href="<?php  echo create_url('site/module', array('do' => 'ShopingLog', 'name' => 'icard', 'cardid' => $item['id']))?>"><i class="icon-reorder"></i></a>
                    <a class="btn" title="充值日志" href="<?php  echo create_url('site/module', array('do' => 'RechargeLog', 'name' => 'icard', 'cardid' => $item['id']))?>"><i class="icon-bar-chart"></i></a>
                </td>
                <td>
                    <a href="javascript:;" title="充值" class="btn pay" data-codeid="<?php  echo $item['id'];?>" data-state="<?php  echo $item['state'];?>" title="充值"><i class="icon-yen"></i></a>
                    <a href="javascript:;" title="积分" class="btn bestow" data-memberid="<?php  echo $item['id'];?>" data-state="<?php  echo $item['state'];?>" title="赠送积分"><i class="icon-money"></i></a>
                    <a class="btn" href="<?php  echo create_url('site/module', array('do' => 'cardform', 'name' => 'icard', 'id' => $item['id']))?>"><i class="icon-edit"></i></a>
                    <?php  if($item['state'] == 0) { ?>
                    <a onclick="return confirm('您确定要冻结吗？');return false;" href="<?php  echo create_url('site/module', array('do' => 'checkedCardState', 'name' => 'icard', 'id' => $item['id'], 'state' => $item['state']))?>"
                       class="btn" title="冻结"><i class="icon-lock"></i>冻结</a>
                    <?php  } else { ?>
                    <a onclick="return confirm('您确定要解冻吗？');return false;" href="<?php  echo create_url('site/module', array('do' => 'checkedCardState', 'name' => 'icard', 'id' => $item['id'], 'state' => $item['state']))?>"
                       class="btn" title="解冻"><i class="icon-unlock"></i>解冻</a>
                    <?php  } ?>
                    <a class="btn" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo create_url('site/module', array('do' => 'carddelete', 'name' => 'icard', 'id' => $item['id']))?>"><i class="icon-remove"></i></a>
                </td>
            </tr>
            <?php  } } ?>
            </tbody>
        </table>
    </form>
    <?php  echo $pager;?>

    <div id="myModal2" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="Form1" action="<?php  echo create_url('site/module', array('do' => 'addCardPrice', 'name' => 'icard'))?>" method="post" class="form-horizontal">
                    <input type="hidden" name="id" id="id" value="0">
                    <input type="hidden" name="state" id="state" value="0">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"><i class="icon-check"></i>会员充值</h4>
                    </div>
                    <div class="modal-body">
                        <div class="control-group">
                            <label class="control-label" for="price">充值金额</label>
                            <div class="controls">
                                <div class="input-append">
                                    <input type="text" placeholder="金额" name="price" id="price" class="input-small" data-rule-required="true" data-rule-number="true">
                                    <span class="add-on"><i class="icon-cny"></i></span>
                                </div>
                            </div>
                            <div class="controls" style="padding-top: 5px;padding-bottom:5px;color:#f00;">输入500,表示增加500;<br>输入-500表示减少500;</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary btn-charge">提交</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="Form1" action="<?php  echo create_url('site/module', array('do' => 'addCardScore', 'name' => 'icard', 'id' => $item['id'], 'state' => $item['state']))?>" method="post" class="form-horizontal  form-modal">
                    <input type="hidden" name="id" id="id2" value="0">
                    <input type="hidden" name="state" id="state2" value="0">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"><i class="icon-check"></i>赠送积分</h4>
                    </div>
                    <div class="modal-body">
                        <div class="control-group">
                            <label class="control-label" for="price">赠送积分</label>
                            <div class="controls">
                                <input type="text" placeholder="积分" name="score" id="score" class="input-small" data-rule-required="true" data-rule-number="true">
                            </div>
                            <div class="controls" style="padding-top: 5px;padding-bottom:5px;color:#f00;">输入500,表示增加500;<br>输入-500,表示减少500;</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("tr").delegate(".pay", "click", function () {
            $("#price").val("100");
            $("#id").val($(this).attr("data-codeid"));
            $("#state").val($(this).attr("data-state"));
            $("#myModal2").modal("show");
        });
        $("tr").delegate(".bestow", "click", function () {
            $("#score").val("100");
            $("#id2").val($(this).attr("data-memberid"));
            $("#state2").val($(this).attr("data-state"));
            $("#myModal3").modal("show");
        });
//        $('.btn-charge').click(function(){
//            var submitData = {
//                codeid: $("#codeid").val(),
//                aid: $("#aid").val(),
//                price: $("#price").val(),
//                action: "setTel"
//            };
//            $.post('/membercard/MemberCharge', submitData,
//                    function (data) {
//                        if (data.errno == 200) {
//                            alert(data.error);
//                            location.href=data.url;
//                        } else {
//                            alert(data.error);
//                            location.href=data.url;
//                        }
//                    },
//                    "json")
//        });
        $('.btn-exports').click(function(){
            var aid=$('#aid').val();
            location.href = "/membercard/MemberExport?aid="+aid;
        });
    });
</script>

<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
