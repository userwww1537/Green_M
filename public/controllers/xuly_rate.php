<?php
    session_start();
    extract($_REQUEST);
    if (file_exists('../model_dao/rate.php')) {
        require "../model_dao/rate.php";
    }
    $rate = new rate_lass();
    if(isset($loc)) {
        $show_rate = $rate->show_rate($id_product, $loc);
        if (count($show_rate) > 0) {
            foreach ($show_rate as $items) {
                extract($items);
                $convert = strtotime($time_reg);
                $comment_date = date('d-m-Y', $convert);
                $current_date = date('d-m-Y');
                $formatted_time = date('H \g\i\ờ', $convert);
            
                $comment_datetime = date_create($comment_date);
                $current_datetime = date_create($current_date);
                $interval = date_diff($comment_datetime, $current_datetime);
                $days_ago = $interval->format('%a');
            
                if ($comment_date == $current_date) {
                    echo '
                        <div id="comment">
                            <div class="userCmt">' . $account_name . '</div>
                            <p class="time" style="font-size: 12px;">Thời gian: lúc ' . $formatted_time . ', Hôm nay</p>
                            <div class="rated">' . $rate_star . '⭐</div>
                            <div class="content">' . $rate_comment . '</div>
                        </div>
                    ';
                } else {
                    echo '
                        <div id="comment">
                            <div class="userCmt">' . $account_name . '</div>
                            <p class="time" style="font-size: 12px;">Thời gian: ' . $days_ago . ' ngày trước, lúc ' . $formatted_time . '</p>
                            <div class="rated">' . $rate_star . '⭐</div>
                            <div class="content">' . $rate_comment . '</div>
                        </div>
                    ';
                }
            }
        } else {
            echo '
                    <h3>Hiện tại sản phẩm này chưa có đánh giá!</h3>
            ';
        }
    } else if(isset($demRate)) {
        $show_rate = $rate->show_rate_all($id_product);
        $totalStar = 0;
        $turnStar = 0;
        if (count($show_rate) > 0) {
            foreach ($show_rate as $valueStar) {
                extract($valueStar);
                $totalStar += $rate_star;
                $turnStar++;
            }
            $tongStarAll = ($totalStar / $turnStar);
            if ($tongStarAll < 1) {
                echo '            
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        ' . round($tongStarAll, 1) . ' Sao
                        <span>(Không có đánh giá)</span>
                    ';
            } else if ($tongStarAll >= 1 && $tongStarAll < 2) {
                echo '            
                        <i class="fas fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        ' . round($tongStarAll, 1) . ' Sao
                        <span>(' . $turnStar . ' lượt đánh giá)</span>
                    ';
            } else if ($tongStarAll >= 2 && $tongStarAll < 3) {
                echo '            
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        ' . round($tongStarAll, 1) . ' Sao
                        <span>(' . $turnStar . ' lượt đánh giá)</span>
                    ';
            } else if ($tongStarAll >= 3 && $tongStarAll < 4) {
                echo '            
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        ' . round($tongStarAll, 1) . ' Sao
                        <span>(' . $turnStar . ' lượt đánh giá)</span>
                    ';
            } else if ($tongStarAll >= 4 && $tongStarAll < 5) {
                echo '            
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fal fa-star"></i>
                        ' . round($tongStarAll, 1) . ' Sao
                        <span>(' . $turnStar . ' lượt đánh giá)</span>
                    ';
            } else {
                echo '            
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        ' . round($tongStarAll, 1) . ' Sao
                        <span>(' . $turnStar . ' lượt đánh giá)</span>
                    ';
            }
        } else {
            $tongStarAll = 0;
            echo '            
                    <i class="fal fa-star"></i>
                    <i class="fal fa-star"></i>
                    <i class="fal fa-star"></i>
                    <i class="fal fa-star"></i>
                    <i class="fal fa-star"></i>
                    ' . round($tongStarAll, 1) . ' Sao
                    <span>(' . $turnStar . ' lượt đánh giá)</span>
                ';
        }
    } else if(isset($valueContent) && isset($valueStar)) {
        $rate->add_rate($valueContent, $valueStar, $id_product, $idOrder);
    }
?>