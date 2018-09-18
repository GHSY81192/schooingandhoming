<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function get_filepath_by_route_id($route_id,$file_name,$type=1)	//获取函数
{
	if (!$file_name) {
		$file_name = 'defalut.png';
	}
	$id = abs($route_id);
	$str = sprintf('%09d',$id);
	$dir1 = substr($str,0,3);
	$dir2 = substr($str,3,3);
	$dir3 = substr($str,6,3);
	$file = $dir1 . '/' . $dir2 . '/' . $dir3 . '/' . $file_name;
	//没有就显示默认的
	$lastNum = substr($route_id, -1,1);
	if (!file_exists(ROOTPATH.'upload/'.$file)) {
		switch ($type){
			case 1:
				$rand = rand(1,2);
				$file = 'default/school/default'.$rand.'.png';	//默认学校
				break;
			case 2:
				$file = 'default/home/'.$lastNum.'.png';	//默认住家
				break;
			case 3:
				$file = 'default/school_banner/1.png';	//默认学校banner大图
				break;
			case 4:
				$file = 'default/home_banner/1.png';	//默认住家banner大图
				break;
			case 5:
				$file = 'default/user/default.jpg';	//默认头像
				break;
		}
	}
	
	return $file;
}
function put_filepath_by_route_id($route_id,$file_name)	//上传函数
{
	$id = abs($route_id);
	$str = sprintf('%09d',$id);
	$dir1 = substr($str,0,3);
	$dir2 = substr($str,3,3);
	$dir3 = substr($str,6,3);
	$file = $dir1 . '/' . $dir2 . '/' . $dir3 . '/' . $file_name;
	return $file;
}