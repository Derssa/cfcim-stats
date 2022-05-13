<?php
    session_start();
    unset($_SESSION['admin_mycfcim_stats']);
    header('location:./');
?>