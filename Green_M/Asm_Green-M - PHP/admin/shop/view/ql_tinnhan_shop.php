

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
               <h3>Đánh giá</h3>
               <button>Xem tất cả<i class="uil uil-angle-right"></i></button>
            </div>
            <table>
                <thead>
                   <th>
                      <tr>
                         <td>STT</td>
                         <td>Tên sản phẩm</td>
                         <td>Khách hàng</td>
                         <td>Mức độ hài lòng</td>
                         <td>Nội dung bình luận</td>
                         <td>Ngày bình luận</td>
                         <td>Thao tác</td>
                          
                      </tr>
                   </th>
                </thead>

                <tbody>
                   <tr>
                      <td>1</td>
                      <td>Cà chua</td>
                      <td>Nguyễn Tấn Ý</td>
                      <td>3*</td>
                      <td>Cà chua dở </td>
                      <td>22/55/1021</td>
                      <td>Phản hồi</td>
                      </tr>
                    
                   
                </tbody>
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
