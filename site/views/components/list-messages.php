<?php
require_once 'lib/db.php';
$db = connectToDB();
$target = $_SESSION['user']['id'];

$query = 'SELECT messages.title, messages.id, users.username FROM messages
 INNER JOIN users ON messages.sender = users.id
WHERE target = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$target]);
    $messages = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}


echo '<ul>';

foreach($messages as $message) {
    echo '<p
    hx-trigger="click"
    hx-get="/viewmessage/'.$message['id'].'"
    hx-target="#view-messages"
    hx-swap="innerHTML"
    
    >'.$message['title'].' from '.$message['username'].'</p>';
}
echo '</ul>';
?>