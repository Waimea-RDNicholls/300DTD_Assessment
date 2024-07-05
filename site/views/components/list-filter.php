<?php
require_once 'lib/db.php';
$db = connectToDB();

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



$type = $_SESSION['user']['type'];

$continent = $_SESSION['user']['continent'];

$preferences = $_SESSION['user']['preferences'];


$query = 'SELECT id, username, type, continent FROM users WHERE type = ?
AND continent = ?
AND preferences LIKE ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$type, $continent, $preferences]);
    $users = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}


$query = 'SELECT times.start_time, times.end_time, times.userid, users.username FROM times
INNER JOIN users ON times.userid = users.id
 WHERE userid !=?
 ORDER BY times.userid DESC';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $otherSchedules = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}
echo '<ul id="filter-list">';
// foreach($ownSchedules as $ownSchedule) {
//     foreach($otherSchedules as $otherSchedule) {

//         if ($ownSchedule['end_time'] >= $otherSchedule['start_time'] &&   $ownSchedule['start_time'] <= $otherSchedule['end_time']) {
//             echo '<li
//             hx-trigger="click"
//             hx-get="/user/'.$otherSchedule['userid'].'"
//             hx-target="#filter-list">'.$otherSchedule['username'].'</li>';
//             echo '<p>Start time: '.$otherSchedule['start_time'].' End time: '.$otherSchedule['end_time'].'</p>'; 
//         }
//     }


    foreach($otherSchedules as $otherSchedule) {
        foreach($ownSchedules as $ownSchedule) {
    
            if ($ownSchedule['end_time'] >= $otherSchedule['start_time'] &&   $ownSchedule['start_time'] <= $otherSchedule['end_time']) {
                echo '<li
                hx-trigger="click"
                hx-get="/user/'.$otherSchedule['userid'].'"
                hx-target="#filter-list">'.$otherSchedule['username'].'</li>';
                echo '<p>Start time: '.$otherSchedule['start_time'].' End time: '.$otherSchedule['end_time'].'</p>'; 
            }
        }
// https://stackoverflow.com/questions/71471414/foreach-loop-inside-loop-is-it-possible-to-sort-the-results
// Use this principle to see if we can sort the filtered list by user overall, rather than "once for every schedule."

}






// foreach($users as $user) {
//     if ($user['id'] != $_SESSION['user']['id']) {
//         $userid = $user['id'];
//         $query = 'SELECT start_time, end_time FROM times WHERE userid = ?';
//         try {
//             $stmt = $db->prepare($query);
//             $stmt->execute([$userid]);
//             $schedules = $stmt->fetchAll();
//         }
//         catch (PDOException $e) {
//             consoleLog($e->getMessage(), 'DB Connect', ERROR);
//             die('There was an error when connecting to the database');
//         }

    

        // $ownSchedule['end_time'] => $schedule['start_time']
        // foreach($schedules as $schedule && $ownSchedules as $ownSchedule) {
        // if ($ownSchedule['end_time'] >= $schedule['start_time'] &&   $ownSchedule['start_time'] <= $schedule['end_time']) {
        //     echo '<li
        //     hx-trigger="click"
        //     hx-get="/user/'.$user['id'].'"
        //     hx-target="#filter-list">'.$user['username'].'</li>';
        //     echo '<p>Start time: '.$schedule['start_time'].' End time: '.$schedule['end_time'].'</p>';
        // }

    // }
//     }
// }
echo '</ul>';
?>