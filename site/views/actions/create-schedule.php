<?php 

require_once 'lib/db.php';

consoleLog($_POST, 'Form Data');



$start = $_POST['start'];
$end = $_POST['end'];
if ($start >= $end) {
    echo '<div id="redo">';
    echo '<p>The end time must be greater than the start time.</p>';
    echo '<button hx-get="/scheduleform"
    hx-trigger="click"
    hx-target="#redo"
    hx-swap="outerHTML">Redo</button>';
    echo '</div>';
} else {



$userid = $_SESSION['user']['id'];
$day = $_POST['day'];




$db = connectToDB();

$query = 'INSERT INTO times (userid, day, start_time, end_time)
            VALUES (?, ?, ?, ?)';

$stmt = $db->prepare($query);
$stmt->execute([$userid, $day, $start, $end]);

echo '<h2>Schedule created!</h2>';
}