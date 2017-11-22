<?php 
	//Duong dan toi he thong
	define('PATH_SYSTEM', __DIR__.'/system');
	define('PATH_APPLICATION', __DIR__.'/admin');

	//Lay thong so cau hinh
	require (PATH_SYSTEM . '/config/config.php');

	//Danh sach tham so gom controller & action
	$segments = array(
		'controller' => '', 
		'action'	 => array()
	);

	//Neu khong truyen controller thi lay controller action mac dinh
	$segments['controller'] = empty($_GET['c']) ? CONTROLLER_DEFAULT : $_GET['c'];
	$segments['action'] 	= empty($_GET['a']) ? ACTION_DEFAULT : $_GET['a'];

	//require controller
	require_once PATH_SYSTEM.'/core/FT_Controller.php';

	//Chay controller
	$controller = new FT_Controller();
	$controller->load($segments['controller'], $segments['action']);
?> 