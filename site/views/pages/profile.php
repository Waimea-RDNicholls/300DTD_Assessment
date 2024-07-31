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

<div>
    <!-- replace this with a button asking if you want to create a schedule -->
    <p
    id="scheduling"
        hx-get="/scheduleform"
        hx-trigger="load"
        hx-swap="innerHTML">lets do some scheduling!</p>
</div>
<?php
    var_dump($_SESSION['page']); ?>