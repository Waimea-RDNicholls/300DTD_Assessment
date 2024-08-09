<?php
$userid = $_SESSION['user']['id'];
echo '<h1>'.$_SESSION['user']['name'].'</h1>'
?>

<div id="view-details"
hx-get="/userdetails"
hx-trigger="load">
</div>




<article id="view-schedule"
        hx-get="/viewschedule/<?= $userid  ?>"
        hx-trigger="load"
    >
        Loading schedules...
    </article>

<div id="scheduling">
    <!-- replace this with a button asking if you want to create a schedule -->
    <button
        hx-get="/scheduleform"
        hx-trigger="click"
        hx-target="#scheduling"
        hx-swap="innerHTML">Create a Schedule!</button>
</div>
