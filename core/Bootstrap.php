<?php
namespace core;
class Bootstrap {
	public static function run(){
		session_start();
		self::parseUrl();
	}

	//分析URL生成控制器方法常量
	public static function parseUrl(){
		if (isset($_GET['s'])) {
			//分析S变量生成控制器方法
			$info = explode('/',$_GET['s']);
			$class = '\web\controller\\'.ucfirst($info[0]);
			$action = $info[1];
		}else{
			$class = "\web\controller\Index";
			$action = "show";
		}
		$data = new $class;
		echo $data -> $action();
		// dd($_SERVER);
	}
}