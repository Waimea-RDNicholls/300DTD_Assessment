<?php 

require_once 'lib/db.php';

consoleLog($_POST, 'Form Data');

$title = $_POST['title'];
$text = $_POST['text'];
$target = $_POST['target'];
$sender = $_POST['sender'];


$db = connectToDB();

$query = 'INSERT INTO messages (title, text, target, sender)
            VALUES (?, ?, ?, ?)';

$stmt = $db->prepare($query);
$stmt->execute([$title, $text, $target, $sender]);

echo '<h2>Message sent!</h2>';
