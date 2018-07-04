<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 07/06/2018
 * Time: 11:22 SA
 */
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 pt-5 promotion">
                <div class="text-footer-1">
                    Ưu đãi ngày hè, <span style="color:red">giảm 30%</span> khóa học IELTS
                </div>
                <div class="text-footer-2">
                    Chỉ áp dụng trong tháng 6/2018
                </div>
                <div class="img-footer">
                    <img class="img-responsive img-fluid" src="<?php echo public_url('upload/')?>images/Group 11.png" >
                    <img class="img-responsive img-fluid" src="<?php echo public_url('upload/')?>images/Group 1.png" >
                </div>
            </div>
            <div class="col-12 col-md-6 pt-5 register">
                <div class="col-md-12 text-footer-3 pb-0 pb-md-4">
                    Đăng ký tư vấn và học thử miễn phí!
                </div>
                <div class="col-md-12 text-footer-4">
                    Hãy để lại thông tin của bạn bằng cách điền vào form bên dưới, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất! AEG cam kết không cung cấp thông tin của bạn cho bất kỳ bên thứ ba nào!
                </div>
                <div class="table-register" >
                    <form class="form" id="form" action="home/add" method="post" enctype="multipart/form-data">
                        <div class="row px-2">
                            <div class="col-12 col-lg-6">
                                <div class="form-group input-style-1">
                                    <input type="text" placeholder="Họ tên học viên *" class="form-control input-style-1" name="name" >
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group input-style-1">
                                    <input type="text" placeholder="Số điện thoại *" class="form-control input-style-1" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-12 col-lg-6">
                                <div class="form-group input-style-1">
                                    <input type="text" placeholder="Email" class="form-control input-style-1" name="email">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group " >
                                    <select class="form-control input-style-1" name="city">
                                        <option value="">
                                            Chọn nơi ở *
                                        </option>
                                        <?php foreach ($province as $row): ?>
                                            <option value="<?php echo $row->id?>" > <?php echo $row->name?> </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-12 col-lg-12 input_style_1">
                                <textarea class="form-control input-style-1" placeholder="Nội dung" rows="3" id="form-1-5" name="content"></textarea>
                            </div>
                        </div>
                        <div class="row format-row-1">
                            <div class="col-12 col-lg-6">
                                <div class="text-footer-5">(*)Các trường bắt buộc</div>
                            </div>
                            <div class="col-12 col-lg-6 pt-2 pt-lg-0" >
                                <button type="submit" class="btn btn-light" style="width:100%;">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
