<?php
echo '<h1>Message list for '.$_SESSION['user']['name'].'</h1>'
?>


<div id="view-messages"
        hx-get="/messagelist"
        hx-trigger="load"
    >
        Loading messages...
</div>