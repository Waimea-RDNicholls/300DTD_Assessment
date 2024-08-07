<?php 

require_once 'lib/db.php';

consoleLog($_POST, 'Form Data');


// Get data from create schedule form
$start = $_POST['start'];
$end = $_POST['end'];
$day = $_POST['day'];



// Check if user has inputted invalid times (can't start after you stop)
if ($start >= $end) {
    echo '<div id="redo">';
    echo '<p>The end time must be greater than the start time.</p>';
    echo '<button hx-get="/scheduleform"
    hx-trigger="click"
    hx-target="#redo"
    hx-swap="outerHTML">Redo</button>';
    echo '</div>';
} else {



// Insert schedule into database
$userid = $_SESSION['user']['id'];
$db = connectToDB();

$query = 'INSERT INTO times (userid, day, start_time, end_time)
            VALUES (?, ?, ?, ?)';

$stmt = $db->prepare($query);
$stmt->execute([$userid, $day, $start, $end]);

echo '<h2>Schedule created!</h2>';

// Reload page to display new schedule
header('HX-Redirect: ' . SITE_BASE . '/profile');
}