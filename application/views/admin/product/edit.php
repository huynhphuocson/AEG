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
                <h4 class="card-title">Cập Nhật Sản Phẩm</h4>
            </div>
            <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="card-block">
                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Tên sản phẩm:<span class="req">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="form-1-1" placeholder="Name" name="name" value="<?php echo $product->product_name?>">
                            </div>
                            <div name="name_error" class="clear error">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Mã code:<span class="req">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="form-1-1" placeholder="Name" name="product_code" value="<?php echo $product->product_code?>">
                            </div>
                            <div name="name_error" class="clear error">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Giá nhập vào:<span class="req">*</span></label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Giá bán sử dụng để giao dịch" name="standard_cost" id="param_price" class="price_format" value="<?php echo $product->standard_cost?>">
                                <img class='tipS' title='Giá bán sử dụng để giao dịch' style='margin-bottom:-8px'  src='<?php echo public_url('admin/')?>crown/images/icons/notifications/information.png'/>
                            </div>
                            <div name="price_error" class="clear error">
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Giá bán ra:</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="số tiền giảm giá" name="list_price" id="param_discount" value="<?php echo $product->list_price?>" >
                                <img class='tipS' title='Số tiền giảm giá' style='margin-bottom:-8px'  src='<?php echo public_url('admin/')?>crown/images/icons/notifications/information.png'/>
                            </div>
                            <div name="discount_error" class="clear error">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Số lượng trên đơn vị:<span class="req">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="form-1-1" placeholder="Name" name="quantity_per_unit" value="<?php echo $product->quantity_per_unit?>" >
                            </div>
                            <div name="name_error" class="clear error">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Số lượng đặt hàng tối thiểu:<span class="req">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="form-1-1" placeholder="Name" name="minimum_reorder_quantity" value="<?php echo $product->minimum_reorder_quantity?>">
                            </div>
                            <div name="name_error" class="clear error">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Thể loại:<span class="req">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="form-1-1" placeholder="Name" name="catalog" value="<?php echo $product->category?>">
                                <span name="cat_autocheck" class="autocheck"></span>
                                <div name="cat_error" class="clear error"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Tên nhà cung cấp:<span class="req">*</span></label>
                            <div class="col-md-10">
                                <select name="catalog">
                                    <option value="">
                                        <!-- kiem tra danh muc co danh muc con hay khong -->
                                        <?php foreach ($suppliers as $row): ?>
                                        <option value="<?php echo $row->id?>" <?php if($row->id == $product->supplier_ids) echo 'selected';?> > <?php echo $row->company?> </option>
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
                                                <textarea id="summernote-usage" name="content" ><?php echo $product->description?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div name="content_error" class="clear error"></div>
                        </div>
                        <div class="formRow hide"></div>

                        <div class="formSubmit">
                            <input type="submit" value="Cập nhật" class="btn btn-success" />
                            <input type="button" value="Back" class="btn btn-warning" onclick="window.location.href='<?php echo $_SERVER['HTTP_REFERER'];?>'" />
                        </div>
                        <div class="clear"></div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>