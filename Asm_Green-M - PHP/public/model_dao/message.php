<?php
    include_once "connect.php";
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    class mess_lass extends dao_con {
        function show_mess_from($a) {
            $sql = "SELECT messages.*, account.account_avt AS avt_user, account.account_name AS name_user, account.account_status as status_user
                FROM messages
                JOIN account ON messages.account_from = account.account_id
                WHERE messages.account_to = ? ORDER BY messages.mess_id DESC
            ";
            return $this->conn_show_all($sql, $a);
        }

        function show_mess_to($a) {
            $sql = "SELECT messages.*, account.account_avt AS avt_user, account.account_name AS name_user, account.account_status as status_user
                FROM messages
                JOIN account ON messages.account_to = account.account_id
                WHERE messages.account_from = ? ORDER BY messages.mess_id DESC
            ";
            return $this->conn_show_all($sql, $a);
        }

        function mess_chat($a, $b) {
            $sql = "SELECT messages.*, account.account_avt AS avt_user, account.account_name AS name_user, account.account_status as status_user
                    FROM messages
                    JOIN account ON messages.account_from = account.account_id 
                    WHERE (messages.account_from = ? AND messages.account_to = ?) OR (messages.account_from = ? AND messages.account_to = ?) ORDER BY messages.mess_id ASC
            ";
            return $this->conn_show_all($sql, $a, $b, $b, $a);
        }

        function show_mess_info($a) {
            $sql = "SELECT *
                    FROM account
                    WHERE account_id = ?
            ";
            return $this->conn_show_one($sql, $a);
        }

        function add_mess($a, $b) {
            $sql = "INSERT INTO messages(mess_content, account_from, account_to) VALUES(?, ?, ?)";
            return $this->conn_execute($sql, $a, $_SESSION['83x86']['account_id'], $b);
        }

        function del_mess($a, $b) {
            $sql = "DELETE FROM messages
                    WHERE (messages.account_from = ? AND messages.account_to = ?) OR (messages.account_from = ? AND messages.account_to = ?)
            ";
            return $this->conn_execute($sql, $a, $b, $b, $a);
        }

        function search_user($a) {
            $a = '%' . $a . '%';
            $sql = "SELECT * FROM account WHERE account_name LIKE ?";
            return $this->conn_show_all($sql, $a);
        }

        function update_status_mess() {
            $sql = "UPDATE messages SET mess_status = 'Đã xem' WHERE account_to = ?";
            return $this->conn_execute($sql, $_SESSION['83x86']['account_id']);
        }

        function check_seen() {
            $sql = "SELECT COUNT(*) as message_count FROM messages WHERE account_to = ? AND mess_status = 'Chưa xem';";
            return $this->conn_show_one($sql, $_SESSION['83x86']['account_id']);
        }
    }
?>