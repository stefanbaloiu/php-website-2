<?php
namespace functions;
class Routes implements \classes\Routes {
	//function to create controller objects
	public function getController($name) {
		require '../databaseLogin.php';
		$jobsTable = new \classes\DatabaseTable($pdo, 'job', 'id');
		$categoriesTable = new \classes\DatabaseTable($pdo, 'category', 'id');
		$userTable = new \classes\DatabaseTable($pdo, 'user', 'id');
		$controllers = [];
		$controllers['job'] = new \controllers\JobsController($jobsTable, $categoriesTable);
		$controllers['categories'] = new \controllers\CategoriesController($categoriesTable);
		$controllers['user'] = new \controllers\UserController($userTable, $categoriesTable, $jobsTable);
		
		return $controllers[$name];
		
	}
	//function to establish the default route
	public function getDefaultRoute(){
		return 'job/home';
	}
//function that checks if there's a user logged in on a route
	public function checkLogin($route){
		session_start();
		$loginRoutes = [];

		$loginRoutes['user/login'] = true;
		$loginRoutes['user/categoryList'] = true;

		$requiresLogin = $loginRoutes[$route] ?? false;

		if($requiresLogin && !isset($_SESSION['loggedin'])){
			header('location: /user/login');
			exit();
		}
	}
}