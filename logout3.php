<?php
    session_start();
    if(session_destroy()) {
        header("Location: login3.php");
    }
?>
