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

        <div class="container-fluid">

            <style>
                .dashboard-menu img {

                    transition: all 0.2s ease;

                    filter: grayscale(0.5);

                }



                .dashboard-menu img:hover {

                    transform: scale(1.1);

                    filter: none;

                }
            </style>

            <div class="row">

                <div class="col-md-12">

                    <div class="card rounded-0">

                        <div class="card-header rounded-0 bg-dark">

                            Menu

                        </div>

                        <div class="card-body">

                            <!-- เมนู -->

                            <div class="row mt-3">

                                <div class="col-md-2 col-sm-6 col-6 mb-3">

                                    <a href="<?= base_url(); ?>pages/service_create" class="dashboard-menu">

                                        <img src="<?= base_url(); ?>/assets/icon/service.jpg" style="width: 100%">

                                    </a>

                                </div>

                                <div class="col-md-2 col-sm-6 col-6 mb-3">

                                    <a href="<?= base_url(); ?>pages/service" class="dashboard-menu">

                                        <img src="<?= base_url(); ?>/assets/icon/service_report.jpg" style="width: 100%">

                                    </a>

                                </div>

                                <div class="col-md-2 col-sm-6 col-6 mb-3">

                                    <a href="<?= base_url(); ?>pages/calendar" class="dashboard-menu">

                                        <img src="<?= base_url(); ?>/assets/icon/customer.jpg" style="width: 100%">

                                    </a>

                                </div>

                                <div class="col-md-2 col-sm-6 col-6 mb-3">

                                    <a href="<?= base_url(); ?>pages/report_service" class="dashboard-menu">

                                        <img src="<?= base_url(); ?>/assets/icon/report.jpg" style="width: 100%">

                                    </a>

                                </div>

                                <div class="col-md-2 col-sm-6 col-6 mb-3">

                                    <a href="<?= base_url(); ?>pages/product" class="dashboard-menu">

                                        <img src="<?= base_url(); ?>/assets/icon/product.jpg" style="width: 100%">

                                    </a>

                                </div>

                                <div class="col-md-2 col-sm-6 col-6 mb-3">

                                    <a href="<?= base_url(); ?>pages/user" class="dashboard-menu">

                                        <img src="<?= base_url(); ?>/assets/icon/user.jpg" style="width: 100%">

                                    </a>

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
    function getServiceAmount() {

        $.ajax({

            url: '<?= base_url(); ?>/service/get_service_amount',

            method: 'POST',

            dataType: 'JSON',

            success: function(res) {

                if (res.status == 'SUCCESS') {

                    $('#amountAllService').html(res.amount_all_service);

                    $('#amountServiceApprove').html(res.amount_service_approve);

                    $('#amountServiceWait').html(res.amount_service_wait);

                    $('#amountServiceFixed').html(res.amount_service_fixed);

                    $('#amountCustomer').html(res.amount_customer);

                } else {

                    console.log(res);

                }

            }

        })

    }

    $(document).ready(function() {

        getServiceAmount();

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