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
                <h4 class="card-title">Danh sách khách hàng</h4>
                <form action="add">
                    <button class="btn btn-danger">Thêm mới</button>
                </form>
                <div class="num f12">Tổng số: <b><?php echo $total?></b></div>
                <?php $this->load->view('admin/message', $this->data);?>
                <div class="table-overflow">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Mã số</th>
                            <th>Tên công ty</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Vị trí công việc</th>
                            <th>Số diện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Thành phố</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $row): ?>
                            <tr>
                                <td><?php echo $row->id?></td>
                                <td><?php echo $row->company?></td>
                                <td><?php echo $row->last_name." " ; echo $row->first_name?></td>
                                <td><?php echo $row->email_address?></td>
                                <td><?php echo $row->job_title?></td>
                                <td><?php echo $row->business_phone?></td>
                                <td><?php echo $row->address?></td>
                                <td><?php echo $row->city?></td>>
                                <td>
                                    <a href="<?php echo admin_url('customers/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">Chỉnh sửa</a> ||
                                    <a href="<?php echo admin_url('customers/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >Xóa</a>
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
