<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h3><i class="fas fa-tools"></i><strong> Create Job Order</strong></h3>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/pages">Index</a></li>

                        <li class="breadcrumb-item active">Create Job Order</li>

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

                                <div class="col-md-1">

                                </div>

                            </div>



                            <div class="row mb-2">

                                <div class="col-md-3 mb-2">

                                    <label>Created Date :</label>

                                    <input type="date" id="create_date" class="form-control rounded-0" placeholder="วันที่ส่งซ่อม" value="<?= date('Y-m-d'); ?>">

                                </div>

                                <div class="col-1"></div>

                                <div class="col-md-3 mb-2">

                                    <label>Due Date :</label>

                                    <input type="date" id="due_date" class="form-control rounded-0" placeholder="วันที่ซ่อมบำรุง" value="<?= date('Y-m-d'); ?>">

                                </div>

                                <div class="col-1"></div>

                                <div class="col-md-3 mb-2">

                                    <label>End Date :</label>

                                    <input type="date" id="end_date" class="form-control rounded-0" placeholder="วันที่ซ่อมบำรุงเสร็จ" value="<?= date('Y-m-d'); ?>">

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

                                        <option value="">Telephone</option>

                                    </select>
                                </div>

                                <div class="col-md-4 mb-2">

                                    <label><strong class="text-danger">*</strong>E-mail :</label>

                                    <select class="form-control select2 rouned-0" id="cus_email">

                                        <option value="">Email</option>

                                    </select>

                                </div>

                            </div>

                            <div class="row mb-2">

                                <div class="col-md-4 mb-2">

                                    <label><strong class="text-danger">*</strong>Address :</label>

                                    <select class="form-control select2 rouned-0" id="cus_address">

                                        <option value="">Address</option>

                                    </select>

                                </div>

                                <div class="col-md-4 mb-2">

                                    <label><strong class="text-danger">*</strong>Zipcode :</label>

                                    <select class="form-control select2 rouned-0" id="cus_zipcode">

                                        <option value="">Zipcode</option>

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

                                        <option value="fleet">Loading...</option>

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

                                        <option value="">Vessel Type</option>

                                    </select>

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Flag :</label>

                                    <input type="text" id="ves_flag" class="form-control rounded-0" placeholder="Flag" list="flag-list">

                                    <datalist id="flag-list">
                                        <?php foreach ($service as $index) : ?>
                                            <option><?= $index->ves_flag ?></option>
                                        <?php endforeach ?>
                                    </datalist>

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Home Port :</label>

                                    <input type="text" id="ves_home_port" class="form-control rounded-0" placeholder="Home Port" list="home-list">

                                    <datalist id="home-list">
                                        <?php foreach ($service as $index) : ?>
                                            <option><?= $index->ves_home_port ?></option>
                                        <?php endforeach ?>
                                    </datalist>

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Gross Tonnage :</label>

                                    <input type="text" id="ves_gross_tonnage" class="form-control rounded-0" placeholder="Gross Tonnage" list="gross-list" maxlength="6" oninput="this.value=this.value.replace(/[^0-9]/g,'');">

                                    <datalist id="gross-list">
                                        <?php foreach ($service as $index) : ?>
                                            <option><?= $index->ves_gross_tonnage ?></option>
                                        <?php endforeach ?>
                                    </datalist>

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Call Sign :</label>

                                    <input type="text" id="ves_callsign" class="form-control rounded-0" placeholder="Call Sign" list="call-list">

                                    <datalist id="call-list">
                                        <?php foreach ($service as $index) : ?>
                                            <option><?= $index->ves_callsign ?></option>
                                        <?php endforeach ?>
                                    </datalist>

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>IMO :</label>

                                    <input type="text" maxlength="6" id="ves_imo" class="form-control rounded-0" placeholder="IMO" list="imo-list" maxlength="6" oninput="this.value=this.value.replace(/[^0-9\s]/g,'');">

                                    <datalist id="imo-list">
                                        <?php foreach ($service as $index) : ?>
                                            <option><?= $index->ves_imo ?></option>
                                        <?php endforeach ?>
                                    </datalist>

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>MMSI :</label>

                                    <input type="text" id="ves_mmsi" class="form-control rounded-0" placeholder="MMSI" list="mmsi-list">

                                    <datalist id="mmsi-list">
                                        <?php foreach ($service as $index) : ?>
                                            <option><?= $index->ves_mmsi ?></option>
                                        <?php endforeach ?>
                                    </datalist>

                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Year Built :</label>

                                    <input type="text" id="ves_year" class="form-control rounded-0" placeholder="Year Built" list="year-list" maxlength="4" oninput="this.value=this.value.replace(/[^0-9\s]/g,'');">

                                    <datalist id="year-list">
                                        <?php foreach ($service as $index) : ?>
                                            <option><?= $index->ves_year ?></option>
                                        <?php endforeach ?>
                                    </datalist>
                                </div>

                                <div class="col-md-2 mb-2">

                                    <label><strong class="text-danger">*</strong>Maintenance :</label>

                                    <select class="form-control select2 rouned-0" id="ves_maintenance">

                                        <option value="Preventive Maintenance">Preventive Maintenance</option>
                                        <option value="Corrective Maintenance">Corrective Maintenance</option>

                                    </select>

                                </div>

                                <div class="col-md-2 mb-2">
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <label><strong class="text-danger">*</strong>Survey :</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="checkbox" id="ves_survey" name="ves_survey">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <label><strong class="text-danger">*</strong>Installation :</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="checkbox" id="ves_installation" name="ves_installation">
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-2 mb-2">

                                    <p class="text-primary"><i class="fas fa-circle"></i> Contact Onboard</p>

                                </div>

                                <div>

                                    <button type="button" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#modalAddContact"><i class="fas fa-plus"></i> Add Contact</button>

                                </div>

                                <div style="margin-left: 10px">

                                    <button type="button" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#modalAddPort"><i class="fas fa-plus"></i> Add Port</button>

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

                                        <option value="">Contact Phone</option>

                                    </select>

                                </div>

                                <div class="col-md-3 mb-2">

                                    <label><strong class="text-danger">*</strong>Email :</label>

                                    <select class="form-control select2 rouned-0" id="con_email">

                                        <option value="">Contact Email</option>

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

                                    <input type="datetime-local" id="ETA" class="form-control rounded-0" placeholder="วันที่ส่งซ่อม" value="<?= date('d-m-Y'); ?>">



                                </div>

                                <div class="col-md-3 mb-2">

                                    <label><strong class="text-danger">*</strong>ETD :</label>

                                    <input type="datetime-local" id="ETD" class="form-control rounded-0" placeholder="วันที่ส่งซ่อม" value="<?= date('Y-m-d'); ?>">

                                </div>


                            </div>


                            <div class="row">

                                <div class="col-md-2 mb-2">

                                    <p class="text-primary"><i class="fas fa-circle"></i> Package</p>

                                </div>

                                <div>

                                    <button type="button" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#modalAddPackage"><i class="fas fa-plus"></i> Add Package</button>

                                </div>

                            </div>

                            <div class="row mb-2">

                                <div class="col-md-6 mb-2">

                                    <label><strong class="text-danger">*</strong>Package Name :</label>

                                    <select class="form-select" id="pack_name" name="pack_name[]" data-placeholder="Select Package" multiple="multiple" onchange="optionPackageInternet()">

                                        <option value="">Loading...</option>

                                    </select>

                                </div>

                                <div class="col-md-3 mb-2">

                                    <label><strong class="text-danger">*</strong>Start Contract :</label>

                                    <input type="date" id="contract_start" class="form-control rounded-0" placeholder="Start Contract" value="<?= date('Y-m-d'); ?>">

                                </div>

                            </div>


                            <div class="row mb-2">

                                <div class="col-md-6 mb-2">

                                    <label><strong class="text-danger">*</strong>Package Internet :</label>


                                    <select class="form-select" id="pack_internet" data-placeholder="Select Package Internet" multiple="multiple">

                                        <option value="">Loading ..</option>

                                    </select>

                                </div>

                                <div class="col-md-3 mb-2">

                                    <label><strong class="text-danger">*</strong>End Contract :</label>

                                    <input type="date" id="contract_end" class="form-control rounded-0" placeholder="End Contract" value="<?= date('Y-m-d'); ?>">

                                </div>

                            </div>

                            <div class="row mb-2">

                                <p class="text-primary"><i class="fas fa-circle"></i> Engineer</p>

                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">

                                    <label><strong class="text-danger">*</strong>Engineer :</label>

                                    <select class="form-select" id="admin_name" data-placeholder="Select Engineer" multiple="multiple">

                                        <option value="">Loading...</option>

                                    </select>

                                </div>

                            </div>

                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <p class="text-primary"><i class="fas fa-circle"></i> Remark</p>


                                    <textarea id="remark_create" class="form-control rounded-0" placeholder="Remark" required></textarea>
                                </div>
                            </div>





                            <div class="row">

                                <div class="col-md-12 mt-2">

                                    <button id="createService" class="btn btn-primary rounded-0">Create</button>

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

