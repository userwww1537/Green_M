
   <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap");

      .delete-dialog {
      position: fixed;
      top: -100%;
      left: 50%;
      transform: translate(-50%);
      border: 0;
      padding: 0;
      box-sizing: border-box;
      box-shadow: 0 0.2em 0.4em rgba(0, 0, 0, 0.1);
      border-radius: 0.8em;
      display: block;
      transition: all .8s ease;
      }

      .delete-dialog::backdrop {
      background-color: rgba(0, 0, 0, 0.6);
      }

      .delete-dialog-container {
      display: flex;
      flex-direction: column;
      padding: 1.2em;
      }

      .trash-icon {
      width: 2rem;
      height: 2rem;
      }

      .heading {
      display: flex;
      align-items: center;
      text-align: center;
      height: 50px;
      }

      .heading h5 {
      font-size: 1.2rem;
      padding-left: 0.6em;
      font-family: "Roboto", sans-serif;
      font-weight: 700;
      }

      .delete-dialog p {
      font-size: 1.1rem;
      font-family: "Roboto", sans-serif;
      padding: 1em 0;
      }

      .dialog-buttons {
      margin-left: auto;
      padding: 0.1em 0;
      }

      .dialog-button {
      color: white;
      border: 0;
      padding: 0.5em 1.1em;
      border-radius: 0.6em;
      border-width: 0.2em;
      border-style: solid;
      cursor: pointer;
      font-family: "Roboto", sans-serif;
      font-weight: 400;
      font-size: 0.85rem;
      }

      .cancel-button {
      background-color: white;
      border-color: #35898f;
      color: #35898f;
      }

      .delete-button {
      background-color: #f00;
      border-color: #f00;
      margin-left: 0.5em;
      }
   </style>
   <dialog class="delete-dialog">
      <input type="hidden" id="pro-id-del">
      <div class="delete-dialog-container">
         <div class="heading">
         <i class="fad fa-trash-alt" style="--fa-primary-color: #f50000; --fa-secondary-color: #b13e3e;"></i>
         <h5>Bạn muốn xóa?</h5>
         </div>

         <p class="content-del"></p>

         <div class="dialog-buttons">
         <button
            class="dialog-button cancel-button">
            Hủy
         </button>
         <button
            class="dialog-button delete-button">
            Xóa
         </button>
         </div>
      </div>
   </dialog>

   <div class="box-category">
      <h2>Thêm sản phẩm</h2>
         <div class="form-group">
            <label for="category_name">Tên sản phẩm:</label>
            <input type="text" id="name" name="product_name" placeholder="Tên sản phẩm" required>
         </div>
         <div class="form-group">
            <label for="category_image">Danh mục</label>
            <div class="group-trangthai_cate">
               <select id="status" name="status">
                  <option value="1">Rau</option>
                  <option value="2">Củ</option>
                  <option value="3">Quả</option>
               </select>
            </div>         
         </div>
         <div class="form-group">
            <label for="category_name">Giá gốc:</label>
            <input type="text" id="price" name="product_del" placeholder="Giá gốc..." required>
         </div>
         <div class="form-group">
            <label for="category_name">Giảm giá:</label>
            <span style="color: red; font-size: 13px;">(<b>Lưu ý</b>: giảm giá sẽ theo dạng giá tiền)</span>
            <input type="text" id="del" name="product_del" placeholder="Có thể bỏ qua..." required>
         </div>
         <div class="form-group">
            <label for="category_name">Số lượng:</label>
            <input type="text" id="qty" name="product_qty" placeholder="Số lượng..." required>
         </div>
         <div class="form-group">
            <input type="submit" class="continue-add-product" value="Tiếp theo">
         </div>
      <span class="calcel-add">Hủy</span>
   </div>
   <form class="continue-end-product" action="controllers/xuly_product.php" method="post" enctype="multipart/form-data">
      <input type="file" name="images[]" multiple>
      <input type="submit" value="Thêm sản phẩm" name="doneProductFull">
   </form>

   <div class="box-up-category">
      <h2>Sửa sản phẩm</h2>
         <div class="form-group">
            <label for="category_name">Tên sản phẩm:</label>
            <input type="text" id="name-up" name="product_name">
         </div>
         <div class="form-group">
            <label for="category_image">Danh mục</label>
            <div class="group-trangthai_cate">
               <select id="status" name="status">
                  <option value="1">Rau</option>
                  <option value="2">Củ</option>
                  <option value="3">Quả</option>
               </select>
            </div>         
         </div>
         <div class="form-group">
            <label for="category_name">Giá gốc:</label>
            <input type="text" id="price-up" name="product_del" required>
         </div>
         <div class="form-group">
            <label for="category_name">Giảm giá:</label>
            <span style="color: red; font-size: 13px;">(<b>Lưu ý</b>: giảm giá sẽ theo dạng giá tiền)</span>
            <input type="text" id="del-up" name="product_del"required>
         </div>
         <div class="form-group">
            <label for="category_name">Số lượng:</label>
            <input type="text" id="qty-up" name="product_qty" required>
         </div>
         <div class="form-group">
            <input type="submit" class="continue-up-product" value="Tiếp theo">
         </div>
      <span class="calcel-add-up">Hủy</span>
   </div>
   <form class="continue-end-up-product" action="controllers/xuly_product.php" method="post" enctype="multipart/form-data">
      <input type="hidden" class="product-id-up" name="id">
      <input type="file" name="images[]" multiple>
      <input type="submit" value="Sửa sản phẩm" name="upProductFull">
   </form>

   <main>
      <div class="wrapper flex">
         <div class="projects-category">
            <div class="card-header flex flex-tinh2">
               <h3>Quản lý sản phẩm</h3>
               <button class="add-cate">Thêm sản phẩm <i class="fas fa-plus"></i></button>
            </div>

            <table>
               <thead>
                  <th>
                     <tr>
                        <td>Id</td>
                        <td>Tên</td>
                        <td>Hình ảnh</td>
                        <td>Danh mục</td>
                        <td>Giá</td>
                        <td>Giảm giá</td>
                        <td>Số lượng</td>
                        <td>Lượt xem</td>
                        <td>Ngày nhập</td>
                        <td>Lựa chọn</td>
                     </tr>
                  </th>
               </thead>

               <tbody>
                  <?php
                     $i = 0;
                     foreach($show as $items) {
                        extract($items);
                        if ($product_del == 0.00) {
                              $giamgia = 0;
                        } else {
                              $giamgia = (($product_price - $product_del) / $product_price) * 100;
                        }
                        if ($i == 8) {
                              break;
                        }
                        $giamgia = intval($giamgia);
                        $image = explode(',', $image_files);
                        $name = substr($product_name, 0, 10) . '...';
                        echo '
                        <tr>
                              <td>PRO-'. $product_id .'</td>
                              <td>'. $name .'</td> 
                              <td><img width="70px" src="../../public/'. $image[0] .'"></td>
                              <td>'. $category_name .'</td>
                              <td>$'. $product_price .'</td>
                              <td>'. $giamgia .'%</td>
                              <td>'. $product_qty .'</td>
                              <td>'. $product_view .'</td>
                              <td>'. $time_reg .'</td>
                              <td class="kkk">
                                    <button class="del-pro" data-product-id="'. $product_id .'" data-product-name="'. $name .'">Xóa</button> 
                                    <button class="up-pro" data-product-id="'. $product_id .'" data-product-name="'. $product_name .'" data-product-price="'. $product_price .'" data-product-del="'. $product_del .'" data-product-qty="'. $product_qty .'">Sửa</button>
                              </td>
                           </tr>
                        ';
                     }
                  ?>      
                  
               </tbody>
            </table>
         </div>
      </div>
   </main>
