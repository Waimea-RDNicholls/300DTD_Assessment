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
        $_SESSION['user']['name'] = $user;
        $_SESSION['user']['loggedIn'] = true;
        // Save user data for future use
        $_SESSION['user']['id'] = $userData['id'];
        $_SESSION['user']['continent'] = $userData['continent'];
        $_SESSION['user']['preferences'] = $userData['preferences'];
        $_SESSION['user']['type'] = $userData['type'];
        $_SESSION['user']['description'] = $userData['description'];

        // Go to home page
        header('HX-Redirect: ' . SITE_BASE . '/filter');
    }
    // Login failure? Show button to show login form again.
    else {
        echo '<h2>Incorrect password.</h2>';
    
        echo '<button
        hx-get="/login"
        hx-replace="innerHTML"
        hx-target="#not_logged_in"
        hx-trigger="click"
        >Try Again</button>';
    }

}
else {
    echo '<h2>Sorry, that username does not exist.</h2>';
    echo '<button
    hx-get="/login"
    hx-replace="innerHTML"
    hx-target="#not_logged_in"
    hx-trigger="click"
    >Try Again</button>';
}
// header('HX-Redirect: ' . SITE_BASE . '/home');



