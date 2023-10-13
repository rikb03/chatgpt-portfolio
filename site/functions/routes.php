<?php

function routing(){

    $routes = [
        "/" => "controllers/index.php",
        "/about" => "controllers/about.php",
        "/404" => "controllers/404.php"
    ];

    if(array_key_exists($_SERVER['REQUEST_URI'], $routes)) {
        require $routes[$_SERVER['REQUEST_URI']];
    } else {
        // echo "404";
        require $routes['/404'];
    };
}