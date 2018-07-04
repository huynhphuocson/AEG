<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/05/2018
 * Time: 5:26 CH
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-heading border bottom">
                <h4 class="card-title">Thêm mới nhân viên</h4>
            </div>
            <div class="card-block">
                <div class="mrg-top-40">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <form class="form" id="form" action="" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên công ty:</label>
                                            <input type="text" placeholder="Tên công ty" class="form-control" name="company" id="param_company" value="<?php echo set_value('company')?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('company')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên nhân viên:</label>
                                            <input type="text" placeholder="Tên nhân viên" class="form-control" name="last_name" id="param_last_name" value="<?php echo set_value('last_name')?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('last_name')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Họ nhân viên:</label>
                                            <input type="text" placeholder="Họ nhân viên" class="form-control" name="first_name" id="param_first_name" value="<?php echo set_value('first_name')?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('first_name')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email nhân viên:</label>
                                            <input type="text" placeholder="Email nhân viên" class="form-control" name="email_address" id="param_email_address" value="<?php echo set_value('email_address')?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('email_address')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Chức vụ</label>
                                            <input type="text" placeholder="Chức vụ" class="form-control" name="job_title" id="param_job_title" value="<?php echo set_value('email_address')?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('job_title')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input type="text" placeholder="Số điện thoại" class="form-control" name="business_phone" id="param_business_phone" value="<?php echo set_value('business_phone')?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('business_phone')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Số fax</label>
                                            <input type="text" placeholder="Số fax" class="form-control" name="fax_number" id="param_fax_number" value="<?php echo set_value('fax_number')?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('fax_number')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input type="text" placeholder="Địa chỉ" class="form-control" name="address" id="param_address" value="<?php echo set_value('address')?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('address')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Thành phố</label>
                                            <input type="text" placeholder="Thành phố" class="form-control" name="city" id="param_city" value="<?php echo set_value('city')?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('city')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Ghi chú:</label>
                                            <input type="text" placeholder="Ghi chú" class="form-control" name="notes" id="param_notes" value="<?php echo set_value('notes')?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('notes')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <div class="text-right mrg-top-5">
                                            <button type="submit" class="btn btn-primary">Tạo Mới</button>
                                            <input type="button" value="Back" class="btn btn-warning" onclick="window.location.href='<?php echo $_SERVER['HTTP_REFERER'];?>'" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
