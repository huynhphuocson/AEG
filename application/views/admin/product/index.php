<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 26/05/2018
 * Time: 3:55 CH
 */
?>
<div class="page-title">
    <h4>Quản Lý Sản Phẩm</h4>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Danh sách sản phẩm</h4>
                <?php $this->load->view('admin/message', $this->data);?>
                <form action="add">
                    <button class="btn btn-danger">Thêm mới</button>
                </form>

                <div class="col num f12">Tổng số: <b><?php echo $total_rows?></b></div>

                <div class="table-overflow">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td colspan="6">
                                <form class="list_filter form" action="<?php echo admin_url('product/index')?>" method="get">
                                    <table cellpadding="0" cellspacing="0" width="80%">
                                        <tbody>
                                            <tr>
                                                <td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
                                                <td class="item">
                                                    <input name="id" value="<?php echo $this->input->get('id')?>" id="filter_id" type="text" style="width:55px;" />
                                                </td>

                                                <td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
                                                <td class="item" style="width:155px;" >
                                                    <input name="name" value="<?php echo $this->input->get('name')?>" id="filter_iname" type="text" style="width:155px;" />
                                                </td>

                                                <td class="label" style="width:60px;"><label for="filter_status">Thể loại</label></td>
                                                <td class="item">
                                                    <input name="catalog" value="<?php echo $this->input->get('category')?>" id="filter_iname" type="text" style="width:155px;" />
                                                </td>
                                                <td style='width:150px'>
                                                    <input type="submit" class="button blueB" value="Lọc" />
                                                    <input type="reset" class="basic" value="Reset" onclick="window.location.href = '<?php echo admin_url('product/index')?>' ">
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
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Giá</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $row): ?>
                            <tr>
                                <td><input type="checkbox" name="id[]" value="<?php echo $row->id?>" /></td>
                                <td><?php echo $row->id?></td>
                                <td>
                                    mã code: <b><?php echo $row->product_code?></b></br>
                                    <a href="" class="tip" title="" target="_blank">
                                    <b><?php echo $row->product_name?></b>
                                    </a>
                                </td>
                                <td><?php echo $row->category?></td>
                                <td class="text-center">
                                        Giá nhập vào:<p style="text-decoration:line-through"> <?php echo $row->standard_cost ?> </p>

                                        Giá bán ra:<p style="color: red"><?php echo $row->list_price ?> </p>
                                </td>
                                <td>
                                    <a href="<?php echo admin_url('product/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">Chỉnh sửa</a> ||
                                    <a href="<?php echo admin_url('product/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="pagination">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
