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
        class="dialog-button delete-button"
        onclick="deleteButtonClick()">
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
<main>
   <div class="wrapper flex">
      <div class="projects-category">
         <div class="card-header flex flex-tinh2">
            <h3>Quản lý danh mục</h3>
            <button>Thêm danh mục <i class="fas fa-plus"></i></button>
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
                           <td><img src="'. $category_img .'" alt="" width="70px"></td>
                           <td>
                              '. $category_status .'
                           </td>
                           <td class="kkk">
                                 <button class="del-cate" data-cate-id="'. $category_id .'" data-cate-name="'. $category_name .'">Xóa</button> 
                                 <button>Sửa</button>
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
</script>