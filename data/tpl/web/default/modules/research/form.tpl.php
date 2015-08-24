<?php defined('IN_IA') or exit('Access Denied');?><div id="form" class="alert alert-block alert-new ">
	<h4 class="alert-heading">选择要展示的预约活动</h4>
	<table>
		<tr>
			<th>操作</th>
			<td style="width:400px;">
				<div class="reply-news-edit-button">
					<button class="btn" style="width:100%;" type="button" onclick="$('#modal-module-menus').modal();">选择要展示的预约活动</button>
				</div>
			</td>
		</tr>
		<tr >
			<th>预约活动</th>
			<td>
				<div id="entry-preview" class="alert alert-info reply-news-list reply-news-list-first<?php  if(!$activity) { ?> hide<?php  } ?>" style="width:400px;">
					<div class="reply-news-list-cover"><img src="<?php  echo $_W['attachurl'];?><?php  echo $activity['thumb'];?>" alt=""></div>
					<div class="reply-news-list-detail" style="width:388px;">
						<div class="title"><?php  echo $activity['title'];?></div>
						<div class="content"><?php  echo cutstr(strip_tags($activity['description']), 50)?></div>
					</div>
				</div>
				<input type="hidden" name="activity" value="<?php  echo $activity['reid'];?>"/>
			</td>
		</tr>
	</table>
</div>
<div id="modal-module-menus" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style=" width:600px;">
	<div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择要展示的项目</h3></div>
	<div class="modal-body">
		<table class="tb">
			<tr>
				<th><label for="">搜索关键字</label></th>
				<td>
					<div class="input-append" style="display:block;">
						<input type="text" class="span3" name="keyword" value="" id="search-kwd" /><button type="button" class="btn" onclick="search_entries();">搜索</button>
					</div>
				</td>
			</tr>
		</table>
		<div id="module-menus"></div>
	</div>
	<div class="modal-footer"><a href="#" class="btn" data-dismiss="modal" aria-hidden="true">关闭</a></div>
</div>
<script type="text/javascript">
	function search_entries() {
		var kwd = $.trim($('#search-kwd').val());
		$.post('<?php  echo $this->createWebUrl('query');?>', {keyword: kwd}, function(dat){
			$('#module-menus').html(dat);
		});
	}
	function select_entry(o) {
		$('#entry-preview img').attr('src', '<?php  echo $_W['attachurl'];?>' + o.thumb);
		$('#entry-preview .title').html(o.title);
		$('#entry-preview .content').html(o.description);
		$('#entry-preview').show();
		$(':hidden[name="activity"]').val(o.reid);
	}
</script>
