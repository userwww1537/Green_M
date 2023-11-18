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
        foreach($ketqua as $items) {
            extract($items);
            $messageType = ($from == $account_from) ? 'msg_cotainer' : 'msg_cotainer_send';
            $messageTypePos = ($from == $account_from) ? 'end' : 'start';
            $show .= '
            
                <div class="d-flex justify-content-'. $messageTypePos .' mb-4">
                    <div class="'. $messageType .'">
                        '. $mess_content .'
                    </div>
                </div>
            ';
        }
        echo $show;
    } else if(isset($msg)) {
        $mess->add_mess($msg, $to);
    } else if(isset($check) && $check == "del") {
        $mess->del_mess($from, $to);
    }
?>