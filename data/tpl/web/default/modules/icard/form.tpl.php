<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<div class="alert alert-block alert-new">
	<a class="close" data-dismiss="alert">×</a>
	<h4 class="alert-heading">会员卡</h4>
	<table>
		<tbody>
			<tr>
				<th>详细设置</th>
				<td>
                    <a class="btn" href="<?php  echo create_url('site/module', array('do' => 'style', 'name' => 'icard', 'rid' => $reply['rid']))?>"><i class="icon-credit-card"></i> 会员卡设置</a>
                </td>
			</tr>
            <tr>
                <th>会员回复标题</th>
                <td>
                    <input type="text" value="<?php  if(empty($reply) || empty($reply['title'])) { ?>会员卡,省钱,打折,促销,优先知道,有奖励哦<?php  } else { ?><?php  echo $reply['title'];?><?php  } ?>" class="span7" name="title">
                </td>
            </tr>
            <tr>
                <th>非会员回复标题</th>
                <td>
                    <input type="text" value="<?php  if(empty($reply) || empty($reply['title_not'])) { ?>申请成为会员<?php  } else { ?><?php  echo $reply['title_not'];?><?php  } ?>" class="span7" name="title_not">
                </td>
            </tr>
            <tr>
                <th>会员回复内容</th>
                <td>
                    <textarea style="height:150px;" name="description" id="description" class="span7" cols="60" rows="10"><?php  if(empty($reply) || empty($reply['description'])) { ?>尊贵vip是您消费身份的体现,会员卡,省钱,打折,促销,优先知道,有奖励哦<?php  } else { ?><?php  echo $reply['description'];?><?php  } ?></textarea>
                    <div class="help-block">用于图文显示的简介</div>
                </td>
            </tr>
            <tr>
                <th>非会员回复内容</th>
                <td>
                    <textarea style="height:150px;" name="description_not" id="description_not" class="span7" cols="60"><?php  if(empty($reply) || empty($reply['description_not'])) { ?>申请成为会员,享受更多优惠<?php  } else { ?><?php  echo $reply['description_not'];?><?php  } ?></textarea>
                    <div class="help-block">用于图文显示的简介</div>
                </td>
            </tr>
			<tr>
				<th>会员回复图片</th>
				<td>
                    <div id="" class="uneditable-input reply-edit-cover">
                        <div class="detail">
                            <span class="pull-right">大图片建议尺寸：700像素 * 300像素</span>
                            <input type="button" id="picture" fieldname="picture<?php  echo $namesuffix;?>" class="btn btn-mini reply-edit-cover-upload" value="<i class='icon-upload-alt'></i> 上传" style="" />
                        </div>
                        <?php  if(!empty($reply['picture'])) { ?>
                        <input type="hidden" name="picture_old" value="<?php  echo $reply['picture'];?>">
                        <div id="upload-file-view" class="upload-view">
                            <input type="hidden" id="picture-value" value="<?php  echo $reply['picture'];?>">
                            <img width="100" src="<?php  echo $_W['attachurl'];?><?php  echo $reply['picture'];?>">
                        </div>
                        <?php  } else { ?>
                        <div id="upload-file-view"></div>
                        <?php  } ?>
                    </div>
                    <div class="help-block">用于图文显示的图片</div>
				</td>
			</tr>
            <tr>
                <th>非会员回复图片</th>
                <td>
                    <div id="" class="uneditable-input reply-edit-cover">
                        <div class="detail">
                            <span class="pull-right">大图片建议尺寸：700像素 * 300像素</span>
                            <input type="button" id="picture_not" fieldname="picture_not" class="btn btn-mini reply-edit-cover-upload" value="<i class='icon-upload-alt'></i> 上传" style="" />
                        </div>
                        <?php  if(!empty($reply['picture_not'])) { ?>
                        <input type="hidden" name="picture_not_old" value="<?php  echo $reply['picture_not'];?>">
                        <div id="upload-file-view" class="upload-view">
                            <input type="hidden" id="picture_not_value" value="<?php  echo $reply['picture_not'];?>">
                            <img width="100" src="<?php  echo $_W['attachurl'];?><?php  echo $reply['picture_not'];?>">
                        </div>
                        <?php  } else { ?>
                        <div id="upload-file-view"></div>
                        <?php  } ?>
                    </div>
                    <div class="help-block">用于图文显示的图片</div>
                </td>
            </tr>
           <!-- <tr>
            <th>直接访问URL：</th>
            <td>
            					<a href="<?php  echo $this->createMobileUrl('index', array('id' => $item['id'], 'weid' => $_W['weid']))?>" target="_blank"><?php  echo $this->createMobileUrl('wapindex', array('id' => $item['id'], 'weid' => $_W['weid']))?></a>
					<span class="help-block">您可以根据此地址，添加到，设置访问。</span>
            </td>
            </tr>
            -->
		</tbody>
	</table>
</div>

<script type="text/javascript">
kindeditor('');
kindeditorUploadBtn($('#picture'));
kindeditorUploadBtn($('#picture_not'));
</script>