<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/05/2018
 * Time: 2:22 CH
 */

?>
<div class="page-title">
    <h4>Quản Trị Viên</h4>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Danh sách Admin</h4>
                <form action="admin/add">
                    <button class="btn btn-danger">Thêm mới</button>
                </form>
                <div class="num f12">Tổng số: <b><?php echo $total?></b></div>
                <?php $this->load->view('admin/message', $this->data);?>
                <div class="table-overflow">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Mã số</th>
                            <th>Họ và Tên</th>
                            <th>Username</th>
                            <th>Nhóm Quyền</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $row): ?>
                        <tr>
                            <td><?php echo $row->id?></td>
                            <td><?php echo $row->name?></td>
                            <td><?php echo $row->username?></td>
                            <td>

                            </td>
                            <td>
                                <a href="<?php echo admin_url('admin/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">Chỉnh sửa</a> ||
                                <a href="<?php echo admin_url('admin/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >Xóa</a>
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
