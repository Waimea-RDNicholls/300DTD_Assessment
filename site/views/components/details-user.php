<?php
require_once 'lib/db.php';
$db = connectToDB();
// Grab selected user's info
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

// Display info
echo '<h>'.$user['username'].'</h>';
echo '<p>'.$user['description'].'</p>';
// Send message to selected user
echo '<p
hx-trigger="click"
hx-get="/messageform/'.$id.'"
hx-target="#filter-list">Send a message!</p>';

    // Back button
    echo '<button hx-get="/filterlist"
    hx-trigger="click"
    hx-target="#view-filter"
    hx-swap="innerHTML">Back</button>';

?>