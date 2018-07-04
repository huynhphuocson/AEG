<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 26/05/2018
 * Time: 11:00 SA
 */
?>

<div class="page-title">
    <h4>Quản Lý Khách Hàng Đăng Ký</h4>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Danh sách khách hàng đăng ký</h4>
                <?php $this->load->view('admin/message', $this->data);?>
                <div class="num f12">Tổng số: <b><?php echo $total?></b></div>
                <div class="table-overflow">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Mã số</th>
                            <th>Họ tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Nơi ở</th>
                            <th>Nội dung</th>
                            <th>Url giới thiệu</th>
                            <th>Url gửi form</th>
                            <th>Ngày tạo</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $row): ?>
                            <tr>
                                <td><?php echo $row->id?></td>
                                <td><?php echo $row->name?></td>
                                <td><?php echo $row->phone?></td>
                                <td><?php echo $row->email?></td>
                                <td>
                                    <?php foreach ($list_provice as $row1): ?>
                                    <?php if ($row->province_id == $row1->id) echo $row1->name?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?php echo $row->content?></td>
                                <td><?php echo $row->url_referer?></td>
                                <td><?php echo $row->url_current?></td>
                                <td><?php echo $row->created?></td>
                                <td>
                                    <a href="<?php echo admin_url('register/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">Chỉnh sửa</a> ||
                                    <a href="<?php echo admin_url('register/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >Xóa</a>
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
