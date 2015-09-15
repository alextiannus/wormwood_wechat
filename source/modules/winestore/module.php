<?php
/**
 * WINESTORE模块定义
 *
 * @author on3
 * @url 
 */
defined('IN_IA') or exit('Access Denied');

class WinestoreModule extends WeModule {
	public $table = "idg_pub_wineadmin";

	
	public function doWineStore(){
		global $_W,$_GPC;
		$weid = $_W["weid"];
		$res = pdo_fetchall("select id,snid,name,FROM_UNIXTIME(creattime)creattime,(CASE  status when 0 then '暂未存酒' else '已经存酒'end)status from ims_wine_store where 1=1 and weid={$weid}");
		include $this->template("wineadmin");
	}
	
	public function doselect(){
		global $_GPC;
		$snid = $_GPC['snid'];
		$result = pdo_fetchall("select id,snid,name,(CASE type when 1 then '红酒' when 2 then '香槟' when 3 then '洋酒'  else '啤酒'end)type,winename,winenumber,winenum,FROM_UNIXTIME(creattime)creattime,FROM_UNIXTIME(endtime)endtime,(case status when 0 then '未取' else '已取'end)status,remark from ims_wine_store_list where 1=1 and snid={$snid}");
		include $this->template("select");
	}
	
	public function doupdate(){
		global $_W,$_GPC;
		$name = $_GPC['name'];
		$snid = $_GPC['snid'];
		$arr = array('name'=>$name,"snid"=>$snid);
		
		$result=pdo_fetch("select snid from ims_wine_store_list where 1=1 and snid = {$snid}");
		if($result==""){
			include $this->template("sub");
		}else{
		$res = pdo_query("select * from ims_wine_store");
		
			include $this->template("sub");
		}
		
	}
	
	public  function dodelete(){
			global $_GPC;
			$snid = $_GPC['snid'];
			$status = pdo_query("delete from ims_wine_store where 1=1 and snid = {$snid}");
			if($status){
				$detailstatus= pdo_query("delete from ims_wine_store_list where 1=1 and snid = {$snid}");
				if($detailstatus){
				$url = $this->createWebUrl('wineStore');  
				echo "<script language='javascript' type='text/javascript'>alert('删除成功,点击确定跳转!');";  
				echo "window.location.href='$url'";  
				echo "</script>"; 
				}else{
				echo "<script language='javascript' type='text/javascript'>alert('删除成功,该用户没有存酒!');"; 
				echo "</script>"; 
				}
				
			}else{
				echo "<script language='javascript' type='text/javascript'>alert('因为网络原因，操作失败，请重新尝试!');"; 
				echo "</script>"; 
			}
		
	}
	
	public function doAddwine(){
		global $_W,$_GPC;
		$arr_num =  count($_GPC['winename']);
		$type = $_GPC["type"];
		$winename= $_GPC['winename'];
		$winenumber = $_GPC['winenumber'];
		$winenum = $_GPC['winenum'];
		$remark = $_GPC['remark'];
		$snid = $_GPC['snid'];
		$name = $_GPC['name'];
		$time = time();
	
		for($i=0;$i<$arr_num;$i++){
		    $data = array(
		        'snid' => $snid,
		        'winename' => $winename[$i],
		        'winenumber' => $winenumber[$i],
		        'winenum' =>$winenum[$i],
		        'creattime' =>$time,
		        'type' => $type[$i],
		        'remark' => $remark[$i]
		    );
		  $status = pdo_insert('wine_store_list',$data);
	
		}

		if($status===false){
				
		echo "<script language='javascript' type='text/javascript'>alert('System Error,Please Try Again!');"; 
		echo "</script>"; 
			}else{
		$sql = pdo_query("update ims_wine_store set status = 1 where 1=1 and snid=".$snid."");
		
		if($sql===false){
			echo "<script language='javascript' type='text/javascript'>alert('(wine_store)System Error,Please Try Again!');"; 
			echo "</script>";
		
		}else{
		$url = $this->createWebUrl('wineStore');  
		echo "<script language='javascript' type='text/javascript'>alert('执行成功,点击确定跳转!');";  
		echo "window.location.href='$url'";  
		echo "</script>"; 
			
		}
	}
}

    public function doEditWine(){
        global $_W,$_GPC;
        $id=$_GPC['id'];
        $result=pdo_fetch("select * from ims_wine_store_list where 1=1 and id = {$id}");
        include $this->template("editWine");
    }
    
    public function doSaveWine(){
        global $_W,$_GPC;
        $id=$_GPC['id'];
        $snid=$_GPC['snid'];
        $type = $_GPC["type"];
        $winename= $_GPC['winename'];
        $winenumber = $_GPC['winenumber'];
        $winenum = $_GPC['winenum'];
        $remark = $_GPC['remark'];
        
        $sql = pdo_query("update ims_wine_store_list set type = {$type},winename='{$winename}',winenumber={$winenumber},winenum={$winenum},remark='{$remark}'  where 1=1 and id={$id}");
        if($sql===false){
			echo "<script language='javascript' type='text/javascript'>alert('(ims_wine_store_list)System Error,Please Try Again!');"; 
			echo "</script>";
		
		}else{
		$url = $this->createWebUrl('select',array('snid'=>$snid));  
		echo "<script language='javascript' type='text/javascript'>alert('更新成功,点击确定跳转!');";  
		echo "window.location.href='$url'";  
		echo "</script>"; 
			
		}
    }


	public function doupdatabj(){
		global $_W,$_GPC;
		$id=$_GPC['id'];
		$snid=$_GPC['snid'];
		$time = time();
		$status = pdo_query("update ims_wine_store_list set status=1 ,endtime={$time} where 1=1 and id={$id}");
		if($status==FALSE){
			echo "<script language='javascript' type='text/javascript'>alert('Error,Please Try Again!');"; 
			echo "</script>";
		}else{
				$url = $this->createWebUrl('select',array('snid'=>$snid));  
		echo "<script language='javascript' type='text/javascript'>alert('标记取出成功,点击确定跳转!');";  
		echo "window.location.href='$url'";  
		echo "</script>"; 
			
		}
	}
	
	public function dodeletejt(){
		global $_W,$_GPC;
		$id=$_GPC['id'];
		$snid=$_GPC['snid'];
		$status = pdo_query("delete from ims_wine_store_list where 1=1 and id={$id} ");
		if($status==FALSEl){
			echo "<script language='javascript' type='text/javascript'>alert('Error,Please Try Again!');"; 
			echo "</script>";
		}else{
				$url = $this->createWebUrl('select',array('snid'=>$snid));  
		echo "<script language='javascript' type='text/javascript'>alert('删除成功,点击确定跳转!');";  
		echo "window.location.href='$url'";  
		echo "</script>"; 
			
		}
	}

	
	
	
}