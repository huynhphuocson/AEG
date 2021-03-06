<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 26/05/2018
 * Time: 11:00 SA
 */
?>

<div class="page-title">
    <h4>Quản Lý Menu</h4>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Danh sách menu</h4>
                <?php $this->load->view('admin/message', $this->data);?>
                <form action="menu/add">
                    <button class="btn btn-danger">Thêm mới</button>
                </form>
                <div class="num f12">Tổng số: <b><?php echo $total?></b></div>
                <div class="table-overflow">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Mã số</th>
                            <th>Tên menu</th>
                            <th>url</th>
                            <th>Thứ Tự Hiển Thị</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $row): ?>
                            <tr>
                                <td><?php echo $row->id?></td>
                                <td><?php echo $row->title?></td>
                                <td><?php echo $row->url?></td>
                                <td><?php echo $row->sort_order?></td>
                                <td>
                                    <a href="<?php echo admin_url('menu/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">Chỉnh sửa</a> ||
                                    <a href="<?php echo admin_url('menu/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
