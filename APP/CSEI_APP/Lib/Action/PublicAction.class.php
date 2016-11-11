<?php
class PublicAction extends Action{
	#公共模板
	
	
	#版权信息
	public function copyright(){
		$this->display();
	}
	#底部信息
	public function footer(){
		$this->display();
	}
	#设置
	public function settings(){
		$this->display();
	}
	#搜索
	public function search_form(){
		$this->display();
	}
	#头部
	public function header(){
		$this->display();
	}
}