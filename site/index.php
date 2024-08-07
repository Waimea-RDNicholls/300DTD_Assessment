<?php

//-------------------------------------------------------------
// Libraries
require_once 'lib/debug.php';
require_once 'lib/router.php';
require_once 'lib/db.php';


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


// If user logged in...
if ($isLoggedIn == true) {
$db = connectToDB();

// Grab all messages sent to user
$query = 'SELECT id
FROM messages
WHERE target = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$_SESSION['user']['id']]);
    $messages = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}

// Tally total amount of messages sent to user for use in nav display
$_SESSION['msg']['amount'] = 0;
foreach($messages as $message) {
    $_SESSION['msg']['amount'] += 1;
}

}


//-------------------------------------------------------------
// Define routes

$router->route(GET, PAGE, '/',      'pages/home.php');
$router->route(GET, PAGE, '/profile',      'pages/profile.php');
$router->route(GET, PAGE, '/filter',      'pages/filter.php');
$router->route(GET, PAGE, '/messages',      'pages/messages.php');

// All form routes
$router->route(GET, HTMX, '/register',    'components/form-create-user.php');
$router->route(GET, HTMX, '/login',    'components/form-login-user.php');
$router->route(GET, HTMX, '/scheduleform',    'components/form-create-schedule.php');
$router->route(GET, HTMX, '/messageform/$id', 'components/form-send-message.php');
$router->route(GET, HTMX, '/formuseredit/$id',    'components/form-edit-user.php');

// List routes
$router->route(GET, HTMX, '/filterlist', 'components/list-filter.php');
$router->route(GET, HTMX, '/messagelist', 'components/list-messages.php');

// [thing] detail routes
$router->route(GET, HTMX, '/viewschedule/$userid',    'components/list-schedule.php');
$router->route(GET, HTMX, '/validtimes/$userid',    'components/details-schedule-others.php');
$router->route(GET, HTMX, '/viewmessage/$id',    'components/details-message.php');
$router->route(GET, HTMX, '/user/$id', 'components/details-user.php');
$router->route(GET, HTMX, '/userdetails',    'components/details-profile.php');


// Do create/delete/edit
$router->route(POST,   HTMX, '/do_register',          'actions/create-user.php');
$router->route(POST,   HTMX, '/do_login',          'actions/login-user.php');
$router->route(POST,   HTMX, '/send_message',          'actions/send-message.php');
$router->route(POST,   HTMX, '/create_schedule',          'actions/create-schedule.php');

$router->route(PUT,   HTMX, '/do_edit/$id',          'actions/edit-user.php');
$router->route(DELETE,   HTMX, '/delete_message/$id',          'actions/delete-message.php');
$router->route(DELETE,   HTMX, '/delete_schedule/$id',          'actions/delete-schedule.php');




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
