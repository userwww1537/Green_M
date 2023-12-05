<style>
    .setting-box {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 100px;
    }

    .input-field-regShop {
        margin-bottom: 20px;
    }

    .input-field-regShop label {
        color: #333;
        font-weight: bold;
        display: block;
    }

    .input-field-regShop select {
        width: 200px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .input-field-regShop input[type="submit"] {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .input-field-regShop input[type="submit"]:hover {
        background-color: #555;
    }

    .alertDieuKhoan {
        background-color: #f8f8f8;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        width: 500px;
    }

    .alertDieuKhoan h3 {
        color: #333;
        font-size: 20px;
        margin-bottom: 10px;
    }

    .alertDieuKhoan ul {
        list-style-type: disc;
        margin-left: 20px;
    }

    .alertDieuKhoan li {
        color: #666;
        margin-bottom: 5px;
    }
</style>
<div class="setting-box">
    <form action="controllers/xuly_account.php" method="post">
        <div class="input-field-regShop">
            <label for="sel">Đăng ký trở thành Shop: </label>
            <select name="sel" id="sel">
                <option value="0">Chưa kích hoạt</option>
                <option value="1">Đăng ký</option>
            </select>
            <input type="submit" value="Xác nhận" name="acceptShop">
        </div>
    </form>

    <div class="alertDieuKhoan">
        <h3>Chính sách khi đăng ký thành Shop từ Green-m:</h3>
        <ul>
            <li>Có thể đăng bán sản phẩm</li>
            <li>Có thể lên top sản phẩm trên trang chủ</li>
            <li>Cập nhật thông tin mới nhất từ Admin</li>
            <li>Chỉ mất 3% chiết khấu trên mỗi sản phẩm bán ra</li>
            <li><b style="color: red;">Lưu ý</b>: Không thể đóng Shop khi kích hoạt nhà bán hàng!</li>
        </ul>
    </div>
</div>