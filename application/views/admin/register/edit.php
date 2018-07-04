<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 26/05/2018
 * Time: 3:43 CH
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-heading border bottom">
                <h4 class="card-title">Cập Nhật Vùng Hiển Bài Viết</h4>
            </div>
            <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-block">
                    <div class="mrg-top-40">
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <form class="form" id="form" action="" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Họ và Tên Khách Hàng:</label>
                                                <input type="text" placeholder="Tên..." class="form-control" name="name" id="param_name" value="<?php echo $info->name?>">
                                                <div name="name_error" class="clear error"><?php echo form_error('name')?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Số Điện Thoại Khách Hàng:</label>
                                                <input type="text" placeholder="Số Điện Thoại..." class="form-control" name="phone" id="param_name" value="<?php echo $info->phone?>">
                                                <div name="name_error" class="clear error"><?php echo form_error('name')?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email Khách Hàng:</label>
                                                <input type="text" placeholder="Email..." class="form-control" name="email" id="param_name" value="<?php echo $info->email?>">
                                                <div name="name_error" class="clear error"><?php echo form_error('name')?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nơi ở</label>
                                                <select name="province" id="param_province" _autocheck="true">
                                                    <option value="0">Nơi ở</option>
                                                    <?php foreach ($list_provice as $row):?>
                                                        <option value="<?php echo $row->id?>" <?php echo ($row->id == $info->province_id) ? 'selected' : '' ?>><?php echo $row->name?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div name="name_error" class="clear error"><?php echo form_error('province')?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nội dung:</label>
                                                <textarea class="form-control" id="param_name" name="content" ><?php echo $info->content?></textarea>
                                                <div name="name_error" class="clear error"><?php echo form_error('name')?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-xs-6">
                                            <div class="text-right mrg-top-5">
                                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                                <input type="button" value="Back" class="btn btn-warning" onclick="window.location.href='<?php echo $_SERVER['HTTP_REFERER'];?>'" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>