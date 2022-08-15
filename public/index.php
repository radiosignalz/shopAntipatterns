
<!--Here will be a little description soon  -->
<?php

session_start();

use app\engine\Autoload;
use app\models\{Product, User};
use app\engine\Render;
use app\engine\Request;


//TODO добавьте абсолютные пути
include "../engine/Autoload.php";
include "../config/config.php";

spl_autoload_register([new Autoload(), 'loadClass']);
require_once '../../vendor/autoload.php';

$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    die("Нет такого контроллера");
}



