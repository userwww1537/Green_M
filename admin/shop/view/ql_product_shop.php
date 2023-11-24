

   <div class="main-content" id="main-content">
      <header class="flex">
         <h2>
            <i class="uil uil-bars" id="menu-icon"></i>
         </h2>

         <div class="search-box">
            <i class="uil uil-search"></i>
            <input type="text" placeholder="Tìm kiếm...">
         </div>

         <div class="admin-box flex">
            <img src="view/layout/Images/user.jpeg" width="30px" height="30px">
            <div>
               <h4>Nguyễn Tấn Ý</h4>
               <small>Admin</small>
            </div>
         </div>
      </header>
      <div class="wrapper flex">
         <div class="projects-category">
            <div class="card-header flex">
               <h3>Sản phẩm</h3>
               <button>Thêm sản phẩm <i class="uil uil-angle-right"></i></button>
            </div>

            <table>
               <thead>
                  <th>
                     <tr>
                        <td>STT</td>
                        <td>Tên sản phẩm</td>
                        <td>Hình ảnh</td>
                        <td>Danh mục</td>
                        <td>Giá</td>
                        <td>Số Lượng</td>
                        <td>Lượt xem</td>
                        <td>Ngày Nhập</td>

                        <td>Thao tác</td>

                     </tr>
                  </th>
               </thead>

               <tbody>
                  <tr>
                     <td>1</td>
                     <td>Cà chua</td>
                     <td>Ảnh</td>
                     <td>Quả</td>
                     <td>22000</td>
                     <td>400</td>
                     <td>241</td>
                     <td>22/03/2005</td>
                     <td>
                        <select name="" id="">
                           <a href="">
                              <option value=""><a href="">Chỉnh sửa</a></option>
                           </a>
                           <a href="">
                              <option value="">Xóa</option>
                           </a>
                        </select>
                     </td>
                  </tr>

               </tbody>

            </table>
            </table>
         </div>
      </div>
      </main>
   </div>

   <script>
      let sideBar = document.getElementById('sidebar');
      let menuIcon = document.getElementById('menu-icon');
      let mainContent = document.getElementById('main-content');

      menuIcon.onclick = () => {
         sideBar.classList.toggle('toggleMenu');
         mainContent.classList.toggle('toggleContent');
      }
   </script>
