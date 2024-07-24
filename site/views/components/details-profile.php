<?php
require_once 'lib/db.php';
$id = $_SESSION['user']['id'];

$db = connectToDB();
$query = 'SELECT description, preferences FROM users WHERE id = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $user = $stmt->fetch();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Connect', ERROR);
    die('There was an error when connecting to the database');
}
echo '<div id="userinfo">';
echo '<p>'.$user['preferences'].'</p>';
echo '<p>'.$user['description'].'</p>';
echo '<button   hx-trigger="click"
                hx-get="/formuseredit/'.$id.'"
                hx-target="#userinfo">
                Edit Profile </button>';
echo '</div>';

?>