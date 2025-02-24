<?php 

    session_start();
    unset($_SESSION['user_log']);
    unset($_SESSION['admin_log']);
    header('location: index.html');


?>