</div>
<div class="box-log">
      <i class="fas fa-times daux"></i>
      <input type="hidden" class="id-account-box">
      <input type="hidden" class="email-account-box">
      <div class="form-group">
         <label>Gửi thông báo</label>
         <input type="text" placeholder="Lời nhắn..." class="val-mess">
         <input type="submit" value="Gửi" class="sent-notify-user">
      </div>
      <hr>
      <div class="form-group">
         <label>Khóa tài khoản:</label>
         <input type="text" placeholder="Lí do..." class="val-lido">
         <input type="submit" value="Khoá tài khoản" class="sent-lock-user">
      </div>
</div>
<div class="test-bug" style="font-size: 100px;"></div>

<script>
   $(".up-pro").on('click', function() {
      $(".box-up-category").css('right', '0px');
      var name = $(this).data("product-name");
      var price = $(this).data("product-price");
      var del = $(this).data("product-del");
      var qty = $(this).data("product-qty");
      var id = $(this).data("product-id");

      $("#name-up").val(name);
      $("#price-up").val(price);
      $("#del-up").val(del);
      $("#qty-up").val(qty);
      $(".product-id-up").val(id);
   });

   $(".del-pro").on('click', function() {
      var id = $(this).data("product-id");
      var name = $(this).data("product-name");
      $(".content-del").text("Bạn có chắc chắn muốn xóa sản phẩm: " + name);
      $("#pro-id-del").val(id);
      $(".delete-dialog").css("top", "0px");
   });

   $(".delete-button").on('click', function() {
      var id_pro = $("#pro-id-del").val();
      $.ajax({
         url: "controllers/xuly_product.php",
         method: "POST",
         data: {
            check: "del-pro",
            id_pro: id_pro
         },
         success: function() {
            location.reload();
         }
      });
   });

   $(".cancel-button").on('click', function() {
      $(".delete-dialog").css("top", "-100%");
   });

   $(".calcel-add").on('click', function() {
      $(".box-category").css("right", "-100%");
   });

   $(".calcel-add-up").on('click', function() {
      $(".box-up-category").css("right", "-100%");
   });

   $(".add-cate").on('click', function() {
      $(".box-category").css("right", "0px");
   });

   $(".continue-add-product").on('click', function() {
      var name = $("#name").val();
      var status = $("#status").val();
      var price = $("#price").val();
      var del = $("#del").val();
      var qty = $("#qty").val();

      if(name != "" && status != "" && price != "" && qty != "") {
         $.ajax({
            url: "controllers/xuly_product.php",
            method: "POST",
            data: {
               check: "addProductPartOne",
               name: name,
               status: status,
               price: price,
               del: del,
               qty: qty
            },
            success: function(data) {
               $(".box-category").css("right", "-100%");
               $(".continue-end-product").css("right", "0px");
            }
         });
      } else {
         $(".error_noti").text("Vui lòng điền đầy đủ thông tin");
         show_error();
      }
   });

   $(".continue-up-product").on('click', function() {
      var name = $("#name-up").val();
      var status = $("#status").val();
      var price = $("#price-up").val();
      var del = $("#del-up").val();
      var qty = $("#qty-up").val();
      var id = $(".product-id-up").val();

      if(name != "" && status != "" && price != "" && qty != "") {
         $.ajax({
            url: "controllers/xuly_product.php",
            method: "POST",
            data: {
               check: "upProductPartOne",
               name: name,
               status: status,
               price: price,
               del: del,
               qty: qty,
               id: id
            },
            success: function(data) {
               $(".box-up-category").css("right", "-100%");
               $(".continue-end-up-product").css("right", "0px");
            }
         });
      } else {
         $(".error_noti").text("Vui lòng điền đầy đủ thông tin");
         show_error();
      }
   });
</script>