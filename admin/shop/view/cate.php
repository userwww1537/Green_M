<main>
   <div class="wrapper flex">
      <div class="projects-category">
         <div class="card-header flex flex-tinh2">
            <h3>Quản lý bình luận</h3>
         </div>

         <table>
            <thead>
               <th>
                  <tr>
                     <td>STT</td>
                     <td>Người đánh giá</td>
                     <td>Nội dung</td>
                     <td>Số sao</td>
                     <td>Thời gian</td>
                     <td>Thao tác</td>
                  </tr>
               </th>
            </thead>

            <tbody>
               <?php
                  $i = 0;
                  foreach($show as $items) {
                     extract($items);
                     $date = new DateTime($time_reg);
                     $formattedDate = $date->format('d-m-Y');
                     $i++;
                     echo '
                        <tr>
                           <td>'. $i .'</td>
                           <td>'. $account_name .'</td>
                           <td>'. $rate_comment .'</td>
                           <td>
                              '. $rate_star .'🌟
                           </td>
                           <td>
                              '. $formattedDate .'
                           </td>
                           <td class="kkk">
                                 <a href="../../public/index.php?act=detail&product_id=' . $product_id . '&category='. $category_id .'"><i class="fad fa-eye"></i></a> |
                                 <a href="../../public/index.php?act=mess_chat&from='.$_SESSION['83x86']['account_id'].'&to='.$account_id.'"><i class="fas fa-comment"></i></a>
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