<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    class mess_lass extends dao_con {
        public static function show_mess() {
            $sql = "SELECT messages.*, account.account_name
                    FROM messages
                    INNER JOIN account ON messages.account_from = account.account_id
                    WHERE messages.account_to = ?
                    ORDER BY messages.mess_id DESC";
            return self::conn_show_all($sql, $_SESSION['83x86']['account_id']);
        }
    }
?>