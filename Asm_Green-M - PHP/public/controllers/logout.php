<?php
    if(isset($checkkkk)) {
        include_once "model_dao/account.php";
        $a = new account_lass();
        $a->update_status("Offline", $_SESSION['83x86']['account_id']);
        $_SESSION['delCookie'] = true;
        echo '
            <script>
                function checkReload() {
                    if (!sessionStorage.getItem("reloaded")) {
                    sessionStorage.setItem("reloaded", "true");
                    window.location.href = "index.php";
                    } else {
                    sessionStorage.removeItem("reloaded");
                    window.location.href = "index.php?act=logout&checkkkk=";
                    }
                }
                
                checkReload();
            </script>
        ';
    }
?>