<!-- Modal Add Customer -->

<div class="modal fade" id="modalAddCustomer" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">กรอกข้อมูลบริษัท</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-2">

                            <label class="col-md-2"><strong class="text-danger">*</strong>Name :</label>

                            <div class="col-md-10">
                                <input type="text" id="cus_names" class="form-control rounded-0" placeholder="Customer Name" autocomplete="on">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-2"><strong class="text-danger">*</strong>Addr :</label>
                            <div class="col-md-10">
                                <input type="text" id="cus_addresss" class="form-control rounded-0" placeholder="Address">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-2"><strong class="text-danger">*</strong>Zip :</label>

                            <div class="col-md-10">
                                <input type="text" id="cus_zipcodes" class="form-control rounded-0" placeholder="Zipcode">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-2"><strong class="text-danger">*</strong>Email :</label>

                            <div class="col-md-10">
                                <input type="text" id="cus_emails" class="form-control rounded-0" placeholder="Email">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-2"><strong class="text-danger">*</strong>Tel :</label>

                            <div class="col-md-10">
                                <input type="text" id="cus_tels" class="form-control rounded-0" placeholder="Telephone" maxlength="10" oninput="this.value=this.value.replace(/[^0-9\\s]/g,'');">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-5"></div>

                            <div class="col-md-4 mt-2">

                                <button id="createCustomer" class="btn btn-primary rounded-0">Create</button>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 mb-2" id="showSearch">

                        <div class="row">

                            <div class="col-md-12 mt-2 mb-2 text-center">

                                <h5 class="text-info"><small>กรอกข้อมูลให้ครบทุกช่อง</small></h5>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- Modal Add Port -->

