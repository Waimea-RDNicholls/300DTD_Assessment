<?php
require_once 'lib/db.php';
$db = connectToDB();
$query = 'SELECT title, text, sender FROM messages WHERE id = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $message = $stmt->fetch();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}

echo '<h id=msg_details_title>'.$message['title'].'</h>';
echo '<p id=msg_details_text>'.$message['text'].'</p>';
echo '<p
hx-trigger="click"
hx-get="/messageform/'.$message['sender'].'"
hx-target="#view-messages">Send a reply!</p>';
echo '<button hx-get="/messagelist"
hx-trigger="click"
hx-target="#view-messages"
hx-swap="innerHTML">Back</button>';
?>