<?php
require_once 'lib/db.php';

// Grab id of logged in user
$id = $_SESSION['user']['id'];
$db = connectToDB();

// Grab details of the user currently signed in
$query = 'SELECT description, preferences FROM users WHERE id = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $user = $stmt->fetch();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}
// Display profile details
echo '<div id="userinfo">';
echo '<p>Boardgame you\'re looking to play: '.$user['preferences'].'</p>';
echo '<p>'.$user['description'].'</p>';

// Create form to allow profile edit
echo '<button   hx-trigger="click"
                hx-get="/formuseredit/'.$id.'"
                hx-target="#profile">
                Edit Profile </button>';
echo '</div>';

// Display all users schedules
echo '<article id="view-schedule"
hx-get="/viewschedule/'.$id.'"
hx-trigger="load">
Loading schedules...
</article>';

// Allow user to create new schedule
echo '<div id="scheduling">';
echo '<button
    hx-get="/scheduleform"
    hx-trigger="click"
    hx-target="#profile"
    hx-swap="innerHTML">Create a Schedule!</button>';
echo '</div>';

?>