<script>
  function show_success() {
    var i = 2;

    function countdown() {
      if (i == 0) {
        $(".success_noti").css("right", "-100%");
        $(".success_noti").css("display", "none");
      } else {
        $(".success_noti").css("right", "0%");
        i--;
        $(".success_noti").css("display", "flex");
        setTimeout(countdown, 1000);
      }
    }

    countdown();
  }

  function show_error() {
    var i = 2;

    function countdown() {
      if (i == 0) {
        $(".error_noti").css("right", "-100%");
        $(".error_noti").css("display", "none");
      } else {
        $(".error_noti").css("right", "0%");
        i--;
        $(".error_noti").css("display", "flex");
        setTimeout(countdown, 1000);
      }
    }

    countdown();
  }
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