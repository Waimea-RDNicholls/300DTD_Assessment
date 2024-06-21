<?php global $isLoggedIn; ?>


<?php if ($isLoggedIn): ?>
    <h1>Welcome, [user]</h1>

    <?php else: ?>

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





