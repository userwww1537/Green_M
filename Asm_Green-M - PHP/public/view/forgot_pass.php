<div class="box-forgot">
    <h3>Quên mật khẩu</h3>
    <?php
        if(!isset($_SESSION['forgot_pass'])) {
            echo '
                <form method="post" action="controllers/xuly_login.php" class="form-forgot">
                    <label for="email">Nhập Email:</label>
                    <input type="email" name="email" class="email" placeholder="Vui lòng nhập email..." required>
            
                    <button type="submit" class="send_mail_forgot" name="send_mail_forgot">Gửi mã</button>
                </form>
            ';
        } else if(isset($_SESSION['forgot_pass']) && isset($_SESSION['forgot_pass']['done'])) {
            echo '
                <form method="post" action="controllers/xuly_login.php" class="form-accept">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="email" value="'. $_SESSION['forgot_pass']['email'] .'" readonly>
                    <label for="email">Mật khẩu mới:</label>
                    <input type="password" name="pass" class="pass" placeholder="Vui lòng nhập mật khẩu..." required>
            
                    <button type="submit" class="send_pass_forgot" name="send_pass_forgot">Đổi mật khẩu</button>
                </form>
            ';
        } else {
            echo '
                <form method="post" action="controllers/xuly_login.php" class="form-accept">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="email" value="'. $_SESSION['forgot_pass']['email'] .'" readonly>
                    <label for="email">Nhập mã xác thực:</label>
                    <input type="text" name="code" class="code" placeholder="Vui lòng nhập mã xác thực..." required>
            
                    <button type="submit" class="send_code_forgot" name="send_code_forgot">Xác thực</button>
                </form>
            ';
        }
    ?>
</div>