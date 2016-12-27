<?php
class Router
{
	public function process()
	{
		if (isset($_GET['route']) && !empty($_GET['route'])) {
			$urlParts = explode('/', trim($_GET['route'], '/'));

			$controllerName = ucfirst(strtolower(array_shift($urlParts))) . 'Controller';
			$action = array_shift($urlParts);
			$args = array_shift($urlParts);

			if (class_exists($controllerName, true)) {
				$controller = new $controllerName();
			} else {
                $controller = new NewsController();
                $controller->filter();
            }

			if (method_exists($controller, $action)) {
				$controller->$action($args);
			} else {
                $controller = new NewsController();
                $controller->filter();
            }
		} else {
            $controller = new NewsController();
            $controller->filter();
        }
	}
}
