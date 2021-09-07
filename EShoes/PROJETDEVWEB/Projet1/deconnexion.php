<?php
sleep(2);
    session_start();
    $_SESSION=array();
    session_destroy();
    header('Location:index.php');
    exit();
?>