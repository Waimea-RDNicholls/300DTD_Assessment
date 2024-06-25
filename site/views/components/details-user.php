<?php
require_once 'lib/db.php';
$db = connectToDB();
$query = 'SELECT username, description FROM users WHERE id = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $user = $stmt->fetch();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}

echo '<h>'.$user['username'].'</h>';
echo '<p>'.$user['description'].'</p>';
echo '<p
hx-trigger="click"
hx-get="/messageform/'.$id.'"
hx-target="#filter-list">Send a message!</p>';


?>