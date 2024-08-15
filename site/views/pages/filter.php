<?php
global $isLoggedIn;
// Double-check HTTP referer data; this page was finnicky with it
$_SESSION['page'] = $_SERVER['HTTP_REFERER'];

if ($isLoggedIn) {
    
    // Display filtered list of users
    echo '<div id="view-filter"
        hx-get="/filterlist"
        hx-trigger="load">
        Loading filter...
        </div>';
} else {
    // Go to sign up page if not logged in
    header('HX-Redirect: ' . SITE_BASE . '/');
}

?>



