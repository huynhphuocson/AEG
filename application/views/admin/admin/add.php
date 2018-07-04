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
                <h4 class="card-title">Thêm mới admin</h4>
            </div>
            <div class="card-block">
                <div class="mrg-top-40">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <form class="form" id="form" action="" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên:</label>
                                            <input type="text" placeholder="Tên..." class="form-control" name="name" id="param_name" value="<?php echo set_value('name')?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('name')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tài Khoản Đăng Nhập</label>
                                            <input type="text" value="<?php echo set_value('username')?>" placeholder="Tên Đăng Nhập" class="form-control" name="username" id="param_username">
                                            <div name="name_error" class="clear error"><?php echo form_error('username')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" placeholder="Password..." class="form-control" name="password" id="param_password">
                                            <div name="name_error" class="clear error"><?php echo form_error('password')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nhập lại Password:</label>
                                            <input type="password" placeholder="Re_Password..." class="form-control" name="re_password" id="param_re_password">
                                            <div name="name_error" class="clear error"><?php echo form_error('re_password')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <laber>Quyền </laber>
                                            <?php foreach ($config_permissions as $controller => $actions):?>
                                                <div class="col-md-6">
                                                    <b><?php echo $controller; ?></b>
                                                </div>
                                                <div class="col-md-6">
                                                <?php foreach ($actions as $action): ?>
                                                    <input type="checkbox" name="permissions[<?php echo $controller;?>][]" value="<?php echo $action?>"/> <?php echo $action; ?>
                                                <?php endforeach; ?>
                                                </div>
                                            <?php endforeach; ?>
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
