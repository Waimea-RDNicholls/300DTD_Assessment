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
https://stackoverflow.com/questions/59648743/php-rename-key-in-associative-array
$ownSchedules[0]["user_start_time"] = $ownSchedules[0]["start_time"];
// unset($arr[0]["Order_no"]);

$ownSchedule = $ownSchedules[0];
print_r($ownSchedule);

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

echo '<ul id="filter-list">';

foreach($users as $user) {
    if ($user['id'] != $_SESSION['user']['id']) {
        $userid = $user['id'];
        $query = 'SELECT start_time, end_time FROM times WHERE userid = ?';
        try {
            $stmt = $db->prepare($query);
            $stmt->execute([$userid]);
            $schedules = $stmt->fetchAll();
        }
        catch (PDOException $e) {
            consoleLog($e->getMessage(), 'DB Connect', ERROR);
            die('There was an error when connecting to the database');
        }
        $schedule = $schedules[0];
        print_r($schedule);

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
    }
}
echo '</ul>';
?>