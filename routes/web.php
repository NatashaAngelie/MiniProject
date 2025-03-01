<?php
class Router {
    public function route($url) {
        switch($url) {
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
            
            default:
                header("HTTP/1.0 404 Not Found");
                echo "Page not found";
                break;
        }
    }
}