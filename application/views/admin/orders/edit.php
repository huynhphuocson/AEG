<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/05/2018
 * Time: 5:37 CH
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-heading border bottom">
                <h4 class="card-title">Cập Nhật Hoá Đơn</h4>
            </div>
            <div class="card-block">
                <div class="mrg-top-40">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <form class="form" id="form" action="" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mã đơn đặt hàng:</label>
                                            <input type="text" placeholder="Tên công ty" class="form-control" name="company" id="param_company" value="<?php echo $info->id?>" readonly>
                                            <div name="name_error" class="clear error"><?php echo form_error('company')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên nhân viên:</label>
                                            <select name="name_emp">
                                                <option value="">
                                                    <!-- kiem tra danh muc co danh muc con hay khong -->
                                                    <?php foreach ($list_emp as $row): ?>
                                                    <option value="<?php echo $row->id?>" <?php if($row->id == $info->employee_id) echo 'selected';?> > <?php echo $row->last_name?> </option>
                                                    <?php endforeach;?>
                                                </option>
                                            </select>
                                            <div name="name_error" class="clear error"><?php echo form_error('last_name')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên khách hàng:</label>
                                            <select name="name_cus">
                                                <option value="">
                                                    <!-- kiem tra danh muc co danh muc con hay khong -->
                                                    <?php foreach ($list_cus as $row): ?>
                                                    <option value="<?php echo $row->id?>" <?php if($row->id == $info->customer_id) echo 'selected';?> > <?php echo $row->last_name?> </option>
                                                    <?php endforeach;?>
                                                </option>
                                            </select>
                                            <div name="name_error" class="clear error"><?php echo form_error('last_name')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Ngày đặt hàng:</label>
                                            <input type="text" placeholder="Ngày đặt hàng" class="form-control" name="order_date" id="param_order_date" value="<?php echo $info->order_date?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('email_address')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tình trạng đơn hàng:</label>
                                            <select name="status_orders">
                                                <option value="">
                                                    <!-- kiem tra danh muc co danh muc con hay khong -->
                                                    <?php foreach ($list_ordsta as $row): ?>
                                                    <option value="<?php echo $row->id?>" <?php if($row->id == $info->status_id) echo 'selected';?> > <?php echo $row->status_name?> </option>
                                                    <?php endforeach;?>
                                                </option>
                                            </select>
                                            <div name="name_error" class="clear error"><?php echo form_error('job_title')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Ngày vận chuyển:</label>
                                            <input type="text" placeholder="Ngày vận chuyển:" class="form-control" name="shipped_date" id="param_business_phone" value="<?php echo $info->shipped_date?>" >
                                            <div name="name_error" class="clear error"><?php echo form_error('business_phone')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên công ty vận chuyển:</label>
                                            <select name="shipper_id">
                                                <option value="">
                                                    <!-- kiem tra danh muc co danh muc con hay khong -->
                                                    <?php foreach ($list_shipper as $row): ?>
                                                    <option value="<?php echo $row->id?>" <?php if($row->id == $info->shipper_id) echo 'selected';?> > <?php echo $row->company?> </option>
                                                    <?php endforeach;?>
                                                </option>
                                            </select>
                                            <div name="name_error" class="clear error"><?php echo form_error('job_title')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên người nhận:</label>
                                            <input type="text" placeholder="Tên người nhận" class="form-control" name="ship_name" id="param_fax_number" value="<?php echo $info->ship_name?>" >
                                            <div name="name_error" class="clear error"><?php echo form_error('fax_number')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Địa chỉ người nhận</label>
                                            <input type="text" placeholder="Địa chỉ" class="form-control" name="ship_address" id="param_address" value="<?php echo $info->ship_address?>" >
                                            <div name="name_error" class="clear error"><?php echo form_error('address')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Thành phố người nhận</label>
                                            <input type="text" placeholder="Thành phố" class="form-control" name="ship_city" id="param_city" value="<?php echo $info->ship_city?>" >
                                            <div name="name_error" class="clear error"><?php echo form_error('city')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mã thành phố vận chuyển:</label>
                                            <input type="text" placeholder="Mã thành phố vận chuyển:" class="form-control" name="ship_state_province" id="param_notes" value="<?php echo $info->ship_state_province?>" >
                                            <div name="name_error" class="clear error"><?php echo form_error('notes')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mã code thành phố vận chuyển:</label>
                                            <input type="text" placeholder="Mã code thành phố vận chuyển:" class="form-control" name="ship_zip_postal_code" id="param_notes" value="<?php echo $info->ship_zip_postal_code?>" >
                                            <div name="name_error" class="clear error"><?php echo form_error('notes')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Quốc gia vận chuyển:</label>
                                            <input type="text" placeholder="Quốc gia vận chuyển:" class="form-control" name="ship_country_region" id="param_notes" value="<?php echo $info->ship_country_region?>" >
                                            <div name="name_error" class="clear error"><?php echo form_error('notes')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Phí vận chuyển:</label>
                                            <input type="text" placeholder="Phí vận chuyển:" class="form-control" name="shipping_fee" id="param_notes" value="<?php echo $info->shipping_fee?>" >
                                            <div name="name_error" class="clear error"><?php echo form_error('notes')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Loại hình thanh toán:</label>
                                            <input type="text" placeholder="Loại hình thanh toán:" class="form-control" name="payment_type" id="param_notes" value="<?php echo $info->payment_type?>" >
                                            <div name="name_error" class="clear error"><?php echo form_error('notes')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Ngày thanh toán:</label>
                                            <input type="text" placeholder="Ngày thanh toán:" class="form-control" name="paid_date" id="param_notes" value="<?php echo $info->paid_date?>" >
                                            <div name="name_error" class="clear error"><?php echo form_error('notes')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <div class="text-right mrg-top-5">
                                            <input type="submit" value="Cập nhật" class="btn btn-success" />
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
