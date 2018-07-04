<div class="row">
    <form>
    <div class="col-md-12">
        <div class="widget card">
            <div class="card-block">
                <h5 class="card-title">Lọc dữ liệu:</h5>
                <div class="row mrg-top-30">
                        <div class="col-lg-2 col-md-2">
                            <label>Chọn trạng thái của đơn hàng: </label>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <select id="orders_status" class="custom-select">
                                <option value="">
                                    <?php foreach ($orders_status as $row): ?>
                                <option value="<?php echo $row->id?>" > <?php echo $row->status_name?> </option>
                                <?php endforeach;?>
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            Lọc theo ngày:
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <input type="text" class="form-control datepicker-1" placeholder="Từ ngày" data-provide="datepicker" name="date_select_1" id="date_select_1">
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <input type="text" class="form-control datepicker-1" placeholder="Đến ngày" data-provide="datepicker" name="date_select_2" id="date_select_2">
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <input type="button" class="btn btn-success" name="clickme" id="clickme" value="lọc" style="width: 40%" />
                            <input type="reset" class="btn btn-secondary" value="Reset" style="width: 50%" onclick="window.location.href = '<?php echo admin_url('home')?>' ">
                        </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>


<div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="widget card">
                <div class="card-block">
                    <h5 class="card-title">Monthly Overview</h5>
                    <div id="container-charts"></div>
                    <div id="container-charts-1"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('dist/')?>app.bundle.js"></script>
    <!--<script src="<?php /*echo public_url('js')*/?>/code/highcharts.js"></script>
    <script src="<?php /*echo public_url('js')*/?>/code/modules/series-label.js"></script>
    <script src="<?php /*echo public_url('js')*/?>/code/modules/exporting.js"></script>
    <script src="<?php /*echo public_url('js')*/?>/code/modules/export-data.js"></script>
-->
    <script type="text/javascript">

    </script>

    <!--<script type="text/javascript">

        // Load Highcharts
        var Highcharts = require('highcharts');
        // Alternatively, this is how to load Highstock. Highmaps is similar.
        // var Highcharts = require('highcharts/highstock');

        // Load the exporting module, and initialize it.
        require('highcharts/modules/exporting')(Highcharts);

        Highcharts.chart('container-charts', {

            chart: {
                type: 'column'
            },
            title: {
                text: 'Column chart with views'
            },
            xAxis: {
                categories: [
                    <?php /*foreach ($datacharts as $row): */?>
                    '<?php /*echo $row->created */?>',
                    <?php /*endforeach; */?>
                ]
            },
            credits: {
                enabled: false
            },

            series: [
                <?php /*foreach ($datacharts as $row): */?>
                {
                name: '<?php /*echo $row->created */?>',
                data: [<?php /*echo $row->amount */?>]
                },
                <?php /*endforeach; */?>
            ],

            /*responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }*/

        });


    </script>-->

