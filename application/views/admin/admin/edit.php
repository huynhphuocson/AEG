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
                <h4 class="card-title">Cập Nhật Admin</h4>
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
                                            <input type="text" placeholder="Tên..." class="form-control" name="name" id="param_name" value="<?php echo $info->name?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('name')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tài Khoản Đăng Nhập</label>
                                            <input type="text" value="<?php echo $info->username?>" placeholder="Tên Đăng Nhập" class="form-control" name="username" id="param_username">
                                            <div name="name_error" class="clear error"><?php echo form_error('username')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" placeholder="Nếu cập nhật thì mới nhập mật khẩu mới..." class="form-control" name="password" id="param_password">
                                            <div name="name_error" class="clear error"><?php echo form_error('password')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nhập lại Password:</label>
                                            <input type="password" placeholder="Nếu cập nhật thì mới nhập mật khẩu mới..." class="form-control" name="re_password" id="param_re_password">
                                            <div name="name_error" class="clear error"><?php echo form_error('re_password')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <laber>Quyền </laber>
                                            <?php foreach ($config_permissions as $controller => $actions):?>
                                            <?php
                                                $permissions_actions = array();
                                                 if(isset($info->permissions->{$controller})){
                                                     $permissions_actions = $info->permissions->{$controller};
                                                 }
                                            ?>
                                                <div class="col-md-6">
                                                    <b><?php echo $controller; ?></b>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php foreach ($actions as $action): ?>
                                                        <input type="checkbox" name="permissions[<?php echo $controller;?>][]" value="<?php echo $action?>" <?php echo (in_array($action, $permissions_actions)) ? 'checked' : '' ?> /> <?php echo $action; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endforeach; ?>
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
        </div>
    </div>
</div>
