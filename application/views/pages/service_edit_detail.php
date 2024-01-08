<?php if ($service == null) {

    redirect('/pages/service_create');
}
$check_survey;
$check_installation;
if ($service->ves_survey == true) {
    $check_survey = 'checked';
} else {
    $check_survey = '';
}

if ($service->ves_installation == true) {
    $check_installation = 'checked';
} else {
    $check_installation = '';
}

?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h3><i class="fas fa-tools"></i><strong> Edit Job Order <?= $service->service_invoice ?></strong></h3>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/pages">Index</a></li>

                        <li class="breadcrumb-item active">Edit Job Order </li>

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

                            <div class="card-tools">

                                <button type="button" class="btn btn-warning btn-sm rounded-0" data-toggle="modal" data-target="#modalSearchData"><i class="fas fa-search"></i> Search Vessel</button>

                            </div>

                        </div>

                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-md-2 mb-2">

                                    <h2><strong class="text-danger"></strong>Project Code</h2>

                                </div>

                                <div class="col-md-2">

                                    <select class="form-select" data-placeholder="Project Code" id="projects" multiple="multiple">

                                        <option value="">Loading...</option>

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
                            </div>

                            <div class="row mb-2">

                                <div class="col-md-3 mb-2">

                                    <label>Created Date :</label>

                                    <input type="date" id="create_date" class="form-control rounded-0" placeholder="วันที่ส่งซ่อม" value="<?= $service->create_date ?>">

                                </div>

                                <div class="col-1"></div>

                                <div class="col-md-3 mb-2">

                                    <label>Due Date :</label>

                                    <input type="date" id="due_date" class="form-control rounded-0" placeholder="วันที่ส่งซ่อม" value="<?= $service->due_date ?>">

                                </div>

                                <div class="col-1"></div>

                                <div class="col-md-3 mb-2">

                                    <label>End Date :</label>

                                    <input type="date" id="end_date" class="form-control rounded-0" placeholder="วันที่ส่งซ่อม" value="<?= $service->end_date ?>">

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

                                        <option value="<?= $service->cus_tel ?>" selected><?= $service->cus_tel ?></option>

                                    </select>
                                </div>

                                <div class="col-md-4 mb-2">

                                    <label><strong class="text-danger">*</strong>E-mail :</label>

                                    <select class="form-control select2 rouned-0" id="cus_email">

                                        <option value="<?= $service->cus_email ?>" selected><?= $service->cus_email ?></option>

                                    </select>

                                </div>

                            </div>

                            <div class="row mb-2">

                                <div class="col-md-4 mb-2">

                                    <label><strong class="text-danger">*</strong>Address :</label>

                                    <select class="form-control select2 rouned-0" id="cus_address">

                                        <option value="<?= $service->cus_address ?>" selected><?= $service->cus_address ?></option>

                                    </select>

                                </div>

                                <div class="col-md-4 mb-2">

                                    <label><strong class="text-danger">*</strong>Zipcode :</label>

                                    <select class="form-control select2 rouned-0" id="cus_zipcode">

                                        <option value="<?= $service->cus_zipcode ?>" selected><?= $service->cus_zipcode ?></option>

                                    </select>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-2">

                                    <p class="text-primary"><i class="fas fa-circle"></i> Vessel</p>

                                </div>



                            </div>


                            <div class="row mb-2">

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Fleet :</label>

                                    <select class="form-control select2 rouned-0" id="ves_fleet">

                                        <option value="">Loading...</option>

                                    </select>

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Name :</label>

                                    <select class="form-select" id="ves_name" data-placeholder="Vessel Name" multiple="multiple">

                                        <option value="">Loading...</option>

                                    </select>

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Type :</label>

                                    <select class="form-control select2 rouned-0" id="ves_type">

                                        <option value="">Loading...</option>

                                    </select>
                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Flag :</label>

                                    <input type="text" id="ves_flag" class="form-control rounded-0" value="<?= $service->ves_flag ?>">

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Home Port :</label>

                                    <input type="text" id="ves_home_port" class="form-control rounded-0" value="<?= $service->ves_home_port ?>">

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Gross Tonnage :</label>

                                    <input type="text" id="ves_gross_tonnage" class="form-control rounded-0" value="<?= $service->ves_gross_tonnage ?>" maxlength="6" oninput="this.value=this.value.replace(/[^0-9]/g,'');">

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Call Sign :</label>

                                    <input type="text" id="ves_callsign" class="form-control rounded-0" placeholder="Call Sign" value="<?= $service->ves_callsign ?>">

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>IMO :</label>

                                    <input type="text" maxlength="6" id="ves_imo" class="form-control rounded-0" placeholder="IMO" value="<?= $service->ves_imo ?>" maxlength="6" oninput="this.value=this.value.replace(/[^0-9\s]/g,'');">

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>MMSI :</label>

                                    <input type="text" id="ves_mmsi" class="form-control rounded-0" placeholder="MMSI" value="<?= $service->ves_mmsi ?>">

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Year Built :</label>

                                    <input type="text" id="ves_year" class="form-control rounded-0" placeholder="Year Built" value="<?= $service->ves_year ?>" maxlength="4" oninput="this.value=this.value.replace(/[^0-9\s]/g,'');">

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Maintenance :</label>

                                    <select class="form-control select2 rouned-0" id="ves_maintenance">

                                        <option value="<?= $service->ves_maintenance ?>" selected><?= $service->ves_maintenance ?></option>

                                        <?php if ($service->ves_maintenance != "Preventive Maintenance") : ?>
                                            <option value="Preventive Maintenance">Preventive Maintenance</option>
                                        <?php endif; ?>

                                        <?php if ($service->ves_maintenance != "Corrective Maintenance") : ?>
                                            <option value="Corrective Maintenance">Corrective Maintenance</option>
                                        <?php endif; ?>

                                        <?php if ($service->ves_maintenance != "New Installation") : ?>
                                            <option value="New Installation">New Installation</option>
                                        <?php endif; ?>




                                    </select>

                                </div>

                                <div class="col-md-2 mb-2">
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <label><strong class="text-danger">*</strong>Survey :</label>
                                        </div>
                                        <div class="col-md-2">
                                            <?php if ($service->ves_survey == 'true') : ?>
                                                <input type="checkbox" id="ves_survey" name="ves_survey" checked>
                                            <?php endif; ?>
                                            <?php if ($service->ves_survey == 'false') : ?>
                                                <input type="checkbox" id="ves_survey" name="ves_survey">
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <label><strong class="text-danger">*</strong>Installation :</label>
                                        </div>
                                        <div class="col-md-2">
                                            <?php if ($service->ves_installation == 'true') : ?>
                                                <input type="checkbox" id="ves_installation" name="ves_installation" checked>
                                            <?php endif; ?>
                                            <?php if ($service->ves_installation == 'false') : ?>
                                                <input type="checkbox" id="ves_installation" name="ves_installation">
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-2 mb-2">

                                    <p class="text-primary"><i class="fas fa-circle"></i> Contact Onboard</p>

                                </div>
                            </div>


                            <div class="row mb-2">

                                <div class="col-md-3 mb-2">

                                    <label><strong class="text-danger">*</strong>Name :</label>

                                    <select class="form-control select2 rouned-0" id="con_name" onchange="optionContactphone(value),optionContactemail(value)">

                                        <option value="">Contact Name</option>

                                    </select>

                                </div>

                                <div class="col-md-3 mb-2">

                                    <label><strong class="text-danger">*</strong>Tel :</label>

                                    <select class="form-control select2 rouned-0" id="con_tel">

                                        <option value="<?= $service->con_tel ?>" selected><?= $service->con_tel ?></option>

                                    </select>

                                </div>

                                <div class="col-md-3 mb-2">

                                    <label><strong class="text-danger">*</strong>Email :</label>

                                    <select class="form-control select2 rouned-0" id="con_email">

                                        <option value="<?= $service->con_email ?>" selected><?= $service->con_email ?></option>

                                    </select>

                                </div>

                                <div class="col-md-3"></div>

                                <div class="col-md-3 mb-2">

                                    <label><strong class="text-danger">*</strong>Port :</label>

                                    <select class="form-control select2 rouned-0" id="port_name" onchange="optionProvince(value)">

                                        <option value="">Port Name</option>

                                    </select>

                                </div>

                                <div class="col-md-3 mb-2">

                                    <label><strong class="text-danger">*</strong>Province :</label>

                                    <select class="form-control select2 rouned-0" id="port_province">

                                        <option value="">Province of Port</option>

                                    </select>

                                </div>

                                <div class="col-md-3 mb-2">

                                    <label><strong class="text-danger">*</strong>ETA :</label>

                                    <input type="datetime-local" id="ETA" class="form-control rounded-0" placeholder="วันที่ส่งซ่อม" value="<?= $service->ETA ?>">



                                </div>

                                <div class="col-md-3 mb-2">

                                    <label><strong class="text-danger">*</strong>ETD :</label>

                                    <input type="datetime-local" id="ETD" class="form-control rounded-0" placeholder="วันที่ส่งซ่อม" value="<?= $service->ETD ?>">

                                </div>


                            </div>


                            <div class="row">
                                <div class="col-md-2 mb-2">

                                    <p class="text-primary"><i class="fas fa-circle"></i> Package</p>

                                </div>

                            </div>

                            <div class="row mb-2">

                                <div class="col-md-5 mb-2">

                                    <label><strong class="text-danger">*</strong>Package Name :</label>

                                    <select class="form-select" id="pack_name" name="pack_name[]" data-placeholder="Select Package" multiple="multiple" onchange="optionPackageInternet()">

                                        <option value="">Loading...</option>

                                    </select>

                                </div>

                                <div class="col-1"></div>

                                <div class="col-md-3 mb-2">

                                    <label><strong class="text-danger">*</strong>Start Date :</label>

                                    <input type="date" id="contract_start" class="form-control rounded-0" placeholder="Start Contract" value="<?= $service->contract_start ?>">

                                </div>

                            </div>


                            <div class="row mb-2">

                                <div class="col-md-5 mb-2">

                                    <label><strong class="text-danger">*</strong>Package Internet :</label>


                                    <select class="form-select" id="pack_internet" data-placeholder="Select Package Internet" multiple="multiple">

                                        <option value="">Loading ..</option>

                                    </select>

                                </div>

                                <div class="col-1"></div>

                                <div class="col-md-3 mb-2">

                                    <label><strong class="text-danger">*</strong>End Date :</label>

                                    <input type="date" id="contract_end" class="form-control rounded-0" placeholder="End Contract" value="<?= $service->contract_end ?>">

                                </div>

                            </div>

                            <div class="row mb-2">

                                <p class="text-primary"><i class="fas fa-circle"></i> Engineer</p>

                            </div>

                            <div class="col-md-8 mb-3">

                                <div class="row mb-2">

                                    <div class="col-md-2">
                                        <label><strong class="text-danger">*</strong>Engineer :</label>
                                    </div>

                                    <div class="col-md-6">

                                        <select class="form-select" id="admin_name" data-placeholder="Select Engineer" multiple="multiple">

                                            <option value="">Loading...</option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                            <div class="row mb-2">

                                <p class="text-primary"><i class="fas fa-circle"></i> Remark</p>

                            </div>

                            <div class="col-md-5 mb-2">

                                <textarea id="remark_create" class="form-control rounded-0" placeholder="Remark" required><?= $service->remark_create ?></textarea>

                            </div>



                            <div class="row">

                                <div class="col-md-12 mt-2">

                                    <button id="updateService" class="btn btn-primary rounded-0">Save</button>

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





