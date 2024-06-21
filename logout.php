<?php
    // logout.php
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php"); // redirect to the main page after logout
    exit();
?>