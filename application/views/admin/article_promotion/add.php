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
                <h4 class="card-title">Thêm Mới Bài Viết</h4>
            </div>
            <form class="form" id="form" action="<?php echo admin_url('article_promotion/add')?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="card-block">
                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Tên tiêu đề bài viết:<span class="req">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="form-1-1" placeholder="Name" name="name">
                            </div>
                            <div name="name_error" class="clear error">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Hình ảnh:<span class="req">*</span></label>
                            <div class="col-md-10">
                                <input type="file"  id="image" name="image"  >
                            </div>
                            <div name="image_error" class="clear error"></div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Ảnh kèm theo:</label>
                            <div class="col-md-10">
                                <input type="file"  id="image_list" name="image_list[]" multiple>
                            </div>
                            <div name="image_list_error" class="clear error">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Thứ tự hiển thị:</label>
                            <div class="col-md-10">
                                <select name="sort_order" id="param_sort_order" class="custom-select">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div name="name_error" class="clear error"><?php echo form_error('sort_order')?></div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Thể loại:<span class="req">*</span></label>
                            <div class="col-md-10">
                                <select name="catalog" class="custom-select">
                                    <option value="">
                                        <!-- kiem tra danh muc co danh muc con hay khong -->
                                        <?php foreach ($catalogs as $row): ?>
                                        <?php if(count($row->subs) > 1):?>
                                    <optgroup label="<?php echo $row->name?>">
                                        <?php foreach($row->subs as $sub):?>
                                            <option value="<?php echo $sub->id?>" >
                                                <?php echo $sub->name?>
                                            </option>
                                        <?php endforeach;?>
                                    </optgroup>
                                    <?php else:?>
                                        <option value="<?php echo $row->id?>" > <?php echo $row->name?> </option>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                    </option>
                                </select>
                                <span name="cat_autocheck" class="autocheck"></span>
                                <div name="cat_error" class="clear error"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label for="form-1-1" class="col-md-2 control-label">Nội dung:</label>
                                                <textarea id="summernote-usage" name="content"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div name="content_error" class="clear error"></div>
                        </div>
                        <div class="formRow hide"></div>

                        <div class="formSubmit">
                            <input type="submit" value="Thêm mới" class="btn btn-danger" />
                            <input type="button" value="Back" class="btn btn-warning" onclick="window.location.href='<?php echo $_SERVER['HTTP_REFERER'];?>'" />
                        </div>
                        <div class="clear"></div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>