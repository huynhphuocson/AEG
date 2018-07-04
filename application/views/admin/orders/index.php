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
                <h4 class="card-title">Danh sách hoá đơn</h4>

                <div class="num f12">Tổng số: <b><?php echo $total_rows?></b></div>
                <?php $this->load->view('admin/message', $this->data);?>
                <div class="table-overflow">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Mã số</th>
                            <th>Mã nhân viên</th>
                            <th>Mã khách hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Ngày ship hàng</th>
                            <th>Tên người nhận</th>
                            <th>Tên thành phố ship</th>
                            <th>Phí ship</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $row): ?>
                            <tr>
                                <td><a href="<?php echo admin_url('orders/detail/'.$row->id)?>"><?php echo $row->id?></a></td>
                                <td><?php echo $row->employee_id?></td>
                                <td><?php echo $row->customer_id?></td>
                                <td><?php echo $row->order_date?></td>
                                <td><?php echo $row->shipped_date?></td>
                                <td><?php echo $row->ship_name?></td>
                                <td><?php echo $row->ship_city?></td>
                                <td><?php echo $row->shipping_fee?></td>>
                                <td>
                                    <a href="<?php echo admin_url('orders/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">Chỉnh sửa</a> ||
                                    <a href="<?php echo admin_url('orders/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >Xóa</a>
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
