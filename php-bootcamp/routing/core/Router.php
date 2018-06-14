<?php

class Router {
    protected $routes = [];

    public function define($routes) {
        $this->routes = $routes;
    }

    public function direct($uri) {
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        }

        throw Exception('No routes defined for this URI');
    }

    public static function load($file) {
        require $file;
    }

}