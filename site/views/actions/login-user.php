<?php
require_once 'lib/db.php';

consoleLog($_POST, 'Form Data');

$user = $_POST['user'];
$pass = $_POST['pass'];


$db = connectToDB();
$query = 'SELECT * FROM users WHERE username = ?';

$stmt = $db->prepare($query);
$stmt->execute([$user]);
$userData = $stmt->fetch();

consoleLog($userData, 'DB Data');

// Did we get a user account?
if ($userData) {
    // Have an account, so check password
    if (password_verify($pass, $userData['hash'])) {
        // We got here, so user and password both fine
        $_SESSION['user']['loggedIn'] = true;
        // Save user data for future use
        // $_SESSION['user']['forename'] = $userData['forename'];
        // $_SESSION['user']['surname'] = $userData['surname'];
        // $_SESSION['user']['admin'] = $userData['admin'];
        // $_SESSION['user']['manager'] = $userData['manager'];
        // Go to home page
        // header('HX-Redirect: ' . SITE_BASE . '/home');
    }
    else {
        echo '<h2>Incorrect password.</h2>';
    }

}
else {
    echo '<h2>Sorry, that username does not exist.</h2>';
}
// header('HX-Redirect: ' . SITE_BASE . '/home');



