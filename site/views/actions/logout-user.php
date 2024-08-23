<!-- Perform the logout via session_destroy(); -->

<?php
    session_destroy();
    header('HX-Redirect: ' . SITE_BASE . '/');
?>

