<?php
$_SESSION['page'] = $_SERVER['HTTP_REFERER'];
echo '<h1>'.$_SESSION['user']['name'].'</h1>'
?>


<article id="view-filter"
        hx-get="/filterlist"
        hx-trigger="load"
    >
        Loading filter...
    </article>
