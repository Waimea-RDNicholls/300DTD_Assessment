<?php

echo '<h1>'.$_SESSION['user']['name'].'</h1>'
?>


<article id="view-schedule"
        hx-get="/viewschedule"
        hx-trigger="load"
    >
        Loading schedules...
    </article>

<div>
    <p
    id="scheduling"
        hx-get="/scheduleform"
        hx-trigger="load">lets do some scheduling!</p>
</div>
