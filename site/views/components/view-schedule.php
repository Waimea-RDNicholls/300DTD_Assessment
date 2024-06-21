<?php
require_once 'lib/db.php';
$db = connectToDB();


$query = 'SELECT * FROM times';

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $times = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}



echo '<ul>';
foreach($times as $time) {

    echo '<p>You can play on '.$time['day'] .' from '.$time['start_time'].' to '.$time['end_time'].'.</p>';
}
echo '</ul>';
?>