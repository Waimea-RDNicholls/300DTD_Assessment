<?php
global $isLoggedIn;
    if ($isLoggedIn) {
        $userid = $_SESSION['user']['id'];
        echo '<h1>'.$_SESSION['user']['name'].'</h1>';

    echo '<div id="profile">';

            echo '<div id="view-details"
            hx-get="/userdetails"
            hx-trigger="load">
            </div>';

            echo '<article id="view-schedule"
                hx-get="/viewschedule/'.$userid.'"
                hx-trigger="load">
                Loading schedules...
                </article>';

            echo '<div id="scheduling">';
                echo '<button
                    hx-get="/scheduleform"
                    hx-trigger="click"
                    hx-target="#scheduling"
                    hx-swap="innerHTML">Create a Schedule!</button>';
            echo '</div>';

    echo '</div>';
    } else {
        header('HX-Redirect: ' . SITE_BASE . '/');
    }

?>

