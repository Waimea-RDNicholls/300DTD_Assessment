<?php
global $isLoggedIn;
if ($isLoggedIn) {
    echo '<h1>Message list for '.$_SESSION['user']['name'].'</h1>';
    echo '<div id="view-messages"
        hx-get="/messagelist"
        hx-trigger="load">
        Loading messages...
    </div>';
} else {
    header('HX-Redirect: ' . SITE_BASE . '/');
}

?>


