<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php
    session_start();
    ob_start();
    extract($_REQUEST);
    if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_position'] == "Quản trị viên") {
        echo '
            <script>
                window.location.href = "admin/index.php";
            </script>
        ';
    } else if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_position'] == "Shop") {
        echo '
            <script>
                window.location.href = "shop/index.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Bạn không có quyền truy vập trang này, Tự động chuyển hướng!");
                window.location.href = "../public/index.php";
            </script>
        ';
    }
?>