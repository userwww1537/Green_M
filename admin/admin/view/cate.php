

      <main>
      <div class="container">
   <h2>Sửa Danh Mục</h2>
   <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
         <label for="category_name">Tên Danh Mục:</label>
         <div class="group-ten_cate">
            <div><small>Trái Cây</small></div>
            <input type="text" id="category_name" name="category_name" required placeholder="Trái Cây">
         </div>
         
      </div>
      <div class="form-group">
         <label for="category_price">Hình ảnh: </label>
         <div class="group-img_cate">
            <div><img src="view/layout/Images/cc1.jpg" width="50px" alt=""></div>
         
         <input type="file" id="category_image" name="category_image" required>
         </div>
         
      </div>
      <div class="form-group">
         <label for="category_image">Trạng thái</label>
         <div class="group-trangthai_cate">
            <div>
               <small>review</small>
            </div>
            <select>
               <option value="">Đang hoạt động</option>
               <option value="">Ngưng hoạt động</option>
            </select>
         </div>         
      </div>
      <div class="form-group">
         <input type="submit" name="addcategory_submit" value="Sửa Danh Mục">
      </div>
   </form>
</div>
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
                     <tr>
                        <td>1</td>
                        <td>Trái cây</td>
                        <td><img src="view/layout/Images/cc1.jpg" alt="" width="70px"></td>
                        <td>
                           review
                        </td>
                        <td class="kkk">
                            <button>Xóa</button> 
                            <button>Sửa</button>
                        </td>
                     </tr>      
                     <tr>
                        <td>1</td>
                        <td>Trái cây</td>
                        <td><img src="view/layout/Images/cc1.jpg" alt="" width="70px"></td>
                        <td>
                           review
                        </td>
                        <td class="kkk">
                            <button>Xóa</button> 
                            <button>Sửa</button>
                        </td>
                     </tr>     
                     <tr>
                        <td>1</td>
                        <td>Trái cây</td>
                        <td><img src="view/layout/Images/cc1.jpg" alt="" width="70px"></td>
                        <td>
                           review
                        </td>
                        <td class="kkk">
                            <button>Xóa</button> 
                            <button>Sửa</button>
                        </td>
                     </tr>      <tr>
                        <td>1</td>
                        <td>Trái cây</td>
                        <td><img src="view/layout/Images/cc1.jpg" alt="" width="70px"></td>
                        <td>
                           review
                        </td>
                        <td class="kkk">
                            <button>Xóa</button> 
                            <button>Sửa</button>
                        </td>
                     </tr>      <tr>
                        <td>1</td>
                        <td>Trái cây</td>
                        <td><img src="view/layout/Images/cc1.jpg" alt="" width="70px"></td>
                        <td>
                          review
                        </td>
                        <td class="kkk">
                            <button>Xóa</button> 
                            <button>Sửa</button>
                        </td>
                     </tr>     
                  </tbody>
               </table>
            </div>
         </div>
      </main>
   </div>