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



// to do
// give every message it's own box to stand out more ideally

foreach($messages as $message) {

    // Allow user to view more message details on click
    echo '<article id="msg_list"
    hx-trigger="click"
    hx-get="/viewmessage/'.$message['id'].'"
    hx-target="#view-messages"
    hx-swap="innerHTML"
    
    >';
    echo '<h>'.$message['username'].'</h>';
    echo '<p>'.$message['title'].'</p>';

    // Delete message
    echo '<button 
    hx-delete="/delete_message/'.$message['id'].'"
    hx-trigger="click"
    hx-target="#view-messages"
    hx-swap="innerHTML">X</button>';
    echo '</article>';
}
if ($messages == NULL) {
    echo '<p>You have no messages.<p>';
}
?>