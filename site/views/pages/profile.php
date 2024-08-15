<?php
global $isLoggedIn;
    if ($isLoggedIn) {
        $userid = $_SESSION['user']['id']; // check if this does anything
        echo '<h1>'.$_SESSION['user']['name'].'</h1>';


    // Display all profile details
    echo '<div id="profile">';

            echo '<div id="view-details"
            hx-get="/profiledetails"
            hx-trigger="load">
            </div>';
    echo '</div>';
    } else {
        // Return to login page if not logged in
        header('HX-Redirect: ' . SITE_BASE . '/');
    }

?>

