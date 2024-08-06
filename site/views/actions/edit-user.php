<?php 

require_once 'lib/db.php';

consoleLog($_PUT, 'Form Data');

$description = $_PUT['desc'];
$preferences = $_PUT['preference'];
$type = $_PUT['type'];
$continent = $_PUT['continent'];


$db = connectToDB();

$query = 'UPDATE users
          SET type = ?, continent = ?, preferences = ?, description = ?
          WHERE id = ?';

$stmt = $db->prepare($query);
$stmt->execute([$type, $continent, $preferences, $description, $id]);

echo '<h2>Account details updated!</h2>';
header('HX-Redirect: ' . SITE_BASE . '/profile');
