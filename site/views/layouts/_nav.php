<!-- Main navigation menu -->
<?php global $isLoggedIn; ?>



<nav id="main-nav">

    <menu hx-boost="true">
        
<!--        Nav for logged in users -->
        <?php if ($isLoggedIn) {
            echo '<li><a href="/profile">'.$_SESSION['user']['name'].'</a>';
            echo '<li><a href="/filter">Search</a>';
            echo '<li><a href="/messages">Messages +'.$_SESSION['msg']['amount'].'</a>';
            echo '<li><a href="/">Help</a>';
            echo '<li><a href="/logout">Logout</a>';
        } else {
            // Nav for guest
            echo '<li><a href="/">Sign Up</a>';
        
        }?>



    </menu>

</nav>


<!-- Update the nav links -->
<script>configureNav();</script>