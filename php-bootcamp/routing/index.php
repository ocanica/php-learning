<?php

require 'vendor/autoload.php';
$query = include 'core/bootstrap.php';

use App\Core\{Router, Request};

Router::load('routes.php')
    ->direct(Request::uri(), Request::method());
