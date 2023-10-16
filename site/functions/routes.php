<?php

function routing(){

    $routes = [
        "/" => "controllers/index.php",
        "/404" => "controllers/404.php",
        "/details" => "controllers/details.php",
        "/login" => "controllers/login.php",
        "/edit" => "controllers/userdetails.php",
        "/changepassword" => "controllers/passwordchange.php",
        "/admin" => "controllers/admin.php",
    ];

    if(array_key_exists($_SERVER['REQUEST_URI'], $routes)) {
        require $routes[$_SERVER['REQUEST_URI']];
    } else {
        // echo "404";
        require $routes['/404'];
    };
}