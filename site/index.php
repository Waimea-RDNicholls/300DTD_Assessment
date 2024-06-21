<?php

//-------------------------------------------------------------
// Libraries
require_once 'lib/debug.php';
require_once 'lib/router.php';


//-------------------------------------------------------------
// Site Configuration
const SITE_NAME  = 'GameLinker';
const SITE_OWNER = 'Riley Nicholls';


//-------------------------------------------------------------
// Initialise the router
$router = new Router(['debug' => true]);


//-------------------------------------------------------------
// Define routes

$router->route(GET, PAGE, '/',      'pages/home.php');

// Homepage when not logged in, register/login routes
$router->route(GET, HTMX, '/register',    'components/form-create-user.php');
$router->route(GET, HTMX, '/login',    'components/form-login-user.php');

$router->route(POST,   HTMX, '/do_register',          'actions/create-user.php');
$router->route(POST,   HTMX, '/do_login',          'actions/login-user.php');


$router->route(GET, PAGE, '/about', 'pages/about.php');



// copyable versions for easy access
// $router->route(GET, PAGE, '/about', 'pages/about.php');
// $router->route(GET, PAGE, '/osu', 'pages/osu.php');
// $router->route(GET, HTMX, '/osu',    'components/list-things.php');
// $router->route(GET, HTMX, '/osu/$id', 'components/details-thing.php');
// $router->route(GET, HTMX, '/osuform',    'components/form-things.php');
// $router->route(POST,   HTMX, '/osuform',          'actions/add-thing.php');
// $router->route(DELETE, HTMX, '/osudelete/$id',      'actions/delete-thing.php');
// $router->route(PUT,    HTMX, '/osu/$id',      'actions/update-thing.php');


//-------------------------------------------------------------
// Generate the required view
$router->view();

?>
