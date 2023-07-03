<?php
namespace classes;
class EntryPoint {
	private $routes;

	public function __construct(\functions\Routes $routes) {
		$this->routes = $routes;
	}
//run function to start the entrypoint
	public function run() {
		$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
		
		if($route==''){
			$route = $this->routes->getDefaultRoute();
		}

		list($controllerName, $functionName) = explode('/', $route);

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$functionName .= 'Submit';
		}

		$controller = $this->routes->getController($controllerName);

		$page = $controller->$functionName();

		$output = $this->loadTemplate('../templates/' . $page['template'], $page['contents']);

		$navbar = $this->loadTemplate('../templates/navbar.html.php', $page['contents']);
		$content = $this->loadTemplate('../templates/' . $page['template'], $page['contents']);
		$title = $page['title'];

		require '../templates/layout.html.php';
	}
//function to load the template
	public function loadTemplate($fileName, $templateVars) {
		extract($templateVars);
		ob_start();
		require $fileName;
		$contents = ob_get_clean();
		return $contents;
	}
}