<div class="modal fade" id="modalAddPort" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">ข้อมูลท่าเรือ</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Port :</label>

                            <div class="col-md-9">
                                <input type="text" id="port_names" class="form-control rounded-0" placeholder="Port Name">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Province :</label>
                            <div class="col-md-9">
                                <input type="text" id="port_provinces" class="form-control rounded-0" placeholder="Province of Port">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-5"></div>

                            <div class="col-md-4 mt-2">

                                <button id="createPort" class="btn btn-primary rounded-0">Create</button>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 mb-2" id="showSearch">

                        <div class="row">

                            <div class="col-md-12 mt-2 mb-2 text-center">

                                <h5 class="text-info"><small>กรอกข้อมูลให้ครบทุกช่อง</small></h5>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- Modal Add Package -->

<div class="modal fade" id="modalAddPackage" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">ข้อมูลแพ็คเกจ</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Package Name :</label>

                            <div class="col-md-8">
                                <input type="text" id="pack_names" class="form-control rounded-0" placeholder="Package Name">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-4"><strong class="text-danger">*</strong>Package Internet :</label>

                            <div class="col-md-8">
                                <input type="text" id="pack_internets" class="form-control rounded-0" placeholder="Package Internet">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-5"></div>

                            <div class="col-md-4 mt-2">

                                <button id="createPackage" class="btn btn-primary rounded-0">Create</button>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 mb-2" id="showSearch">

                        <div class="row">

                            <div class="col-md-12 mt-2 mb-2 text-center">

                                <h5 class="text-info"><small>กรอกข้อมูลให้ครบทุกช่อง</small></h5>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Modal Add Contact -->

