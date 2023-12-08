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


<style>
    .chat-icon {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 60px;
        height: 60px;
        background-image: url(path/to/chat-icon.png);
        background-size: cover;
        cursor: pointer;
        z-index: 9999;
        font-size: 28px;
        border-radius: 45%;
    }

    #chat-popup {
        position: fixed;
        bottom: 90px;
        right: 20px;
        width: 300px;
        height: 400px;
        background-color: #f1f1f1;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        display: none;
        z-index: 9999;
    }

    .chat-header {
        padding: 10px;
        background-color: #333;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .close-btn {
        color: #fff;
        background-color: transparent;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }

    .chat-body {
        padding: 10px;
        height: 300px;
        overflow-y: scroll;
    }

    .chat-footer {
        padding: 10px;
        display: flex;
    }

    input[type="text"] {
        flex-grow: 1;
        padding: 5px;
        border-radius: 5px;
    }

    .send-btn {
        margin-left: 10px;
        padding: 5px 10px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<button class="chat-icon" onclick="openChat()"><i class="fas fa-comment"></i></button>
<div id="chat-popup">
    <div class="chat-header">
        <h3>Chat với Green-Chat</h3>
        <button class="close-btn" onclick="closeChat()">&times;</button>
    </div>
    <div class="chat-body">
        <div class="message received">
            <p><b>Green-Chat:</b> Xin chào! Có gì tôi có thể giúp bạn?</p>
        </div>
        <!-- <div class="message sent">
            <p>Tôi đang gặp sự cố với trang web của tôi. Bạn có thể giúp tôi không?</p>
        </div>
        <div class="message received">x`
            <p>Tất nhiên! Tôi sẽ cố gắng giúp bạn giải quyết vấn đề của bạn.</p>
        </div> -->
    </div>
    <div class="chat-footer">
        <input type="text" id="value-ai-chat" placeholder="Nhập tin nhắn" />
        <button class="send-btn-ai-chat">Gửi</button>
    </div>
</div>
<script>
    $(".send-btn-ai-chat").on('click', function() {
        var value = $("#value-ai-chat").val();
        if(value == '') {
            $(".error_noti").text('Vui lòng điền nội dung!');
            show_error();
        } else {
            $.ajax({
                url: "controllers/chatAi.php",
                method: "POST",
                data: {
                    check: "AiChat",
                    value: value
                },
                success: function(data) {
                    $(".chat-body").append(data);
                    $("#value-ai-chat").val("");
                    var chatBody = $(".chat-body");
                    var scrollHeight = chatBody.prop("scrollHeight");
                    chatBody.scrollTop(scrollHeight);
                }
            });
        }
    });

    $("#value-ai-chat").keyup(function(event) {
        if (event.keyCode === 13) {
            var value = $("#value-ai-chat").val();
            if(value == '') {
                $(".error_noti").text('Vui lòng điền nội dung!');
                show_error();
            } else {
                $.ajax({
                    url: "controllers/chatAi.php",
                    method: "POST",
                    data: {
                        check: "AiChat",
                        value: value
                    },
                    success: function(data) {
                        $(".chat-body").append(data);
                        $("#value-ai-chat").val("");
                        var chatBody = $(".chat-body");
                        var scrollHeight = chatBody.prop("scrollHeight");
                        chatBody.scrollTop(scrollHeight);
                    }
                });
            }
        }
    });

    function openChat() {
        document.getElementById("chat-popup").style.display = "block";
    }

    function closeChat() {
        document.getElementById("chat-popup").style.display = "none";
    }
</script>