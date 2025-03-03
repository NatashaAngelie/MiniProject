<?php
class Router {
    public function route($url) {
        switch($url) {
            case 'home':
                require_once 'app/controllers/HomeController.php';
                $controller = new HomeController();
                $controller->index();
                break;
            
            case 'admin':
                require_once 'app/controllers/HomeController.php';
                $controller = new HomeController();
                $controller->admin();
                break;
            
            case 'save':
                require_once 'app/controllers/SavingController.php';
                $controller = new SavingController();
                $controller->index();
                break;

            case 'login':
                require_once 'app/controllers/AuthController.php';
                $controller = new AuthController();
                $controller->login();
                break;
            
            case 'register':
                require_once 'app/controllers/AuthController.php';
                $controller = new AuthController();
                $controller->register();
                break;

            case 'logout':
                require_once 'app/controllers/AuthController.php';
                $controller = new AuthController();
                $controller->logout();
                break;
            
            default:
                header("HTTP/1.0 404 Not Found");
                echo "Page not found";
                break;
        }
    }
}