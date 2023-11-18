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
   <input type="hidden" id="cate-id-del">
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

<script>
  $(".test").on('click', function() {
    $(".delete-dialog").css("top", "0");
  });
</script>

<div class="box-category">
   <h2>Thêm Danh Mục</h2>
   <form action="controllers/xuly_cate.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
         <label for="category_name">Tên Danh Mục:</label>
         <input type="text" id="category_name" name="category_name" placeholder="Tên danh mục" required>
      </div>
      <div class="form-group">
         <label for="category_price">Hình ảnh: </label>
         <img src="view/layout/Images/cc1.jpg" width="15%" alt="">
         <input type="file" id="category_image" name="category_image" multiple>
      </div>
      <div class="form-group">
         <label for="category_stautus">Trạng thái</label>
         <select name="category_stautus" id="category_stautus">
            <option value="Đang hoạt động">Đang hoạt động</option>
            <option value="Ngưng hoạt động">Ngưng hoạt động</option>
         </select>
      </div>
      <div class="form-group">
         <input type="submit" name="addcategory_submit" value="Thêm Danh Mục">
      </div>
   </form>
   <span class="calcel-add">Hủy</span>
</div>

<div class="container">
   <h2>Update Danh Muc</h2>
   <form action="controllers/xuly_cate.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="cate_id_up" class="cate-id-up">
      <div class="form-group">
         <label for="category_name">Tên Danh Mục:</label>
         <div class="group-ten_cate">
            <div><small class="name-cate-temple">Trái Cây</small></div>
            <input type="text" id="category_name" name="category_name" required placeholder="Tên danh mục...">
         </div>
         
      </div>
      <div class="form-group">
         <label for="category_price">Hình ảnh: </label>
         <div class="group-img_cate">
            <div><img class="img-cate-temple" src="../../public/view/" width="50px" alt=""></div>
         
         <input type="file" id="category_image" name="category_image">
         </div>
         
      </div>
      <div class="form-group">
         <label for="category_image">Trạng thái</label>
         <div class="group-trangthai_cate">
            <div>
               <small class="status-cate-temple">review</small>
            </div>
            <select name="category_status">
               <option value="Đang hoạt động">Đang hoạt động</option>
               <option value="Ngưng hoạt động">Ngưng hoạt động</option>
            </select>
         </div>         
      </div>
      <div class="form-group">
         <input type="submit" name="upcategory_submit" value="Sửa Danh Mục">
      </div>
   </form>
   <span class="calcel-up">Hủy</span>
</div>

<main>
   <div class="wrapper flex">
      <div class="projects-category">
         <div class="card-header flex flex-tinh2">
            <h3>Quản lý danh mục</h3>
            <button class="add-cate">Thêm danh mục <i class="fas fa-plus"></i></button>
         </div>

         <table>
            <thead>
               <th>
                  <tr>
                     <td>STT</td>
                     <td>Tên danh mục</td>
                     <td>Hình ảnh</td>
                     <td>Trạng thái</td>
                     <td>Thao tác</td>
                  </tr>
               </th>
            </thead>

            <tbody>
               <?php
                  $i = 0;
                  foreach($show as $items) {
                     extract($items);
                     $i++;
                     echo '
                        <tr>
                           <td>'. $i .'</td>
                           <td>'. $category_name .'</td>
                           <td><img src="../../public/'. $category_img .'" alt="" width="70px"></td>
                           <td>
                              '. $category_status .'
                           </td>
                           <td class="kkk">
                                 <button class="del-cate" data-cate-id="'. $category_id .'" data-cate-name="'. $category_name .'">Xóa</button> 
                                 <button class="up-cate" data-cate-id="'. $category_id .'" data-cate-name="'. $category_name .'" data-cate-img="'. $category_img .'" data-cate-status="'. $category_status .'">Sửa</button>
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

<script>
   $(".up-cate").on('click', function() {
      $(".container").css("right", "1%");
      var name = $(this).data("cate-name");
      var id = $(this).data("cate-id");
      var status = $(this).data("cate-status");
      var img = '../../public/' + $(this).data("cate-img");
      $(".cate-id-up").val(id);
      $(".status-cate-temple").text(status);
      $(".img-cate-temple").attr("src", img);
      $(".name-cate-temple").text(name);
   });

   $(".calcel-up").on('click', function() {
      $(".container").css("right", "-100%");
   });

   $(".add-cate").on('click', function() {
      $(".box-category").css("right", "0px");
   });

   $(".calcel-add").on('click', function() {
      $(".box-category").css("right", "-100%");
   });

   $(".del-cate").on('click', function() {
      var cate_id = $(this).data("cate-id");
      var cate_name = $(this).data("cate-name");
      $("#cate-id-del").val(cate_id);
      $(".delete-dialog").css("top", "0");
      $(".content-del").text("Bạn có chắc chắn muốn xóa danh mục: " + cate_name);
   });

   $(".cancel-button").click(function() {
      $(".delete-dialog").css("top", "-100%");
   });

   $(".delete-button").click(function() {
      var id_cate = $("#cate-id-del").val();
      $.ajax({
         url: "controllers/xuly_cate.php",
         method: "POST",
         data: {
            check: "del-cate",
            id_cate: id_cate
         },
         success: function() {
            location.reload();
         }
      });
   });
</script>