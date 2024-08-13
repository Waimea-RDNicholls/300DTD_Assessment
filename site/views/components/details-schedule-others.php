<?php 
require_once 'lib/db.php';



$db = connectToDB();

// Grab all of current user's schedules
$id = $_SESSION['user']['id'];
$query = 'SELECT start_time, end_time FROM times WHERE userid = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $ownSchedules = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}

    // Grab selected users details and all their schedules
    $query = 'SELECT times.start_time, times.end_time, times.userid, times.day, users.username FROM times
    INNER JOIN users ON times.userid = users.id
    WHERE userid = ?
    ORDER BY times.userid DESC';

    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$userid]);
        $otherSchedules = $stmt->fetchAll();
    }
    catch (PDOException $e) {
        consoleLog($e->getMessage(), 'DB Connect', ERROR);
        die('There was an error when connecting to the database');
    }   


    // Compare every schedule the selected user has to every schedule the logged in user has
    foreach($otherSchedules as $otherSchedule) {

        foreach($ownSchedules as $ownSchedule) {
    
            // Display if the users schedules have an overlap in availability
            if ($ownSchedule['end_time'] >= $otherSchedule['start_time'] &&   $ownSchedule['start_time'] <= $otherSchedule['end_time']) {
                echo '<article
                id="filter-list"
                hx-trigger="click"
                hx-get="/user/'.$otherSchedule['userid'].'"
                hx-target="#view-filter">'.$otherSchedule['username'].' can play on 
                '.$otherSchedule['day'].' from '.$otherSchedule['start_time'].' to '.$otherSchedule['end_time'].'.</article>';
            }
        }


    }
    // Back button
    echo '<button hx-get="/filterlist"
    hx-trigger="click"
    hx-target="#view-filter"
    hx-swap="innerHTML">Back</button>';
    

?>