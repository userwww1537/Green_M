<?php
    session_start();
    if(isset($_SESSION['83x86']) && $_SESSION['83x86']['account_position'] == "Quản trị viên") {
        echo '
            <style>
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    background-color: #f2f2f2;
                }
                .container {
                    width: 300px;
                    padding: 20px;
                    border: 1px solid #ccc;
                    text-align: center;
                    background-color: #fff;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }
                .logo {
                    margin-bottom: 20px;
                }
                .container a {
                    display: block;
                    margin-bottom: 10px;
                    text-decoration: none;
                    color: #333;
                    font-weight: bold;
                }
                .container a:hover {
                    color: #ff0000;
                }
            </style>
            <div class="container">
                <div class="logo">
                    <img src="public/view/images/logo-footer-1.webp" alt="Logo">
                </div>
                <a href="admin/index.php">Truy cập Admin</a>
                <a href="public/index.php">Truy cập Website</a>
            </div>
        ';
    } else {
        header('location: public/index.php');
    }
    
?>