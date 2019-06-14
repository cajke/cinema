<?php

class Bootstrap {

	function __construct() {
	    if(isset($_GET['username']) && isset($_GET['code']) && !empty($_GET['username']) && !empty($_GET['code'])){
            require 'controllers/registration.php';
            $controller = new Registration();
            $controller->loadModel('registration');
            $controller->emailConfirmation($_GET['username'],$_GET['code']);
            return false;
        }else{
            $url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            //print_r($url);

            if (empty($url[0])) {
                require 'controllers/home.php';
                $controller = new Home();
                $controller->index();
                return false;
            }

            $file = 'controllers/' . $url[0] . '.php';
            if (file_exists($file)) {
                require $file;
            } else {
                $this->error();
                return false;
            }

            $controller = new $url[0];
            $controller->loadModel($url[0]);

            // calling methods
            if (isset($url[2])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}($url[2]);
                } else {
                    $this->error();
                }
            } else {
                if (isset($url[1])) {
                    if (method_exists($controller, $url[1])) {
                        $controller->{$url[1]}();
                    } else {
                        $this->error();
                    }
                } else {
                    $controller->index();
                }
            }
        }
	}
	
	function error() {
		require 'controllers/error.php';
		$controller = new ErrorC();
		$controller->index();
		return false;
	}

}