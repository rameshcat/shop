<?php

class Router
{

    private $routes;

    public function __construct()
    {

        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * @return string
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }

    }

    public function run()
    {

        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $internalRoute);
                $viewController = array_shift($segments);
                $controllerName = $viewController . 'Controller';
                $controllerName = ucfirst($controllerName);
                $viewAction = array_shift($segments);
                $actionName = 'action' . ucfirst($viewAction);

                if (strpos($viewController,'admin')!==false){
                    $viewController=strtolower(str_replace('admin','',$viewController));
                    $template = ROOT . '/views/admin/' . $viewController . $viewAction . '.php';
                }else $template = ROOT . '/views/' . $viewController . '/' . $viewAction . '.php';

                $parameters = $segments;


                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                $view = new View();
                $view->getView($result, $template);

                if ($result !== null) {
                    break;
                }

            }
        }


    }
}