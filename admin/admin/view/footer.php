<script>
      let sideBar = document.getElementById('sidebar');
      let menuIcon = document.getElementById('menu-icon');
      let mainContent = document.getElementById('main-content');

      menuIcon.onclick = () => {
         sideBar.classList.toggle('toggleMenu');
         mainContent.classList.toggle('toggleContent');
      }

      const listItems = document.querySelectorAll('li');

listItems.forEach(item => {
  item.addEventListener('click', () => {
    // Xóa class 'active' khỏi tất cả các <li>
    listItems.forEach(li => li.classList.remove('active'));

    // Thêm class 'active' vào <li> được click
    item.classList.add('active');
  });
});
   </script>
</body>
</html>