<?php
// Function to route to the correct controller based on the URL
function routing(){
    // Array with routes
    $routes = [
        "/" => "controllers/index.php",
        "/404" => "controllers/404.php",
        "/details" => "controllers/details.php",
        "/login" => "controllers/login.php",
        "/edit" => "controllers/userdetails.php",
        "/changepassword" => "controllers/passwordchange.php",
        "/admin" => "controllers/admin.php",
    ];
    // Check if the URL exists in the array and require the correct controller else require the 404 controller
    if(array_key_exists($_SERVER['REQUEST_URI'], $routes)) {
        require $routes[$_SERVER['REQUEST_URI']];
    } 
    elseif(str_contains($_SERVER['REQUEST_URI'], "?id")){
        require $routes["/details"];
    }
    else {
        // echo "404";
        require $routes['/404'];
    };
}