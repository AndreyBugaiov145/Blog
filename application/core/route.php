<?php

class Route
{

    static $routes;


    //Возвращям адрес запроса
    static function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    static function start()
    {
        // connect routes
        self::$routes = include(ROOT . '/application/config/routs.php');

        //get the request address
        $uri = self::getURI();

        foreach (self::$routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {
                $internaleRoute = preg_replace("~$uriPattern~", $path, $uri);
                //default controller

                $controllerName = 'Catalog';
                $modelName = 'Catalog';

                //Defining the name of the cantroller, parameters and action
                $segments = explode('/', $internaleRoute);
                if (!empty($segments[0])) {

                    $modelName = "model" . ucfirst($segments[0]);

                    $controllerName = ucfirst(array_shift($segments));
                }

                $controllerName = 'controller' . $controllerName;
                $actionName = 'action' . ucfirst(array_shift($segments));

                //include the file with the model class
                $modelFile = $modelName . '.php';
                $modelPath = ROOT . '/application/models/' . $modelFile;
                if (file_exists($modelPath)) {
                    include ROOT . '/application/models/' . $modelFile;
                }

                // include the file with the controller class
                $controllerFile = $controllerName . '.php';
                $controllerPath = ROOT . '/application/controllers/' . $controllerFile;
                if (file_exists($controllerPath)) {
                    include ROOT . "/application/controllers/" . $controllerFile;
                } else {
                    self::ErrorPage404();
                }

                //create the controller class
                $controller = new $controllerName();
                if (method_exists($controller, $actionName)) {
                    $controller->$actionName($segments);
                    break;
                } else {
                    self::ErrorPage404();
                }

            }
        }
    }

    static function ErrorPage404()
    {
        echo $_SERVER['HTTP_HOST'];
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        /* header('Location:' . $host . '404');*/
    }
}

?>