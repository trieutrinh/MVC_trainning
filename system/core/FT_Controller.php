<?php if (!defined('PATH_SYSTEM')) die ('Bad requisted!');
 	/**
 	* @filesource system/core/FT_Controller.php
 	*/
 	class FT_Controller
 	{
 		//Doi tuong view
 		protected $view = NULL;
 		protected $model = NULL;
 		protected $library = NULL;
 		protected $helper = NULL;
 		protected $config = NULL;
 		/**
 		* Ham khoi tao
 		* Load cac thu vien can thiet
 		*/
 		public function __construct()
 		{
 			# code...
 		}
 		// Ham chay ung dung
 		public function load($controller, $action) 
 		{
 			//Chuyen doi ten Controller vi no co dinh dang la {Name}_Controller
 			$controller = ucfirst(strtolower($controller)).'_Controller';
 			//Chuyen doi ten action vi no co dinh dang {name}Action
 			$action = strtolower($action).'Action';
 			//Kiem tra file co ton tai hay k
 			if(!file_exists(PATH_APPLICATION.'/controller/'.$controller.'.php')) {
 				die('Controller khong ton tai');
 			}
 			
 			require_once PATH_APPLICATION . '/controller/'.$controller.'.php';
 			//Kiem tra class controller co ton tai hay k
 			if (!class_exists($controller)) {
 				# code...
 				die('Controller khong ton tai');
 			}

 			//Khoi tao controller
 			$controllerObject = new $controller(); // $controllerObject = new {name}_Controller();

 			//Kiem tra action co ton tai hay k
 			if (!method_exists($controllerObject, $action)) {
 				# code...
 				die('Action khong ton tai');
 			}

 			//Goi toi action
 			$controllerObject->{$action}();
 		}
 	}

?>
