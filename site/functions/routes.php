<?php
// Function to route to the correct controller based on the URL
// Array with routes
$routes = [
    "/" => "controllers/index.php",
    "/404" => "controllers/404.php",
    "/details" => "controllers/details.php",
    "/login" => "controllers/login.php",
    "/edit" => "controllers/userdetails.php",
    "/changepassword" => "controllers/passwordchange.php",
    "/admin" => "controllers/admin.php",
    "/authenticate" => "controllers/authenticate.php",
    "/signup" => "controllers/signup.php",
    "/logout" => "controllers/logout.php",
    "/test" => "test.php"
];
// Check if the URL exists in the array and require the correct controller else require the 404 controller
if(array_key_exists($_SERVER['REQUEST_URI'], $routes)) {
    // If the URL exists in the array require the correct controller
    require $routes[$_SERVER['REQUEST_URI']];
} 
elseif(str_contains($_SERVER['REQUEST_URI'], "?id")){
    // If the URL contains '?id' remove it from the URL and require the correct controller
    $uri = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], "?id"));
    require $routes[$uri];
}
else {
    // If the URL doesn't exist in the array throw a 404 error
    // echo "404";
    // require $routes['/404'];
    http_response_code(404);
};
?>