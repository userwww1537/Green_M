<?php
if (!isset($act) || $act == "home") {
    echo '
                <section class="footer">
                    <div class="wrapper">
            
                    <div class="feature-box">
                        <i class="fad fa-truck"></i>
                        <div class="content">
                            <h3>Hỗ trợ vận chuyển</h3>
                            <p>Miễn phí vận chuyển trong nước <br> và $2 vận chuyển ngoài nước.</p>
                        </div>
                    </div>
            
                    <div class="feature-box">
                        <i class="fas fa-shopping-basket"></i>
                        <div class="content">
                            <h3>Đảm bảo chất lượng</h3>
                            <p>Cam kết chất lượng sản phẩm 100% sạch.</p>
                        </div>
                    </div>
            
                    <div class="feature-box">
                        <i class="fas fa-tag"></i>
                        <div class="content">
                            <h3>Ưu đãi ngập nhà</h3>
                            <p>Nhà nhà người người ai cũng được giảm giá <br> chỉ có tại <b style="color: red;">GREEN</b>-<b style="color: green;">M</b>.</p>
                        </div>
                    </div>
                    </div>
            
                    <div class="box-container">
            
                    <div class="box">
                        <img src="view/images/logo-footer-1.webp" alt="">
                        <div class="icons icon-1">
                            <a href="#"><i class="fas fa-phone-alt"></i> +84 345 123 856</a>
                            <a href="#"><i class="fas fa-mobile-android-alt"></i> 19999 999 99, 19999 000 00</a>
                            <a href="mailto:nguyentany.tricker@gmail.com"><i class="fad fa-envelope"></i> nguyentany.tricker@gmail.com</a>
                            <a href="#"><i class="fal fa-globe"></i> www.green-m.com</a>
                        </div>
                    </div>
            
                    <div class="box">
                        <h2>Danh Mục</h2>
                        <div class="icons">
                            '; 
                            foreach($show_category_home as $items) {
                                extract($items);
                                echo '
                                    <a href="?act=shop&check=cate&cate_id='. $category_id .'&page=1&start=0">'. $category_name .'</a>
                                ';
                            }
                            echo '
                        </div>
                    </div>
            
                    <div class="box">
                        <h2>Giới thiệu</h2>
                        <div class="icons">
                            <a href="#">Thông tin công ty</a>
                            <a href="#">Địa chỉ</a>
                            <a href="#">Đại lý cửa hàng</a>
                            <a href="#">Copyright</a>
                        </div>
                    </div>
            
                    <div class="box">
                        <h2>Download App</h2>
                        <div class="image">
                            <img src="view/images/apple.webp" alt="">
                            <img src="view/images/google-play.webp" alt="">
                        </div>
                    </div>
            
                    </div>
                </section>
            
                <div class="credit"> Copyright © 2023 <span> Green-M </span></div>
            
            </body>
            </html>
        ';
} else {
    echo '
                <section class="footer">
            
                    <div class="box-container">
            
                    <div class="box">
                        <img src="view/images/logo-footer-1.webp" alt="">
                        <div class="icons icon-1">
                            <a href="#"><i class="fas fa-phone-alt"></i> +84 345 123 856</a>
                            <a href="#"><i class="fas fa-mobile-android-alt"></i> 19999 999 99, 19999 000 00</a>
                            <a href="mailto:nguyentany.tricker@gmail.com"><i class="fad fa-envelope"></i> nguyentany.tricker@gmail.com</a>
                            <a href="#"><i class="fal fa-globe"></i> www.green-m.com</a>
                        </div>
                    </div>
            
                    <div class="box">
                        <h2>Danh Mục</h2>
                        <div class="icons">
                            '; 
                            foreach($show_category_home as $items) {
                                extract($items);
                                echo '
                                    <a href="?act=shop&check=cate&cate_id='. $category_id .'&page=1&start=0">'. $category_name .'</a>
                                ';
                            }
                            echo '
                        </div>
                    </div>
            
                    <div class="box">
                        <h2>Giới thiệu</h2>
                        <div class="icons">
                            <a href="#">Thông tin công ty</a>
                            <a href="#">Địa chỉ</a>
                            <a href="#">Đại lý cửa hàng</a>
                            <a href="#">Copyright</a>
                        </div>
                    </div>
            
                    <div class="box">
                        <h2>Download App</h2>
                        <div class="image">
                            <img src="view/images/apple.webp" alt="">
                            <img src="view/images/google-play.webp" alt="">
                        </div>
                    </div>
            
                    </div>
                </section>
            
                <div class="credit"> Copyright © 2023 <span> Green-M </span></div>
            </body>
            </html>
        ';
}
?>

<script>
    let menu = document.querySelector('#menu-bar');
    let navbar = document.querySelector('.navbar');
    let header = document.querySelector('.header-2');

    menu.addEventListener('click', () => {
        menu.classList.toggle('fa-times');
        navbar.classList.toggle('active');
    });

    window.onscroll = () => {
        menu.classList.remove('fa-times');
        navbar.classList.remove('active');

        if (window.scrollY > 150) {
            header.classList.add('active');
        } else {
            header.classList.remove('active');
        }
    }

    $(document).ready(function() {
        $(".loginkk").click(function() {
            alert('xin chao');
        });
    });
</script>

<script>

    function show_success() {
        var i = 2;

        function countdown() {
            if(i == 0) {
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
            if(i == 0) {
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

    $(".loadkkk").click(function(event) {
            var i = 1;
            event.preventDefault();
            var href = $(this).attr("href");

            function countdown() {
                if (i == 0) {
                    $(".boxLoading").css("display", "none");
                    window.location.href = href;
                } else {
                    $(".boxLoading").css("display", "flex");
                    i--;
                    setTimeout(countdown, 600);
                }
            }

            countdown();
    });
</script>