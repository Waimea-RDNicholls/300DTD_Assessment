<?php
global $isLoggedIn;
$_SESSION['page'] = $_SERVER['HTTP_REFERER'];

if ($isLoggedIn) {

    echo '<div id="view-filter"
        hx-get="/filterlist"
        hx-trigger="load">
        Loading filter...
        </div>';
} else {
    header('HX-Redirect: ' . SITE_BASE . '/');
}

?>



