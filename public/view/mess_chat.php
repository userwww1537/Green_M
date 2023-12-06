<br>
<style>
    .chat {
        margin-bottom: auto;
        position: relative;
        left: 50%;
        transform: translate(-50%);
    }

    .card {
        height: 500px;
        border-radius: 15px !important;
    }

    .contacts_body {
        padding: 0.75rem 0 !important;
        overflow-y: auto;
        white-space: nowrap;
    }

    .msg_card_body {
        overflow-y: auto;
    }

    .card-header {
        border-radius: 15px 15px 0 0 !important;
        border-bottom: 0 !important;
    }

    .card-footer {
        border-radius: 0 0 15px 15px !important;
        border-top: 0 !important;
    }

    .container {
        align-content: center;
    }

    .search {
        border-radius: 15px 0 0 15px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
    }

    .search:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .type_msg {
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        height: 60px !important;
        overflow-y: auto;
    }

    .type_msg:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .attach_btn {
        border-radius: 15px 0 0 15px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .send_btn {
        border-radius: 0 15px 15px 0 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .search_btn {
        border-radius: 0 15px 15px 0 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .contacts {
        list-style: none;
        padding: 0;
    }

    .contacts button {
        width: 100% !important;
        padding: 5px 10px;
        margin-bottom: 15px !important;
    }

    .active {
        background-color: rgba(0, 0, 0, 0.3);
    }

    .user_img {
        height: 60px;
        width: 60px;
        border: 1.5px solid #f5f6fa;
    }

    .user_img_msg {
        height: 40px;
        width: 40px;
        border: 1.5px solid #f5f6fa;
    }

    .img_cont {
        position: relative;
        height: 70px;
        width: 70px;
    }

    .img_cont_msg {
        height: 40px;
        width: 40px;
    }

    .online_icon {
        position: absolute;
        height: 15px;
        width: 15px;
        background-color: #4cd137;
        border-radius: 50%;
        bottom: 13px;
        right: 13px;
        border: 1.5px solid white;
    }

    .offline-icon {
        position: absolute;
        height: 15px;
        width: 15px;
        border-radius: 50%;
        bottom: 13px;
        right: 13px;
        border: 1.5px solid white;
        background-color: #c23616 !important;
    }

    .user_info {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 15px;
    }

    .user_info span {
        font-size: 20px;
        color: white;
    }

    .user_info p {
        font-size: 10px;
        color: rgba(255, 255, 255, 0.6);
    }

    .video_cam {
        margin-left: 50px;
        margin-top: 5px;
    }

    .video_cam span {
        color: white;
        font-size: 20px;
        cursor: pointer;
        margin-right: 20px;
    }

    .msg_cotainer {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 10px;
        border-radius: 25px;
        background-color: #82ccdd;
        padding: 10px;
        position: relative;
    }

    .msg_cotainer_send {
        margin-top: auto;
        margin-bottom: auto;
        margin-right: 10px;
        border-radius: 25px;
        background-color: #78e08f;
        padding: 10px;
        position: relative;
    }

    .msg_time {
        position: absolute;
        left: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .msg_time_send {
        position: absolute;
        right: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .msg_head {
        position: relative;
    }

    #action_menu_btn {
        position: absolute;
        right: 10px;
        top: 10px;
        color: white;
        cursor: pointer;
        font-size: 20px;
    }

    .action_menu {
        z-index: 1;
        position: absolute;
        padding: 15px 0;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border-radius: 15px;
        top: 30px;
        right: 15px;
        display: none;
    }

    .action_menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .action_menu ul li {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 5px;
    }

    .action_menu ul li i {
        padding-right: 10px;
    }

    .action_menu ul li:hover {
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.2);
    }
</style>
<div class="col-md-6 col-xl-6 chat">
    <div class="card">
        <div class="card-header msg_head" style="background: rgb(59, 53, 53);">
            <div class="d-flex bd-highlight">
                <div class="img_cont_msg avt_to_9">
                    <img style="position: relative; z-index: 999999;" src="<?=$show_mess_info['account_avt']?>" class="rounded-circle user_img">
                </div>
                <div class="user_info">
                    <span><?=$show_mess_info['account_name']?></span>
                    <?php
                        if($show_mess_info['account_status'] == "Online") {
                            echo '<label style="color: green; font-size: 16px;">Đang hoạt động</label>';
                        } else {
                            echo '<label style="color: red; font-size: 16px;">Không hoạt động</label>';
                        }
                    ?>
                </div>
                <div class="video_cam">
                    <span><i class="fas fa-video"></i></span>
                    <span><i class="fas fa-phone"></i></span>
                </div>
            </div>
            <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
            <div class="action_menu">
                <ul>
                    <li><i class="fas fa-user-circle"></i> Xem trang cá nhân</li>
                    <li class="delete_mess" data-from="<?=$from?>" data-to="<?=$to?>"><i class="fas fa-users"></i> Hủy trò chuyện</li>
                    <li><i class="fas fa-plus"></i> Báo cáo</li>
                </ul>
            </div>
        </div>
        <div class="card-body msg_card_body">
            <div class="d-flex justify-content-start mb-4">
                <div class="msg_cotainer">
                    <!-- Chào, ad có rảnh đó không?
                            <span class="msg_time">8:40 AM, Hôm Nay</span> -->
                </div>
            </div>
            <div class="d-flex justify-content-end mb-4">
                <div class="msg_cotainer_send">
                    <!-- Chào Ý, bạn cần hỗ trợ gì?
                            <span class="msg_time_send">8:55 AM, Hôm Nay</span> -->
                </div>
            </div>
        </div>
        <div class="bocpause"><i style="font-size: 30px; cursor: pointer;" class="fad fa-pause-circle pauseline"></i></div>
        <div class="card-footer">
            <div class="input-group">
                <div class="input-group-append">
                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                </div>
                <textarea name="" class="form-control type_msg" style="font-size: 16px;" placeholder="<?=$_SESSION['83x86']['account_name']?> ơi, bạn muốn nhắn gì?"></textarea>
                <div class="input-group-append">
                    <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#action_menu_btn').click(function() {
            $('.action_menu').toggle();
        });
    });