<!-- Modal SearchData -->

<div class="modal fade" id="modalSearchData" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">ค้นหาทะเบียนรถ</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="input-group">

                            <input type="text" onkeyup="search_license_plate()" id="search_license_plate" class="form-control rounded-0" placeholder="กรอกเลขทะเบียนรถ ตัวอย่าง 1กด-2565 เป็นต้น">

                            <span class="input-group-append">

                                <button type="button" onclick="search_license_plate()" class="btn btn-warning btn-flat"><i class="fas fa-search"></i> ค้นหา</button>

                            </span>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 mb-2" id="showSearch">

                        <div class="row">

                            <div class="col-md-12 mt-2 mb-2 text-center">

                                <h5 class="text-info"><small>กรอกเลขทะเบียนรถที่ต้องการค้นหา</small></h5>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<script>
    //-------------------------------------------------------------------------S C R I P T-----------------------------------------------------------------------------------

    service_invoice = <?= $service->service_invoice ?>;

    port_name = "<?= $service->port_name ?>";

    //option admin

    function optionAdmin() {

        $.ajax({

            url: '<?= base_url(); ?>/user/option_admins',

            method: 'POST',

            data: {
                service_invoice: service_invoice,
            },

            success: function(res) {
                $('#admin_name').html(res);
                $('#admin_name').select2({
                    theme: "bootstrap-5",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    closeOnSelect: false,
                });
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

    //-------------------------------------------------------------------------V E S S E L---------------------------------------------------------------------------------------

    //option package
    function optionPackage() {

        $.ajax({

            url: '<?= base_url(); ?>package/option_package',

            method: 'POST',

            data: {
                service_invoice: service_invoice
            },

            success: function(res) {

                $('#pack_name').html(res);
                $('#pack_name').select2({
                    theme: "bootstrap-5",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    closeOnSelect: false,
                });
            }

        })
    }

    //option package internet
    function optionPackageInternet() {

        let pack_name = $('#pack_name').val();

        $.ajax({

            url: '<?= base_url(); ?>package/option_package_internet',

            method: 'POST',

            data: {
                service_invoice:service_invoice,
                package: pack_name
            },

            success: function(res) {

                $('#pack_internet').html(res);
                $('#pack_internet').select2({
                    theme: "bootstrap-5",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    closeOnSelect: false,
                });
            }

        })
    }

    //option product
    function optionProduct() {
        $.ajax({

            url: '<?= base_url(); ?>/vessel/option_product',

            method: 'POST',

            data: {
                service_invoice: service_invoice
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

            url: '<?= base_url(); ?>/vessel/option_project',

            method: 'POST',

            data: {
                service_invoice: service_invoice
            },

            success: function(res) {

                $('#projects').html(res);
                $('#projects').select2({
                    theme: "bootstrap-5",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    closeOnSelect: false,
                });
            }

        })
    }

    //option Fleet
    function optionFleet() {

        let fleet = "<?= $service->ves_fleet ?>";

        $.ajax({

            url: '<?= base_url(); ?>/vessel/option_fleet',

            method: 'POST',

            data: {

                fleet: fleet
            },

            success: function(res) {

                $('#ves_fleet').html(res);

            }

        })

    }


    //option Vessel
    function optionVessel() {

        $.ajax({

            url: '<?= base_url(); ?>/vessel/option_vessel',

            method: 'POST',

            data: {
                service_invoice: service_invoice
            },

            success: function(res) {

                $('#ves_name').html(res);
                $('#ves_name').select2({
                    theme: "bootstrap-5",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    closeOnSelect: false,
                });
            }

        })

    }

    //option Type Vessel
    function optionTypeVessel() {

        let type = "<?= $service->ves_type ?>";

        $.ajax({

            url: '<?= base_url(); ?>/vessel/option_type_vessel',

            method: 'POST',

            data: {

                type: type
            },

            success: function(res) {

                $('#ves_type').html(res);

            }

        })

    }

    //-------------------------------------------------------------------------C O N T R A C T----------------------------------------------------------------------------------

    //Option Port Name
    function optionPort() {

        $.ajax({

            url: '<?= base_url(); ?>port/option_port',

            method: 'POST',

            data: {
                port_names: port_name
            },

            success: function(res) {

                $('#port_name').html(res);

            }

        })

    }

    //Option Province 
    function optionProvince($port_name) {

        $.ajax({

            url: '<?= base_url(); ?>port/option_province',

            method: 'POST',

            data: {
                port_name: $port_name
            },

            success: function(res) {

                $('#port_province').html(res);

            }

        })

    }

    //Option Contact Name
    function optionContactname() {

        let con_name = "<?= $service->con_name ?>";

        $.ajax({

            url: '<?= base_url(); ?>contact/option_contact_name',

            method: 'POST',

            data: {
                con_name: con_name
            },

            success: function(res) {

                $('#con_name').html(res);

            }

        })

    }

    //Option Contact Name
    function optionContactphone($con_name) {

        $.ajax({

            url: '<?= base_url(); ?>contact/option_contact_phone',

            method: 'POST',

            data: {
                con_name: $con_name
            },

            success: function(res) {

                $('#con_tel').html(res);

            }

        })

    }

    //Option Contact Email
    function optionContactemail($con_name) {

        $.ajax({

            url: '<?= base_url(); ?>contact/option_contact_email',

            method: 'POST',

            data: {
                con_name: $con_name
            },

            success: function(res) {

                $('#con_email').html(res);

            }

        })

    }

    //--------------------------------------------------------------------------------------------------------------------------------------------------------------------------


    //clear form

    function clearForm() {

        $('#cus_name').val('');

        $('#cus_tel').val('');

        $('#cus_tax').val('');

        $('#cus_address').val('');

        $('#license_plate').val('');

        $('#car_brand').val('');

        $('#car_model').val('');

        $('#car_mile_number').val('');

    }


    function search_license_plate() {

        let license_plate = $("#search_license_plate").val();

        $.ajax({

            url: '<?= base_url(); ?>/service/search_license_plate',

            method: 'POST',

            data: {

                license_plate: license_plate

            },

            success: function(res) {

                $('#showSearch').html(res);

            }

        })

    }

    //Get Service Detail

    function getServiceDetail() {
        $.ajax({

            url: '<?= base_url(); ?>/service/tbl_service_detail',

            method: 'POST',

            data: {

                service_invoice: service_invoice

            },

            success: function(res) {

                $('#showServiceDetail').html(res);

            }

        })
    }

    $(document).ready(function() {
        optionProject();
        optionProduct();
        optionCustomer();
        optionFleet();
        optionVessel();
        optionTypeVessel();
        optionContactname();
        optionPort();
        optionProvince(port_name);
        optionPackage();
        optionPackageInternet();
        optionAdmin();
        getServiceDetail();
    });

    // Update Service

    $(document).on('click', '#updateService', function() {

        let projects = $('#projects').val();

        let cus_name = $('#cus_name').val();

        let cus_tel = $('#cus_phone').val();

        let cus_email = $('#cus_email').val();

        let cus_address = $('#cus_address').val();

        let cus_zipcode = $('#cus_zipcode').val();

        let ves_fleet = $('#ves_fleet').val();

        let ves_name = $('#ves_name').val();

        let ves_type = $('#ves_type').val();

        let ves_callsign = $('#ves_callsign').val();

        let ves_imo = $('#ves_imo').val();

        let ves_mmsi = $('#ves_mmsi').val();

        let ves_year = $('#ves_year').val();

        let ves_maintenance = $('#ves_maintenance').val();

        let ves_survey = document.getElementById('ves_survey').checked;

        let ves_installation = document.getElementById('ves_installation').checked;

        let con_name = $('#con_name').val();

        let con_tel = $('#con_tel').val();

        let con_email = $('#con_email').val();

        let port_name = $('#port_name').val();

        let admin_name = $('#admin_name').val();

        let product = $('#product').val();

        let pack_name = $('#pack_name').val();

        let pack_internet = $('#pack_internet').val();

        let remark_create = $('#remark_create').val();

        let create_date = $('#create_date').val();

        let due_date = $('#due_date').val();

        let end_date = $('#end_date').val();

        let eta = $('#ETA').val();

        let etd = $('#ETD').val();

        let contract_start = $('#contract_start').val();

        let contract_end = $('#contract_end').val();

        if (service_invoice == '' || projects == '' || cus_name == '' || cus_tel == '' || cus_address == '' || cus_email == '' || cus_zipcode == '' || ves_fleet == '' || ves_name == '' ||
            ves_type == '' || ves_callsign == '' || ves_imo == '' || ves_mmsi == '' || ves_year == '' || ves_maintenance == '' || con_name == '' || con_tel == '' ||
            port_name == '' || con_email == '' || admin_name == '' || product == '' || pack_name == '' || pack_internet == '' || remark_create == '' ||
            create_date == '' || due_date == '' || end_date == '' || eta == '' || etd == '' || contract_start == '' || contract_end == '') {

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

                            url: '<?= base_url(); ?>/service/update_service',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                service_invoice: service_invoice,

                                projects: projects,

                                cus_name: cus_name,

                                cus_tel: cus_tel,

                                cus_address: cus_address,

                                cus_email: cus_email,

                                cus_zipcode: cus_zipcode,

                                ves_fleet: ves_fleet,

                                ves_name: ves_name,

                                ves_type: ves_type,

                                ves_callsign: ves_callsign,

                                ves_imo: ves_imo,

                                ves_mmsi: ves_mmsi,

                                ves_year: ves_year,

                                ves_maintenance: ves_maintenance,

                                ves_survey: ves_survey,

                                ves_installation: ves_installation,

                                con_name: con_name,

                                con_tel: con_tel,

                                port_name: port_name,

                                con_email: con_email,

                                admin_name: admin_name,

                                product: product,

                                pack_name: pack_name,

                                pack_internet: pack_internet,

                                remark_create: remark_create,

                                create_date: create_date,

                                due_date: due_date,

                                end_date: end_date,

                                eta: eta,

                                etd: etd,

                                contract_start: contract_start,

                                contract_end: contract_end,

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

                                        window.location.assign('<?= base_url(); ?>pages/service_detail/' + res.service_invoice);

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

    $(document).on('click', '#search', function() {

        let license_plate = $("#search_license_plate").val();

        if (license_plate == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกทะเบียนรถที่ต้องการค้นหา',

                confirmButtonText: 'ตกลง'

            })

            return false;

        }

        $.ajax({

            url: '<?= base_url(); ?>/service/search_license_plate',

            method: 'POST',

            data: {

                license_plate: license_plate

            },

            success: function(res) {

                $('#showSearch').html(res);

            }

        })

    })
</script>