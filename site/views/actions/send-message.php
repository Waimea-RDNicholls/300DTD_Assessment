<?php 

require_once 'lib/db.php';

consoleLog($_POST, 'Form Data');

// Grab message data
$title = $_POST['title'];
$text = $_POST['text'];
$target = $_POST['target'];
$sender = $_POST['sender'];


$db = connectToDB();

// Insert message into database
$query = 'INSERT INTO messages (title, text, target, sender)
            VALUES (?, ?, ?, ?)';

$stmt = $db->prepare($query);
$stmt->execute([$title, $text, $target, $sender]);

echo '<h2>Message sent!</h2>';
header('HX-Redirect: ' . SITE_BASE . '/messages');
