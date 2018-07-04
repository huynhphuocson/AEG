<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 26/05/2018
 * Time: 11:00 SA
 */
    $date_select = '';
?>

<div class="page-title">
    <h4>Quản Lý Khách Hàng Đăng Ký</h4>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Danh sách in khách hàng đăng ký</h4>
                <?php $this->load->view('admin/message', $this->data);?>
                <div class="num f12">Tổng số: <b><?php echo $total?></b></div>
                <div class="table-overflow">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td colspan="6">
                                <form class="list_filter form" action="<?php echo admin_url('register/printer')?>" method="get">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td class="control-label" style="width:130px; text-align: center;"><label for="filter_status">Ngày hiển thị</label></td>
                                            <td class="item">
                                                <div class="timepicker-input input-icon form-group">
                                                    <i class="ti-time"></i>
                                                    <input type="text" class="form-control datepicker-1" placeholder="Datepicker" data-provide="datepicker" name="date_select" >
                                                    <?php
                                                    if(!empty($_GET['date_select'])) {
                                                        $date_select = $_GET['date_select'];
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td style='width:270px'>
                                                <input type="submit" class="btn btn-primary" value="Lọc" />
                                                <input type="reset" class="btn btn-secondary" value="Reset" onclick="window.location.href = '<?php echo admin_url('register/printer')?>' ">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </td>
                        </tr>

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
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <form class="list_filter form" action="<?php echo admin_url('export/excel')?>" method="post">
                        <div class="col-12" >
                            <input type="hidden" name="date_select1" value="<?php echo $date_select ?>">
                            <button type="submit" class="btn btn-success" href="<?php echo admin_url('export/excel')?>" > Export as Excel file</button>
                            <input type="button" value="Back" class="btn btn-warning" onclick="window.location.href='<?php echo $_SERVER['HTTP_REFERER'];?>'" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
