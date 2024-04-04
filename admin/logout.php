<?php
    require('inc/essentinals.php');

    session_start();
    session_destroy();
    redirect('index.php');
?>