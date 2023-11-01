<?php

define('PATH_DIR', 'http://localhost/WebAvancee22635-Fernanda/tp2/tp2_sansGit/');
require_once('controller/Controller.php');
require_once('library/View.php');
require_once('library/RequirePage.php');
require_once __DIR__.'/vendor/autoload.php';
require_once('library/Twig.php');

// entender melhor o explode e o path_info
$url = isset($_SERVER['PATH_INFO'])? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';
print_r ($url);

if ($url == '/') {
    require_once('controller/ControllerHome.php');
    $controller = new ControllerHome;
    echo $controller->index();
} else {
    //controller
    $requestURL = $url[0];
    //echo $requestURL;
    $requestURL = ucfirst($requestURL);
    //echo $requestURL;
    $controllerPath = __DIR__ . "/controller/Controller" . $requestURL . ".php";
    echo $controllerPath;
    
    if (file_exists($controllerPath)) {
        require_once($controllerPath);
        $controllerName = 'Controller' . $requestURL;
        $controller = new $controllerName;
        if (isset($url[1])) {
            $method = $url[1];
            if (isset($url[2])) {
                echo $controller->$method($url[2]); 
            } else {
                echo $controller->$method();
            }
        } else {
            echo $controller->index();
            echo "aqui";
        }
    } else {
        require_once('controller/ControllerHome.php');
        $controller = new ControllerHome;
        echo $controller->error('404');
    }
}
?>