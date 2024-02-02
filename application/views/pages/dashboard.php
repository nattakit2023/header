<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h3><strong>SUPPORT MANAGEMENT SYSTEM</strong></h3>

                </div>

            </div>

        </div><!-- /.container-fluid -->

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-4 col-6">

                    <div class="small-box bg-success rounded-0">

                        <div class="inner">

                            <h3><strong id="amountAllService">..</strong> <sup style="font-size: 20px">Job Order</sup></h3>

                            <p>Total Lists</p>

                        </div>

                        <div class="icon">

                            <i class="fas fa-clipboard"></i>

                        </div>

                        <a href="<?= base_url(); ?>/pages/service" class="small-box-footer rounded-0">

                            More <i class="fas fa-arrow-circle-right"></i>

                        </a>

                    </div>

                </div>

                <div class="col-lg-4 col-6">

                    <div class="small-box bg-danger rounded-0">

                        <div class="inner">

                            <h3><strong id="amountServiceWait">..</strong> <sup style="font-size: 20px">Vessel</sup></h3>

                            <p>Inprogress</p>

                        </div>

                        <div class="icon">

                            <i class="fas fa-tools"></i>

                        </div>

                        <a href="<?= base_url(); ?>/pages/service_status?status=wait" class="small-box-footer rounded-0">

                            More <i class="fas fa-arrow-circle-right"></i>

                        </a>

                    </div>

                </div>

                <div class="col-lg-4 col-6">

                    <div class="small-box bg-warning rounded-0">

                        <div class="inner">

                            <h3><strong id="amountServiceFixed">..</strong> <sup style="font-size: 20px">Vessel</sup></h3>

                            <p>Completed</p>

                        </div>

                        <div class="icon">

                            <i class="fas fa-ship"></i>

                        </div>

                        <a href="<?= base_url(); ?>/pages/service_status?status=fixed" class="small-box-footer rounded-0">

                            More <i class="fas fa-arrow-circle-right"></i>

                        </a>

                    </div>

                </div>


            </div>

        </div>

        <div class="container-fluid">

            <div class="row">

                <div class="offset-md-3 col-md-6 mb-3">

                    <form id="formSearchInvoice">

                        <div class="input-group">

                            <div class="input-group-prepend ">

                                <span class="input-group-text rounded-0">Job Order</span>

                            </div>

                            <input type="text" id="service_invoice" class="form-control form-control-lg" placeholder="Search" oninput="this.value=this.value.replace(/[^0-9\\]/g,'');">

                            <span class="input-group-append">

                                <button type="submit" class="btn btn-warning btn-flat"><i class="fas fa-search"></i> Search</button>

                            </span>

                        </div>

                    </form>

                </div>

            </div>

        </div>

        <style>
            .btn_event {
                width: 100px;
                border-radius: 0.25rem;
                background-color: #ffffff;
                border: 2px solid #ddd;
                text-align: center;
                cursor: pointer;
            }
        </style>

        <div class="container-fluid ">
            <div class="row ">
                <div class="col-md-12">
                    <div class="card rounded-0 ">
                        <div class="card-header rounded-0 bg-dark">
                            <div class="row">
                                <div class="col" id="header-chart">
                                    Chart Job Order
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle btn_event" data-toggle="dropdown">Action</button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" onclick="chart('Year')">Year</button>
                                            <button class="dropdown-item" onclick="chart('Month')">Month</button>
                                            <button class="dropdown-item" onclick="chart('Week')">Week</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div id="chart">
                                    <div class="text-center">
                                        <div class="spinner-border text-dark" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 bg-dark">
                            Contract Vessel
                        </div>
                        <div class="card-body">
                            <div class="row" id="tblContract">
                                <div class="text-center">
                                    <div class="spinner-border text-dark" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>





<script>
    var day_month_arr = [31, 0, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

    var date = new Date();

    var year = date.getFullYear();

    var month = date.getMonth();

    function getDateFeb(year) {
        day_month = year % 4;

        if (year % 100 == 0) {
            return 28;
        }

        if (day_month == 0) {
            return 29;
        } else {
            return 28;
        }
    }

    function getServiceAmount() {

        $.ajax({

            url: '<?= base_url(); ?>/service/get_service_amount',

            method: 'POST',

            dataType: 'JSON',

            success: function(res) {

                if (res.status == 'SUCCESS') {

                    $('#amountAllService').html(res.amount_all_service);

                    $('#amountServiceWait').html(res.amount_service_wait);

                    $('#amountServiceFixed').html(res.amount_service_fixed);


                } else {

                    console.log(res);

                }

            }

        })

    }

    function chart_job(start, end) {
        $.ajax({
            url: '<?= base_url() ?>dashboard/chart_job',
            method: 'POST',
            data: {
                start: start,
                end: end
            },
            success: function(res) {
                $('#chart').html(res);
            }
        });
    }

    function chart(value) {
        if (value == 'Year') {
            start = year + '-1-1';
            end = year + '-12-31';
            chart_job(start, end);
        } else if (value == 'Month') {
            day_month_arr[1] = getDateFeb(year);
            start = year + '-' + (month + 1) + '-1';
            end = year + '-' + (month + 1) + '-' + day_month_arr[month];
            chart_job(start, end);
        } else {

        }
        $('#header-chart').html('Chart of ' + value);
    }

    function tblContract() {
        $.ajax({
            url: '<?= base_url() ?>dashboard/tblContract',
            method: 'POST',
            success: function(res) {
                $('#tblContract').html(res);
            }
        });
    }

    $(document).ready(function() {
        getServiceAmount();
        chart('Year');
        tblContract();
    });

    $(document).on('submit', '#formSearchInvoice', function(e) {

        e.preventDefault();

        let service_invoice = $('#service_invoice').val();

        if (service_invoice == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกหมายเลขใบส่งซ่อม',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        Swal.fire({

            html: 'กำลังค้นหาข้อมูล กรุณารอสักครู่...',

            timerProgressBar: true,

            didOpen: () => {

                Swal.showLoading();

                $.ajax({

                    url: '<?= base_url(); ?>/service/search_service_invoice',

                    method: 'POST',

                    dataType: 'JSON',

                    data: {

                        service_invoice: service_invoice

                    },

                    success: function(res) {

                        if (res.status == 'SUCCESS') {

                            $('#service_invoice').val('');

                            window.location.assign('<?= base_url(); ?>/pages/service_detail/' + res.service_invoice);

                        } else {

                            Swal.fire({

                                icon: 'error',

                                title: 'ผิดพลาด!',

                                html: res.message,

                                confirmButtonText: 'ตกลง'

                            });

                            document.getElementById("service_invoice").autofocus;

                            return false;

                        }

                    }

                })

            }

        })

    });
</script>