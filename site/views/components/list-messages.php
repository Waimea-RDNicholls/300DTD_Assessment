<?php
require_once 'lib/db.php';
$db = connectToDB();

// Grab all messages sent to logged in user
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


foreach($messages as $message) {

    // Allow user to view more message details on click
    echo '<article id="msg_list"
    hx-trigger="click"
    hx-get="/viewmessage/'.$message['id'].'"
    hx-target="#view-messages"
    hx-swap="innerHTML"
    
    >';
    echo '<h>From '.$message['username'].'</h>';
    echo '<p>Title: '.$message['title'].'</p>';

    // Delete message
    echo '<button 
    class="delete-button"
    hx-delete="/delete_message/'.$message['id'].'"
    hx-trigger="click"
    hx-target="#view-messages"
    hx-swap="innerHTML">X</button>';
    echo '</article>';
}

// Tell user if no messages
if ($messages == NULL) {
    echo '<p>You have no messages.<p>';
}
?>