<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
		<!-- 核心 JavaScript 文件 -->
		<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link href="./source/modules/jdg_pub/template/css/bootstrap.min.css" rel="stylesheet" />
        <link href="./source/modules/jdg_pub/template/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="./source/modules/jdg_pub/template/css/font-awesome.min.css" />
        <link rel="stylesheet" href="./source/modules/jdg_pub/template/css/ace.min.css" />
        <link rel="stylesheet" href="./source/modules/jdg_pub/template/css/ace-responsive.min.css" />
        <!--page specific plugin scripts-->
		<script src="./source/modules/jdg_pub/template/js/jquery.dataTables.min.js"></script>
        <script src="./source/modules/jdg_pub/template/js/jquery.dataTables.bootstrap.js"></script>
		<title></title>
		
		<script type="text/javascript">
			$(function() {
                var oTable1 = $('#sample-table-2').dataTable( {
                "aoColumns": [
                  { "bSortable": false },
                  null, null,null, null, null, null, null, null, null, 
                
        		] 
        		
            } );
                
                
                $('table th input:checkbox').on('click' , function(){
                    var that = this;
                    $(this).closest('table').find('tr > td:first-child input:checkbox')
                    .each(function(){
                        this.checked = that.checked;
                        $(this).closest('tr').toggleClass('selected');
                    });
                        
                });
            
            
                $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
                function tooltip_placement(context, source) {
                    var $source = $(source);
                    var $parent = $source.closest('table')
                    var off1 = $parent.offset();
                    var w1 = $parent.width();
            
                    var off2 = $source.offset();
                    var w2 = $source.width();
            
                    if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
                    return 'left';
                }
            })
        </script>
	</head>
	<body>
		<div class="row-fluid">
								
								<div class="table-header">
									存酒列表
								</div>

								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</th>
											<th>存酒码</th>
											
											<th class="hidden-480">寄存酒名</th>
											<th>酒类</th>
											<th>数量</th>
											<th>寄存柜号</th>
											<th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												寄存时间
											</th>
											
											
											
											<th>取出时间</th>
											<th class="hidden-480">状态</th>
											
											<th>操作</th>
										</tr>
									</thead>

									<tbody>
								

								
									<?php  if(is_array($result)) { foreach($result as $row) { ?>
										<tr>
											<td class="center">
												<label>
													<input type="checkbox" value=<?php  echo $row["id"];?>/>
													<span class="lbl"></span>
												</label>
													
												
											</td>

											<td><?php  echo $row["snid"];?></td>
											<td><?php  echo $row["winename"];?></td>
											<td><?php  echo $row["type"];?></td>
											<td><?php  echo $row["winenumber"];?></td>
											<td><?php  echo $row["winenum"];?></td>
											<td><?php  echo $row["creattime"];?></td>
											
											
											
											<td><?php  echo $row["endtime"];?></td>
											<td><?php  echo $row['status'];?></td>
											
											<td >
												
												<a href="<?php  echo create_url('site/module', array('do' => 'updatabj', 'name' => 'jdg_pub','snid'=>$row['snid'],'id'=>$row['id']))?>"><button type="button" class="btn btn-success">标记取出</button></a>
												<a href="<?php  echo create_url('site/module', array('do' => 'deletejt', 'name' => 'jdg_pub','snid'=>$row['snid'],'id'=>$row['id']))?>"><button type="button" class="btn btn-danger">删除</button></a>
												
											</td>
										</tr>

										<?php  } } ?>
									</tbody>
								</table>
							</div>
								

							
						

				

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
	</body>
</html>
