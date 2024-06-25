<?php

echo '<h1>'.$_SESSION['user']['name'].'</h1>'
?>


<article id="view-messages"
        hx-get="/messagelist"
        hx-trigger="load"
    >
        Loading messages...
    </article>