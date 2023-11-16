<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (file_exists('../model_dao/discount_code.php')) {
        include_once "../model_dao/discount_code.php";
    } else if (file_exists('model_dao/discount_code.php')) {
        include_once "model_dao/discount_code.php";
    }

    
?>