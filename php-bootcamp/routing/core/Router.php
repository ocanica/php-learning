<?php

class Router {
    public $routes = [

        'GET' => [],
        'POST' => []

    ];

    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType) {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->routes[$requestType][$uri];
        }
        throw new Exception('No routes defined for this URI');
    }

    public static function load($file) {
        $router = new static; // Create new instance of $router i.e.: $router = new Router
        require $file;
        return $router;
    }

}