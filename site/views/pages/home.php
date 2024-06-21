<?php global $isLoggedIn; ?>


<?php if ($isLoggedIn): 
    echo '<h1>Welcome,  '.$_SESSION['user']['name'].'</h1>';

    
else: ?>

    <h1>Welcome to GameLinker!</h1>
<p>It seems you aren't signed in.</p>
<div>
    <p
    id="register"
        hx-get="/register"
        hx-trigger="load">Sign Up!</p>
    <p
    id="login"
        hx-get="/login"
        hx-trigger="load">Log In!</p>
</div>
<?php endif; ?>