<div class="modal fade" id="modalAddContact" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title">ข้อมูลติดต่อคนบนเรือ</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Name :</label>
                            <div class="col-md-9">
                                <input type="text" id="con_names" class="form-control rounded-0" placeholder="Contact Name">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Email :</label>

                            <div class="col-md-9">
                                <input type="email" id="con_emails" class="form-control rounded-0" placeholder="Contact Email">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <label class="col-md-3"><strong class="text-danger">*</strong>Tel :</label>

                            <div class="col-md-9">
                                <input type="text" id="con_tels" class="form-control rounded-0" placeholder="Contact Tel" maxlength="15" oninput="this.value=this.value.replace(/[^0-9\\-]/g,'');">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-5"></div>

                            <div class="col-md-4 mt-2">

                                <button id="createContact" class="btn btn-primary rounded-0">Create</button>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 mb-2" id="showSearch">

                        <div class="row">

                            <div class="col-md-12 mt-2 mb-2 text-center">

                                <h5 class="text-info"><small>กรอกข้อมูลให้ครบทุกช่อง</small></h5>

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

    //option admin

    function optionAdmin() {

        $.ajax({

            url: '<?= base_url(); ?>/user/option_admins',

            method: 'POST',

            data: {
                admin_name: ''
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

        $.ajax({

            url: '<?= base_url(); ?>/customer/option_customer',

            method: 'POST',

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

            url: '<?= base_url(); ?>vessel/option_product',

            method: 'POST',

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

        $.ajax({

            url: '<?= base_url(); ?>vessel/option_fleet',

            method: 'POST',

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

        $.ajax({

            url: '<?= base_url(); ?>vessel/option_type_vessel',

            method: 'POST',


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

        $.ajax({

            url: '<?= base_url(); ?>contact/option_contact_name',

            method: 'POST',

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

    function clearFormContact() {

        $('#con_names').val('');

        $('#con_tels').val('');

        $('#con_emails').val('');

    }

    function clearFormPort() {

        $('#port_names').val('');

        $('#port_province').val('');

    }

    function clearFormPackage() {

        $('#pack_names').val('');

        $('#pack_internets').val('');

    }

    //clear form


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



    $(document).ready(function() {
        optionPackageInternet('');
        optionPackage();
        optionPort()
        optionAdmin();
        optionCustomer();
        optionFleet();
        optionProject();
        optionProduct();
        optionVessel();
        optionTypeVessel();
        optionContactname();


    });



    // Create Customer

    $(document).on('click', '#createCustomer', function() {

        let cus_name = $('#cus_name').val();

        let cus_tel = $('#cus_tel').val();

        let cus_email = $('#cus_email').val();

        let cus_address = $('#cus_address').val();

        let cus_zip = $('#cus_zip').val();

        if (cus_name == '' || cus_tel == '' || cus_address == '' || cus_zip == '' || cus_email == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        Swal.fire({

            title: 'เพิ่มผู้ใช้บริการ',

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

                            url: '<?= base_url(); ?>/customer/create_customer',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                cus_name: cus_name,

                                cus_tel: cus_tel,

                                cus_address: cus_address,

                                cus_zip: cus_zip,

                                cus_email: cus_email

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

                                        window.location.assign('<?= base_url(); ?>/pages/service_create/');

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

    // Create Contact

    $(document).on('click', '#createContact', function() {

        let con_name = $('#con_names').val();

        let con_tel = $('#con_tels').val();

        let con_email = $('#con_emails').val();

        if (con_name == '' || con_tel == '' || con_email == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        Swal.fire({

            title: 'เพิ่มผู้ใช้บริการ',

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

                            url: '<?= base_url(); ?>contact/create_Contact',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                con_name: con_name,

                                con_tel: con_tel,

                                con_email: con_email

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

                                    optionContactname();

                                    clearFormContact();

                                    $('#modalAddContact').modal('hide');

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



    // Create Port

    $(document).on('click', '#createPort', function() {

        let port_names = $('#port_names').val();

        let port_provinces = $('#port_provinces').val();

        if (port_names == '' || port_provinces == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        Swal.fire({

            title: 'เพิ่มผู้ใช้บริการ',

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

                            url: '<?= base_url(); ?>port/create_Port',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                port_names: port_names,

                                port_provinces: port_provinces,

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

                                    optionPort();

                                    clearFormPort();

                                    $('#modalAddPort').modal('hide');

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

    // Create Package

    $(document).on('click', '#createPackage', function() {

        let pack_names = $('#pack_names').val();

        let pack_internets = $('#pack_internets').val();

        if (pack_names == '' || pack_internets == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        Swal.fire({

            title: 'เพิ่มผู้ใช้บริการ',

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

                            url: '<?= base_url(); ?>package/create_Package',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                pack_names: pack_names,

                                pack_internets: pack_internets,

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

                                    optionPackage();

                                    clearFormPackage();

                                    $('#modalAddPackage').modal('hide');

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


    // Create Service

    $(document).on('click', '#createService', function() {

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

        let ves_flag = $('#ves_flag').val();

        let ves_home_port = $('#ves_home_port').val();

        let ves_gross_tonnage = $('#ves_gross_tonnage').val();

        let ves_maintenance = $('#ves_maintenance').val();

        let ves_survey = document.getElementById('ves_survey').checked;

        let ves_installation = document.getElementById('ves_installation').checked;

        let con_name = $('#con_name').val();

        let con_tel = $('#con_tel').val();

        let con_email = $('#con_email').val();

        let port_name = $('#port_name').val();

        let port_province = $('#port_province').val();

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

        if (projects == '' || cus_name == '' || cus_tel == '' || cus_address == '' || cus_email == '' || cus_zipcode == '' || ves_fleet == '' || ves_name == '' ||
            ves_type == '' || ves_callsign == '' || ves_imo == '' || ves_mmsi == '' || ves_year == '' || ves_maintenance == '' || ves_flag == '' || ves_home_port == '' ||
            ves_gross_tonnage == '' || con_name == '' || con_tel == '' || con_email == '' || port_name == '' || port_province == '' || admin_name == '' ||
            product == '' || pack_name == '' || pack_internet == '' || remark_create == '' || create_date == '' || due_date == '' || end_date == '' || eta == '' || etd == '' ||
            contract_start == '' || contract_end == '') {

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

                            url: '<?= base_url(); ?>/service/create_service',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

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

                                ves_flag: ves_flag,

                                ves_home_port: ves_home_port,

                                ves_gross_tonnage: ves_gross_tonnage,

                                ves_maintenance: ves_maintenance,

                                ves_survey: ves_survey,

                                ves_installation: ves_installation,

                                con_name: con_name,

                                con_tel: con_tel,

                                port_name: port_name,

                                port_province: port_province,

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

                                contract_end: contract_end

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