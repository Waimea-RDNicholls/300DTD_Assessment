<?php 

require_once 'lib/db.php';

consoleLog($_POST, 'Form Data');

// Grab data from signup form
$user = $_POST['user'];
$pass = $_POST['pass'];
$description = $_POST['desc'];
$preferences = $_POST['preference'];
$type = $_POST['type'];
$continent = $_POST['continent'];

$hash = password_hash($pass, PASSWORD_DEFAULT);

// Connect to database and insert user information
$db = connectToDB();

$query = 'INSERT INTO users (username, hash, type, continent, preferences, description)
            VALUES (?, ?, ?, ?, ?, ?)';

$stmt = $db->prepare($query);
$stmt->execute([$user, $hash, $type, $continent, $preferences, $description]);

echo '<h2>Account created!</h2>';
header('HX-Redirect: ' . SITE_BASE . '/');