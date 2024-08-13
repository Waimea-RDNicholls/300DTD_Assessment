<?php global $isLoggedIn; ?>


<?php if ($isLoggedIn): 
    echo '<h1>Welcome,  '.$_SESSION['user']['name'].'</h1>';
    echo '<div id="logged_in"
    hx-get="/info"
    hx-replace="innerHTML"
    hx-target="#logged_in"
    hx-trigger="load">';
    echo '</div>';

    
else: ?>


<!-- Show buttons to login/sign up if not logged in -->
    <h1>Welcome to GameLinker!</h1>
<p>It seems you aren't signed in.</p>
<div id="not_logged_in">
    <button
        hx-get="/register"
        hx-replace="innerHTML"
        hx-target="#not_logged_in"
        hx-trigger="click">Sign Up!</button>
    <button
    id="login"
        hx-get="/login"
        hx-replace="innerHTML"
        hx-target="#not_logged_in"
        hx-trigger="click">Log In!</button>

    <button
    hx-get="/info"
    hx-replace="innerHTML"
    hx-target="#not_logged_in"
    hx-trigger="click">About us</button>
</div>


<?php endif; ?>






