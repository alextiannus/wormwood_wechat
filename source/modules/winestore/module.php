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

	
	public function doRequestList(){
		global $_W,$_GPC;
		$weid = $_W["weid"];
		$res = pdo_fetchall("select id,snid,name,FROM_UNIXTIME(creattime)creattime,(CASE  status when 0 then 'Pending' else 'Done'end)status from ims_wine_store where 1=1 and weid={$weid}");
		include $this->template("wineadmin");
	}
	
	public function doSearchList(){
	    global $_W,$_GPC;
	    $weid = $_W["weid"];
	    $requestNo = $_GPC['requestNo'];
	    $res = pdo_fetchall("select id,snid,name,FROM_UNIXTIME(creattime)creattime,(CASE  status when 0 then 'Pending' else 'Done'end)status from ims_wine_store where 1=1 and weid={$weid} and snid like '{$requestNo}%' ");
	    include $this->template("wineadmin");
	}
	
	public function doselect(){
		global $_GPC;
		$snid = $_GPC['snid'];
		$result = pdo_fetchall("select id,snid,cardnumber,(CASE type when 1 then '红酒' when 2 then '香槟' when 3 then '洋酒'  else '啤酒'end)type,amount,winename,winenumber,winenum,FROM_UNIXTIME(creattime)creattime,FROM_UNIXTIME(endtime)endtime,collectedby,(case status when 0 then '未取' when 2 then '待取' else '已取'end)status,remark from ims_wine_store_list where 1=1 and snid={$snid}");
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
				$url = $this->createWebUrl('requestList');  
				echo "<script language='javascript' type='text/javascript'>alert('删除成功,点击确定跳转!');";  
				echo "window.location.href='$url'";  
				echo "</script>"; 
				}else{
				    $url = $this->createWebUrl('requestList');
				echo "<script language='javascript' type='text/javascript'>alert('删除成功,该用户没有存酒!');"; 
				echo "window.location.href='$url'";
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
		$amount = $_GPC['amount'];
		$time = time();
	
		for($i=0;$i<$arr_num;$i++){
		  
		    while (true) {
		        $rand =rand(9000001,9999999);
		        $cardnumber="SCF".strval($rand);
		        $check= pdo_fetch('SELECT COUNT(1) AS num from'.tablename('wine_store_list')." WHERE cardnumber = :cardnumber" ,array(':cardnumber'=>$cardnumber));
		        if($check['num']==0){
		            break;
		        }
		    }
		
		    $data = array(
		        'snid' => $snid,
		        'cardnumber' => $cardnumber,
		        'winename' => $winename[$i],
		        'winenumber' => $winenumber[$i],
		        'winenum' =>$winenum[$i],
		        'creattime' =>$time,
		        'type' => $type[$i],
		        'amount' => $amount[$i],
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
		$url = $this->createWebUrl('requestList');  
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
        $amount = $_GPC['amount'];
        $remark = $_GPC['remark'];
        
        $sql = pdo_query("update ims_wine_store_list set type = {$type},winename='{$winename}',winenumber={$winenumber},winenum={$winenum},remark='{$remark}' ,amount={$amount} where 1=1 and id={$id}");
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
    //填写取酒信息
    public function doRetrieveWine(){
        global $_W,$_GPC;
        $id=$_GPC['id'];
        $snid=$_GPC['snid'];
        $result = array('id'=>$id,"snid"=>$snid);
        include $this->template("retrieveWine");
    }

//更新取酒信息
	public function doUpdateStatus(){
		global $_W,$_GPC;
		$id=$_GPC['id'];
		$snid=$_GPC['snid'];
		$collectedby=$_GPC['collectedby'];
		$remark=$_GPC['remark'];
		$time = time();
		$status = pdo_query("update ims_wine_store_list set status=1 ,endtime={$time},collectedby='{$collectedby}',remark='{$remark}' where 1=1 and id={$id}");
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
		if($status==FALSE){
			echo "<script language='javascript' type='text/javascript'>alert('Error,Please Try Again!');"; 
			echo "</script>";
		}else{
				$url = $this->createWebUrl('select',array('snid'=>$snid));  
		echo "<script language='javascript' type='text/javascript'>alert('删除成功,点击确定跳转!');";  
		echo "window.location.href='$url'";  
		echo "</script>"; 
			
		}
	}
	
	
	public function doWineCollectList(){
	    global $_W,$_GPC;
	    $res = pdo_fetchall("select id,cardnumber,winename,collectedby,tablenumber,FROM_UNIXTIME(creattime)creattime,(CASE  status when 0 then 'Pending' else 'Done'end)status from ims_wine_retrieve_list where 1=1 ");
	    include $this->template("collectList");
	}
	
	public function doWineCollectSearch(){
	    global $_W,$_GPC;
	    $cardnumber=$_GPC['cardnumber'];
	    $res = pdo_fetchall("select id,cardnumber,winename,collectedby,tablenumber,FROM_UNIXTIME(creattime)creattime,(CASE  status when 0 then 'Pending' else 'Done'end)status from ims_wine_retrieve_list where 1=1 and cardnumber like '{$cardnumber}%' ");
	    include $this->template("collectList");
	}
	
	public function doUpdateCollect(){
	    global $_W,$_GPC;
	    $cardnumber=$_GPC['cardnumber'];
	    $collectedby=$_GPC['collectedby'];
	    
	    $status = pdo_query("update ims_wine_retrieve_list set status=1  where 1=1 and cardnumber='{$cardnumber}' ");
	    if($status==FALSE){
	        echo "<script language='javascript' type='text/javascript'>alert('Error,Please Try Again!');";
	        echo "</script>";
	    }else{
	        $status = pdo_query("update ims_wine_store_list set status=1 ,collectedby='{$collectedby}' where 1=1 and cardnumber='{$cardnumber}' ");
	        if($status==FALSE){
	            echo "<script language='javascript' type='text/javascript'>alert('Error Update wine_store_list ,Please Try Again!');";
	            echo "</script>";
	        }else{
	            $url = $this->createWebUrl('wineCollectList');
	            echo "<script language='javascript' type='text/javascript'>alert('更新成功,点击确定跳转!');";
	            echo "window.location.href='$url'";
	            echo "</script>";
	            
	        }
	        
	      
	        	
	    }
	}
	
	public function doWineStorageList(){
	    global $_W,$_GPC;
	   	$result = pdo_fetchall("select id,snid,cardnumber,(CASE type when 1 then '红酒' when 2 then '香槟' when 3 then '洋酒'  else '啤酒'end)type,amount,winename,winenumber,winenum,FROM_UNIXTIME(creattime)creattime,FROM_UNIXTIME(endtime)endtime,collectedby,(case status when 0 then '未取' when 2 then '待取' else '已取'end)status,remark from ims_wine_store_list where 1=1 ");
	    include $this->template("storageList");
	}
	
	public function doWineStorageSearch(){
	    global $_W,$_GPC;
	    $cardnumber=$_GPC['cardnumber'];
	    $snid=$_GPC['snid'];
	    $where="";
	    if(!empty($cardnumber)){
	        $where.=" AND cardnumber like '{$cardnumber}%' ";
	    }
	    if(!empty($cardnumber)){
	        $where.=" AND snid like '{$snid}%' ";
	    }
	   
	    $result = pdo_fetchall("select id,snid,cardnumber,(CASE type when 1 then '红酒' when 2 then '香槟' when 3 then '洋酒'  else '啤酒'end)type,amount,winename,winenumber,winenum,FROM_UNIXTIME(creattime)creattime,FROM_UNIXTIME(endtime)endtime,collectedby,(case status when 0 then '未取' when 2 then '待取' else '已取'end)status,remark from ims_wine_store_list where 1=1 {$where} ");
	    include $this->template("storageList");
	}
	
	
	
}