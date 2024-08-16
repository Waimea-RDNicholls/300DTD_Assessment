<?php
require_once 'lib/db.php';
$db = connectToDB();


// Grab logged in user's schedules
$id = $_SESSION['user']['id'];
$query = 'SELECT start_time, end_time, day FROM times WHERE userid = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $ownSchedules = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}

// Grab all other user details
$query = 'SELECT type, continent, preferences FROM users WHERE id = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $userDetails = $stmt->fetch();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}




$type = $userDetails["type"];
$continent = $userDetails['continent'];
$preferences = $userDetails['preferences'];


// Grab every other user who is same type of gamer, from same continent, and has same preferences
// As long as they're a different user
$query = 'SELECT id, username, type, continent FROM users 
WHERE type = ?
AND continent = ?
AND preferences = ?
AND id != ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$type, $continent, $preferences, $id]);
    $users = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}
consoleLog($users);

$hasSchedule = 0; // Tracking variable to determine if users have ever had cross-matching schedules

// Grab each user's individual info
foreach($users as $user) {

    $query = 'SELECT times.start_time, times.end_time, times.userid, times.day, users.username FROM times
    INNER JOIN users ON times.userid = users.id
    WHERE userid = ?
    ORDER BY times.userid DESC';

    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$user['id']]);
        $otherSchedules = $stmt->fetchAll();
    }
    catch (PDOException $e) {
        consoleLog($e->getMessage(), 'DB Connect', ERROR);
        die('There was an error when connecting to the database');
    }   
    // Compare logged in user's schedules to other users schedules
    foreach($otherSchedules as $otherSchedule) {

        foreach($ownSchedules as $ownSchedule) {

            // If users have an overlap in availability...
            if ($ownSchedule['end_time'] >= $otherSchedule['start_time'] &&   $ownSchedule['start_time'] <= $otherSchedule['end_time']) {

                // On the same day...
                if ($ownSchedule['day'] == $otherSchedule['day']) {
                // Display their name as a valid option to click
                    echo '<article
                    id="filter-list"
                    hx-trigger="click"
                    hx-get="/validtimes/'.$otherSchedule['userid'].'"
                    hx-target="#view-filter">Click to view '.$otherSchedule['username'].'\'s valid schedules!</article>'; 
                    $hasSchedule = 1;
                    break 3;
                }
        }
        }

    }
}
// If no valid cross-matching schedules, state so
if ($hasSchedule == 0) {
    echo '<p>No-one matches your schedule and/or preferences.<p>';
}

?>