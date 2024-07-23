<?php
$userid = $_SESSION['user']['id'];
echo '<h1>'.$_SESSION['user']['name'].'</h1>'
?>

<div hx-get="/userdetails"
hx-trigger="load">
</div>




<article id="view-schedule"
        hx-get="/viewschedule/<?= $userid  ?>"
        hx-trigger="load"
    >
        Loading schedules...
    </article>

<div>
    <p
    id="scheduling"
        hx-get="/scheduleform"
        hx-trigger="load"
        hx-swap="innerHTML">lets do some scheduling!</p>
</div>
