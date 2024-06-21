<?php 

require_once 'lib/db.php';

consoleLog($_POST, 'Form Data');

$userid = $_SESSION['user']['id'];
$day = $_POST['day'];
$start = $_POST['start'];
$end = $_POST['end'];


$db = connectToDB();

$query = 'INSERT INTO times (userid, day, start_time, end_time)
            VALUES (?, ?, ?, ?)';

$stmt = $db->prepare($query);
$stmt->execute([$userid, $day, $start, $end]);

echo '<h2>Schedule created!</h2>';
