<style>
    .full-changePass {
        background-color: #fff;
        box-shadow: 1px 1px 8px 0 grey;
        max-width: 600px;
        height: 400px;
        position: relative;
        left: 35%;
        margin-top: 50px;
    }

    .change-password-form {
        max-width: 400px;
        margin: 0 auto;
    }

    .change-password-form h2 {
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
        width: 470px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
    }

    .form-group input[type="password"],
    .form-group input[type="text"] {
        width: 85%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .show-password-icon {
        display: inline-block;
        position: relative;
        top: -28px;
        right: 10px;
        cursor: pointer;
    }

    button[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
<div class="full-changePass">
    <form method="POST" action="controllers/xuly_account.php" class="change-password-form">
        <h2>Đổi mật khẩu</h2>
        <div class="form-group">
            <label for="current-password">Mật khẩu hiện tại</label>
            <input type="password" id="current-password" name="currentPassword" required>
            <i class="show-password-icon" onclick="togglePasswordVisibility('current-password')">&#128065;</i>
        </div>
        <div class="form-group">
            <label for="new-password">Mật khẩu mới</label>
            <input type="password" id="new-password" name="newPassword" required>
            <i class="show-password-icon" onclick="togglePasswordVisibility('new-password')">&#128065;</i>
        </div>
        <div class="form-group">
            <label for="confirm-password">Xác nhận mật khẩu mới</label>
            <input type="password" id="confirm-password" name="confirmPassword" required>
            <i class="show-password-icon" onclick="togglePasswordVisibility('confirm-password')">&#128065;</i>
        </div>
        <button type="submit" name="changePass">Cập nhật</button>
    </form>
</div>

<script>
    function togglePasswordVisibility(inputId) {
        var input = document.getElementById(inputId);
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }
</script>