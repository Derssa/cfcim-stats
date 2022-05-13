<?php
    session_start();
    unset($_SESSION['MyCFCIM_id']);
    header('location:./');
?>