<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 26/05/2018
 * Time: 3:34 CH
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-heading border bottom">
                <h4 class="card-title">Thêm Mới Menu</h4>
            </div>
            <div class="card-block">
                <div class="mrg-top-40">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <form class="form" id="form" action="" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên menu:</label>
                                            <input type="text" placeholder="Tên..." class="form-control" name="name" id="param_name" value="<?php echo set_value('name')?>">
                                            <div name="name_error" class="clear error"><?php echo form_error('name')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Url link:</label>
                                            <input type="text" placeholder="Url..." class="form-control" name="url" id="param_url" value="<?php echo set_value('url')?>">
                                            <div name="url_error" class="clear error"><?php echo form_error('url')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Thứ tự hiển thị:</label>
                                            <input type="text" value="<?php echo set_value('sort_order')?>" placeholder="Thứ tự hiển thị..." class="form-control" name="sort_order" id="param_sort_order">
                                            <div name="name_error" class="clear error"><?php echo form_error('sort_order')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Danh mục cha</label>
                                            <select name="parent_id" id="param_parent_id" _autocheck="true">
                                                <option value="0">Là danh mục cha</option>
                                                <?php foreach ($list1 as $row):?>
                                                    <option value="<?php echo $row->id?>"><?php echo $row->title?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div name="name_error" class="clear error"><?php echo form_error('parent_id')?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Thuộc Controller:</label>
                                            <select name="controller" id="param_sort_order" class="custom-select">
                                                <option value="admin">admin</option>
                                                <option value="article_promotion">article_promotion</option>
                                                <option value="catalog">catalog</option>
                                                <option value="catalog_article">catalog_article</option>
                                                <option value="product">product</option>
                                                <option value="register"></option>
                                                <option value="menu"></option>s
                                            </select>
                                            <div name="name_error" class="clear error"><?php echo form_error('parent_id')?></div>
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