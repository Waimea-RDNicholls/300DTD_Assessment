<?php 

require_once 'lib/db.php';

consoleLog($_POST, 'Form Data');


// Get data from create schedule form
$start = $_POST['start'];
$end = $_POST['end'];
$day = $_POST['day'];


$userid = $_SESSION['user']['id'];

$db = connectToDB();

// Grab day of every user's schedule...
$query = 'SELECT day FROM times WHERE userid = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$userid]);
    $times = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}

// Tracking variable for if form data valid
$canDo = 1;
// Check if user has inputted invalid times (can't start after you stop)
if ($start >= $end) {
    echo '<div id="redo">';
    echo '<p>The end time must be greater than the start time.</p>';
    echo '<button hx-get="/scheduleform"
    hx-trigger="click"
    hx-target="#redo"
    hx-swap="outerHTML">Redo</button>';
    echo '</div>';
    $canDo = 0;
}
// Check if user already has a schedule on this day
if ($canDo == 1) {
    foreach ($times as $time) {
        if ($day == $time['day']) {
            echo '<div id="redo">';
            echo '<p>You already have a schedule on this day.</p>';
            echo '<button hx-get="/scheduleform"
            hx-trigger="click"
            hx-target="#redo"
            hx-swap="outerHTML">Redo</button>';
            echo '</div>';
            $canDo = 0;
            break 1;

        }
    }
}






// Insert schedule into database
if ($canDo == 1) {  
$query = 'INSERT INTO times (userid, day, start_time, end_time)
            VALUES (?, ?, ?, ?)';

$stmt = $db->prepare($query);
$stmt->execute([$userid, $day, $start, $end]);

echo '<h2>Schedule created!</h2>';

// Reload page to display new schedule
header('HX-Redirect: ' . SITE_BASE . '/profile');
}