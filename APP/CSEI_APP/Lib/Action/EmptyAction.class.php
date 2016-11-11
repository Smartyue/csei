<?php
/*
 * 空模块
 */
class EmptyAction extends Action{
	public function index(){
		//跳转至404页面
		redirect(U('Common/notfind'));
	}
}