</script>
<input type="hidden" id="to" value="<?=$to?>">
<input type="hidden" id="from" value="<?=$_SESSION['83x86']['account_id']?>">
<script>
    var load = setInterval(function() {
        var msgCardBody = $('.msg_card_body');
        msgCardBody.scrollTop(msgCardBody[0].scrollHeight);
    }, 100);

    $(document).on('click', '.pauseline', function() {
        clearInterval(load);
        $(".success_noti").text("Đã dừng auto xuống dòng!");
        show_success();
    });

    $(".send_btn").on('click', function() {
        var to = $("#to").val();
        var msg = $(".type_msg").val();
        if(msg != "") {
            $.ajax({
                url: "controllers/xuly_mess.php",
                method: "POST",
                data: {
                    msg: msg,
                    to: to
                },
                success: function() {
                    $(".type_msg").val("");
                }
            });
        } else {
            $(".error_noti").text('Vui lòng nhập tin nhắn!');
            show_error();
        }
    });

    $(".type_msg").keypress(function(event) {
        if (event.which === 13) {
            var to = $("#to").val();
            var msg = $(".type_msg").val();
            if(msg != "") {
                $.ajax({
                    url: "controllers/xuly_mess.php",
                    method: "POST",
                    data: {
                        msg: msg,
                        to: to
                    },
                    success: function() {
                        $(".type_msg").val("");
                    }
                });
            } else {
                $(".error_noti").text('Vui lòng nhập tin nhắn!');
                show_error();
            }
        }
    });

    $(".delete_mess").on('click', function() {
        var to = $(this).data('to');
        var from = $(this).data('from');
        $.ajax({
            url: "controllers/xuly_mess.php",
            method: "POST",
            data: {
                check: "del",
                to: to,
                from: from
            },
            success: function(data) {
                $(".success_noti").text("Xóa cuộc trò chuyện thành công");
                show_success();
                setTimeout(function() {
                    window.location.href = "?act=message";
                }, 2000);
            }
        });
    });

    function show() {
        var to = $("#to").val();
        var from = $("#from").val();
        $.ajax({
            url: "controllers/xuly_mess.php",
            method: "POST",
            data: {
                check: "show",
                to: to,
                from: from
            },
            success: function(data) {
                $(".msg_card_body").html(data);
            }
        });
    }



    setInterval(show, 100);
</script>