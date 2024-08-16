<?php 

require_once 'lib/db.php';

// Debug info
// consoleLog($_PUT, 'Form Data');

// Grab data from form
$description = $_PUT['desc'];
$preferences = $_PUT['preference'];
$type = $_PUT['type'];
$continent = $_PUT['continent'];


$db = connectToDB();

// Replace old user information with new user data
$query = 'UPDATE users
          SET type = ?, continent = ?, preferences = ?, description = ?
          WHERE id = ?';

$stmt = $db->prepare($query);
$stmt->execute([$type, $continent, $preferences, $description, $id]);

echo '<h2>Account details updated!</h2>';
// Update page to show changes
header('HX-Redirect: ' . SITE_BASE . '/profile');
