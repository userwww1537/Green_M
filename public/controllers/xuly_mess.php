<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (file_exists('../model_dao/message.php')) {
        include_once "../model_dao/message.php";
    } else if (file_exists('model_dao/message.php')) {
        include_once "model_dao/message.php";
    }
    $mess = new mess_lass();
    extract($_REQUEST);

    if(isset($check) && $check == "show") {
        $show = "";
        $ketqua = $mess->mess_chat($from, $to);
        $update_seen = $mess->update_status_mess();
        foreach($ketqua as $items) {
            extract($items);
            $messageType = ($from == $account_from) ? 'msg_cotainer' : 'msg_cotainer_send';
            $messageTypePos = ($from == $account_from) ? 'end' : 'start';
            if($status_user == "Khóa") {
                $show .= '
                
                    <div class="d-flex justify-content-'. $messageTypePos .' mb-4">
                        <div class="'. $messageType .'">
                            Tin nhắn đã bị ẩn do tài khoản bị khóa!
                        </div>
                    </div>
                ';
            } else {
                $show .= '
                
                    <div class="d-flex justify-content-'. $messageTypePos .' mb-4">
                        <div class="'. $messageType .'">
                            '. $mess_content .'
                        </div>
                    </div>
                ';
            }
        }
        echo $show;
    } else if(isset($msg)) {
        $mess->add_mess($msg, $to);
    } else if(isset($check) && $check == "del") {
        $mess->del_mess($from, $to);
    } else if(isset($check) && $check == "search_user") {
        $ketqua = $mess->search_user($value);
        $results = "";
        if($ketqua > 0) {
            foreach($ketqua as $items) {
                extract($items);
                $results .= '
                    <div class="user-mess-results">
                        <a href="?act=mess_chat&from=' . $_SESSION['83x86']['account_id'] . '&to=' . $account_id . '">'. $account_name .'</a>
                    </div>
                ';
            }
        } else {
            $results = '
                <div class="user-mess-results">
                    <a>Không có người dùng phù hợp!</a>
                </div>
            ';
        }

        echo $results;
    }
?>