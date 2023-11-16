<section class="blog">

    <div class="box-container">

        <div class="b-left-col">

            <?php
            foreach ($show_page as $items) {
                extract($items);
                echo '
                        <div class="box">
                            <img src="view/images/news/' . $news_img . '" alt="">
                            <div class="content">
                                <h2>' . $new_title . '</h2>
                                <div class="icon">
                                    <a href="#"><i class="fal fa-calendar-week"></i> Ngày 2 tháng 11 năm 2023</a>
                                    <a href="#"><i class="fas fa-folder-open"></i> Admin</a>
                                    <a href="#"><i class="fas fa-tag"></i> Rau, củ</a>
                                </div>
                                <p>' . $news_content . '</p>
                                <a href="#" class="btn">Xem Thêm<i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    ';
            }
            ?>
            <div class="next-page">
                <?php
                $trang = 0;
                foreach ($phantrang as $items) {
                    $trang++;
                }
                $chiatrang = $trang / 3;
                $page = ceil($chiatrang);
                $start = 0;
                $show_offset = "";
                $current_page = $_GET['page'];

                for ($i = 1; $i <= $page; $i++) {
                    if ($i == $current_page) {
                        $show_offset .= '<a href="?act=blog&page=' . $i . '&start=' . $start . '" class="page loadkkk" id="active-page">' . $i . '</a>';
                    } else {
                        $show_offset .= '<a href="?act=blog&page=' . $i . '&start=' . $start . '" class="page loadkkk">' . $i . '</a>';
                    }
                    $start += 3;
                }

                echo $show_offset;
                ?>
            </div>

        </div>

        <div class="b-right-col">

            <div class="box">
                <form action="" class="search-box">
                    <input type="search" placeholder="Tìm kiếm.." id="b-search-box">
                    <label for="b-search-box" class="fas fa-search"></label>
                </form>
            </div>

            <div class="b-r-1">
                <div class="box">
                    <h2 class="title">Danh Mục</h2>
                    <div class="content">
                        <a href="#"><i class="fas fa-angle-right"></i>Rau</a>
                        <a href="#"><i class="fas fa-angle-right"></i>Củ</a>
                        <a href="#"><i class="fas fa-angle-right"></i>Quả</a>
                    </div>
                </div>
            </div>

            <div class="b-r-1 b-r-2">
                <div class="box">
                    <h2 class="title">Cập nhật tin tức mới nhất!</h2>
                    <form action="" class="search-box">
                        <input type="search" placeholder="Email của bạn.." id="b-search-box">
                        <label for="b-search-box">Đăng ký</label>
                    </form>
                </div>
            </div>

            <div class="b-r-1 b-r-2">
                <div class="box">
                    <h2 class="title">tags</h2>
                    <div class="tags">
                        <a href="#">Rau</a>
                        <a href="#">Rau, củ</a>
                        <a href="#">Củ</a>
                        <a href="#">Quả</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>