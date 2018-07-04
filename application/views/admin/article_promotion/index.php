<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 26/05/2018
 * Time: 3:55 CH
 */
?>
<div class="page-title">
    <h4>Quản Lý Bài Viết</h4>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Danh sách bài viết</h4>
                <?php $this->load->view('admin/message', $this->data);?>
                <form action="/AEG/admin/article_promotion/add">
                    <button class="btn btn-danger">Thêm mới</button>
                </form>

                <div class="col num f12">Tổng số: <b><?php echo $total_rows?></b></div>

                <div class="table-overflow">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td colspan="6">
                                <form class="list_filter form" action="<?php echo admin_url('article_promotion/index')?>" method="get">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td class=" control-label" style="width:120px; text-align: center;"><label for="filter_id">Mã số bài viết</label></td>
                                            <td class="item">
                                                <input name="id" class="form-control" value="<?php echo $this->input->get('id')?>" id="filter_id" type="text" style="width:70px;" />
                                            </td>

                                            <td class="control-label" style="width:120px; text-align: center;"><label for="filter_id">Tên bài viết</label></td>
                                            <td class="item" style="width:155px;" >
                                                <input name="name" class="form-control" value="<?php echo $this->input->get('name')?>" id="filter_iname" type="text" style="width:155px;" />
                                            </td>

                                            <td class="control-label" style="width:130px; text-align: center;"><label for="filter_status">Vùng hiển thị</label></td>
                                            <td class="item">
                                                <select name="catalog" class="custom-select">
                                                    <option value="">
                                                        <!-- kiem tra danh muc co danh muc con hay khong -->
                                                        <?php foreach ($catalogs as $row): ?>
                                                        <?php if(count($row->subs) > 1):?>
                                                    <optgroup label="<?php echo $row->name?>">
                                                        <?php foreach($row->subs as $sub):?>
                                                            <option value="<?php echo $sub->id?>" <?php echo ($this->input->get('catalog_article') == $sub->id) ? 'selected' : ''?> >
                                                                <?php echo $sub->name?>
                                                            </option>
                                                        <?php endforeach;?>
                                                    </optgroup>
                                                    <?php else:?>
                                                        <option value="<?php echo $row->id?>" <?php echo ($this->input->get('catalog_article') == $row->id) ? 'selected' : ''?> > <?php echo $row->name?> </option>
                                                    <?php endif;?>
                                                    <?php endforeach;?>
                                                    </option>
                                                </select>
                                            </td>
                                            <td style='width:270px'>
                                                <input type="submit" class="btn btn-primary" value="Lọc" />
                                                <input type="reset" class="btn btn-secondary" value="Reset" onclick="window.location.href = '<?php echo admin_url('product/index')?>' ">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Mã số</th>
                            <th>Tên tiêu đề bài viết</th>
                            <th>Hình ảnh bài viết</th>
                            <th>Ngày Tạo</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $row): ?>
                            <tr>
                                <td><input type="checkbox" name="id[]" value="<?php echo $row->id?>" /></td>
                                <td><?php echo $row->id?></td>
                                <td>
                                    <a href="" class="tip" title="" target="_blank">
                                        <b><?php echo $row->title?></b>
                                    </a>
                                    <div class="f11" >
                                        Xem: <?php echo $row->view?>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div style="width:100%;">
                                        <?php $image_list = json_decode($row->image_list);?>
                                        <div class="img-thumbnail">
                                            <img src="<?php echo public_url('upload/news/'.$row->image_link)?>" style="height: 50px;">
                                            <?php if(is_array($image_list)): ?>
                                                <?php foreach ($image_list as $img):?>
                                                    <img src="<?php echo public_url('upload/news/'.$img)?>" style=" height: 50px; " >
                                                <?php endforeach;?>
                                            <?php endif; ?>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo $row->created?></td>
                                <td>
                                    <a href="<?php echo admin_url('article_promotion/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">Chỉnh sửa</a> ||
                                    <a href="<?php echo admin_url('article_promotion/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                        <?php echo $this->pagination->create_links(); ?></li>


                </div>
            </div>
        </div>
    </div>
</div>
