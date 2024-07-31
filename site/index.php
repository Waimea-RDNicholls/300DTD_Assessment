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


// Create a session
session_name('Website');
session_start();

// Check which type of user we are
$userName   = $_SESSION['user']['name']     ?? 'Guest';
$isLoggedIn = $_SESSION['user']['loggedIn'] ?? false;
$_SESSION['page'] = $_SERVER['HTTP_REFERER'];




//-------------------------------------------------------------
// Define routes

$router->route(GET, PAGE, '/',      'pages/home.php');
$router->route(GET, PAGE, '/profile',      'pages/profile.php');
$router->route(GET, PAGE, '/filter',      'pages/filter.php');
$router->route(GET, PAGE, '/messages',      'pages/messages.php');

// Homepage when not logged in, register/login routes
$router->route(GET, HTMX, '/register',    'components/form-create-user.php');
$router->route(GET, HTMX, '/login',    'components/form-login-user.php');
$router->route(GET, HTMX, '/scheduleform',    'components/form-create-schedule.php');

$router->route(GET, HTMX, '/filterlist', 'components/list-filter.php');
$router->route(GET, HTMX, '/messagelist', 'components/list-messages.php');

$router->route(GET, HTMX, '/user/$id', 'components/details-user.php');
$router->route(GET, HTMX, '/messageform/$id', 'components/form-send-message.php');
$router->route(GET, HTMX, '/viewschedule/$userid',    'components/view-schedule.php');
$router->route(GET, HTMX, '/viewmessage/$id',    'components/details-message.php');
$router->route(GET, HTMX, '/formuseredit/$id',    'components/form-edit-user.php');


$router->route(GET, HTMX, '/userdetails',    'components/details-profile.php');

$router->route(POST,   HTMX, '/do_register',          'actions/create-user.php');
$router->route(POST,   HTMX, '/do_login',          'actions/login-user.php');
$router->route(POST,   HTMX, '/send_message',          'actions/send-message.php');
$router->route(POST,   HTMX, '/create_schedule',          'actions/create-schedule.php');

$router->route(PUT,   HTMX, '/do_edit/$id',          'actions/edit-user.php');




$router->route(GET, PAGE, '/about', 'pages/about.php');
$router->route(GET, PAGE, '/logout', 'actions/logout-user.php');



// copyable versions for easy access
// $router->route(GET, PAGE, '/about', 'pages/about.php');
// $router->route(GET, PAGE, '/thing', 'pages/osu.php');
// $router->route(GET, HTMX, '/thing',    'components/list-things.php');
// $router->route(GET, HTMX, '/thing/$id', 'components/details-thing.php');
// $router->route(GET, HTMX, '/thingform',    'components/form-things.php');
// $router->route(POST,   HTMX, '/thingform',          'actions/add-thing.php');
// $router->route(DELETE, HTMX, '/thingdelete/$id',      'actions/delete-thing.php');
// $router->route(PUT,    HTMX, '/thing/$id',      'actions/update-thing.php');


//-------------------------------------------------------------
// Generate the required view
$router->view();

?>
