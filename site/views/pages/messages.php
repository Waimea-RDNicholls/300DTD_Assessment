<?php
global $isLoggedIn;
if ($isLoggedIn) {
    // Display all messages in inbox
    echo '<h1>Message list for '.$_SESSION['user']['name'].'</h1>';
    echo '<div id="view-messages"
        hx-get="/messagelist"
        hx-trigger="load">
        Loading messages...
    </div>';
} else {
    // Return to login page if not logged in
    header('HX-Redirect: ' . SITE_BASE . '/');
}

?>


