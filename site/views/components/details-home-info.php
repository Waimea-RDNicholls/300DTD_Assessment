<?php global $isLoggedIn;?>

<h1>What is GameLinker?</h1>
<p>GameLinker is an app designed to link boardgamers together. We know the struggle of finding that one extra player to fill in your game of Monopoly, 
    and we're here to fix that!</p>
    <h1>How does it work?</h1>
    <p>You make an account, and fill it with your region, favourite boardgame, and what kind of boardgamer you are. Then,
        you simply need to fill in some schedules and then go to the filter screen. You'll see all the players who are eligble 
        to play with you! At that point, send them a message, and you can start playing!</p>

        <!-- Allow user to return to login page -->
        <?php
        if (!$isLoggedIn) {
           echo '<button
            hx-get="/refresh"
            hx-trigger="click">Back</button>';
        }
