<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h3><i class="fas fa-tools"></i><strong> Create PMS</strong></h3>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/pages">Index</a></li>

                        <li class="breadcrumb-item active">Create PMS</li>

                    </ol>

                </div>

            </div>

        </div><!-- /.container-fluid -->

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12 mb-2">

                    <div class="card rounded-0">

                        <div class="card-header bg-dark rounded-0">

                            Customer Information

                        </div>


                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-md-2 mb-2">

                                    <h2><strong class="text-danger"></strong>Project Code :</h2>

                                </div>

                                <div class="col-md-2">

                                    <select class="form-control select2 rouned-0" data-placeholder="Project Code" id="projects">

                                        <option value="">Loading ...</option>

                                    </select>

                                </div>

                                <div class="col-md-4">

                                </div>

                                <div class="col-md-1 mb-2">

                                    <h4><strong class="text-danger"></strong>Product :</h2>

                                </div>

                                <div class="col-md-2">
                                    <select class="form-select" id="product" data-placeholder="Product" multiple="multiple">

                                        <option value="">Loading...</option>

                                    </select>

                                </div>

                                <div class="col-md-1">

                                </div>

                            </div>



                            <div class="row mb-2">

                                <div class="col-md-3 mb-2">

                                    <label>Created Date :</label>

                                    <input type="date" id="create_date" class="form-control rounded-0" placeholder="วันที่ส่งซ่อม" value="<?= $service->create_date  ?>">

                                </div>

                                <div class="col-1"></div>

                                <div class="col-md-3 mb-2">

                                    <label>Due Date :</label>

                                    <input type="date" id="due_date" class="form-control rounded-0" placeholder="วันที่ซ่อมบำรุง" value="<?= $service->due_date ?>">

                                </div>

                                <div class="col-1"></div>

                                <div class="col-md-3 mb-2">

                                    <label>End Date :</label>

                                    <input type="date" id="end_date" class="form-control rounded-0" placeholder="วันที่ซ่อมบำรุงเสร็จ" value="<?= $service->end_date  ?>">

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-2">

                                    <p class="text-primary"><i class="fas fa-circle"></i> Customer</p>

                                </div>

                            </div>


                            <div class="row">

                                <div class="col-md-4 mb-2">

                                    <label><strong class="text-danger">*</strong>Name :</label>

                                    <div>

                                        <select class="form-control select2 rouned-0" id="cus_name" onchange="optionPhone(value),optionEmail(value),optionAddress(value),optionZipcode(value)">

                                            <option value="">Loading...</option>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-md-4 mb-2">

                                    <label><strong class="text-danger">*</strong>Telephone :</label>

                                    <select class="form-control select2 rouned-0" id="cus_phone">

                                        <option value="<?= $service->cus_tel ?>"><?= $service->cus_tel ?></option>

                                    </select>
                                </div>

                                <div class="col-md-4 mb-2">

                                    <label><strong class="text-danger">*</strong>E-mail :</label>

                                    <select class="form-control select2 rouned-0" id="cus_email">

                                        <option value="<?= $service->cus_email ?>"><?= $service->cus_email ?></option>

                                    </select>

                                </div>

                            </div>

                            <div class="row mb-2">

                                <div class="col-md-4 mb-2">

                                    <label><strong class="text-danger">*</strong>Address :</label>

                                    <select class="form-control select2 rouned-0" id="cus_address">

                                        <option value="<?= $service->cus_address ?>"><?= $service->cus_address ?></option>

                                    </select>

                                </div>

                                <div class="col-md-4 mb-2">

                                    <label><strong class="text-danger">*</strong>Zipcode :</label>

                                    <select class="form-control select2 rouned-0" id="cus_zipcode">

                                        <option value="<?= $service->cus_zipcode ?>"><?= $service->cus_zipcode ?></option>

                                    </select>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-2">

                                    <p class="text-primary"><i class="fas fa-circle"></i> Vessel</p>

                                </div>

                            </div>


                            <div class="row mb-2">

                                <div class="col-md-4 mb-2">

                                    <label><strong class="text-danger">*</strong>Fleet :</label>

                                    <select class="form-control select2 rouned-0" id="ves_fleet">

                                        <option value="">Loading...</option>

                                    </select>

                                </div>

                                <div class="col-md-4 mb-2">

                                    <label><strong class="text-danger">*</strong>Name :</label>

                                    <select class="form-control select2 rouned-0" id="ves_name">

                                        <option value="">Loading...</option>

                                    </select>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12 mt-2">

                                    <button id="createPMS" class="btn btn-primary rounded-0">Create</button>

                                    <button onclick="clearForm()" class="btn btn-default rounded-0">Clear</button>

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
    //-------------------------------------------------------------------------S C R I P T-----------------------------------------------------------------------------------

    //-------------------------------------------------------------------------V E S S E L---------------------------------------------------------------------------------------

    //option product
    function optionProduct() {
        $.ajax({

            url: '<?= base_url(); ?>/vessel/option_product',

            method: 'POST',

            data: {
                service_invoice: "<?= $service->service_invoice ?>"
            },

            success: function(res) {

                $('#product').html(res);
                $('#product').select2({
                    theme: "bootstrap-5",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    closeOnSelect: false,
                });


            }

        })
    }

    //option project
    function optionProject() {
        $.ajax({

            url: '<?= base_url(); ?>vessel/option_project',

            method: 'POST',

            data: {
                service_invoice: "<?= $service->service_invoice ?>"
            },

            success: function(res) {
                $('#projects').html(res);
            }

        })
    }

    //option Fleet
    function optionFleet() {

        $.ajax({

            url: '<?= base_url(); ?>vessel/option_fleet',

            method: 'POST',

            data: {
                fleet: "<?= $service->ves_fleet ?>"
            },

            success: function(res) {

                $('#ves_fleet').html(res);

            }

        })

    }

    //option Vessel
    function optionVessel() {

        $.ajax({

            url: '<?= base_url(); ?>vessel/option_vessel',

            method: 'POST',

            data: {
                service_invoice: "<?= $service->service_invoice ?>"
            },

            success: function(res) {
                $('#ves_name').html(res);

            }

        })

    }

    //-------------------------------------------------------------------------C U S T O M E R-----------------------------------------------------------------------------------
    //option customer
    function optionCustomer() {

        let name = "<?= $service->cus_name ?>";

        $.ajax({

            url: '<?= base_url(); ?>/customer/option_customer',

            method: 'POST',

            data: {
                name: name
            },

            success: function(res) {

                $('#cus_name').html(res);

            }

        })

    }

    //option phone
    function optionPhone($cus_names) {

        $.ajax({

            url: '<?= base_url(); ?>/customer/option_phone',

            method: 'POST',

            data: {

                cus_names: $cus_names
            },

            success: function(res) {

                $('#cus_phone').html(res);



            }

        })

    }

    //option email
    function optionEmail($cus_names) {

        $.ajax({

            url: '<?= base_url(); ?>/customer/option_email',

            method: 'POST',

            data: {

                cus_names: $cus_names
            },

            success: function(res) {

                $('#cus_email').html(res);



            }

        })

    }

    //option address
    function optionAddress($cus_names) {

        $.ajax({

            url: '<?= base_url(); ?>/customer/option_address',

            method: 'POST',

            data: {

                cus_names: $cus_names
            },

            success: function(res) {

                $('#cus_address').html(res);



            }

        })

    }

    //option zipcode
    function optionZipcode($cus_names) {

        $.ajax({

            url: '<?= base_url(); ?>/customer/option_zipcode',

            method: 'POST',

            data: {

                cus_names: $cus_names
            },

            success: function(res) {

                $('#cus_zipcode').html(res);

            }

        })

    }

    //--------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    //clear form

    $(document).ready(function() {
        optionCustomer();
        optionFleet();
        optionProject();
        optionProduct();
        optionVessel();

    });

    // Create PMS

    $(document).on('click', '#createPMS', function() {
        let projects = $('#projects').val();

        let cus_name = $('#cus_name').val();

        let cus_tel = $('#cus_phone').val();

        let cus_email = $('#cus_email').val();

        let cus_address = $('#cus_address').val();

        let cus_zipcode = $('#cus_zipcode').val();

        let ves_fleet = $('#ves_fleet').val();

        let ves_name = $('#ves_name').val();

        let product = $('#product').val();

        let create_date = $('#create_date').val();

        let due_date = $('#due_date').val();

        let end_date = $('#end_date').val();

        if (projects == '' || cus_name == '' || cus_tel == '' || cus_address == '' || cus_email == '' || cus_zipcode == '' || ves_fleet == '' || ves_name == '' ||
            product == '' || create_date == '' || due_date == '' || end_date == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }


        Swal.fire({

            title: 'สร้างรายการซ่อม',

            text: "ต้องการสร้างรายการซ่อมนี้?",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    allowEnterKey: false,

                    allowEscapeKey: false,

                    allowOutsideClick: false,

                    html: 'กำลังสร้างรายการ กรุณารอสักครู่...',

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>/report/create_pms',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                invoice: '<?= $service->service_invoice ?>',

                                projects: projects,

                                cus_name: cus_name,

                                cus_tel: cus_tel,

                                cus_address: cus_address,

                                cus_email: cus_email,

                                cus_zipcode: cus_zipcode,

                                ves_fleet: ves_fleet,

                                ves_name: ves_name,

                                product: product,

                                create_date: create_date,

                                due_date: due_date,

                                end_date: end_date,

                            },


                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'สร้างรายการซ่อมสำเร็จ',

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    setTimeout(function() {

                                        window.location.assign('<?= base_url(); ?>pages/report/pms_cre');

                                    }, 1500);

                                } else {

                                    Swal.fire({

                                        icon: 'error',

                                        title: 'ผิดพลาด!',

                                        text: res.message,

                                        confirmButtonText: 'ตกลง'

                                    });

                                    return false;

                                }

                            }

                        })

                    }

                })

            }

        })

    });
</script>