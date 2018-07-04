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
                <h4 class="card-title">Cập Nhật Nhân Viên</h4>
            </div>
            <div class="card-block">
                <div class="mrg-top-40">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <?php foreach ($info as $row): ?>
                            <form class="form" id="form" action="" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mã đơn đặt hàng:</label>
                                            <input type="text" placeholder="Tên công ty" class="form-control" name="id" id="param_company" value="<?php echo $row->id?>" readonly>
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
                                                    <?php foreach ($list_emp as $row1): ?>
                                                    <option value="<?php echo $row1->id?>" <?php if($row1->id == $row->employee_id) echo 'selected';?> > <?php echo $row1->last_name." "; echo $row1->first_name?> </option>
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
                                            <input type="text" placeholder="Họ nhân viên" class="form-control" name="first_name" id="param_first_name" value="<?php echo $row->name_emp?>" readonly>
                                            <div name="name_error" class="clear error"><?php echo form_error('first_name')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Ngày đặt hàng:</label>
                                            <input type="text" placeholder="Email nhân viên" class="form-control" name="email_address" id="param_email_address" value="<?php echo $row->order_date?>" readonly>
                                            <div name="name_error" class="clear error"><?php echo form_error('email_address')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tình trạng đơn hàng:</label>
                                            <select name="status_orders" onchange="genderChanged(this)">
                                                <option value="">
                                                    <!-- kiem tra danh muc co danh muc con hay khong -->
                                                    <?php foreach ($list_ordsta as $row1): ?>
                                                    <option value="<?php echo $row1->id?>" <?php if($row1->id == $row->status_id) echo 'selected';?> > <?php echo $row1->status_name?> </option>
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
                                            <input type="text" placeholder="Số điện thoại" class="form-control" name="business_phone" id="param_business_phone" value="<?php echo $row->shipped_date?>" readonly>
                                            <div name="name_error" class="clear error"><?php echo form_error('business_phone')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên người nhận</label>
                                            <input type="text" placeholder="Số fax" class="form-control" name="fax_number" id="param_fax_number" value="<?php echo $row->ship_name?>" readonly>
                                            <div name="name_error" class="clear error"><?php echo form_error('fax_number')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Địa chỉ người nhận</label>
                                            <input type="text" placeholder="Địa chỉ" class="form-control" name="address" id="param_address" value="<?php echo $row->ship_address?>" readonly>
                                            <div name="name_error" class="clear error"><?php echo form_error('address')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Thành phố người nhận</label>
                                            <input type="text" placeholder="Thành phố" class="form-control" name="city" id="param_city" value="<?php echo $row->ship_city?>" readonly>
                                            <div name="name_error" class="clear error"><?php echo form_error('city')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mã thành phố vận chuyển:</label>
                                            <input type="text" placeholder="Ghi chú" class="form-control" name="notes" id="param_notes" value="<?php echo $row->ship_state_province?>" readonly>
                                            <div name="name_error" class="clear error"><?php echo form_error('notes')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mã code thành phố vận chuyển:</label>
                                            <input type="text" placeholder="Ghi chú" class="form-control" name="notes" id="param_notes" value="<?php echo $row->ship_zip_postal_code?>" readonly>
                                            <div name="name_error" class="clear error"><?php echo form_error('notes')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Quốc gia vận chuyển:</label>
                                            <input type="text" placeholder="Ghi chú" class="form-control" name="notes" id="param_notes" value="<?php echo $row->ship_country_region?>" readonly>
                                            <div name="name_error" class="clear error"><?php echo form_error('notes')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Phí vận chuyển:</label>
                                            <input type="text" placeholder="Ghi chú" class="form-control" name="notes" id="param_notes" value="<?php echo $row->shipping_fee?>" readonly>
                                            <div name="name_error" class="clear error"><?php echo form_error('notes')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Loại hình thanh toán:</label>
                                            <input type="text" placeholder="Ghi chú" class="form-control" name="notes" id="param_notes" value="<?php echo $row->payment_type?>" readonly>
                                            <div name="name_error" class="clear error"><?php echo form_error('notes')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Ngày thanh toán:</label>
                                            <input type="text" placeholder="Ghi chú" class="form-control" name="notes" id="param_notes" value="<?php echo $row->paid_date?>" readonly>
                                            <div name="name_error" class="clear error"><?php echo form_error('notes')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <div class="text-right mrg-top-5" id="btn_appearance">
                                            <input type="button" value="Back" class="btn btn-warning" onclick="window.location.href='<?php echo $_SERVER['HTTP_REFERER'];?>'" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript">
    function genderChanged(obj)
    {
        var btn = document.createElement("BUTTON");
        var t = document.createTextNode("Cập nhật");
        btn.appendChild(t);
        document.getElementById("btn_appearance").appendChild(btn);
    }
</script>