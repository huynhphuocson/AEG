<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 07/06/2018
 * Time: 11:09 SA
 */
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 my-4">
                <img src="<?php echo public_url('upload/')?>images/IELTS.png" >
                <div id="top-1">
                    <p>Khóa học </br> luyện thi <span style="color: red;">IELTS</span></p>
                </div>
                <div id="bottom-1">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">FOUNDATION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">FOUNDATION PLUS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">EXPLORE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">ADVANCE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">EXCEL</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 my-0 my-md-4" id="chart">
                <img class="img-fluid" src="<?php echo public_url('upload/')?>images/Chart.png">
            </div>
            <div class="col-md-12 col-lg-4 my-0 my-md-4" >
                <div class="advance">
                    <!--<div class="advance-text-1 py-2"> Nâng cao năng lực ngôn ngữ, tìm hiểu tổng thể bài thi IELTS từ đơn giản đến phức tạp </div>
                    <div class="advance-text-2 py-1"><li> <span style="color:#666C75;">Thảo luận về các chủ đề học thuật.</span></li></div>
                    <div class="advance-text-2 py-1"><li> <span style="color:#666C75;">Mô tả quy trình, biểu đồ... chọn lọc thông tin quan trọng và áp dụng các cấu trúc tối ưu nhất.</span></li></div>
                    <div class="advance-text-1 py-2">Mở rộng các dạng câu hỏi và chuyên sâu vào cấu trúc bài thi, bí quyết tối ưu hóa việc phân bố thời gian và chiến lược làm bài thi. </div>
                    <div class="advance-text-2 py-1"><li><span style="color:#666C75;"> Nâng cao khả năng sử dụng cấu trúc ngữ pháp.</span></li></div>
                    <div class="advance-text-2 py-1"><li><span style="color:#666C75;"> Phát triển kỹ năng nhận biết từ khóa và câu hỏi đánh lạc hướng, dự đoán câu trả lời, xác định câu kết luận.</span></li></div>
                    <div class="advance-text-1 pt-2">Trình độ đầu vào: 5.0 - 5.5 IELTS</div>-->
                   <?php foreach ($advance_list as $row):?>
                    <!--<h3 style="color:#EC2227"><?php /*echo $row->title; */?></h3>-->
                    <?php echo $row->content; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
