<?php
    session_start();
    //var_dump($_SERVER);
    // if( isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] == '/site/SIP_admin/login.php'){

    //     exit();
    // }

    // <IfModule mod_php.c>
    //     php_value auto_prepend_file "auth.php"
    // </IfModule>

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
?>