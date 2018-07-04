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
                <h4 class="card-title">Cập Nhật Bài Viết</h4>
            </div>
            <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="card-block">
                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Tên Tiêu đề bài viết:<span class="req">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="form-1-1" placeholder="Name" name="name" value="<?php echo $product->title?>">
                            </div>
                            <div name="name_error" class="clear error">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Hình ảnh:<span class="req">*</span></label>
                            <div class="col-md-10">
                                <input type="file"  id="image"  name="image" >
                                <img src="<?php echo public_url('upload/news/'.$product->image_link)?>" style="width: 100px; height: 70px;" >
                            </div>
                            <div name="image_error" class="clear error"></div>
                        </div>

                        <?php $image_list = json_decode($product->image_list);?>
                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Ảnh kèm theo:</label>
                            <div class="col-md-10">
                                <input type="file"  id="image_list" name="image_list[]" multiple>
                                <?php foreach ($image_list as $img):?>
                                    <img src="<?php echo public_url('upload/news/'.$img)?>" style="width: 100px; height: 70px; margin: 5px;" >
                                <?php endforeach;?>
                            </div>
                            <div name="image_list_error" class="clear error">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Thứ tự hiển thị:</label>
                            <div class="col-md-10">
                                <select class="custom-select" name="sort_order" id="param_sort_order">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div name="name_error" class="clear error"><?php echo form_error('sort_order')?></div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Vùng hiển thị:<span class="req">*</span></label>
                            <div class="col-md-10">
                                <select name="catalog" class="custom-select">
                                    <option value="">
                                        <!-- kiem tra danh muc co danh muc con hay khong -->
                                        <?php foreach ($catalogs as $row): ?>
                                        <?php if(count($row->subs) > 1):?>
                                    <optgroup label="<?php echo $row->name?>">
                                        <?php foreach($row->subs as $sub):?>
                                            <option value="<?php echo $sub->id?>" <?php if($sub->id == $product->catalog_article_id) echo 'selected';?>>
                                                <?php echo $sub->name?>
                                            </option>
                                        <?php endforeach;?>
                                    </optgroup>
                                    <?php else:?>
                                        <option value="<?php echo $row->id?>" <?php if($row->id == $product->catalog_article_id) echo 'selected';?> > <?php echo $row->name?> </option>
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
                                                <textarea id="summernote-usage" name="content" ><?php echo $product->content?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div name="content_error" class="clear error"></div>
                        </div>
                        <div class="formRow hide"></div>

                        <div class="formSubmit">
                            <input type="submit" value="Cập nhật" style="color: red" />
                            <input type="button" value="Back" class="btn btn-warning" onclick="window.location.href='<?php echo $_SERVER['HTTP_REFERER'];?>'" />
                        </div>
                        <div class="clear"></div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>