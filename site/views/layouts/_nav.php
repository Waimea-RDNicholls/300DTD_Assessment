<!-- Main navigation menu. Can add logic for user type / access -->
<?php global $isLoggedIn; ?>



<nav id="main-nav">

    <menu hx-boost="true">

        <li><a href="/">Home</a>
        <li><a href="/about">About</a>
        <?php if ($isLoggedIn) {
        echo '<li><a href="/logout">Logout</a>';
        echo '<li><a href="/profile">'.$_SESSION['user']['name'].'</a>';
        echo '<li><a href="/filter">Search</a>';
        echo '<li><a href="/messages">Messages</a>';
        }?>



    </menu>

</nav>


<!-- Update the nav links -->
<script>configureNav();</script>