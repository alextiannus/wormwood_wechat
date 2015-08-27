<?php
/**
 * Singer Management模块处理程序
 *
 * @author GS
 * @url http://bbs.wormwood.sg
 */
defined('IN_IA') or exit('Access Denied');

class SingerListModuleProcessor extends WeModuleProcessor {
	public function respond() {
		$content = $this->message['content'];
		//这里定义此模块进行消息处理时的具体过程, 请查看WORMWOOD文档来编写你的代码
	}
}