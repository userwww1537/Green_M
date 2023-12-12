<?php
    extract($_REQUEST);
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($check)) {
        if($check == 'AiChat') {
            echo '
                <div class="message sent">
                    <p><b>Khách hàng:</b> '. $value .'</p>
                </div>
            ';
            
            if(stripos($value, 'Chào') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Xin chào! tôi là GreenChat, Tôi có thể giúp gì cho bạn?</p>
                    </div>
                ';
            } else if(stripos($value, 'sáng lập') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Xin chào! tôi là GreenChat, Tôi được tạo bởi NguyenTanYDev?</p>
                    </div>
                ';
            } else if(stripos($value, 'Tạo ra') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Xin chào! tôi là GreenChat, Tôi được tạo bởi NguyenTanYDev?</p>
                    </div>
                ';
            } else if(stripos($value, 'tài khoản') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b>Xin lỗi, Tôi không có quyền truy cập vào tài khoản, xin vui lòng hỏi câu hỏi khác!</p>
                    </div>
                ';
            } else if(stripos($value, 'mấy giờ') !== false) {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $now = date('H \G\iờ\ i \P\hú\t\ s \G\i\â\y');
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Hiện tại là '. $now .'</p>
                    </div>
                ';
            } else if(stripos($value, 'thời gian') !== false) {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $now = date('H \G\iờ\ i \P\hú\t\ s \G\i\â\y');
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Hiện tại là '. $now .'</p>
                    </div>
                ';
            } else if(stripos($value, 'bao nhiêu giờ') !== false) {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $now = date('H \G\iờ\ i \P\hú\t\ s \G\i\â\y');
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Hiện tại là '. $now .'</p>
                    </div>
                ';
            } else if(stripos($value, 'giờ') !== false) {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $now = date('H \G\iờ\ i \P\hú\t\ s \G\i\â\y');
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Hiện tại là '. $now .'</p>
                    </div>
                ';
            } else if(stripos($value, 'đơn hàng') !== false) {
                if(isset($_SESSION['83x86'])) {
                    echo '
                        <script>
                            window.location.href = "https://green-m.online/public/profile/index.php?brief=orderMe";
                        </script>
                    ';
                } else {
                    echo '
                        <div class="message received">
                            <p><b>Green-Chat:</b> Vui lòng đăng nhập để sử dụng tính năng!</p>
                        </div>
                    ';
                }
            } else if(stripos($value, 'trang giới thiệu') !== false) {
                if(isset($_SESSION['83x86'])) {
                    echo '
                        <script>
                            window.location.href = "https://green-m.online/public/index.php?act=about";
                        </script>
                    ';
                } else {
                    echo '
                        <div class="message received">
                            <p><b>Green-Chat:</b> Vui lòng đăng nhập để sử dụng tính năng!</p>
                        </div>
                    ';
                }
            } else if(stripos($value, 'trang tin tức') !== false) {
                if(isset($_SESSION['83x86'])) {
                    echo '
                        <script>
                            window.location.href = "https://green-m.online/public/index.php?act=blog&page=1&start=0";
                        </script>
                    ';
                } else {
                    echo '
                        <div class="message received">
                            <p><b>Green-Chat:</b> Vui lòng đăng nhập để sử dụng tính năng!</p>
                        </div>
                    ';
                }
            } else if(stripos($value, 'trang chủ') !== false) {
                if(isset($_SESSION['83x86'])) {
                    echo '
                        <script>
                            window.location.href = "https://green-m.online/public/index.php";
                        </script>
                    ';
                } else {
                    echo '
                        <div class="message received">
                            <p><b>Green-Chat:</b> Vui lòng đăng nhập để sử dụng tính năng!</p>
                        </div>
                    ';
                }
            } else if(stripos($value, 'Trang cá nhân') !== false) {
                if(isset($_SESSION['83x86'])) {
                    echo '
                        <script>
                            window.location.href = "https://green-m.online/public/profile/index.php";
                        </script>
                    ';
                } else {
                    echo '
                        <div class="message received">
                            <p><b>Green-Chat:</b> Vui lòng đăng nhập để sử dụng tính năng!</p>
                        </div>
                    ';
                }
            } else if(stripos($value, 'green') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Chúng tôi là trang thương mại điện tử cung cấp nguồn Rau, Củ, Quả sạch và chất lượng!</p>
                    </div>
                ';
            } else if(stripos($value, 'không thông minh') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Green-Chat đã rời khỏi cuộc trò chuyện....</p>
                    </div>
                ';
            } else if(stripos($value, 'kkk') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Ngôn ngữ sao hỏa à?</p>
                    </div>
                ';
            } else if(stripos($value, 'kk') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Ngôn ngữ sao hỏa à?</p>
                    </div>
                ';
            } else if(stripos($value, 'kkkk') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Ngôn ngữ sao hỏa à?</p>
                    </div>
                ';
            } else if(stripos($value, 'kkkkk') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Ngôn ngữ sao hỏa à?</p>
                    </div>
                ';
            } else if(stripos($value, 'hhh') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Ngôn ngữ sao hỏa à?</p>
                    </div>
                ';
            } else if(stripos($value, 'hh') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Ngôn ngữ sao hỏa à?</p>
                    </div>
                ';
            } else if(stripos($value, 'thông minh') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Cảm ơn, Quá khen rồi đấy!</p>
                    </div>
                ';
            } else if(stripos($value, 'bạn ngu') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Ngu thì hỏi làm gì?</p>
                    </div>
                ';
            } else if(stripos($value, 'Giới thiệu') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Chúng tôi là trang thương mại điện tử cung cấp nguồn Rau, Củ, Quả sạch và chất lượng!</p>
                    </div>
                ';
            } else if(stripos($value, 'Thành viên') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Các thành viên sáng lập Green-M gồm: Nguyễn Tấn Ý(Fullstack), Nguyễn Thanh Tuấn, Đậu Văn Dũng, Văn Hùng, Nguyễn Anh Nhật, Lương Chí Tính!</p>
                    </div>
                ';
            } else if(stripos($value, 'Hỗ trợ') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Bạn cần hỗ trợ gì?</p>
                    </div>
                ';
            } else if(stripos($value, 'liên hệ') !== false) {
                echo '
                    <script>
                        window.location.href = "https://www.facebook.com/nguyentany.2105/";
                        <audio autoplay src="view/music/dangvao.mp3"></audio>
                    </script>
                ';
            } else if(stripos($value, 'Tên') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Tôi tên GreenChat-NTY!</p>
                    </div>
                ';
            } else if(stripos($value, 'mua hàng') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Mua bình thường thôi, có gì đâu mà phải hỗ trợ?</p>
                    </div>
                ';
            } else if(stripos($value, 'Có thể nói') !== false) {
                echo '
                    <div class="message received">
                        <audio autoplay src="view/music/AiVoiceP1.mp3"></audio>
                    </div>
                ';
            } else if(stripos($value, 'nói được không') !== false) {
                echo '
                    <div class="message received">
                        <audio autoplay src="view/music/AiVoiceP1.mp3"></audio>
                    </div>
                ';
            } else if(stripos($value, 'bạn nói') !== false) {
                echo '
                    <div class="message received">
                        <audio autoplay src="view/music/AiVoiceP1.mp3"></audio>
                    </div>
                ';
            } else if(stripos($value, 'nói em yêu anh') !== false) {
                echo '
                    <div class="message received">
                        <audio autoplay src="view/music/AiVoiceP2.mp3"></audio>
                    </div>
                ';
            } else if(stripos($value, 'Yêu') !== false) {
                echo '
                    <div class="message received">
                        <audio autoplay src="view/music/AiVoiceP2.mp3"></audio>
                    </div>
                ';
            } else if(stripos($value, 'giỏ hàng') !== false) {
                echo '
                    <script>
                        window.location.href = "index.php?act=cart";
                    </script>
                    <audio autoplay src="view/music/dangvao.mp3"></audio>
                ';
            } else if(stripos($value, 'cửa hàng') !== false) {
                echo '
                    <script>
                        window.location.href = "index.php?act=shop&check=product&page=1&start=0";
                    </script>
                    <audio autoplay src="view/music/dangvao.mp3"></audio>
                ';
            } else if(stripos($value, 'rau') !== false) {
                echo '
                    <script>
                        window.location.href = "index.php?act=shop&check=cate&cate_id=1&page=1&start=0";
                    </script>
                    <audio autoplay src="view/music/dangvao.mp3"></audio>
                ';
            } else if(stripos($value, 'củ') !== false) {
                echo '
                    <script>
                        window.location.href = "index.php?act=shop&check=cate&cate_id=2&page=1&start=0";
                    </script>
                    <audio autoplay src="view/music/dangvao.mp3"></audio>
                ';
            } else if(stripos($value, 'quả') !== false) {
                echo '
                    <script>
                        window.location.href = "index.php?act=shop&check=cate&cate_id=3&page=1&start=0";
                    </script>
                    <audio autoplay src="view/music/dangvao.mp3"></audio>
                ';
            } else if(stripos($value, 'nguyễn tấn ý') !== false) {
                echo '
                    <div class="message received">
                        <audio autoplay src="view/music/nguyentany.mp3"></audio>
                    </div>
                ';
            } else if(stripos($value, 'tấn ý') !== false) {
                echo '
                    <div class="message received">
                        <audio autoplay src="view/music/nguyentany.mp3"></audio>
                    </div>
                ';
            } else if(stripos($value, 'ý là ai') !== false) {
                echo '
                    <div class="message received">
                        <audio autoplay src="view/music/nguyentany.mp3"></audio>
                    </div>
                ';
            } else if(stripos($value, 'tuổi') !== false) {
                $timeold = 'Ngày 09 Tháng 12 Năm 2023';
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Tôi được tạo '. $timeold .'!</p>
                    </div>
                ';
            } else if(stripos($value, 'đẹp') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> bạn quá tuyệt vời rồi, đừng suy nghĩ về ngoại hình của mình nữa!</p>
                    </div>
                ';
            } else if(stripos($value, 'muốn đẹp') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> bạn quá tuyệt vời rồi, đừng suy nghĩ về ngoại hình của mình nữa!</p>
                    </div>
                ';
            } else if(stripos($value, 'Bất đầu') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Tôi có thể giúp gì cho bạn!</p>
                    </div>
                ';
            } else if(stripos($value, 'hello') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Chào bạn iu, chúc bạn 1 ngày an lành!</p>
                    </div>
                ';
            } else if(stripos($value, 'nhật') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Nhật là 1 thằng ngu, kiến thức có sẵn từ Nguyễn Tấn Ý!</p>
                    </div>
                ';
            } else if(stripos($value, 'hùng') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Hùng là 1 thằng ngu, kiến thức có sẵn từ Nguyễn Tấn Ý!</p>
                    </div>
                ';
            } else if(stripos($value, 'dũng') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Dũng là 1 thằng ngu, kiến thức có sẵn từ Nguyễn Tấn Ý!</p>
                    </div>
                ';
            } else if(stripos($value, 'Tính') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Tính là 1 thằng ngu, kiến thức có sẵn từ Nguyễn Tấn Ý!</p>
                    </div>
                ';
            } else if(stripos($value, 'Tuấn') !== false) {
                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> Tuấn là 1 thằng ngu, kiến thức có sẵn từ Nguyễn Tấn Ý!</p>
                    </div>
                ';
            } else {
                $dTemperature = 0.9;
                $iMaxTokens = 1000;
                $top_p = 1;
                $frequency_penalty = 0.0;
                $presence_penalty = 0.0;
                $OPENAI_API_KEY = "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";
                $sModel = "text-davinci-003";
                $prompt = $value;
                $ch = curl_init();
                $headers  = [ 
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $OPENAI_API_KEY . ''
                ];

                $postData = [
                    'model' => $sModel,
                    'prompt' => str_replace('"', '', $prompt),
                    'temperature' => $dTemperature,
                    'max_tokens' => $iMaxTokens,
                    'top_p' => $top_p,
                    'frequency_penalty' => $frequency_penalty,
                    'presence_penalty' => $presence_penalty,
                    'stop' => '[" Human:", " AI:"]',
                ];

                curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

                $result = curl_exec($ch);
                $decoded_json = json_decode($result, true);

                echo '
                    <div class="message received">
                        <p><b>Green-Chat:</b> "'. $decoded_json['choices'][0]['text'] .'"</p>
                    </div>
                ';
            }
        }
    }
?>