<?php
require_once 'lib/db.php';
$db = connectToDB();


$query = 'SELECT * FROM times WHERE userid = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$userid]);
    $times = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}



echo '<ul>';
foreach($times as $time) {
    echo '<li id="schedule-list">';

    echo '<p>You can play on '.$time['day'] .' from '.$time['start_time'].' to '.$time['end_time'].'.</p>';
    echo '<button hx-delete="/delete_schedule/'.$time['id'].'"
    hx-trigger="click"
    hx-target="#schedule-list"
    hx-swap="innerHTML">X</button>';
    echo '</li>';
}
echo '</ul>';
?>