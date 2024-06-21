<?php
require_once 'lib/db.php';
$db = connectToDB();

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

foreach($users as $user) {
    if ($user['id'] != $_SESSION['user']['id']) {
    echo '<li>'.$user['username'].'</li>';
    }
}
echo '</ul>';
?>